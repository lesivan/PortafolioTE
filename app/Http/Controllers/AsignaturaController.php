<?php

namespace PortafolioTE\Http\Controllers;

use Illuminate\Http\Request;
use PortafolioTE\Http\Requests\AsignaturaRequest;

use PortafolioTE\Http\Requests;
use PortafolioTE\Asignatura;
use DB;
use Carbon\Carbon;

class AsignaturaController extends Controller
{
     public function index(){
		return view('asignatura.index');
	}

	public function listing(){
		$asignatura = DB::select("SELECT asignatura.idasig, asignatura.codasignatura, asignatura.nombreasignatura FROM asignatura");
		return response()->json(
            $asignatura
        );
	}

	public function create(){
		return view('asignatura.create');
	}

	public function store(AsignaturaRequest $req){
    	if($req->ajax() ){
    		Asignatura::create($req->all());
    		return response()->json([
    			'mensaje' => "creado"
    		]);
    	}
    }
    

    public function destroy($id){
		$asignatura = Asignatura::where('idasig', $id)->delete();

        return response()->json(['mensaje'=>'eliminado']);
	}
}
