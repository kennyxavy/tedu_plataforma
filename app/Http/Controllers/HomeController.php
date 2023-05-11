<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        //$article=User::with("categoriausers")->first();
        //dd($article);

        //dd(Auth()->user());
        $saldo=$this->obtenersaldo();
        session(['saldoCuenta' => $saldo]);

        $sql="SELECT pro.nombre,SUM(cart.cantidad) cantidad FROM tmp_cart cart 
        LEFT JOIN productos pro ON pro.id=cart.producto_id
        WHERE cart.user_id=".Auth()->user()->id."
        GROUP BY pro.nombre
        ";
        $carrito=DB::select($sql);    

        $sql="SELECT * FROM planes usu";
        $datos=DB::select($sql);        
        return view('home',compact("datos"));
    }

    public function obtenersaldo(){
        $sql="SELECT SUM(IF(tipo='ING',valor,valor*-1)) saldo FROM transaccion_monedero WHERE user_id=".Auth()->user()->id;
        $saldo=DB::select($sql);
        
        return $saldo[0]->saldo;
    }
}
