<?php

namespace PortafolioTE;

use Illuminate\Database\Eloquent\Model;

class LInvestAsignatura extends Model
{
     public $timestamps = false;

    protected $table = 'linvestasignatura';

    protected $fillable = ['idasig', 'idlineainvestigacion'];
}
