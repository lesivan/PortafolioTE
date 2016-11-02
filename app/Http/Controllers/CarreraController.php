<?php

namespace PortafolioTE\Http\Controllers;

use Illuminate\Http\Request;
use PortafolioTE\Http\Requests\CarreraRequest;
use Session;
use Redirect;
use PortafolioTE\Http\Requests;
use PortafolioTE\Carrera;
use Auth;
use DB;
use Carbon\Carbon;

class CarreraController extends Controller
{
    public function index(){
		return view('carrera.index');
	}

	public function listing(){
		$carrera = DB::select("SELECT carrera.idcarrera, carrera.CodCarrera, carrera.NombreCarrera FROM carrera");
		return response()->json(
            $carrera
        );
	}

	public function create(){
		return view('carrera.create');
	}

	public function store(CarreraRequest $req){
    	if($req->ajax() ){
    		Carrera::create($req->all());
    		return response()->json([
    			'mensaje' => "creado"
    		]);
    	}
    }

    public function edit($id){
		$carrera = Carrera::find($id);

        return response()->json(
            $carrera->toArray()
        );
	}

	public function update(Request $req, $id){
		

		$carrera = Carrera::where('idcarrera', $id)->save();;
		
		return response()->json(['mensaje' => 'actualizado']);
	}

	public function destroy($id){
		$carrera = Carrera::where('idcarrera', $id)->delete();

        return response()->json(['mensaje'=>'eliminado']);
	}

}
