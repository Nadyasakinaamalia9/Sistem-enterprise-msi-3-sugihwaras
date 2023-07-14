<?php

namespace App\Models;

use CodeIgniter\Model;

class Viewpembayaran_model extends Model
{
    protected $table = 'spp';
    protected $primaryKey = 'nis';

    public function getUsernis($nis)
    {
        return $this->where('nis', $nis)->first()['nis'];
    }

     public function getPaymentByUser($nis)
    {
        return $this->where('nis', $nis)->findAll();
    }
    
}
