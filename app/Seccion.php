<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
  protected $table = "secciones";
  protected $primaryKey = "sec_id";
  public $incrementing = true;
  protected $filltable = ["sec_descripcion", "updated_at", "created_at"];
}
