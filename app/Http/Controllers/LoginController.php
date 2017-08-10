<?php

namespace App\Http\Controllers;

//use App\Http\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
    }

    public function getLogin() {
    	return view('Login.formLogin');
    }

    public function postLogin(Request $request) {
    	if (Auth::attempt([
    		'email' => $request->EmailUsername,
    		'password' => $request->password
    		])) {
    	 	return redirect('/');
    	 } elseif (Auth::attempt([
    		'username' => $request->EmailUsername,
    		'password' => $request->password
    		])) {
    	 	return redirect('/');
    	 } else {
    	 	return 'username / password salah';
    	 }
    }
}
