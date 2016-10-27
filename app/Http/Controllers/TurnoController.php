<?php

namespace PortafolioTE\Http\Controllers;

use Illuminate\Http\Request;
use PortafolioTE\Http\Requests\TurnoRequest;

use PortafolioTE\Http\Requests;
use PortafolioTE\Turno;
use DB;
use Carbon\Carbon;


class TurnoController extends Controller
{
    public function index(){
		return view('turno.index');
	}

	public function create(){
		return view('turno.create');
	}


	public function store(TurnoRequest $req){
    	if($req->ajax() ){
    		Turno::create($req->all());
    		return response()->json([
    			'mensaje' => "creado"
    		]);
    	}
    }

     public function destroy($id){
		$Turno = Turno::where('idturno', $id)->delete();

        return response()->json(['mensaje'=>'eliminado']);
	}


    public function listing(){
		$Turno = DB::select("SELECT turno.idturno, turno.descripcion FROM turno");
		return response()->json(
            $Turno
        );
	}
}
