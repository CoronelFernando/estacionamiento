<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Lava;
use app\Seccion;
use app\EstadisticasCajones;
use Khill\Lavacharts\Lavacharts;

class EstadisticasController extends Controller
{
  public function index(){
    $secciones = DB::table('secciones')->get();

    $lava = new Lavacharts;
    $llenos = $lava->DataTable();

    $llenos->addDateColumn('Carros')
             ->addNumberColumn('Autos')
             ->setDateTimeFormat('Y')
             ->addRow(['2004', 1000])
             ->addRow(['2005', 1170])
             ->addRow(['2006', 660])
             ->addRow(['2007', 1030]);

    $lava->ColumnChart('Cajones', $llenos, [
        'title' => 'Estacionamientos ocupados por hora',
        'titleTextStyle' => [
            'color'    => '#eb6b2c',
            'fontSize' => 14
        ]
    ]);

    return view('pagesweb/administrador/estadisticas', ['secciones' => $secciones, 'grafica' => $lava]);
  }

  public function autosPorHora(){
    //funcion para acajones llejos
    $cajonesLLenos = DB::select('select count(cajones.caj_id) as cajones from cajones where cajones.caj_status_id = 1');
    //funcion para cajones vacios
    $cajonesVacios = DB::select('select count(cajones.caj_id) as cajones from cajones where cajones.caj_status_id = 0');

    $estadisticas = DB::select('SELECT estCaj_hora as hora FROM estadisticascajones AS ec
    JOIN cajones AS c ON ec.estCaj_cajon_id = c.caj_id WHERE ec.estCaj_disponible = 1 GROUP BY estCaj_hora ORDER BY  ec.estCaj_id DESC');

    $estadisticasVacios = DB::select('SELECT estCaj_hora as hora FROM estadisticascajones AS ec
    JOIN cajones AS c ON ec.estCaj_cajon_id = c.caj_id WHERE ec.estCaj_disponible = 0 GROUP BY estCaj_hora ORDER BY  ec.estCaj_id DESC');

    $lava = new Lavacharts;
    $dtCajonesLlenos = $lava->DataTable();
    //dd($estadisticas[0]->hora);
    $dtCajonesLlenos->addStringColumn('Hora')
             ->addNumberColumn('Cajones Ocupados')
             ->setDateTimeFormat('H:m')
             ->addRow([$estadisticas[0]->hora, $cajonesLLenos[0]->cajones])
             ->addRow([$estadisticas[0]->hora, $cajonesLLenos[0]->cajones])
             ->addRow([$estadisticas[0]->hora, $cajonesLLenos[0]->cajones])
             ->addRow([$estadisticas[0]->hora, $cajonesLLenos[0]->cajones]);

    $lava->ColumnChart('Cajones', $dtCajonesLlenos, [
        'title' => 'Cajones ocupados por hora',
        'titleTextStyle' => [
            'color'    => '#eb6b2c',
            'fontSize' => 14
        ]
    ]);
//------------------------------------------------------------------------------------------------------------------------------------------
  $vacios = new Lavacharts;
  $dtCajonesVacios = $vacios->Datatable();
  if($estadisticasVacios != null){

  }
  $dtCajonesVacios->addStringColumn('hora')
                  ->addNumberColumn('Cajones Vacios')
                  ->setDateTimeFormat('H:m')
                  ->addRow([$estadisticasVacios[0]->hora, $cajonesVacios[0]->cajones])
                  ->addRow([$estadisticasVacios[0]->hora, $cajonesVacios[0]->cajones])
                  ->addRow([$estadisticasVacios[0]->hora, $cajonesVacios[0]->cajones])
                  ->addRow([$estadisticasVacios[0]->hora, $cajonesVacios[0]->cajones]);
  $vacios->ColumnChart('Cajones', $dtCajonesLlenos, [
      'title' => 'Cajones Vacios por hora',
      'titleTextStyle' => [
          'color'    => '#eb6b2c',
          'fontSize' => 14
      ]
  ]);

    return view('pagesweb/administrador/graficas/graficaPorAutos', ["grafica" => $lava]);
  }

}
