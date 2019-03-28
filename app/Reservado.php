<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservado extends Model
{
    protected $table = "reservados";
    protected $primaryKey = "res_id";
    public $incrementing = true;
    protected $filltable = ["res_usuario_id", "res_cajon_id", "res_dia", "res_hora", "res_tiempoReservado", "res_status_id", "updated_at", "created_at"];
}
