@extends('layouts.layout')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">History</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                History
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
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
@endsection