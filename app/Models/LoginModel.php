<?php

namespace App\Models;
use CodeIgniter\Model;

class LoginModel extends Model {
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    public function login($nim){
        return $this->where(['nim'=>$nim])->first();
    }
}
?>