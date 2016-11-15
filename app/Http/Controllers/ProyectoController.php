<?php

namespace PortafolioTE\Http\Controllers;

use Illuminate\Http\Request;

use PortafolioTE\Http\Requests;
use PortafolioTE\Asignatura;
use PortafolioTE\LineaInvestigacion;
use PortafolioTE\Estudiante;
use DB;

class ProyectoController extends Controller
{
    public function index(){
		return view('proyecto.index');
	}

	public function create(){
		return view('proyecto.create');
	}


	public function typesLinea(){
		$typesL = DB::select('SELECT linvestasignatura.id, linvestasignatura.idasig, lineainvestigacion.nombrelineainvestigacion FROM linvestasignatura inner join lineainvestigacion on linvestasignatura.idlineainvestigacion = lineainvestigacion.id');
		return response()->json(
            $typesL
        );
	}

	public function typesAsignatura(){
		$typesA = DB::select('SELECT * FROM asignatura');
		return response()->json(
            $typesA
        );
	}
	public function typesEstudiante(){
		$typesE = DB::select('SELECT * FROM estudiante');
		return response()->json(
            $typesE
        );
	}
}
