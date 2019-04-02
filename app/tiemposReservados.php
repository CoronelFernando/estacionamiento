<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tiemposReservados extends Model
{
 	protected $table = "tiemposReservados";
    protected $primaryKey = "TieRes_id";
    public $incrementing = true;
    protected $filltable = ["TieRes_time", "updated_at", "created_at"];
}
