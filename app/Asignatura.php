<?php

namespace PortafolioTE;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    public $timestamps = false;

    protected $table = 'asignatura';

    protected $fillable = ['codasignatura', 'nombreasignatura'];
}
