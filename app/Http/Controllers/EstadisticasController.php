<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Lava;
use app\Seccion;
use app\estadisticasCajones;
use Khill\Lavacharts\Lavacharts;

class EstadisticasController extends Controller
{
  public function index(){
    $secciones = DB::table('secciones')->get();
    return view('pagesweb/administrador/estadisticas', ['secciones' => $secciones]);
  }

  public function autosPorHora(){
    $graficaBarras = new Lavacharts();
    $stocksTable = lava::DataTable();
    $data = DB::table('estadisticasCajones')->get()->toJson();

    $stocksTable->addNumberColumn('Id')
                ->addNumberColumn('Cajon');

    $graficaBarras->BarChart('AutosPorHora', $stocksTable);

    return view('pagesweb/administrador/graficaPorAutos', ["grafica" => $graficaBarras]);
  }

}
