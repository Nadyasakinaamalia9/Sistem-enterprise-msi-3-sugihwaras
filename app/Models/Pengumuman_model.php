<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengumuman_model extends Model
{
  protected $table = 'pengumuman';
  // protected $primaryKey = 'id';
  public function getCategory($id = false)
  {
    # code...
    if ($id == false) {

      return $this->findAll();
    } else {
      return $this->getWhere(['id' => $id]);
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
    return $this->db->table($this->table)->update($data, ['konten' => $id]);
  }

  public function deleteCategory($id)
  {
    # code...
    return $this->db->table($this->table)->delete(['id' => $id]);
  }
}
