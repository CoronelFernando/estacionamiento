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
@endsection
