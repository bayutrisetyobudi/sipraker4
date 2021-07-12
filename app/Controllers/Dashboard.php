<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
	public function mahasiswa()
	{
		return view('mahasiswa/index');
	}
}
