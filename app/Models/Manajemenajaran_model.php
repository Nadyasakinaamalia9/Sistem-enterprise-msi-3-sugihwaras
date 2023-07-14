<?php

namespace App\Models;

use CodeIgniter\Model;

class Manajemenajaran_model extends Model
{
  protected $table = 'manajemen_ajaran';
  protected $primaryKey = 'tahun_ajaran';

  public function getCategory($id = false)
  {
    # code...
    if ($id == false) {

      return $this->findAll();
    } else {
      return $this->getWhere(['tahun_ajaran' => $id]);
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
    return $this->db->table($this->table)->update($data, ['tahun_ajaran' => $id]);
  }

  public function deleteCategory($id)
  {
    # code...
    return $this->db->table($this->table)->delete(['tahun_ajaran' => $id]);
  }
}
