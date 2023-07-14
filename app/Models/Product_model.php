<?php
namespace App\Models;

use CodeIgniter\Model;

class Product_model extends Model
{
    protected $table        = 'products';

    public function getProduct($id = false)
    {
        # code...
        if ($id == false){
            return $this->findAll();
        }else{
            return $this->getWhere(['category_id' => $id ]);
        }
    }

    public function insertProduct($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateProduct($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['product_id' => $id]);
    }

    public function deleteProduct($id) 
    { 
        return $this->db->table($this->table)->delete(['product_id' => $id]);
    }
     
}