@extends('layouts.layout')
@section('content')
<div class="row">
  <div class="col-sm-12">
    <h1><label>Historial de cajones <i class="fa fa-file"></i> </label></h1>
    
    <div id="selects" class="col-sm-12">
      <div class="col-sm-3">
        <div class="form-group">
          <label class="text-left">Sección: </label>
          <select class="form-control" id="selSearchSeccion" name="selSearchSeccion" onchange="validarSelects(this), desplegarHistorial(1)">
            <option selected disabled>Seleccione Sección</option>
            @foreach($secciones as $seccion)
              <option value={{$seccion->sec_id}}>{{$seccion->sec_descripcion}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="text-left" class="form-group">
          <label>Cajón: </label>
          <select class="form-control" id="selSearchCajon" name="selSearchSeccion" onchange="validarSelects(this), desplegarHistorial(1)">
            <option selected disabled>Seleccione cajón</option>
            @foreach($cajones as $cajon)
              <option value="{{$cajon->caj_id}}">{{$cajon->caj_descripcion}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group">
          <label class="text-left">Status: </label>
          <select class="form-control" id="selSearchStatus" name="selSearchSeccion" onchange="validarSelects(this), desplegarHistorial(1)">
            <option selected disabled>Seleccione Status</option>
            @foreach($estatus as $est)
              <option value="{{$est->est_id}}">{{$est->est_descripcion}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>

    <div class="col-sm-12" style="height: 300px;">
        <table id="dtHistorial" class="table table-striped table-hover table-bordered table-sm nowrap">
          <thead>
              <tr>
                <td>#</td>
                <td>Cajón</td>
                <td>Sección</td>
                <td>estatus</td>
                <td>Hora</td>
                <td>Fecha</td>
              </tr>
          </thead>
          <tbody></tbody>
        </table>
        <div class="text-center col-sm-12">
          <ul class="pagination" style="margin: 0px 0px;">
            <li class="activate" onclick='desplegarHistorial(1)'><a href='#'>1</a></li>
            <li><a href='#' onclick='desplegarHistorial(2)'>2</a></li>
            <li><a href='#' onclick='desplegarHistorial(3)'>3</a></li>
          </ul>
        </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="js/global.js"></script>
<script src="js/global/historial.js" charset="utf-8"></script>


@endsection
