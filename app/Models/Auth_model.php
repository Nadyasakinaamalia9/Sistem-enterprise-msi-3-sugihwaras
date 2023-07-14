<?php

namespace App\Models;

use CodeIgniter\Model;

class Auth_model extends Model
{
    protected $table = 'user';
    protected $tablePegawai = 'pegawai';
    protected $tableEmis = 'emis';
    protected $primaryKey = 'id_pegawai';
    protected $primaryKey1 = 'nis';
    // protected $allowedFields = ['id_pegawai', 'email', 'password']; // sesuaikan dengan kolom pada tabel guru

    public function getGuruByUsername($id_pegawai)
    {
        return $this->where('id_pegawai', $id_pegawai)->first();
    }

    public function getEmisByUsername($nis)
    {
        return $this->where('nis', $nis)->first();
    }

    public function cek_login($id_pegawai)
    {
        $query = $this->table('user')
            ->where('id_pegawai', $id_pegawai)
            ->countAll();

        if ($query >  0) {
            $hasil = $this->table('user')
                ->where('id_pegawai', $id_pegawai)
                ->limit(1)
                ->get()
                ->getRowArray();
        } else {
            $hasil = array();
        }
        return $hasil;
    }
    public function getUser($id_pegawai)
    {
        return $this->table('pegawai')->where('id_pegawai', $id_pegawai)->findAll();
        // return $this->table('emis')->where('nis', $nis)->findAll();
    }
    public function getUserEmis($nis)
    {
        // return $this->table('pegawai')->where('id_pegawai', $id_pegawai)->findAll();
        return $this->table('emis')->where('nis', $nis)->findAll();
    }
    public function register($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function employee()
    {
        return $this->hasOne(EmployeeModel::class, 'id_pegawai', 'id');
    }
}
