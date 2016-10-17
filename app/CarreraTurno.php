<?php

namespace PortafolioTE;

use Illuminate\Database\Eloquent\Model;

class CarreraTurno extends Model
{
    public $timestamps = false;

    protected $table = 'carreraturno';

    protected $fillable = ['CodCarrera', 'idturno'];
}
