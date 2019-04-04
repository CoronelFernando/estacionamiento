<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests;
use DB;
use app\Status;
use Carbon\Carbon;
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

    public function cajon(Request $request){
    	$cajones = DB::table('cajones')
    	->where('caj_id',$request['id'])
    	//->orderby('caj_seccion_id', 'ASC')
    	//->orderby('caj_id', 'ASC')
    	->get()->toJson();
    	return $cajones;
    }

    public function pieChart(){
    	$ocupadosHora = DB::table('cajones')->select(
	    DB::raw('(SELECT COUNT(caj_id) FROM cajones WHERE caj_status_id = 1) AS disponibles'),
	    DB::raw('(SELECT COUNT(caj_id) FROM cajones WHERE caj_status_id = 2) AS ocupados'),
	    DB::raw('(SELECT COUNT(caj_id) FROM cajones WHERE caj_status_id = 3) AS reservados'))
	    ->get()->toJson();
	    return $ocupadosHora;
    }

    public function reservado(Request $request){
    	$hoy = Carbon::today();
    	$reservado = DB::table('reservados')
    	->where('res_cajon_id', $request['id'])
	     ->orderBy('res_cajon_id', 'desc')
	     ->limit(1)->get()->toJson();
    	return $reservado;
    }
}
