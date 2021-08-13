<?php

namespace App\Controllers\Dosen;

use App\Controllers\BaseController;
use App\Models\DashboardDosenModel;

class Dashboard extends BaseController
{
	protected $dashboard;
	public function __construct()
	{
		$this->dashboard = new DashboardDosenModel();
	}

	// =================== DOSBIM ==========================

	public function dosbim()
	{
		if (isset($_SESSION['data_dosen']) && $_SESSION['data_dosen']['jabatan'] == 2) {
			$mhs = $this->dashboard->getJumlahMahasiswaDibimbing($_SESSION['data_dosen']['nidn']);
			$bimbingan = $this->dashboard->getJumlahBimbingan();
			$data = [
				'title' => 'Dashboard',
				'mhs' => $mhs,
				'bimbingan' => $bimbingan
			];
			return view('dosen/dosbim/index', $data);
		}
		return redirect()->to('/dosen/login');
	}

	public function mahasiswa()
	{
		if (isset($_SESSION['data_dosen']) && $_SESSION['data_dosen']['jabatan'] == 2) {
			$mhs = $this->dashboard->getMahasiswaDibimbing($_SESSION['data_dosen']['nidn']);
			$data = [
				'title' => 'Data Mahasiswa',
				'data_mhs' => $mhs
			];
			return view('dosen/dosbim/d_mhsbim', $data);
		}
		return redirect()->to('/dosen/login');
	}

	public function bimbingan()
	{
		if (isset($_SESSION['data_dosen']) && $_SESSION['data_dosen']['jabatan'] == 2) {
			$data_bimbingan = $this->dashboard->getBimbingan($_SESSION['data_dosen']['nidn']);
			$data = [
				'title' => 'Data Bimbingan',
				'data_bimbingan' => $data_bimbingan,
				'validation' => \Config\Services::validation(),
			];
			return view('dosen/dosbim/d_bim', $data);
		}
		return redirect()->to('/dosen/login');
	}

	public function tervalidasi()
	{
		if (isset($_SESSION['data_dosen']) && $_SESSION['data_dosen']['jabatan'] == 2) {
			$data_bimbingan = $this->dashboard->getBimbinganTervalidasi($_SESSION['data_dosen']['nidn']);
			$data = [
				'title' => 'Bimbingan Tervalidasi',
				'data_bimbingan' => $data_bimbingan
			];
			return view('dosen/dosbim/d_valbim', $data);
		}
		return redirect()->to('/dosen/login');
	}

	public function actionSetBimbingan()
	{
		$id = $this->request->getVar('id_bimbingan');
		if ($this->request->getVar('btn_revisi')!==null) {
			if (!$this->validate([
				'revisi' => [
					'rules' => 'uploaded[revisi]|max_size[revisi,2048]|mime_in[revisi,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document]|ext_in[revisi,doc,docx]',
					'errors' => [
						'uploaded' => 'Harus upload file revisi',
						'max_size' => 'File harus kurang dari 2MB',
						'mime_in' => 'File harus bertipe doc / docx',
						'ext_in' => 'File harus bertipe doc / docx',
					]
				]
			])) {
				return redirect()->to('/dosen/dosbim/dashboard/bimbingan')->withInput();
			}
			$file = $this->request->getFile('revisi');
			$fileName = $file->getRandomName();
			$file->move('revisi', $fileName);
			$this->dashboard->setBimbingan($id, $fileName);
			session()->setFlashdata('success', 'Berhasil mengupload revisi bimbingan');
			return redirect()->to('/dosen/dosbim/dashboard/bimbingan');
		}

		$this->dashboard->setBimbingan($id);
		session()->setFlashdata('success', 'Berhasil mengganti status bimbingan menjadi lanjut');
		return redirect()->to('/dosen/dosbim/dashboard/bimbingan');
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
				'mhs' => $mhs,
				'pengajuan' => $pengajuan,
				'tervalidasi' => $tervalidasi
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
				'data_dosen' => $dosen
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

	public function actionUpdateAcc()
	{
		$tolak = $this->request->getVar('tolak');
		$validasi = $this->request->getVar('validasi');
		$id = $this->request->getVar('id_praker');
		if (isset($tolak)) {
			$keterangan = $this->request->getVar('alasan');
			$this->dashboard->setPengajuanKP(
				$id,
				'Ditolak',
				$keterangan
			);
			session()->setFlashdata('success','Berhasil menolak pengajuan Kerja Praktek');
		}
		if (isset($validasi)) {
			$this->dashboard->setPengajuanKP(
				$id,
				'Tervalidasi'
			);
			session()->setFlashdata('success','Berhasil memvalidasi pengajuan Kerja Praktek');
		}
		return redirect()->to('/dosen/kaprodi/dashboard/pengajuan')->withInput();
	}
}
