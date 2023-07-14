<?php

namespace App\Models;

use CodeIgniter\Model;

class Pembelajaran_model extends Model
{
    protected $table = 'pembelajaran';
    protected $primaryKey = 'id_pembelajaran';

    public function getCategory($id = false)
    {
        # code...
        if ($id == false) {

            return $this->findAll();
        } else {
            return $this->getWhere(['id_pembelajaran' => $id]);
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
        return $this->db->table($this->table)->update($data, ['id_pembelajaran' => $id]);
    }

    public function deleteCategory($id)
    {
        # code...
        return $this->db->table($this->table)->delete(['id_pembelajaran' => $id]);
    }

    public function getKelas()
    {
        // Ambil data kelas dari database (misalnya tabel "kelas")
        // $query = $this->db->get('kelas');
        // $query = $this->db->table('manajemen_kelas')->get();
        // return $query->getResultArray();
        // $data['kelas'] = $this->model->getKelas();
        // return $this->findAll();

        $query = $this->db->table('manajemen_kelas')->get();
        return $query->getResultArray();
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
    // function getInfoProposal($id)

    // {

    //     $sql = "SELECT * FROM pembelajaran WHERE id_pembelajaran=$id";

    //     $query = $this->db->query($sql);

    //     return $query->getRowArray();
    // }
}
