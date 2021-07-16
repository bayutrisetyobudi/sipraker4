<?php

namespace App\Controllers\Dosen;
use App\Controllers\BaseController;

class Login extends BaseController
{
	public function index()
	{
		$data = ['title'=>'Login Dosen'];
		return view('dosen/login',$data);
	}
}
