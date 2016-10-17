<?php

namespace PortafolioTE\Http\Controllers;

use Illuminate\Http\Request;

use PortafolioTE\Http\Requests;
use PortafolioTE\Estudiante;
use PortafolioTE\Turno;
use DB;
use Carbon\Carbon;

class EstudianteController extends Controller
{
    public function index(){
		return view('estudiante.index');
	}


	public function create(){
		return view('estudiante.create');
	}

	public function store(EstudianteCreateRequest $req){
		if($req->ajax() ){
    		Estudiante::create($req->all());
    		return response()->json([
    			'mensaje' => "creado"
    		]);
    	}
	}


	public function listing(){
		$estudiante = DB::select("SELECT estudiante.idestudiante, estudiante.Nombre, estudiante.Apellido, estudiante.Ncarnet, 
			carrera.NombreCarrera FROM estudiante
			inner join carreraturno on estudiante.idestudiante= carreraturno.idCarreraTurno
			inner join carrera on carreraturno.idCarreraTurno=carrera.idcarrera");
		return response()->json(
            $estudiante
        );
	}

	public function typesTurno(){
		$typesT = DB::select('SELECT * FROM turno');
		return response()->json(
            $typesT
        );
	}

	public function typesCarrera(){
		$typesC = DB::select('SELECT * FROM carrera');
		return response()->json(
            $typesC
        );
	}
}
