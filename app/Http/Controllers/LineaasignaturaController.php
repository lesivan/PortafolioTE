<?php

namespace PortafolioTE\Http\Controllers;

use Illuminate\Http\Request;

use PortafolioTE\Http\Requests;
use PortafolioTE\Http\Requests\LineaasignaturaRequest;

use PortafolioTE\LInvestAsignatura;
use DB;
use Carbon\Carbon;

class LineaasignaturaController extends Controller
{
    public function index(){
		return view('lineaasignatura.index');
	}

	public function create(){
		return view('lineaasignatura.create');
	}

	public function typesLineas(){
		$typesL = DB::select('SELECT * FROM lineainvestigacion');
		return response()->json(
            $typesL
        );
	}

	public function typesAsignaturas(){
		$typesA = DB::select('SELECT * FROM asignatura');
		return response()->json(
            $typesA
        );
	}

	public function listing(){
		$lineaasignatura = DB::select("SELECT linvestasignatura.id, linvestasignatura.id, asignatura.nombreasignatura, linvestasignatura.id, lineainvestigacion.nombrelineainvestigacion FROM linvestasignatura inner join asignatura on linvestasignatura.idasig = asignatura.id inner join lineainvestigacion on linvestasignatura.idlineainvestigacion = lineainvestigacion.id");
		return response()->json(
            $lineaasignatura
        );
	}

	public function store(LineaasignaturaRequest $req){
    	if($req->ajax() ){
    		LInvestAsignatura::create($req->all());
    		return response()->json([
    			'mensaje' => "creado"
    		]);
    	}
    }

    public function edit($id){
		$lineaasignatura = LInvestAsignatura::find($id);

        return response()->json(
            $lineaasignatura->toArray()
        );
	}

	public function update(Request $req, $id){
		

		$lineaasignatura = LInvestAsignatura::find($id);
		$lineaasignatura->fill($req->all());
		$lineaasignatura->save();
		return response()->json(['mensaje' => 'actualizado']);
	}

	

	public function destroy($id){
		$lineaasignatura = LInvestAsignatura::find($id);
        $lineaasignatura->delete();

        return response()->json(['mensaje'=>'eliminado']);
	}
}
