<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function mahasiswa()
	{
		return view('mahasiswa/index');
	}
}
