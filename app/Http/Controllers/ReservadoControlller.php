<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Reservado;

class ReservadoControlller extends Controller
{
  public function index(){

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
    $reservado = Reservado::select('res_id', 'res_usuario', 'res_cajon', 'res_hora', 'res_fechaApartado');
    -> WHERE('reservados.res_id', $id);
    return Datatables::of($reservado)-make(true);
  }

  public function allReservado(){
    $reservados = Reservado::select('res_id', 'res_usuario', 'res_cajon', 'res_hora', 'res_fechaApartado');
    return Datatables::of($reservados)-make(true);
  }
}
