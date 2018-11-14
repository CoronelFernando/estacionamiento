<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadisticaSeccion extends Model
{
    protected $table = "estadisticasSecciones";
    protected $primaryKey = "estSec_id";
    protected $incrementing = "true";
    protected $filltable = ["estSec_seccion","estSec_fecha", "estSec_hora", "updated_at", "created_at"];


}
