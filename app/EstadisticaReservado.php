<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadisticaReservado extends Model
{
    protected $table = "estadisticasReservados";
    protected $primaryKey = "estRes_id";
    protected $incrementing = true;
    protected $filltable = ["estRes_reservados", "estRes_fecha", "estRes_hora", "updated_at", "created_at"];
}
