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


    public function listing(){
		$turno = DB::select("SELECT turno.id, turno.descripcion FROM turno");
		return response()->json(
            $turno
        );
	}


    public function edit($id){
        $turno = Turno::find($id);

        return response()->json(
            $turno->toArray()
        );
    }

    public function update(Request $req, $id){
        

        $turno = Turno::find($id);
        $turno->fill($req->all());
        $turno->save();
        return response()->json(['mensaje' => 'actualizado']);
    }

    

    public function destroy($id){
        $turno = Turno::find($id);
        $turno->delete();

        return response()->json(['mensaje'=>'eliminado']);
    }
}
