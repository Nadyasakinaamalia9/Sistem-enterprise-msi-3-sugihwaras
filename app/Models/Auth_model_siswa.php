<?php

namespace App\Models;

use CodeIgniter\Model;

class Auth_model_siswa extends Model
{
    protected $table = 'user_siswa';
    protected $primaryKey = 'nis';

    public function cek_login($nis)
    {
        // return $this->where('nis', $nis)->first();
        $query = $this->table('user_siswa')
            ->where('nis', $nis)
            ->countAll();

        if ($query >  0) {
            $hasil = $this->table('user_siswa')
                ->where('nis', $nis)
                ->limit(1)
                ->get()
                ->getRowArray();
        } else {
            $hasil = array();
        }
        return $hasil;
    }

    public function register($data)
    {
        // return $this->insert($data);
        return $this->db->table($this->table)->insert($data);
    }

    public function getEmisByUsername($nis)
    {
        return $this->where('nis', $nis)->first();
        // return $this->db->table('emis')->where('nis', $nis)->get()->getRowArray();
    }

    
    public function getUserEmis($nis)
    {
        return $this->table('emis')->where('nis', $nis)->findAll();
        // return $this->db->table($this->tableEmis)
        //                 ->where('nis', $nis)
        //                 ->get()
        //                 ->getResultArray();
    }

}