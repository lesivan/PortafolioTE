<?php

namespace PortafolioTE;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    public $timestamps = false;


    protected $table = 'estudiante';

    protected $fillable = ['Ncarnet', 'Nombre','Apellido','correo','idCarreraTurno'];
}
