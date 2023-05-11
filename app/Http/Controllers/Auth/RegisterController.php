<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Http;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index($micodigo = '')
    {

        return view('auth.register', compact('micodigo'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'dni' => ['required', 'string', 'max:10', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nombres' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'celular' => ['required', 'string', 'max:10'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[A-Z])(?=.*\d)/'],


        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    function obtener_edad_segun_fecha($fecha_nacimiento)
    {
        $dia = date("d");
        $mes = date("m");
        $ano = date("Y");


        $dianaz = date("d", strtotime($fecha_nacimiento));
        $mesnaz = date("m", strtotime($fecha_nacimiento));
        $anonaz = date("Y", strtotime($fecha_nacimiento));


        //si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual

        if (($mesnaz == $mes) && ($dianaz > $dia)) {
            $ano = ($ano - 1);
        }

        //si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual

        if ($mesnaz > $mes) {
            $ano = ($ano - 1);
        }

        //ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad

        $edad = ($ano - $anonaz);

        return $edad;
    }

    protected function create(array $data)
    {
        $resp = Http::post("https://academia.teduemprende.com/webservice/rest/server.php?moodlewsrestformat=json&wstoken=" . env("MOODLE_USER_API") . "&wsfunction=core_user_create_users&users[0][username]=" . explode('@', $data['email'])[0] . "&users[0][auth]=manual&users[0][password]=" . $data['password'] . "&users[0][firstname]=" . strtoupper(trim($data['nombres'])) . "&users[0][lastname]=" . strtoupper(trim($data['apellidos'])) . "&users[0][email]=" . $data['email']);
        // dd($resp);
        $resp2 = Http::post("https://academia.teduemprende.com/webservice/rest/server.php?moodlewsrestformat=json&wstoken=" . env("MOODLE_USER_API") . "&members[0][cohorttype][type]=idnumber&members[0][cohorttype][value]=1&members[0][usertype][type]=username&members[0][usertype][value]=" . explode('@', $data['email'])[0] . "&wsfunction=core_cohort_add_cohort_members");
        //dd($data);
        $response =  Http::withHeaders([
            'Authorization' => env('CONTIFICO_KEY_PROD')
        ])->post('https://api.contifico.com/sistema/api/v1/persona/?pos=' . env('CONTIFICO_TOKEN_PROD'), [
            "tipo" => "N",
            "personaasociada_id" => "null",
            "nombre_comercial" =>  strtoupper(trim($data['nombres'])) . ' ' . strtoupper(trim($data['apellidos'])),
            "telefonos" => $data['celular'],
            "ruc" => null,
            "razon_social" =>  strtoupper(trim($data['nombres'])) . ' ' . strtoupper(trim($data['apellidos'])),
            "direccion" => "",
            "es_extranjero" => false,
            "porcentaje_descuento" => "0",
            "es_cliente" => true,
            "id" => null,
            "es_empleado" => false,
            "email" => $data['email'],
            "cedula" => $data['dni'],
            "placa" => null,
            "es_vendedor" => false,
            "es_proveedor" => false,
            "adicional1_cliente" => null,
            "adicional2_cliente" => null,
            "adicional3_cliente" => null,
            "adicional4_cliente" => null,
            "adicional1_proveedor" => null,
            "adicional2_proveedor" => null,
            "adicional3_proveedor" => null,
            "adicional4_proveedor" => null
        ]);
        return User::create([
            'codmentor' => $data['referente'],
            'celular' => $data['celular'],
            'email' => $data['email'],
            'name' => strtoupper(trim($data['nombres'])) . ' ' . strtoupper(trim($data['apellidos'])),
            'nombres' => strtoupper(trim($data['nombres'])),
            'apellidos' => strtoupper(trim($data['apellidos'])),
            'dni' => $data['dni'],
            'plan_id' => 1,
            'aceptatermino' => trim($data['aceptatermino']) == 'on' ? 1 : 0,
            'categoria_users_id' => 3,
            'password' => Hash::make($data['password']),
            'micodigo' => substr(strtoupper(trim($data['nombres'])), 0, 1) . substr(strtoupper(trim($data['apellidos'])), 0, 1) . substr(strtoupper(trim($data['dni'])), -4),
            'fechaaceptatermino' => now(),
        ]);
        //$ultimoid=$registro->id;
        //$codnumero=str_pad($ultimoid, 4, "0", STR_PAD_LEFT);

    }
}
