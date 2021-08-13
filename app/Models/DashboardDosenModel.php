<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardDosenModel extends Model{
    protected $mhs;
    protected $dosen;
    protected $praker;
    protected $bimbingan;
    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->mhs= $db->table('mahasiswa');
        $this->dosen= $db->table('dosen');
        $this->praker= $db->table('praker');
        $this->bimbingan= $db->table('bimbingan');
    }

    // ======================== KAPRODI ==================================

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

    public function setPengajuanKP($id,$status,$keterangan=null){
        $this->praker->set('acc',$status);
        $this->praker->set('keterangan',$keterangan);
        $this->praker->where('id_praker',$id);
        $this->praker->update();
    }

    // ======================== DOSBIM ==================================
    public function getJumlahMahasiswaDibimbing($nidn){
        return count($this->getMahasiswaDibimbing($nidn));
    }
    public function getMahasiswaDibimbing($nidn){
        return $this->praker->join('mahasiswa','mahasiswa.nim=praker.nim')->getWhere(['dosbim'=>$nidn])->getResultArray();
    }
    public function getJumlahBimbingan(){
        return count($this->bimbingan->get()->getResultArray());
    }
    public function getBimbingan($nidn){
        return $this->bimbingan->join('praker','praker.id_praker=bimbingan.id_praker')->join('mahasiswa','mahasiswa.nim=praker.nim')->getWhere([
            'dosbim'=>$nidn,
            'status_bimbingan'=>'Menunggu'
            ])->getResultArray();
    }
    public function getBimbinganTervalidasi($nidn){
        return $this->bimbingan->join('praker','praker.id_praker=bimbingan.id_praker')->join('mahasiswa','mahasiswa.nim=praker.nim')->getWhere([
            'dosbim'=>$nidn,
            'status_bimbingan !='=>'Menunggu'
            ])->getResultArray();
    }
    public function setBimbingan($id_bimbingan,$file_revisi=null){
        if(!$file_revisi){
            $this->bimbingan->set('status_bimbingan','Lanjut');
        }else{
            $this->bimbingan->set('status_bimbingan','Revisi');
            $this->bimbingan->set('up_revisi',$file_revisi);
        }
        $this->bimbingan->where('id_bimbingan',$id_bimbingan);
        $this->bimbingan->update();
    }
}
