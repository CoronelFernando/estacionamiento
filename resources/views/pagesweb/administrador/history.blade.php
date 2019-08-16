@extends('layouts.layout')
@section('content')
<div class="d-sm-flex aling-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">History</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dtHistorialCajon" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Space</th>
                        <th>Seccion</th>
                        <th>Available</th>
                        <th>Date</th>
                        <th>Hours</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{url('/js/global/historial.js')}}"></script>
@endsection

