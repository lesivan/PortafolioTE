<?php

namespace PortafolioTE\Http\Controllers;

use Illuminate\Http\Request;

use PortafolioTE\Http\Requests;

class FrontController extends Controller
{	
    public function index(){
    	return view('index');
    }

     public function admin(){
    	return view('layouts.admin');
    }
}
