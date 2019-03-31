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
                        <div class="card mb-3">
                            <div class="card-header">
                                Stadistics
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="clearfix"></div>
                                        <div class="col-md-12">
                                        <div id="chart_div" class="chart">
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
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                      <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                  </div>
                </div>
              </div>
        <!--https://developers.google.com/chart/interactive/docs/gallery/areachart-->
@endsection