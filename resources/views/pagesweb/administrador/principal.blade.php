@extends('layouts.layout')

@section('content')
<h1 class="text-left">Principal</h1>
  <div class="col-xs-12 col-sm-12">
    <div class="col-sm-2">
      <label class="col-6">Nombre: </label>
      <label id="lblNombre" class="label"></label>
    </div>
  </div>
  <div class="col-xs-12 col-sm-12">
    <div class="col-sm-2">
      <label class="col-6">Matricula: </label>
      <label id="lblNombre" class="label"></label>
    </div>
  </div>
  <div class="col-sm-12">@include('pagesweb.mapas.casa')aqui va el mapa</div>

  <div class="col-sm-12">
    <div class="row text-center">
      <label class="col-sm-2">Colores:</label>
      @foreach($status as $sta)
      @if($sta->est_id == 1) <label class="col-sm-2 text-success">verde: {{$sta->est_descripcion}}</label>@endif
      @if($sta->est_id == 2) <label class="col-sm-2 text-danger">Rojo: {{$sta->est_descripcion}}</label>@endif
      @if($sta->est_id == 3) <label class="col-sm-2 text-warning">Amarillo: {{$sta->est_descripcion}}</label>@endif
      @endforeach
    </div>
  </div>
@endsection
