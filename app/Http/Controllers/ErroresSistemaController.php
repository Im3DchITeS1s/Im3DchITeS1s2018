<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use Auth;

class ErroresSistemaController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function error500()
	{
		flash('¡Sin Privilegios!')->error()->important();
    	return redirect()->route('home');
	}

	public function error404()
	{
		flash('¡Sin Privilegios!')->error()->important();
    	return redirect()->route('home');
	}	
}
