<?php

namespace App\Models;

use CodeIgniter\Model;

class Sarpras_model extends Model
{
  protected $table = 'sarpras';

  public function getCategory($id = false)
  {
    # code...
    if ($id == false) {

      return $this->findAll();
    } else {
      return $this->getWhere(['id_barang' => $id]);
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
    return $this->db->table($this->table)->update($data, ['id_barang' => $id]);
  }

  public function deleteSarpras($id)
  {
    # code...
    return $this->db->table($this->table)->delete(['id_barang' => $id]);
  }
}
