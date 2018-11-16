<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = "status";
    protected $primaryKey = "sta_id";
    public $incrementing = true;
    protected $filltable = ["sta_descripcion", "updated_at", "created_at"];
}
