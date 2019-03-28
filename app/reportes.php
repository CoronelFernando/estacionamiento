<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reportes extends Model
{
  	protected $table = "reportes";
    protected $primaryKey = "rep_id";
    public $incrementing = true;
    protected $filltable = ["rep_tipo_id", "rep_usu_id", "rep_descripcion", "rep_fecha", "updated_at", "created_at"];
}
