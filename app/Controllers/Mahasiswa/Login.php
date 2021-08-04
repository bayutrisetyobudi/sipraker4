<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use \App\Models\LoginModel;

class Login extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Login Mahasiswa',
		];
		return view('mahasiswa/login', $data);
	}

	public function loginAction()
	{
		$mahasiswa = new LoginModel();
		$nim = $this->request->getVar('nim');
		$pass = $this->request->getVar('pass');
		$data = $mahasiswa->login($nim);
		if (isset($data)&&$nim==$pass) {
			$_SESSION['data_mahasiswa'] = $data;
			return redirect()->to('mahasiswa/dashboard/');
		}
		return redirect()->to('mahasiswa/login/');
	}
}
