<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservado extends Model
{
    protected $table = "reservados";
    protected $primaryKey = "res_id";
    public $incrementing = true;
    protected $filltable = ["res_usuario", "res_cajon", "res_hora", "res_fechaApartado", "updated_at", "created_at"];
}
