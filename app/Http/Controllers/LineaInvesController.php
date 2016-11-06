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
		$linea = DB::select("SELECT lineainvestigacion.id, lineainvestigacion.nombrelineainvestigacion  FROM lineainvestigacion");
		return response()->json(
            $linea
        );
	}

	 public function edit($id){
		$linea = LineaInvestigacion::find($id);

        return response()->json(
            $linea->toArray()
        );
	}

	public function update(Request $req, $id){
		

		$linea = LineaInvestigacion::find($id);
		$linea->fill($req->all());
		$linea->save();
		return response()->json(['mensaje' => 'actualizado']);
	}

	

	public function destroy($id){
		$linea = LineaInvestigacion::find($id);
        $linea->delete();

        return response()->json(['mensaje'=>'eliminado']);
	}

}
