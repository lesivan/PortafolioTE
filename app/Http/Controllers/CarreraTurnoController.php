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
		$carreraturno = DB::select("SELECT carreraturno.id, carreraturno.id, carrera.NombreCarrera, carreraturno.id, turno.descripcion FROM carreraturno inner join carrera on carreraturno.idcarrera = carrera.id inner join turno on carreraturno.idturno = turno.id");
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

	public function edit($id){
		$carreraturno = CarreraTurno::find($id);

        return response()->json(
            $carreraturno->toArray()
        );
	}

	public function update(Request $req, $id){
		

		$carreraturno = Carrera::find($id);
		$carreraturno->fill($req->all());
		$carreraturno->save();
		return response()->json(['mensaje' => 'actualizado']);
	}

	

	public function destroy($id){
		$carreraturno = CarreraTurno::find($id);
        $carreraturno->delete();

        return response()->json(['mensaje'=>'eliminado']);
	}

}
