<?php

namespace App\Models;

use CodeIgniter\Model;

class Viewnilai_model extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'nis';

    public function getNilaiSiswa($nis)
    {
        return $this->where('nis', $nis)->findAll();
    }
    
    
}
