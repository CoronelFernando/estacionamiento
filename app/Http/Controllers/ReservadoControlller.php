<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\facades\Datatables;
use DB;
use App\Reservado;
use App\Cajon;
use Carbon\Carbon;

class ReservadoControlller extends Controller
{
  public function index(){
     return view('pagesweb/administrador/reservado');
  }

  public function create(){

  }

  public function show(){

  }

  public function edit(){

  }

  public function store(){

  }

  public function update(){

  }
  public function destroy(){

  }

  public function reservado($id){
    $reservado = Reservado::select('res_id', 'res_usuario', 'res_cajon', 'res_hora', 'res_fechaApartado')
    -> WHERE('reservados.res_id', $id);
    return Datatables::of($reservado)-make(true);
  }

  public function allReservado(){
    $reservados = Reservado::select('res_id', 'res_usuario', 'res_cajon', 'res_hora', 'res_fechaApartado');
    return Datatables::of($reservados)-make(true);
  }

  public function guardarReservado(Request $request){
    $reservado = new Reservado;
    $reservado->res_usuario_id = $request['usuario'];
    $reservado->res_cajon_id = $request['cajon'];
    $reservado->res_tiempoReservado = $request['tiempo'];
    //aqui obtengo la fecha y la hora
    $hoy = Carbon::today()->toDateString();
    $tiempo = Carbon::now()->toTimeString();

    $reservado->res_dia = $hoy;
    //dd($request['hora']);
    $reservado->res_hora = $request['hora'];
    $reservado->res_status_id = 3;
    if($reservado->save()){
      $id = $request['cajon'];
      $cajon = Cajon::find($id);
      //dd($cajon->caj_status_id);
      $cajon->caj_status_id = 3;

      if( $cajon->save() ){ return "true"; } else { return "true"; }
    } 
    else{ Return "false"; }
  }

 public function list(){
    $verReservados = DB::table('verReservaciones');
   return Datatables::of($verReservados)->make(true); 
  }
}
