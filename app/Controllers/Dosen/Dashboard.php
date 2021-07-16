<?php

namespace App\Controllers\Dosen;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function dosbim()
	{
		$data = ['title'=>'Dashboard'];
		return view('dosen/dosbim/index',$data);
	}
	
	public function mahasiswa()
	{
		$data = ['title'=>'Data Mahasiswa'];
		return view('dosen/dosbim/d_mhsbim',$data);
	}
	
	public function bimbingan()
	{
		$data = ['title'=>'Data Bimbingan'];
		return view('dosen/dosbim/d_bim',$data);
	}
	
	public function tervalidasi()
	{
		$data = ['title'=>'Bimbingan Tervalidasi'];
		return view('dosen/dosbim/d_valbim',$data);
	}


	public function kaprodi()
	{
		$data = ['title'=>'Dashboard'];
		return view('dosen/prodi/index',$data);
	}
	
	public function semua_mahasiswa()
	{
		$data = ['title'=>'Data Mahasiswa'];
		return view('dosen/prodi/d_mhs',$data);
	}
	public function semua_dosen()
	{
		$data = ['title'=>'Data Dosen'];
		return view('dosen/prodi/d_dosen',$data);
	}
	public function data_pengajuan()
	{
		$data = ['title'=>'Data Pengajuan'];
		return view('dosen/prodi/d_pengajuan',$data);
	}
	public function data_validasi()
	{
		$data = ['title'=>'Data Tervalidasi'];
		return view('dosen/prodi/d_validasi',$data);
	}


}
