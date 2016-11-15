<?php

namespace PortafolioTE\Http\Controllers;

use Illuminate\Http\Request;
use PortafolioTE\Http\Requests\UserCreateRequest;
use PortafolioTE\Http\Requests\UserUpdateRequest;
use Session;
use Redirect;
use Auth;
use PortafolioTE\User;
use DB;
use Carbon\Carbon;

use PortafolioTE\Http\Requests;

class UsuarioController extends Controller
{



    public function index(){
		return view('usuario.index');
	}


	public function create(){
		return view('usuario.create');
	}


	public function store(UserCreateRequest $req){
		if($req->ajax() ){
    		User::create($req->all());
    		return response()->json([
    			'mensaje' => "creado"
    		]);
    	}
	}

	public function edit($id){
		$user = User::find($id);

        return response()->json(
            $user->toArray()
        );
	}

	public function update(UserUpdateRequest $req, $id){
		

		$user = User::find($id);
		$user->fill($req->all());
		$user->save();
		return response()->json(['mensaje' => 'actualizado']);
	}

	public function destroy($id){
		$user = User::find($id);
        $user->delete();

        return response()->json(['mensaje'=>'eliminado']);
	}

	public function correct($id){
		$user = User::find($id);
		return $user;
	}

	public function listing(){
		$users = DB::select("SELECT users.id, users.name, users.email, user_types.name AS 'type' FROM users
			LEFT JOIN user_types ON users.id_type = user_types.id");
		return response()->json(
            $users
        );
	}


	public function types(){
		$types = DB::select('SELECT * FROM user_types');
		return response()->json(
            $types
        );
	}

	public function usersBySearch($search){
		$users = DB::select("SELECT users.id, users.name, users.email, user_types.name AS 'type' FROM users
			LEFT JOIN user_types ON users.id_type = user_types.id
            WHERE users.name LIKE '%".$search."%'");
		return response()->json(
            $users
        );
	}
}
