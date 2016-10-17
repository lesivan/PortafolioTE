<?php

namespace PortafolioTE;

use Illuminate\Database\Eloquent\Model;

class EstudianteHaceProyecto extends Model
{
     public $timestamps = false;

    protected $table = 'estudiantehaceproyectos';

    protected $fillable = ['Ncarnet', 'idproyectos'];
}
