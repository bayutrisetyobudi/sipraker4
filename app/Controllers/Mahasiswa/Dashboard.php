<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use App\Models\DashboardModel;

class Dashboard extends BaseController
{
	protected $dashboard;
	public function __construct()
	{
		$this->dashboard = new DashboardModel();
	}
	public function index()
	{
		if (isset($_SESSION['data_mahasiswa'])) {
			$kp = $this->dashboard->getJumlahKP();
			$bimbingan = $this->dashboard->getJumlahBimbingan();
			$data = [
				'title' => 'Dashboard',
				'kp' => $kp,
				'bimbingan' => $bimbingan
			];
			return view('mahasiswa/index', $data);
		}
		return redirect()->to('mahasiswa/login/');
	}

	public function daftar()
	{
		if (isset($_SESSION['data_mahasiswa'])) {
			$data = ['title' => 'Daftar KP'];
			return view('mahasiswa/m_praker', $data);
		}
		return redirect()->to('mahasiswa/login/');
	}
	public function validasi()
	{
		if (isset($_SESSION['data_mahasiswa'])) {
			$data_kp = $this->dashboard->getKerjaPraktek();
			$data = [
				'title' => 'Data Pengajuan KP',
				'data_kp' => $data_kp
			];
			return view('mahasiswa/d_praker', $data);
		}
		return redirect()->to('mahasiswa/login/');
	}
	public function daftar_bimbingan()
	{
		if (isset($_SESSION['data_mahasiswa'])) {
			$data = ['title' => 'Daftar Bimbingan'];
			return view('mahasiswa/m_bimbingan', $data);
		}
		return redirect()->to('mahasiswa/login/');
	}
	public function bimbingan()
	{
		if (isset($_SESSION['data_mahasiswa'])) {
			$bimbingan = $this->dashboard->getBimbingan();
			$data = [
				'title' => 'Data Bimbingan',
				'data_bimbingan'=>$bimbingan
			];
			return view('mahasiswa/d_bimbingan', $data);
		}
		return redirect()->to('mahasiswa/login/');
	}
	public function actionLogout()
	{
		session_unset();
		return redirect()->to('/mahasiswa/login/');
	}

	public function actionAddKP(){
		$this->dashboard->addKerjaPraktek(
			$this->request->getVar('nim'),
			$this->request->getVar('nama'),
			$this->request->getVar('alamat'),
			$this->request->getVar('judul')
		);
	}

	public function actionAddBimbingan(){
		$this->dashboard->addBimbingan(
			$this->request->getVar('judul')
		);
		return redirect()->to('mahasiswa/dashboard/daftar_bimbingan/');
	}
}
