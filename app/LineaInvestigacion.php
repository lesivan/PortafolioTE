<?php

namespace PortafolioTE;

use Illuminate\Database\Eloquent\Model;

class LineaInvestigacion extends Model
{
     public $timestamps = false;

    protected $table = 'lineainvestigacion';

    protected $fillable = ['nombrelineainvestigacion'];
}
