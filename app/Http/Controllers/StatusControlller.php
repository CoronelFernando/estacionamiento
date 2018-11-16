<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Status;

class StatusControlller extends Controller
{
  public function index(){

  }

  public function create(){

  }

  public function show(){

  }

  public function edit(){

  }

  public function store(){

  }

  public function update(){

  }
  public function destroy(){

  }

  public function status($id){
    $status = Seccion::select('sta_id', 'sta_descripcion');
    -> WHERE('cajones.sta_id', $id);
    return Datatables::of($status)-make(true);
  }

  public function allStatus(){
    $status = Seccion::select('sta_id', 'sta_descripcion');
    return Datatables::of($status)-make(true);
  }
}
