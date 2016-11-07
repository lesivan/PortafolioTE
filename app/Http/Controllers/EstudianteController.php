<?php

namespace PortafolioTE\Http\Controllers;

use Illuminate\Http\Request;

use PortafolioTE\Http\Requests;
use PortafolioTE\Estudiante;
use PortafolioTE\Turno;
use PortafolioTE\CarreraTurno;
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
		$estudiante = DB::select("SELECT estudiante.id, estudiante.Nombre, estudiante.Apellido, estudiante.Ncarnet FROM estudiante");
		return response()->json(
            $estudiante
        );
	}

	public function typesTurno(){
		$typesT = DB::select('SELECT carreraturno.id, carreraturno.idcarrera, turno.descripcion FROM carreraturno inner join turno on carreraturno.idturno = turno.id');
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
