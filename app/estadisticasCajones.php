<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadisticasCajones extends Model
{
    protected $table = "estadisticasCajones";
    protected $primaryKey = "estCaj_id";
    public $incrementing = "true";
    protected $filltable = ["estCaj_cajon_id","estCaj_fechaIni", "estCaj_horaIni", "estCaj_fechaFin", "estCaj_horaFin", "estCaj_disponible", "updated_at", "created_at"];
}
