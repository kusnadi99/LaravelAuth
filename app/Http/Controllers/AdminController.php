<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
		$this->middleware('rule:admin');
	}


    public function delete() {
    	return 'Ini halaman admin agar bisa request delete';
    }

    public function update() {
    	return 'ini halaman admin untuk update data';
    }
}
