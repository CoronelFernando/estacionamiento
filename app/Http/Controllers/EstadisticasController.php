<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Lava;
use app\Seccion;
use app\EstadisticasCajones;
use Khill\Lavacharts\Lavacharts;
use Yajra\Datatables\facades\Datatables;

class EstadisticasController extends Controller
{
  public function index(){
    $secciones = DB::table('secciones')->get();
    $usuarios = DB::table('usuarios')->get();
    

  return view('pagesweb/administrador/statistic', ['secciones' => $secciones, 'usuarios' => $usuarios ]);
  }

  //funcion que trae la grafica con los cajones llenos
  public function autosPorHora(){
    $cajonesLLenos = DB::select('select count(cajones.caj_id) as cajones from cajones where cajones.caj_status_id = 2');
    $estadisticas = DB::select('SELECT estCaj_hora as hora FROM estadisticascajones AS ec
    JOIN cajones AS c ON ec.estCaj_cajon_id = c.caj_id WHERE ec.estCaj_disponible = 2 GROUP BY estCaj_hora ORDER BY  ec.estCaj_id DESC');
    //dd($cajonesLLenos);

    return view('pagesweb/administrador/graficas/graficaPorAutos', ["grafica" => $lava]);
  }

  //funcion que trae la grafica con los cajones vacios
  public function vaciosPorHora(){
    $cajones = DB::select('select count(cajones.caj_id) as cajones from cajones where cajones.caj_status_id = 1');
    $estadisticas = DB::select('SELECT estCaj_hora as hora FROM estadisticascajones AS ec
    JOIN cajones AS c ON ec.estCaj_cajon_id = c.caj_id WHERE ec.estCaj_disponible = 1 GROUP BY estCaj_hora ORDER BY  ec.estCaj_id DESC');
    //dd($cajonesLLenos);

    return view('pagesweb/administrador/graficas/graficaPorVacios', ["vacios" => $lava]);
  }

  public function areaChart(){
    $cajones = DB::select('select count(cajones.caj_id) as cajones from cajones where cajones.caj_status_id = 2');
    $ocupados = DB::select('SELECT estCaj_hora as hora FROM estadisticascajones AS ec
    JOIN cajones AS c ON ec.estCaj_cajon_id = c.caj_id WHERE ec.estCaj_disponible = 1 GROUP BY estCaj_hora ORDER BY  ec.estCaj_id DESC');
    //AQUI EMPIEZA LA GRAFICA DE PIE
    $areaChart = new Lavacharts;
    $areaChartData = $areaChart->DataTable();

    $areaChartData->addStringColumn('Hora')
             ->addNumberColumn('')
             ->setDateTimeFormat('H:m')
             ->addRow([$ocupados[0]->hora, $cajones[0]->cajones])
             ->addRow([$ocupados[1]->hora, $cajones[0]->cajones])
             ->addRow([$ocupados[2]->hora, $cajones[0]->cajones])
             ->addRow([$ocupados[3]->hora, $cajones[0]->cajones])
             ->addRow([$ocupados[4]->hora, $cajones[0]->cajones])
             ->addRow([$ocupados[5]->hora, $cajones[0]->cajones])
             ->addRow([$ocupados[6]->hora, $cajones[0]->cajones]);
    $areaChart->AreaChart('CajonesOcupados', $areaChartData, [
      'title' => 'Cajones ocupados por minuto',
      'titleTextStyle' => [
          'color'    => '#eb6b2c',
          'fontSize' => 14
      ]/*,
      'legend' => [
        'position' => 'in'
    ]*/
    ]);
    return view('pagesweb/administrador/graficas/areaChart', ["areaChart" => $areaChart]);
  }

  //FUNCION QUE LLENA LA CAJA DE INFORMACION GENERAL
  public function desplegarNumeroOcupados(){
    /*$ocupadosHora = DB::select('select estCaj_cajon_id, estCaj_hora from estadisticascajones where estCaj_disponible = 2
                              GROUP BY estCaj_id DESC, estCaj_cajon_id limit 1')->get()->toJson();*/
    $ocupadosHora = DB::table('estadisticascajones')->select('estCaj_cajon_id', 'estCaj_hora')
    ->where('estCaj_disponible', 2)
    ->orderby('estCaj_hora', 'desc')
    ->groupBy('estCaj_cajon_id', 'estCaj_hora')
    ->take(1)->get()->toJson();
    //dd($ocupadosHora);
    return $ocupadosHora;
  }

  public function estadisticasParaGrafica(){
    /*$ocupadosHora = DB::select('SELECT 
    (SELECT COUNT(caj_id) FROM cajones WHERE caj_status_id = 1) AS disponibles, 
    (SELECT COUNT(caj_id) FROM cajones WHERE caj_status_id = 2) AS ocupados,
    estCaj_fechaFin AS fecha, estCaj_horaFin AS hora',
    'FROM estadisticascajones ORDER BY estCaj_fechaFin DESC, estCaj_horaFin DESC')->get()->toJson();*/
    /*$fechaYHora = DB::table('estadisticascajones')->select('estCaj_fechaFin AS fecha', 'estCaj_horaFin AS hora')->get()->toJson();
    $ocupados = DB::table('cajones')->select('caj_id')
     ->count()
     ->union($fechaYHora)->get()->toJson();*/
     $ocupadosEstado = DB::table('estadisticascajones')->select(
      DB::raw('(SELECT COUNT(caj_id) FROM cajones WHERE caj_status_id = 1) AS disponibles'),
      DB::raw('(SELECT COUNT(caj_id) FROM cajones WHERE caj_status_id = 2) AS ocupados'),
      DB::raw('(SELECT COUNT(caj_id) FROM cajones WHERE caj_status_id = 3) AS reservados'))
      //DB::raw('estCaj_horaFin AS hora'))
     ->limit(10)
     ->orderby('estCaj_fechaFin', 'DESC')
     ->orderby('estCaj_horaFin', 'DESC')
     ->get()->toJson();
     //return Datatables::of($ocupadosHora)->make(true);
    return $ocupadosEstado;
  }

  public function estParaGraHor(){
    $ocupadosHora = DB::table('estadisticascajones')->select('estCaj_fechaFin AS fecha', 'estCaj_horaFin AS hora')
    ->limit(10)
    ->orderby('estCaj_id', 'DESC')
    ->get()->toJson();
    return $ocupadosHora;
  }

}