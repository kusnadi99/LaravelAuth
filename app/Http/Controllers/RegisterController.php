<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use DB;

class RegisterController extends Controller
{
	public function __construct() {
        $this->middleware('guest');
    }
	//membuat fungsi getRegister untuk mendapatkan view
	public function getRegister() {
		//mereturn view form register
		//Register merupakan nama folder
		//formRegister merupakan nama file viewnya
		return view('Register.formRegister');
	}

	//membuat fungsi postRegister agar jika button signup di klik akan masuk ke database
	public function postRegister() {
		$user = new User();
		$user->username = Input::get('username');
		$user->name = Input::get('name');
		$user->email = Input::get('email');
		$user->password = bcrypt(Input::get('password'));
		//menginisiasikan bahwa ketika orang mendaftar pertama, maka akan secara default menjadi user BUKAN admin
		$user->roles_id = DB::table('roles')->select('id')->where('namaRule','user')->first()->id;

		//fungsi untuk menyimpan ke database
		$user->save();
	}
}
