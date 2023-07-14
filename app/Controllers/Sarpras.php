<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Sarpras_model;

class Sarpras extends BaseController
{
  public function __construct()
  {
    helper(['form']);
    $model = new Sarpras_model();
  }

  public function index()
  {
    # code...
    //$model = new Category_model();
    //$data['obat0014'] = $model->getCategory();
    $model = new Sarpras_model();

    // Filtering 
    //$category   =   $this->request->getGet('category');
    $keyword    =   $this->request->getGet('keyword');

    //$data['category']   =   $category; 
    $data['keyword']    =   $keyword;

    $obat0014     =   $model->where('status')->findAll();
    $data['Pegawai'] = ['' => 'Pilih Category'] + array_column($obat0014, 'id_barang', 'tanggal');

    // filter 
    $where      = [];
    $like       = [];
    $or_like    = [];

    //if(!empty($category)){ 
    //    $where = ['products.category_id' => $category]; 
    //}

    if (!empty($keyword)) {
      $like = ['id_barang' => $keyword];
      $or_like = ['id_pegawai' => $keyword, 'id_barang' => $keyword];
    }
    // end filter

    // paginate 
    $paginate = 15;
    //$data['obat0014'] = $model->paginate($paginate, 'category'); 
    $data['dosen0072'] = $model->where($where)->like($like)->orLike($or_like)->paginate($paginate, 'category');
    $data['pager'] = $model->pager;
    // generate number untuk tetap bertambah meskipun pindah halaman paginate 
    $nomor = $this->request->getGet('page_category');
    // define $nomor = 1 jika tidak ada get page_product 
    if ($nomor == null) {
      $nomor = 1;
    }
    $data['nomor'] = ($nomor - 1) * $paginate;
    // end generate number

    echo view('sarpras/idx12', $data);
  }

  public function create12()
  {
    # code...
    return view('sarpras/create12');
  }

  public function store12()
  {
    $validation =  \Config\Services::validation();

    $data = array(
      'id_barang'         => $this->request->getPost('id_barang'),
      'tanggal'         => $this->request->getPost('tanggal'),
      'keterangan'    => $this->request->getPost('keterangan'),
      'status'        => $this->request->getPost('status')
      // 'jumlah'        => $this->request->getPost('jumlah')
    );

    if ($validation->run($data, 'sarpras') == FALSE) {
      session()->setFlashdata('inputs', $this->request->getPost());
      session()->setFlashdata('errors', $validation->getErrors());
      return redirect()->to(base_url('sarpras/create12'));
    } else {
      $model = new Sarpras_model();
      $simpan = $model->insertCategory($data);
      if ($simpan) {
        session()->setFlashdata('success', 'Created Manajemen Sarpras Successfully');
        return redirect()->to(base_url('sarpras'));
      }
    }
  }
  public function edit12($id)
  {
    # code...
    $model = new Sarpras_model();
    $data['sarpras'] = $model->getCategory($id)->getRowArray();
    echo view('sarpras/edit12', $data);
  }

  public function update12()
  {
    # code...
    $id = $this->request->getPost('id_barang');
    $validation = \Config\Services::validation();

    $data = array(

      'id_barang'    => $this->request->getPost('id_barang'),
      'tanggal'         => $this->request->getPost('tanggal'),
      'keterangan'         => $this->request->getPost('keterangan'),
      'status'        => $this->request->getPost('status'),
      'jumlah'        => $this->request->getPost('jumlah'),
    );

    if ($validation->run($data, 'sarpras') == FALSE) {
      session()->setFlashdata('inputs', $this->request->getPost());
      session()->setFlashdata('errors', $validation->getErrors());
      return redirect()->to(base_url('sarpras/edit12/' . $id));
    } else {
      $model = new Sarpras_model();
      $ubah = $model->updateCategory($data, $id);
      if ($ubah) {
        session()->setFlashdata('info', 'Updated Sarpras Successfully');
        return redirect()->to(base_url('sarpras'));
      }
    }
  }

  public function delete12($id)
  {
    $model = new Sarpras_model();
    $hapus = $model->deleteSarpras($id);
    if ($hapus) {
      session()->setFlashdata('warning', 'Deleted Category Succesfully');
      return redirect()->to(base_url('sarpras'));
    }
  }
}
