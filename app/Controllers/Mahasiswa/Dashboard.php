<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use App\Models\DashboardMHSModel;

class Dashboard extends BaseController
{
	protected $dashboard;
	public function __construct()
	{
		$this->dashboard = new DashboardMHSModel();
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
			$acc_kp = $this->dashboard->getKPTerAcc();
			$data = [
				'title' => 'Daftar KP',
				'acc_kp'=>$acc_kp
			];
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
			$acc_kp = $this->dashboard->getKPTerAcc();
			$data = [
				'title' => 'Daftar Bimbingan',
				'validation' => \Config\Services::validation(),
				'acc_kp'=>$acc_kp
			];
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
				'data_bimbingan' => $bimbingan
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

	public function actionAddKP()
	{
		$this->dashboard->addKerjaPraktek(
			$this->request->getVar('nim'),
			$this->request->getVar('nama'),
			$this->request->getVar('alamat'),
			$this->request->getVar('judul')
		);
		session()->setFlashdata('success','');
		return redirect()->to('mahasiswa/dashboard/daftar/')->withInput();
	}

	public function actionAddBimbingan()
	{
		if (!$this->validate([
			'judul' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Judul Bimbingan Harus diisi'
				]
			],
			'bimbingan' => [
				'rules' => 'uploaded[bimbingan]|max_size[bimbingan,2048]|mime_in[bimbingan,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document]|ext_in[bimbingan,doc,docx]',
				'errors' => [
					'uploaded' => 'Harus upload file bimbingan',
					'max_size' => 'File harus kurang dari 2MB',
					'mime_in' => 'File harus bertipe doc / docx',
					'ext_in' => 'File harus bertipe doc / docx',
				]
			]
		])) {
			return redirect()->to('mahasiswa/dashboard/daftar_bimbingan/')->withInput();
		}
		$files = $this->request->getFile('bimbingan');

		$fileName = $files->getRandomName();
		$files->move('bimbingan', $fileName);

		$this->dashboard->addBimbingan(
			$this->request->getVar('judul'),
			$fileName
		);
		session()->setFlashdata('success','');
		return redirect()->to('mahasiswa/dashboard/daftar_bimbingan/')->withInput();
	}
}
