<?php

namespace PortafolioTE\Http\Controllers;

use Illuminate\Http\Request;

use PortafolioTE\Http\Requests;
use PortafolioTE\Http\Requests\CarreraTurnoRequest;

use PortafolioTE\CarreraTurno;
use DB;
use Carbon\Carbon;


class CarreraTurnoController extends Controller
{
     public function index(){
		return view('carreraturno.index');
	}

	public function listing(){
		$carreraturno = DB::select("SELECT carreraturno.idCarreraTurno, carreraturno.CodCarrera, carreraturno.idturno FROM carreraturno");
		return response()->json(
            $carreraturno
        );
	}


	public function create(){
		return view('carreraturno.create');
	}

	public function store(CarreraTurnoRequest $req){
    	if($req->ajax() ){
    		CarreraTurno::create($req->all());
    		return response()->json([
    			'mensaje' => "creado"
    		]);
    	}
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
