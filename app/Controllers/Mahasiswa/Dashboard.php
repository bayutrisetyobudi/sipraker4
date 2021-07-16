<?php

namespace App\Controllers\Mahasiswa;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function index()
	{
		$data = ['title'=>'Dashboard'];
		return view('mahasiswa/index',$data);
	}
	
	public function daftar(){
		$data = ['title'=>'Daftar KP'];
		return view('mahasiswa/m_praker',$data);
	}
	public function validasi(){
		$data = ['title'=>'Data Pengajuan KP'];
		return view('mahasiswa/d_praker',$data);
	}
	public function daftar_bimbingan(){
		$data = ['title'=>'Daftar Bimbingan'];
		return view('mahasiswa/m_bimbingan',$data);
	}
	public function bimbingan(){
		$data = ['title'=>'Data Bimbingan'];
		return view('mahasiswa/d_bimbingan',$data);
	}
}
