@extends('layouts.layout')

@section('content')
<div class="d-sm-flex aling-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Reserved</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tbReservados" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Space</th>
                        <th>Date</th>
                        <th>Hour</th>
                        <th>Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

</div>

<script type="text/javascript" src="{{url('/js/global/reservados.js')}}"></script>
@endsection