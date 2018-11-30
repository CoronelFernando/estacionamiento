@extends('layouts.layout')

@section('content')
<h1 class="text-left">Principal</h1>
  <div class="col-xs-12 col-sm-12" style="background-color: #decdc3">
    @foreach($usuarios as $usu)
    @if($usu->usu_matricula == '0316111485')
    <div class="col-sm-3" >
      <label class="col-6">Nombre: {{$usu->usu_nombre}} </label>
      <label id="lblNombre" class="label"></label>
      @endif
      @endforeach
    </div>
  </div>
  <div class="col-xs-12 col-sm-12" style="background-color: #decdc3">
    <div class="col-sm-3">
      @foreach($usuarios as $usu)
      @if($usu->usu_matricula == '0316111485')
      <label class="col-6">Matricula: {{$usu->usu_matricula}} </label>
      <label id="lblNombre" class="label"></label>
      @endif
      @endforeach
    </div>
  </div>
  <div class="col-sm-12">@include('pagesweb.mapas.casa')aqui va el mapa</div>

  <div class="col-sm-12" style="background-Color:#c8d9eb">
    <div class="row text-center">
      <label class="col-sm-2">Colores:</label>
      @foreach($status as $sta)
      @if($sta->est_id == 1) <label class="col-sm-2 text-success" text-Color: green>verde: {{$sta->est_descripcion}}</label>@endif
      @if($sta->est_id == 2) <label class="col-sm-2 text-danger" text-Color: red>Rojo: {{$sta->est_descripcion}}</label>@endif
      @if($sta->est_id == 3) <label class="col-sm-2 text-warning" text-Color: yellow>Amarillo: {{$sta->est_descripcion}}</label>@endif
      @endforeach
    </div>
  </div>
@endsection
