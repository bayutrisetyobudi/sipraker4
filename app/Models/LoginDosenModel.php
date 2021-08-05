<?php

namespace App\Models;
use CodeIgniter\Model;

class LoginDosenModel extends Model
{
    protected $table = 'dosen';
    public function login($nidn){
        return $this->where(['nidn'=>$nidn])->first();
    }
}
?>