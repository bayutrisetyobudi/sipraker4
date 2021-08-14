<?php

namespace App\Models;

use CodeIgniter\I18n\Time;
use CodeIgniter\Model;

class DashboardMHSModel extends Model {
    protected $table = 'praker';
    protected $praker;
    protected $bimbingan;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->praker = $db->table('praker');
        $this->bimbingan = $db->table('bimbingan');
    }


    public function getJumlahKP(){
        return count($this->getKerjaPraktek());
    }

    public function getJumlahBimbingan(){
        return count($this->getBimbingan());
    }

    public function addKerjaPraktek($nim,$nama,$alamat,$judul){
        $this->praker->insert([
            'tgl_pengajuan' => Time::now(),
            'nim' => $nim,
            'nama_instansi' =>$nama,
            'alamat_instansi' =>$alamat,
            'judul_praker' =>$judul,
            'acc'=> 'Menunggu Acc'
        ]);
    }

    public function getKerjaPraktek(){
        $this->praker->join('dosen','praker.dosbim = dosen.nidn','left');
        return $this->praker->getWhere(['nim'=>$_SESSION['data_mahasiswa']['nim']])->getResultArray();
    }

    public function deleteKerjaPraktek($id_praker){
        $this->praker->delete(['id_praker'=>$id_praker]);
    }

    public function getKPTerAcc(){
        return $this->praker->getWhere(['acc'=>'Tervalidasi','nim'=>$_SESSION['data_mahasiswa']['nim']])->getFirstRow();
    }

    public function addBimbingan($judul,$file_bimbingan){
        $id = $this->getKPTerAcc()->id_praker;
        if($id){
            $this->bimbingan->insert([
                'tgl_bimbingan'=>Time::now(),
                'judul_bimbingan'=>$judul,
                'status_bimbingan'=> 'Menunggu',
                'id_praker'=> $id,
                'up_bimbingan'=>$file_bimbingan
            ]);
        }
    }

    public function getBimbingan(){
        $id = $this->getKPTerAcc()->id_praker;
        if($id){
            return $this->bimbingan->getWhere(['id_praker'=>$id])->getResultArray();
        }
        return array();
    }

    public function getBimbinganById($id_bimbingan){
        return $this->bimbingan->getWhere(['id_bimbingan'=>$id_bimbingan])->getFirstRow();
    }

    public function deleteBimbingan($id_bimbingan){
        $this->bimbingan->delete(['id_bimbingan'=>$id_bimbingan]);
    }

}

?>