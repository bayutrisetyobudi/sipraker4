<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardDosenModel extends Model{
    protected $mhs;
    protected $dosen;
    protected $praker;
    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->mhs= $db->table('mahasiswa');
        $this->dosen= $db->table('dosen');
        $this->praker= $db->table('praker');
    }

    public function getJumlahDosen(){
        return count($this->getDosen());
    }
    public function getJumlahMahasiswa(){
        return count($this->getMahasiswa());
    }

    public function getMahasiswa(){
        return $this->mhs->get()->getResultArray();
    }
    public function getDosen(){
        return $this->dosen->get()->getResultArray();
    }

    public function getJumlahPengajuanKP(){
        return count($this->getPengajuanKP('Menunggu'));
    }
    public function getJumlahPengajuanKPTervalidasi(){
        return count($this->getPengajuanKP('Tervalidasi'));
    }
    public function getPengajuanKP($status){
        return $this->praker->join('mahasiswa','mahasiswa.nim = praker.nim')->getWhere(['acc'=>$status])->getResultArray();
    }

    public function setPengajuanKP($id,$status){
        $this->praker->set('acc',$status);
        $this->praker->where('id_praker',$id);
        $this->praker->update();
    }
}
?>