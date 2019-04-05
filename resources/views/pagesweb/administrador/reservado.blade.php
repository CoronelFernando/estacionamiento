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
                    <li class="breadcrumb-item active">Reservation</li>
                </ol>
                <hr>
                <div class="card mb-3">
                    <div class="card-header">
                        Reservation
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="tbReservados">
                            <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Cajon</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Tiempo</th>   
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
