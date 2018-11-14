<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cajon extends Model
{
  protected $table = "cajones";
  protected $primaryKey = "caj_id";
  public $incrementing = true;
  protected $filltable = ["caj_descripcion", "caj_status", "caj_seccion", "updated_at", "created_at"];
}
