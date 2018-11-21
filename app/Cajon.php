<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cajon extends Model
{
  protected $table = "cajones";
  protected $primaryKey = "caj_id";
  public $incrementing = true;
  protected $filltable = ["caj_descripcion", "caj_seccion_id", "caj_status_id", "updated_at", "created_at"];
}
