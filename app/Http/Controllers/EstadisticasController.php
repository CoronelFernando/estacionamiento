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
    $usuarios = DB::table('usuarios')->get();
    //------------------------------------------------------------------------------------------------------------------------------------------
    //funcion para cajones llejos
    $cajonesLLenos = DB::select('select count(cajones.caj_id) as cajones from cajones where cajones.caj_status_id = 2');
    $estadisticas = DB::select('SELECT estCaj_hora as hora FROM estadisticascajones AS ec
    JOIN cajones AS c ON ec.estCaj_cajon_id = c.caj_id WHERE ec.estCaj_disponible = 2 GROUP BY estCaj_hora ORDER BY  ec.estCaj_id DESC');

    $lava = new Lavacharts;
    $dtCajonesLlenos = $lava->DataTable();
    //dd($estadisticas[0]->hora);
    $dtCajonesLlenos->addStringColumn('Hora')
             ->addNumberColumn('')
             ->setDateTimeFormat('H:m')
             ->addRow([$estadisticas[0]->hora, $cajonesLLenos[0]->cajones])
             ->addRow([$estadisticas[0]->hora, $cajonesLLenos[0]->cajones])
             ->addRow([$estadisticas[0]->hora, $cajonesLLenos[0]->cajones])
             ->addRow([$estadisticas[0]->hora, $cajonesLLenos[0]->cajones]);

    $lava->ColumnChart('CajonesLlenos', $dtCajonesLlenos, [
        'title' => 'Cajones ocupados por minuto',
        'titleTextStyle' => [
            'color'    => '#eb6b2c',
            'fontSize' => 14
        ],
        'vAxis' => [
          'scaleType' => 'linear',
          'ticks' => '[1, 2, 3]',
          'color' => ['#BDBDBD'],
        ]

    ]);
    //------------------------------------------------------------------------------------------------------------------------------------------

    //funcion para cajones vacios
    $cajonesVacios = DB::select('select count(cajones.caj_id) as cajones from cajones where cajones.caj_status_id = 1');
    $estadisticasVacios = DB::select('SELECT estCaj_hora as hora FROM estadisticascajones AS ec
    JOIN cajones AS c ON ec.estCaj_cajon_id = c.caj_id WHERE ec.estCaj_disponible = 1 GROUP BY estCaj_hora ORDER BY  ec.estCaj_id DESC');

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
      $vacios->ColumnChart('CajonesVacios', $dtCajonesVacios, [
          'title' => 'Cajones disponibles por minuto',
          'titleTextStyle' => [
              'color'    => '#eb6b2c',
              'fontSize' => 14
          ],
          'vAxis' => [
            'scaleType' => 'linear',
            'ticks' => '[1, 2, 3]',
            'color' => ['#BDBDBD'],
          ]
      ]);

    }else{
      $dtCajonesVacios->addStringColumn('hora')
                      ->addNumberColumn('')
                      ->setDateTimeFormat('H:m')
                      ->addRow([$estadisticasVacios[0]->hora, $cajonesVacios[0]->cajones])
                      ->addRow([$estadisticasVacios[0]->hora, $cajonesVacios[0]->cajones])
                      ->addRow([$estadisticasVacios[0]->hora, $cajonesVacios[0]->cajones])
                      ->addRow([$estadisticasVacios[0]->hora, $cajonesVacios[0]->cajones]);

      $vacios->ColumnChart('CajonesVacios', $dtCajonesVacios, [
          'title' => 'Cajones disponibles por minuto',
          'titleTextStyle' => [
              'color'    => '#eb6b2c',
              'fontSize' => 14
          ],
          'vAxis' => [
            'scaleType' => 'linear',
            'ticks' => '[1, 2, 3]',
            'color' => ['#BDBDBD'],
          ]
      ]);
    }

  return view('pagesweb/administrador/estadisticas', ['secciones' => $secciones, 'grafica' => $lava, 'usuarios' => $usuarios, 'vacios' => $vacios]);
  }

  //funcion que trae la grafica con los cajones llenos
  public function autosPorHora(){
    $cajonesLLenos = DB::select('select count(cajones.caj_id) as cajones from cajones where cajones.caj_status_id = 2');
    $estadisticas = DB::select('SELECT estCaj_hora as hora FROM estadisticascajones AS ec
    JOIN cajones AS c ON ec.estCaj_cajon_id = c.caj_id WHERE ec.estCaj_disponible = 2 GROUP BY estCaj_hora ORDER BY  ec.estCaj_id DESC');
    //dd($cajonesLLenos);
    $lava = new Lavacharts;
    $dtCajonesLlenos = $lava->DataTable();
    //dd($estadisticas[0]->hora);
    $dtCajonesLlenos->addStringColumn('Hora')
             ->addNumberColumn('')
             ->setDateTimeFormat('H:m')
             ->addRow([$estadisticas[0]->hora, $cajonesLLenos[0]->cajones])
             ->addRow([$estadisticas[0]->hora, $cajonesLLenos[0]->cajones])
             ->addRow([$estadisticas[0]->hora, $cajonesLLenos[0]->cajones])
             ->addRow([$estadisticas[0]->hora, $cajonesLLenos[0]->cajones]);

    $lava->ColumnChart('CajonesLlenos', $dtCajonesLlenos, [
        'title' => 'Cajones ocupados por minuto',
        'titleTextStyle' => [
            'color'    => '#eb6b2c',
            'fontSize' => 14
        ],
        'vAxis' => [
          'scaleType' => 'linear',
          'ticks' => '[1, 2, 3]',
          'color' => 'gray',
        ]

    ]);

    return view('pagesweb/administrador/graficas/graficaPorAutos', ["grafica" => $lava]);
  }

  //funcion que trae la grafica con los cajones vacios
  public function vaciosPorHora(){
    $cajones = DB::select('select count(cajones.caj_id) as cajones from cajones where cajones.caj_status_id = 1');
    $estadisticas = DB::select('SELECT estCaj_hora as hora FROM estadisticascajones AS ec
    JOIN cajones AS c ON ec.estCaj_cajon_id = c.caj_id WHERE ec.estCaj_disponible = 1 GROUP BY estCaj_hora ORDER BY  ec.estCaj_id DESC');
    //dd($cajonesLLenos);
    $lava = new Lavacharts;
    $dtCajones = $lava->DataTable();
    //dd($estadisticas[0]->hora);
    $dtCajones->addStringColumn('Hora')
             ->addNumberColumn('')
             ->setDateTimeFormat('H:m')
             ->addRow([$estadisticas[0]->hora, $cajones[0]->cajones])
             ->addRow([$estadisticas[0]->hora, $cajones[0]->cajones])
             ->addRow([$estadisticas[0]->hora, $cajones[0]->cajones])
             ->addRow([$estadisticas[0]->hora, $cajones[0]->cajones]);

    $lava->ColumnChart('CajonesVacios', $dtCajones, [
        'title' => 'Cajones disponibles por minuto',
        'titleTextStyle' => [
            'color'    => '#eb6b2c',
            'fontSize' => 14
        ],
        'vAxis' => [
          'scaleType' => 'linear',
          'ticks' => '[1, 2, 3]',
          'color' => 'gray',
        ]

    ]);

    return view('pagesweb/administrador/graficas/graficaPorVacios', ["vacios" => $lava]);
  }

}
