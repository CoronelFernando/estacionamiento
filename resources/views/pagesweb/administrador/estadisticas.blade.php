@extends('layouts.layout')
@section('content')
  <div class="row">
    <div class="col-sm-12">
      <h1><label>Estadisticas de cajones <i class="fa fa-signal"></i></label></h1>
    </div>
  </div>
    <div id="tabla" class="table-responsive">
      <div class="col-sm-8">
        <table id="dtestadisticasCajon" class="table table-striped table-hover table-bordered table-sm nowrap">
          <caption>
            <div class="col-sm-12">
              <div class="col-sm-4">
                <label class="text-left">Estado de cajones: </label>
                <select class="form-control" name="selSecciones" id="selSecciones"  onchange="desplegarCajones(this)">
                  <option disabled selected>Seleccione sección</option>
                  <option value="">Todos</option>
                  @foreach($secciones as $seccion)
                    <option value="{{ $seccion->sec_id }}">{{$seccion->sec_descripcion}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-sm-4">
                <label class="text-left">Seleccione grafica:</label>
                <select class="form-control" name="selGrafica" id="selGrafica" onchange="desplegarGraficas(this)">
                  <option disabled selected>Seleccione Grafica</option>
                  <!--<option value="1">Todos</option>-->
                  <option value="2">Lugares Ocupados/Minuto(Barras)</option>
                  <option value="3">Lugares Ocupados/Minuto(Area)</option>
                </select>
              </div>
              <div class="col-sm-4">
                <label class="text-left" for="txtsearchCajon">Buscador</label>
                <div class="input-group" style="margin-top:-1px;">
                    <input type="text" name="txtsearchCajon" id="txtsearchCajon" placeholder="Seleccione Cajón" class="form-control">
                  <div class="input-group-btn">
                    <button type="button" name="btnsearchCajon" id="btnsearchCajon" class="btn btn-default" onclick="desplegarCajones(undefined)"><i class="fa fa-search"></i></button>
                  </div>
                </div>

              </div>

            </div>

          </caption>
          <thead>
            <tr class="text">
              <th>#</th>
              <th>Cajón</th>
              <th>Sección</th>
              <!--<th>fecha</th>
              <th>hora</th>-->
              <th>Disponibilidad</th>
              <!--<th>Apartar</th>-->
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
      <div class="col-sm-4 contenedorInformacion">
        <div class="">
          <h2 class="text-center"><label>Cajones ocupados: </label></h2>
          <div class="col-sm-6">
            <h2 class="text-center"><label id="">Ocupados</label></h2>
            <h2 class="text-center"><label id="lblOcupadosNumero"></label></h2>
          </div>
          <div class="col-sm-6">
            <h2 class="text-center"><label id="">Hora</label></h2>
            <h2 class="text-center"><label id="lblOcupadosHora"></label></h2>
          </div>

        </div>
      </div>
    </div>

    <div id="graficas">
        @include('pagesweb.administrador.graficas.graficaPorAutos')
        @include('pagesweb.administrador.graficas.GraficaPorVacios')
        @include('pagesweb.administrador.graficas.areaChart')
    </div>

<script type="text/javascript" src="js/global.js"></script>
<script type="text/javascript" src="js/global/estadisticas.js"></script>
<script type="text/javascript">
  loadDocument();
</script>
@endsection
