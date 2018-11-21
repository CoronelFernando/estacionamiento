<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use app\Status;

class PrincipalController extends Controller
{
    public function index(){
      $status = DB::table('estatus')->get();
      return view('pagesweb/administrador/principal', ['status' => $status]);
    }
}
