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
		$asignatura = DB::select("SELECT asignatura.id, asignatura.codasignatura, asignatura.nombreasignatura FROM asignatura");
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
    

    public function edit($id){
		$asignatura = Asignatura::find($id);

        return response()->json(
            $asignatura->toArray()
        );
	}

	public function update(AsignaturaRequest $req, $id){
		

		$asignatura = Asignatura::find($id);
		$asignatura->fill($req->all());
		$asignatura->save();
		return response()->json(['mensaje' => 'actualizado']);
	}

	

	public function destroy($id){
		$asignatura = Asignatura::find($id);
        $asignatura->delete();

        return response()->json(['mensaje'=>'eliminado']);
	}
}
