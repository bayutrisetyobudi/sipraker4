<?php

namespace App\Controllers\Dosen;

use App\Controllers\BaseController;
use App\Models\DashboardDosenModel;

class Dashboard extends BaseController
{
	protected $dashboard;
	public function __construct()
	{
		$this->dashboard=new DashboardDosenModel();
	}

	// =================== DOSBIM ==========================

	public function dosbim()
	{
		$data = ['title' => 'Dashboard'];
		return view('dosen/dosbim/index', $data);
	}

	public function mahasiswa()
	{
		$data = ['title' => 'Data Mahasiswa'];
		return view('dosen/dosbim/d_mhsbim', $data);
	}

	public function bimbingan()
	{
		$data = ['title' => 'Data Bimbingan'];
		return view('dosen/dosbim/d_bim', $data);
	}

	public function tervalidasi()
	{
		$data = ['title' => 'Bimbingan Tervalidasi'];
		return view('dosen/dosbim/d_valbim', $data);
	}

	// =================== KAPRODI ==========================

	public function kaprodi()
	{
		if (isset($_SESSION['data_dosen']) && $_SESSION['data_dosen']['jabatan'] == 1) {
			$dosen = $this->dashboard->getJumlahDosen();
			$mhs = $this->dashboard->getJumlahMahasiswa();
			$pengajuan = $this->dashboard->getJumlahPengajuanKP();
			$tervalidasi = $this->dashboard->getJumlahPengajuanKPTervalidasi();
			$data = [
				'title' => 'Dashboard',
				'dosen' => $dosen,
				'mhs'=>$mhs,
				'pengajuan'=>$pengajuan,
				'tervalidasi'=>$tervalidasi
			];
			return view('dosen/prodi/index', $data);
		}
		return redirect()->to('/dosen/login');
	}

	public function semua_mahasiswa()
	{
		if (isset($_SESSION['data_dosen']) && $_SESSION['data_dosen']['jabatan'] == 1) {
			$mhs = $this->dashboard->getMahasiswa();
			$data = [
				'title' => 'Data Mahasiswa',
				'data_mhs' => $mhs
			];
			return view('dosen/prodi/d_mhs', $data);
		}
		return redirect()->to('/dosen/login');
	}
	public function semua_dosen()
	{
		if (isset($_SESSION['data_dosen']) && $_SESSION['data_dosen']['jabatan'] == 1) {
			$dosen = $this->dashboard->getDosen();
			$data = [
				'title' => 'Data Dosen',
				'data_dosen' =>$dosen
			];
			return view('dosen/prodi/d_dosen', $data);
		}
		return redirect()->to('/dosen/login');
	}
	public function data_pengajuan()
	{
		if (isset($_SESSION['data_dosen']) && $_SESSION['data_dosen']['jabatan'] == 1) {
			$pengajuan = $this->dashboard->getPengajuanKP('Menunggu');
			$data = [
				'title' => 'Data Pengajuan',
				'data_pengajuan' => $pengajuan
			];
			return view('dosen/prodi/d_pengajuan', $data);
		}
		return redirect()->to('/dosen/login');
	}
	public function data_validasi()
	{
		if (isset($_SESSION['data_dosen']) && $_SESSION['data_dosen']['jabatan'] == 1) {
			$tervalidasi = $this->dashboard->getPengajuanKP('Tervalidasi');
			$data = [
				'title' => 'Data Tervalidasi',
				'data_tervalidasi' => $tervalidasi
			];
			return view('dosen/prodi/d_validasi', $data);
		}
		return redirect()->to('/dosen/login');
	}

	public function actionLogout()
	{
		session_unset();
		return redirect()->to('/dosen/login');
	}

	public function actionUpdateAcc(){
		$tolak = $this->request->getVar('tolak');
		$validasi = $this->request->getVar('validasi');
		$id = $this->request->getVar('id_praker');
		if(isset($tolak)){
			$this->dashboard->setPengajuanKP(
				$id,
				'Ditolak'
			);
		}
		if(isset($validasi)){
			$this->dashboard->setPengajuanKP(
				$id,
				'Tervalidasi'
			);
		}
		return redirect()->to('/dosen/kaprodi/dashboard/pengajuan');
	}
}
