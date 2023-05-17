<?php

namespace App\Http\Controllers\Procesos;

use App\Http\Controllers\Controller;
use App\Models\SolicitudRecarga;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
use App\Models\TransaccionMonedero;
use App\Models\SolicitudRetiro;
use App\Models\User;

class TransaccionMonederoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sql = "select * from transaccion_monedero where user_id=" . Auth()->user()->id;
        $datos = DB::select($sql);
        //dd(Auth()->user());
        return view('monedero.transacciones', compact("datos"));
    }

    public function retiro()
    {
        //dd(Auth()->user());
        return view('monedero.retiro');
    }

    public function indexsolicitud()
    {

        $sql = "SELECT sol.id,sol.user_id,sol.fecha,sol.valor,sol.rutaarchivo,sol.detalle,sol.aprobado,sol.bancoprocedencia,tra.id transaccionid FROM solicitud_recargas sol
        LEFT JOIN transaccion_monedero tra on tra.solicitud_id=sol.id
        WHERE sol.user_id=" . Auth()->user()->id;
        $datos = DB::select($sql);

        return view('monedero.indexsolicitudrecarga', compact('datos'));
    }

    public function indexsolicitudretiro()
    {

        // $sql="SELECT * FROM solicitud_retiros sol
        // WHERE sol.user_id=".Auth()->user()->id;
        $sql = "SELECT sol.id,sol.user_id,sol.fecha,sol.cantidad,sol.rutaarchivo,sol.banco_benificiario,sol.tipo_cta,sol.aprobado,sol.num_cta_bancaria,sol.transferido,tra.id transaccionid FROM solicitud_retiros sol
        LEFT JOIN transaccion_monedero tra on tra.solicitud_id=sol.id
        WHERE sol.user_id=" . Auth()->user()->id;
        $datos = DB::select($sql);

        return view('monedero.indexsolicitudretiros', compact('datos'));
    }

    public function crear()
    {

        return view('monedero.solicitud');
    }

    public function crearnuevo(Request $request)
    {
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();

        $datos = $request->all();

        $registro = SolicitudRecarga::create([
            'user_id'        => Auth()->user()->id,
            'fecha'        => $date,
            'valor'        =>  $datos['costo'],
            'detalle'        => $datos['detalle'],
            'aprobado'        => 0,
            'bancoprocedencia'  => $datos['procedencia'],
        ]);

        $file = $request->file('archivo');
        $extension = $file->getClientOriginalExtension();

        $namecf = $registro->id . "." . $extension;
        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('banco')->put($namecf,  \File::get($file));

        $registro = SolicitudRecarga::where('id', '=', $registro->id)->update([
            'rutaarchivo'    => $namecf
        ]);

        $request->session()->flash('alert-success', 'Fue agregado exitosamente!');
        return back();
    }


    public function aprobar()
    {

        $sql = "select re.id,re.fecha,re.valor,re.detalle,re.bancoprocedencia,re.aprobado,re.rutaarchivo,usu.name solicitante,usu.dni from solicitud_recargas re
        LEFT JOIN users usu ON usu.id=re.user_id";
        $datos = DB::select($sql);

        return view('monedero.aprobar', compact('datos'));
    }

    public function aprobarsol($id, Request $request)
    {
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();

        $id =  Crypt::decrypt($id);
        $datos = SolicitudRecarga::find($id);
        //dd($datos->valor);
        //registro de gasto
        $registro3 = TransaccionMonedero::create([
            'user_id'        => $datos->user_id,
            'tipo'        => 'ING',
            'fecha'        => $date,
            'valor'        => $datos->valor,
            'detalle' => 'Por recarga desde la solicitud No. ' . $id . ', aprobada por TEDU EMPRENDE.',
            'observacion' => '',
            'solicitud_id' => $id,
        ]);
        $misaldo = $this->obtenersaldo();
        session(['saldoCuenta' => $misaldo[0]->saldo]);

        $registro = SolicitudRecarga::where('id', '=',  $id)->update([
            'aprobado'        => 1,
            'aprobadopor'        => Auth()->user()->id,
            'aprobadodate'        => $date,

        ]);


        $request->session()->flash('alert-success', 'Fue aprobado exitosamente!');
        return back();
    }


    public function obtenersaldo()
    {
        $sql = "SELECT SUM(IF(tipo='ING',valor,valor*-1)) saldo FROM transaccion_monedero WHERE user_id=" . Auth()->user()->id;
        $saldo = DB::select($sql);
        return $saldo;
    }

    public function solicitudretiro(Request $request)
    {
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();

        $datos = $request->all();
        $misaldo = $this->obtenersaldo();


        if ($datos['cantidad'] > $misaldo[0]->saldo) {
            $request->session()->flash('alert-danger', 'Su saldo de $ ' . $misaldo[0]->saldo . ' no es suficiente como para realizar un retiro de la cuenta virtual.');
            return back();
        }

        $registro = SolicitudRetiro::create([
            'user_id'            => Auth()->user()->id,
            'fecha'              => $date,
            'saldo'          =>  $datos['saldo'],
            'banco_benificiario' => $datos['banco_benificiario'],
            'tipo_cta'           => $datos['tipo_cta'],
            'num_cta_bancaria'   => $datos['num_cta_bancaria'],
            'cantidad'           => $datos['cantidad'],
            'transferido'        => 0,

        ]);
        $file = $request->file('archivo');
        $extension = $file->getClientOriginalExtension();

        $namecf = $registro->id . "." . $extension;
        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('banco')->put($namecf,  \File::get($file));

        $registro = SolicitudRecarga::where('id', '=', $registro->id)->update([
            'rutaarchivo'    => $namecf
        ]);

        $request->session()->flash('alert-success', 'Fue agregado exitosamente!');
        return back();
    }

    public function retirosaprobar()
    {

        $sql = "select re.id,re.fecha,re.cantidad,re.transferido,usu.name solicitante,usu.dni from solicitud_retiros re
        LEFT JOIN users usu ON usu.id=re.user_id";
        $datos = DB::select($sql);

        return view('monedero.aprobarretiro', compact('datos'));
    }

    public function retirosaprobarsol($id, Request $request)
    {
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();

        $id =  Crypt::decrypt($id);
        $datos = SolicitudRetiro::find($id);
        //dd($datos->valor);
        //registro de gasto
        $registro3 = TransaccionMonedero::create([
            'user_id'        => $datos->user_id,
            'tipo'        => 'EGR',
            'fecha'        => $date,
            'valor'        => $datos->cantidad,
            'detalle' => 'Por retiro desde la solicitud No. ' . $id . ', transferido por TEDU EMPRENDE.',
            'observacion' => '',
            'solicitud_id' => $id,
        ]);
        $misaldo = $this->obtenersaldo();
        session(['saldoCuenta' => $misaldo[0]->saldo]);

        $registro = SolicitudRetiro::where('id', '=',  $id)->update([
            'transferido'        => 1,
            'aprobado'        => 1,
            'aprobadopor'        => Auth()->user()->id,
            'aprobadodate'        => $date,

        ]);
        $request->session()->flash('alert-success', 'Fue aprobado exitosamente!');
        return back();
    }

    function incrementParam($param)
    {
        $parts = explode('-', $param);
        $lastPart = end($parts);

        if ($lastPart === '999999999') {
            $secondLastPart = prev($parts);
            $newSecondLastPart = str_pad(intval($secondLastPart) + 1, strlen($secondLastPart), '0', STR_PAD_LEFT);
            $newLastPart = str_pad(0, strlen($lastPart), '0', STR_PAD_LEFT);
            array_pop($parts);
            array_pop($parts);
            $parts[] = $newSecondLastPart;
            $parts[] = $newLastPart;
        } else {
            $newLastPart = str_pad(intval($lastPart) + 1, strlen($lastPart), '0', STR_PAD_LEFT);
            array_pop($parts);
            $parts[] = $newLastPart;
        }

        return implode('-', $parts);
    }

    function convertirFecha($fecha)
    {
        $fechaUnix = strtotime($fecha);
        $fechaFormateada = date('m/d/Y', $fechaUnix);
        return $fechaFormateada;
    }


    public function contifico()
    {
        if (Auth()->user()->categoria_users_id != 1) {
            return view("auth.login");
        }

        // $sql="select re.id,re.fecha,re.cantidad,re.transferido,usu.name solicitante,usu.dni from solicitud_retiros re
        // LEFT JOIN users usu ON usu.id=re.user_id";
        $sql = "select * from transaccion_monedero where tipo='PRO'";
        $datos = DB::select($sql);
        // return dd($datos);

        return view('monedero.contifico', compact('datos'));
    }
    public function actualizarpagospro()
    {
        if (Auth()->user()->categoria_users_id != 1) {
            return view("auth.login");
        }

        // return dd(ENV("PAGOSMEDIOSTOKEN"));
        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();

        // $sql="select created_at from transaccion_monedero where pagopro=1 ORDER BY created_at DESC LIMIT 1";
        $sql = "select created_at from transaccion_monedero where tipo='PRO' ORDER BY created_at DESC LIMIT 1";
        $fetch = DB::select($sql);
        if (sizeof($fetch) != 0) {
            $fecha_ultima_actualizacion = $fetch[0]->created_at;
        } else {
            $fecha_ultima_actualizacion = "2021-01-04 11:36:31";
        }
        $token = env("PAGOSMEDIOSTOKEN");
        $resp = Http::withToken($token)->get('https://api.abitmedia.cloud/pagomedios/v2/payment-requests');
        // $resp = Http::withToken($token)->get('https://api.abitmedia.cloud/pagomedios/v2/payment-requests');
        if (!isset($resp)) {
            return "";
        } else if ($resp["status"] != 200) {
            return "";
        }


        //OBTENER EL ULTIMO NUMERO DE DOCUMENTO
        $respDocument = Http::withHeaders([
            'Authorization' => env('CONTIFICO_KEY_PROD'),
        ])
            ->get('https://api.contifico.com/sistema/api/v1/documento/');

        // return dd($respDocument->json()[0]['documento']);
        if ($respDocument->failed()) {
            throw new Exception('Error al realizar la solicitud HTTP: ' . $respDocument->status());
        } else {

            $lastDocument = $respDocument->json()[0]['documento'];
            $newDocumentNumber = $lastDocument;
        }

        // return ($lastDocument);
        //

        $data = $resp['data'];
        $filtered_data = array();

        foreach ($data as $obj) {
            $payment_date = strtotime($obj['payment_date']);
            $cutoff_date = strtotime($fecha_ultima_actualizacion);
            if ($payment_date > $cutoff_date && $obj["reverse"] != 1 && strpos($obj['description'], 'PLAN MENSUAL PREMIUM TEDU') !== false) {
                // if ($payment_date > $cutoff_date && strpos($obj['description'], 'PLAN MENSUAL PREMIUM TEDU') !== false ) {
                $filtered_data[] = $obj;
                $sql1 = "select * from users where dni=" . $obj['third_party_document'];
                $datos = DB::select($sql1)[0];
                $registro3 = TransaccionMonedero::create([
                    'user_id'        => $datos->id,
                    'tipo'        => 'PRO',
                    'fecha'        => $date,
                    'valor'        => intval($obj["amount"]),
                    'detalle' => 'Update a PRO, aprobada por TEDU EMPRENDE.',
                    'observacion' => '',
                    'solicitud_id' => null,
                ]);
                $actualizar = User::where('id', '=',  $datos->id)->update([
                    'plan_id'           => 2,
                ]);

                //INICIO DE DOCUMENTOS CONTIFICO
                $previusdocument = $newDocumentNumber;
                $newDocumentNumber = $this->incrementParam($previusdocument);

                $response = Http::withHeaders([
                    'Authorization' => env('CONTIFICO_KEY_PROD'),
                ])
                    ->post('https://api.contifico.com/sistema/api/v1/documento/', [
                        "pos" => env('CONTIFICO_TOKEN_PROD'),
                        "fecha_emision" => $this->convertirFecha($date),
                        "tipo_documento" => "FAC",
                        "documento" => $newDocumentNumber,
                        "estado" => "P",
                        "autorizacion" => "0123456789",
                        "caja_id" => null,
                        "cliente" => [
                            "ruc" => null,
                            "cedula" => $datos->dni,
                            "razon_social" => $datos->name,
                            "telefonos" =>  $datos->celular,
                            "direccion" =>  $datos->direccion,
                            "tipo" => "N",
                            "email" =>  $datos->email,
                            "es_extranjero" => false
                        ],
                        "vendedor" => [],
                        "descripcion" => "FACTURA 8040",
                        "subtotal_0" => 0.00,
                        "subtotal_12" => 22.32,
                        "iva" => 2.68,
                        "ice" => 0.00,
                        "servicio" => 0.00,
                        "total" => 25.0,
                        "adicional1" => "",
                        "adicional2" => "",
                        "detalles" => [
                            [
                                "producto_id" => "GP9aQ6GDmFO3EbDM",
                                "cantidad" => 1.0,
                                "precio" => 22.32,
                                "porcentaje_iva" => 12,
                                "porcentaje_descuento" => 0.00,
                                "base_cero" => 0.00,
                                "base_gravable" => 22.32,
                                "base_no_gravable" => 0.00,
                                "porcentaje_ice" => null,
                                "valor_ice" => 0.0
                            ]
                        ],
                        "cobros" => []
                    ]);

                //FIN

            }
        }
        return back();
    }
}
