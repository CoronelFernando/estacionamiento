<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cajon;

class CajonControlller extends Controller
{
  public function index(){
    return view('principal/ejemplo');
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

  public function cajon($id){
    $cajon = Cajon::select('caj_id', 'caj_descripcion', 'caj_status', 'caj_seccion')
    -> WHERE('cajones.caj_id', $id);
    return Datatables::of($cajon)-make(true);
  }

  public function allCajones(){
    $cajones = Cajon::select('caj_id', 'caj_descripcion', 'caj_status', 'caj_seccion');
    return Datatables::of($cajones)-make(true);
  }
}
