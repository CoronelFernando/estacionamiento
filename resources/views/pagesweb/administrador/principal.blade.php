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
              <li class="breadcrumb-item active">Map</li>
            </ol>
          <div class="card mb-3">
            <div class="card-header">
              Map
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <div class="card">
                    <div class="card-header">
                      Parking Space
                    </div>
                    <div class="card-body">
                      <div id="contenedor" class="contenedor"></div>
                    </div>
                  </div>
                </div>
               
                <div class=" col-sm-3">
                  <div class="card mb-3">
                    <div class="card-header">
                      Recent Activities
                    </div>
                    <div id="donutchart"></div>
                  </div>                                
                </div>
              </div>
            </div>
            <div class="card-footer small text-muted">Update yesterday at 11:59 PM</div>
          </div>
        </div>
      </div>        
    </div>
  </form>
  <!--modal Reservacion-->
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Reservacion</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>          
        </div>
        <div class="modal-body">
          <form>
          	<div class="form-group">
            	<label>Usuario:</label>
            	<input class="form-control" id="txtUsuario" name="txtUsuario" readonly>                
          	</div>
            <div class="form-group">
              <label>No. Cajon:</label>
              <input class="form-control" id="txtCajon" name="txtCajon" readonly>
           </div>
            <div class="form-group">
              <label>Tiempo:</label>
              <!--<input class="form-control" id="txtTiempo" name="txtTiempo">-->
                  <select id="txtTiempo" class="form-control" name="txtTiempo">
                    <!--<option selected="true" disabled="disabled">Seleccione Tiempo</option>
                    <option value="1">1 hora</option>
                    <option value="2">3 horas</option>
                    <option value="3">5 horas</option>-->
                  </select>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="btnConfirmar">Confirmar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnCerrar" onclick="LimpiarModal()">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endsection

