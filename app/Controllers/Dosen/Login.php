<?php

namespace App\Controllers\Dosen;
use App\Controllers\BaseController;
use App\Models\LoginDosenModel;

class Login extends BaseController
{
	public function index()
	{
		$data = ['title'=>'Login Dosen'];
		return view('dosen/login',$data);
	}

	public function actionLogin(){
		$db = new LoginDosenModel();
		$nidn = $this->request->getVar('nidn');
		$pass = $this->request->getVar('pass');
		$data = $db->login($nidn);
		if(isset($data)&&$nidn==$pass){
			$_SESSION['data_dosen']=$data;
			if($data['jabatan']==1){
				return redirect()->to('/dosen/kaprodi/dashboard');
			}
			return redirect()->to('/dosen/dosbim/dashboard');
		}
		return redirect()->to('/dosen/login');
	}
}
