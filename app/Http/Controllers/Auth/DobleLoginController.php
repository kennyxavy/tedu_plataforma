<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
class DobleLoginController extends Controller

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

    public function index($micodigo=''){

        return view ('auth.register',compact('micodigo'));
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
            'nombres' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
        	'celular' => ['required', 'string', 'max:10'],
        	'dni' => ['required', 'string', 'max:20', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
         $dia=date("d");
         $mes=date("m");
         $ano=date("Y");
 
 
         $dianaz=date("d",strtotime($fecha_nacimiento));
         $mesnaz=date("m",strtotime($fecha_nacimiento));
         $anonaz=date("Y",strtotime($fecha_nacimiento));
 
 
         //si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual
 
         if (($mesnaz == $mes) && ($dianaz > $dia)) {
         $ano=($ano-1); }
 
         //si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual
 
         if ($mesnaz > $mes) {
         $ano=($ano-1);}
 
         //ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad
 
         $edad=($ano-$anonaz);
 
         return $edad;
     }

    protected function create(array $data)
    {
        //dd($data);
      
        return User::create([
            'name' => strtoupper(trim($data['nombres'])).' '.strtoupper(trim($data['apellidos'])),
            'nombres'=> strtoupper(trim($data['nombres'])),
            'apellidos'=> strtoupper(trim($data['apellidos'])),
            'email' => $data['email'],
       		'celular' => $data['celular'],
        	'dni' => $data['dni'],
            'codmentor' => $data['referente'],
            'plan_id' => 1,
            'aceptatermino' => trim($data['aceptatermino'])=='on'?1:0,
            'categoria_users_id' => 3,
            'password' => Hash::make($data['password']),
            'micodigo' =>substr(strtoupper(trim($data['nombres'])),0,1).substr(strtoupper(trim($data['apellidos'])),0,1).substr(strtoupper(trim($data['dni'])),-4),
            'fechaaceptatermino'=>now(),
        ]);
        //$ultimoid=$registro->id;
        //$codnumero=str_pad($ultimoid, 4, "0", STR_PAD_LEFT);
        
    }

    public function doblelogin(Request $request){

        // return redirect("/login");

        Http::timeout(5)->get("https://academia.teduemprende.com/login/index.php", [
                    'username' =>  $request["email"],
                    // 'username' =>  $request["name"],
                    'password' =>  $request["password"],
                ]);
        // return $request;
        // $resp = Http::post("/login", [

        // return $request;
        //    Http::withToken($request["_token"])->post("http://teduweb.test/login", [
    //        Http::timeout(4)->post("http://teduweb.test/login", [
            
    //    return Http::post("https://academia.teduemprende.com/login/index.php", [
    //         '_token' =>  $request["_token"],
    //         'email' =>  $request["email"],
    //         'username' =>  $request["name"],
    //         'password' =>  $request["password"],
    //     ]);
        // return route("/login");
        // return Redirect::away('https://academia.teduemprende.com/login/index.php');
        return Redirect::to('https://academia.teduemprende.com');
        // return view("login");

    
    }
    
}
