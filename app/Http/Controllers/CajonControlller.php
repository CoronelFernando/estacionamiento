<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Cajon;

class CajonControlller extends Controller
{
  public function index(){
    return view('principal/ejemplo/principal');
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
    $cajon = Cajon::select('caj_id', 'caj_descripcion', 'caj_seccion_id', 'caj_status_id')
    -> WHERE('cajones.caj_id', $id);
    return Datatables::of($cajon)-make(true);
  }

  public function allCajones(Request $request){
    if($request['seccion'] != ""){
      $cajones = Cajon::select('caj_id', 'caj_descripcion', 'sec_id', 'sec_descripcion', 'est_id', 'est_descripcion')
      -> JOIN('secciones','cajones.caj_seccion_id','=','secciones.sec_id')
      -> JOIN('estatus','cajones.caj_status_id','=','estatus.est_id')
      -> where('caj_seccion_id', $request['seccion'])->get()->toJson();
      //-> where('caj_status_id', $request['status'])->get()->toJson();
    }else if($request['cajon'] != ""){
      $cajones = Cajon::select('caj_id', 'caj_descripcion', 'sec_id', 'sec_descripcion', 'est_id', 'est_descripcion')
      -> JOIN('secciones','cajones.caj_seccion_id','=','secciones.sec_id')
      -> JOIN('estatus','cajones.caj_status_id','=','estatus.est_id')
      -> where('caj_id', $request['cajon'])->get()->toJson();
    } else{
      $cajones = Cajon::select('caj_id', 'caj_descripcion', 'sec_id', 'sec_descripcion', 'est_id', 'est_descripcion')
      -> JOIN('secciones','cajones.caj_seccion_id','=','secciones.sec_id')
      -> JOIN('estatus','cajones.caj_status_id','=','estatus.est_id')->get()->toJson();
      //-> WHERE('caj_status_id', $request['status'])->get()->toJson();
    }

    return $cajones;
  }
  public function tablaCajones(){
    $secciones = DB::table('secciones')->get();

    return view('pagesweb/administrador/graficas/tablaCajones', ['secciones' => $secciones]);
  }
}
