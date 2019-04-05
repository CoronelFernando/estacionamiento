@extends('layouts.layout')
@section('content')
<form>
  <div id="wrapper">
    <div id="content-wrapper">
      <div class="container-fluid">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Statistics</li>
        </ol>
        <hr>
        <table id="dtHistorialCajon" class="table table-bordered">
          <thead>
            <tr>
              <th>Cajon</th>
              <th>Seccion</th>
              <th>Disponibilidad</th>
              <th>Fecha</th>
              <th>Hora</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>				
  </div>
</form>
@endsection
