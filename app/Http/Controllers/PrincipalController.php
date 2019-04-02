<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use app\Status;

class PrincipalController extends Controller
{
    public function index(){
      $status = DB::table('estatus')->get();
      $usuarios = DB::table('usuarios')->get();
      $tiemposReservados = DB::table('tiemposReservados')->get();
      //dd($tiemposReservados);
      return view('pagesweb/administrador/principal', ['status' => $status, 'usuarios' => $usuarios, 'tiemposReservados' => $tiemposReservados]);
    }

    public function cajones(){
    	$cajones = DB::table('cajones')
    	//where('caj_seccion_id','')
    	->orderby('caj_seccion_id', 'ASC')
    	->orderby('caj_id', 'ASC')
    	->get()->toJson();
    	return $cajones;
    }
}
