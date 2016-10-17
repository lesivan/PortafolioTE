<?php

namespace PortafolioTE;

use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    public $timestamps = false;

    protected $table = 'proyectos';

    protected $fillable = ['nombreProyecto', 'anorealizado','archivoadjunto','semestre','idLInvestAsignatura'];

 	

}
