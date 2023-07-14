<?php

namespace App\Models;

use CodeIgniter\Model;


class Jadwalpelajaran_model extends Model
{
   
    protected $table = 'jadwal';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tanggal', 'jam', 'status'];

    public function getJadwalTerverifikasi()
    {
        $this->where('status', 'terverifikasi');
        return $this->findAll();
    } 

}
