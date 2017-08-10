<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
	//membuat middleware auth
	//jika user sudah logout dia tidak akan ke home tapi akan ke login
	public function __construct() {
		$this->middleware('auth');
	}

    public function home() {
    	return view('welcome');
    }
}
