<?php

namespace PortafolioTE;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
     public $timestamps = false;

    protected $table = 'carrera';

    protected $fillable = ['CodCarrera', 'NombreCarrera'];
}
