<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use app\EstadisticasCajones;
use app\Cajon;
use app\Seccion;
use app\Status;

//use Yajra\Datatables\facades\Datatables;
//use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Input;

class HistorialController extends Controller
{
  public function index(){
    $usuarios = DB::table('usuarios')->get();
    $cajones = DB::table('cajones')->get();
    $secciones = DB::table('secciones')->get();
    $estatus = DB::table('estatus')->get();
    return view('pagesweb/administrador/history', ['usuarios' => $usuarios, 'cajones' => $cajones,
      'secciones' => $secciones, 'estatus' => $estatus]);
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

  public function showHistorial(Request $request){

    $historialCount = DB::table('estadisticascajones')
    ->join('cajones', 'caj_id', '=', 'estCaj_cajon_id')
    ->join('secciones', 'sec_id', '=', 'caj_seccion_id')
    ->join('estatus', 'est_id', '=', 'estCaj_disponible')
    ->where('estCaj_cajon_id', $request['cajon'])
    ->orwhere('sec_id', $request['seccion'])
    ->orwhere('est_id', $request['status'])
    ->count();

    $rowsPerPage = 5;
    $pageNumber = 1;

    if(isset($request['page'])){$pageNumber = $request['page'];}
    $offset = ($pageNumber - 1) * $rowsPerPage;
    $total_paginas = ceil($historialCount/$rowsPerPage);

    $historial = DB::table('estadisticascajones')
    ->join('cajones', 'caj_id', '=', 'estCaj_cajon_id')
    ->join('secciones', 'sec_id', '=', 'caj_seccion_id')
    ->join('estatus', 'est_id', '=', 'estCaj_disponible')
    ->where('estCaj_cajon_id', $request['cajon'])
    ->orwhere('sec_id', $request['seccion'])
    ->orwhere('est_id', $request['status'])
    ->orderby('estCaj_hora', 'DESC')
    ->offset($offset)
    ->limit($rowsPerPage)

    //->orwhere('sec_id', 'like', '%'.$request['seccion'].'%')
    //->orwhere('est_id', 'like', '%'.$request['status'].'%')
    ->get()->toJson();



    return $historial;
  }

  public function list(){
    $historialCajon = EstadisticasCajones::select('estCaj_id', 'estCaj_cajon_id', 'estCaj_fechaIni', 'estCaj_horaIni', 'estCaj_fechaFin', 'estCaj_horaFin', 'estCaj_disponible')
      ->join('cajones', 'caj_id', '=', 'estCaj_cajon_id');

    return Datatables::of($historialCajon)->make(true);
  }

}
