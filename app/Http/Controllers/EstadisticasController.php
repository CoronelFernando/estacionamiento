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

    //------------------------------------------------------------------------------------------------------------------------------------------
    //funcion para acajones llejos
    $cajonesLLenos = DB::select('select count(cajones.caj_id) as cajones from cajones where cajones.caj_status_id = 1');
    $estadisticas = DB::select('SELECT estCaj_hora as hora FROM estadisticascajones AS ec
    JOIN cajones AS c ON ec.estCaj_cajon_id = c.caj_id WHERE ec.estCaj_disponible = 1 GROUP BY estCaj_hora ORDER BY  ec.estCaj_id DESC');

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

    //funcion para cajones vacios
    $cajonesVacios = DB::select('select count(cajones.caj_id) as cajones from cajones where cajones.caj_status_id = 0');
    $estadisticasVacios = DB::select('SELECT estCaj_hora as hora FROM estadisticascajones AS ec
    JOIN cajones AS c ON ec.estCaj_cajon_id = c.caj_id WHERE ec.estCaj_disponible = 2 GROUP BY estCaj_hora ORDER BY  ec.estCaj_id DESC');

    $vacios = new Lavacharts;
    $dtCajonesVacios = $vacios->Datatable();

    if(sizeof($estadisticasVacios) == 0 || sizeof($cajonesVacios) == 0){
      //dd($estadisticasVacios);
      //$estadisticasVacios = 0;
      $cajonesVacios = 0;
      /*$dtCajonesVacios->addStringColumn('hora')
                      ->addNumberColumn('Cajones Vacios')
                      ->setDateTimeFormat('H:m')
                      ->addRow([$estadisticasVacios[0]->hora, $cajonesVacios[0]->cajones])
                      ->addRow([$estadisticasVacios[0]->hora, $cajonesVacios[0]->cajones])
                      ->addRow([$estadisticasVacios[0]->hora, $cajonesVacios[0]->cajones])
                      ->addRow([$estadisticasVacios[0]->hora, $cajonesVacios[0]->cajones]);*/
      $vacios->ColumnChart('vacios', $dtCajonesVacios, [
          'title' => 'Cajones Vacios por hora',
          'titleTextStyle' => [
              'color'    => '#eb6b2c',
              'fontSize' => 14
          ]
      ]);

    }else{
      $dtCajonesVacios->addStringColumn('hora')
                      ->addNumberColumn('Cajones Vacios')
                      ->setDateTimeFormat('H:m')
                      ->addRow([$estadisticasVacios[0]->hora, $cajonesVacios[0]->cajones])
                      ->addRow([$estadisticasVacios[0]->hora, $cajonesVacios[0]->cajones])
                      ->addRow([$estadisticasVacios[0]->hora, $cajonesVacios[0]->cajones])
                      ->addRow([$estadisticasVacios[0]->hora, $cajonesVacios[0]->cajones]);
      $vacios->ColumnChart('vacios', $dtCajonesVacios, [
          'title' => 'Cajones Vacios por hora',
          'titleTextStyle' => [
              'color'    => '#eb6b2c',
              'fontSize' => 14
          ]
      ]);
    }

    return view('pagesweb/administrador/estadisticas', ['secciones' => $secciones, 'grafica' => $lava/*, 'vacios' => $vacios*/]);
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
