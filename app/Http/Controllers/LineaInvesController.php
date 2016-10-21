<?php

namespace PortafolioTE\Http\Controllers;

use Illuminate\Http\Request;
use PortafolioTE\Http\Requests\LineaInvesRequest;
use Session;
use Redirect;
use PortafolioTE\Http\Requests;
use PortafolioTE\LineaInvestigacion;
use Auth;
use DB;
use Carbon\Carbon;

class LineaInvesController extends Controller
{
    public function index(){
		return view('lineainvestigacion.index');
	}

	public function create(){
		return view('lineainvestigacion.create');
	}


	public function store(LineaInvesRequest $req){
    	if($req->ajax() ){
    		LineaInvestigacion::create($req->all());
    		return response()->json([
    			'mensaje' => "creado"
    		]);
    	}
    }

	public function listing(){
		$Linea = DB::select("SELECT lineainvestigacion.idlineainvestigacion, lineainvestigacion.nombrelineainvestigacion  FROM lineainvestigacion");
		return response()->json(
            $Linea
        );
	}

}
