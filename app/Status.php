<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = "status";
    protected $primaryKey = "est_id";
    public $incrementing = true;
    protected $filltable = ["est_descripcion", "updated_at", "created_at"];
}
