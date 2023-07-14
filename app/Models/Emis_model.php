<?php

namespace App\Models;

use CodeIgniter\Model;

class Emis_model extends Model
{
    protected $table = 'emis';


    /////////////////////////////////////////////////
    // public function getFilteredData($filterData)
    // {
    //     $builder = $this->builder();

    //     // Tambahkan kondisi WHERE berdasarkan filter yang diberikan
    //     if (!empty($filterData['nama'])) {
    //         $builder->like('nama', $filterData['nama']);
    //     }

    //     // Tambahkan kondisi WHERE lainnya sesuai kebutuhan

    //     return $builder->get()->getResult();
    // }
    /////////////////////////////////////////////////


    public function getCategory($id = false)
    {
        # code...
        if ($id == false) {

            return $this->findAll();
        } else {
            return $this->getWhere(['nis' => $id]);
        }
    }

    public function insertCategory($data)
    {
        # code...
        return $this->db->table($this->table)->insert($data);
    }

    public function updateCategory($data, $id)
    {
        # code...
        return $this->db->table($this->table)->update($data, ['nis' => $id]);
    }

    public function deleteCategory($id)
    {
        # code...
        return $this->db->table($this->table)->delete(['nis' => $id]);
    }

    public function getUserEmis($nis)
    {
        return $this->db->table($this->tableEmis)
            ->where('nis', $nis)
            ->get()
            ->getResultArray();
    }

    // public function getEmisByUsername($nis)
    // {
    //     return $this->where('nis', $nis)->first();
    //     // return $this->db->table('emis')->where('nis', $nis)->get()->getRowArray();
    // }
    public function getEmisByUsername($nis)
    {
        return $this->db->table('emis')
            ->where('nis', $nis)
            ->get()
            ->getRowArray();
    }

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'nis', 'id');
    }

    public function getSiswaById($id)
    {
        return $this->find($id);
    }
    public function getTahunajaran()
    {
        // Ambil data kelas dari database (misalnya tabel "kelas")
        // $query = $this->db->get('kelas');
        // $query = $this->db->table('manajemen_ajaran')->get();
        // return $query->getResultArray();
        // $data['tahun_ajaran'] = $this->model->getTahunajaran();
        // return $this->findAll();

        $query = $this->db->table('manajemen_ajaran')->get();
        return $query->getResultArray();
    }
}
