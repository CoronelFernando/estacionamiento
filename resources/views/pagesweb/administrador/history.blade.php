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
                                <table class="table table-bordered" id="dtHistorialCajon" width="100%" cellspacing="0">
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
                            <div class="card-footer small text-muted">Update yesterday at 11:59 PM</div>
                        </div>
                    </div>
                </div>              
            </div>
        </form>
@endsection

<script type="text/javascript" src="{{url('/js/global/historial.js')}}"></script>