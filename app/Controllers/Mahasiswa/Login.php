<?php

namespace App\Controllers\Mahasiswa;
use App\Controllers\BaseController;

class Login extends BaseController
{
	public function index()
	{
		$data = ['title'=>'Login Mahasiswa'];
		return view('mahasiswa/login',$data);
	}
}
