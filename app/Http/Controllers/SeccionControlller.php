<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Seccion;

class SeccionControlller extends Controller
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

  public function seccion($id){
    $seccion = Seccion::select('sec_id', 'sec_descripcion');
    -> WHERE('cajones.sec_id', $id);
    return Datatables::of($seccion)-make(true);
  }

  public function allsecciones(){
    $secciones = Seccion::select('sec_id', 'sec_descripcion');
    return Datatables::of($secciones)-make(true);
  }
}
