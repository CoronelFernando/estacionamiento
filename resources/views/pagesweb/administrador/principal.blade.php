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
              <li class="breadcrumb-item active">Stadistics</li>
            </ol>
          <div class="card mb-3">
            <div class="card-header">
              Stadistics
            </div>
            <div class="card-body">
              <div id="contenedor" class="contenedor">
                                    
              </div>
            </div>
            <div class="card-footer small text-muted">Update yesterday at 11:59 PM</div>
          </div>
        </div>
      </div>        
    </div>
  </form>
  <!--modal Reservacion-->
  <div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Reservacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label>Usuario:</label>
            <input class="form-control">
          </div>
          <div class="form-group">
            <label>No. Cajon:</label>
            <input>
          </div>
          <div class="form-group">
            <label>Tiempo:</label>
            <input class="form-control">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>
@endsection
