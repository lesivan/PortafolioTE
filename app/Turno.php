<?php

namespace PortafolioTE;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    public $timestamps = false;

    protected $table = 'turno';

    protected $fillable = ['descripcion'];
}
