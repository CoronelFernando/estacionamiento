<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estadisticasCajones extends Model
{
    protected $table = "estadisticasCajones";
    protected $primaryKey = "estCaj_id";
    protected $incrementing = "true";
    protected $filltable = ["estCaj_cajon_id","estCaj_fecha", "estCaj_hora", "estCaj_disponible", "updated_at", "created_at"];


}
