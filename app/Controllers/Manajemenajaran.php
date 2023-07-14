<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Manajemenajaran_model;
use App\Models\Manajemenkelas_model;

class Manajemenajaran extends BaseController
{
  protected $model;
  public function __construct()
  {
    helper(['form']);
    $this->model = new Manajemenajaran_model();
  }

  public function index()
  {
    $model = new Manajemenajaran_model();
    $keyword = $this->request->getGet('keyword');
    $data['keyword'] = $keyword;

    $where = [];
    $like = [];
    $or_like = [];

    if (!empty($keyword)) {
      $like = ['tahun_ajaran' => $keyword];
      $or_like = ['jumlah_kelas' => $keyword, 'kurikulum' => $keyword];
    }

    $paginate = 2;
    $data['dosen0072'] = $model->where($where)->like($like)->orLike($or_like)->paginate($paginate, 'manajemenajaran');
    $data['pager'] = $model->pager;
    // $data['nomor'] = ($this->request->getGet('page_manajemenajaran') ?? 1) * $paginate - $paginate;
    $nomor = $this->request->getGet('page_manajemenajaran');
    // define $nomor = 1 jika tidak ada get page_product 
    if ($nomor == null) {
      $nomor = 1;
    }
    $data['nomor'] = ($nomor - 1) * $paginate;


    echo view('manajemenajaran/idx21', $data);
  }


  public function create21()
  {
    # code...

    return view('manajemenajaran/create21');
  }

  public function store21()
  {
    $validation =  \Config\Services::validation();

    $data = array(
      'tahun_ajaran'         => $this->request->getPost('tahun_ajaran'),
      'jumlah_kelas'         => $this->request->getPost('jumlah_kelas'),
      'kurikulum'    => $this->request->getPost('kurikulum')
    );

    if ($validation->run($data, 'manajemenajaran') == FALSE) {
      session()->setFlashdata('inputs', $this->request->getPost());
      session()->setFlashdata('errors', $validation->getErrors());
      return redirect()->to(base_url('manajemenajaran/create21'));
    } else {
      $this->model = new Manajemenajaran_model();
      $simpan = $this->model->insertCategory($data);
      if ($simpan) {
        session()->setFlashdata('dark', 'Created Successfully');
        return redirect()->to(base_url('manajemenajaran'));
      }
    }
  }

  public function edit21($id)
  {
    $model = new Manajemenajaran_model();
    $data['manajemenajaran'] = $model->getCategory($id)->getRowArray();

    // Check if the data is found
    if ($data['manajemenajaran']) {
      echo view('manajemenajaran/edit21', $data);
    } else {
      // Handle the case when data is not found
      return redirect()->to(base_url('manajemenajaran'));
    }
  }

  // public function edit21($id)
  // {
  //   $model = new Manajemenajaran_model();
  //   $data['manajemenajaran'] = $model->getCategory($id)->getRowArray();
  //   return view('manajemenajaran/edit21', $data); // Add 'return' statement
  // }

  // public function update21()
  // {
  //   # code...
  //   $id = $this->request->getPost('tahun_ajaran');
  //   $validation = \Config\Services::validation();


  //   // if (empty($name)) {
  //   // }
  //   $data = array(
  //     'tahun_ajaran'         => $this->request->getPost('tahun_ajaran'),
  //     'jumlah_kelas'         => $this->request->getPost('jumlah_kelas'),
  //     'kurikulum'    => $this->request->getPost('kurikulum')
  //   );
  //   // dd($data);
  //   if ($validation->run($data, 'manajemenajaran') == FALSE) {
  //     session()->setFlashdata('inputs', $this->request->getPost());
  //     session()->setFlashdata('errors', $validation->getErrors());
  //     return redirect()->to(base_url('manajemenajaran/edit21/' . $id));
  //   } else {
  //     $this->model = new Manajemenkelas_model();

  //     $ubah = $this->model->updateCategory($data, $id);
  //     if ($ubah) {
  //       session()->setFlashdata('info', 'Updated Successfully');
  //       return redirect()->to(base_url('manajemenajaran'));
  //     }
  //   }
  // }

  public function update21()
  {
    $id = $this->request->getPost('tahun_ajaran');
    $validation = \Config\Services::validation();

    $data = array(
      'tahun_ajaran' => $this->request->getPost('tahun_ajaran'),
      'jumlah_kelas' => $this->request->getPost('jumlah_kelas'),
      'kurikulum'    => $this->request->getPost('kurikulum'),
    );

    if ($validation->run($data, 'manajemenajaran') == FALSE) {
      session()->setFlashdata('inputs', $this->request->getPost());
      session()->setFlashdata('errors', $validation->getErrors());
      return redirect()->to(base_url('manajemenajaran/edit21/' . $id));
    } else {
      $model = new Manajemenajaran_model();
      $ubah = $model->updateCategory($data, $id);
      if ($ubah) {
        session()->setFlashdata('info', 'Updated Manajemen Ajaran Successfully');
        return redirect()->to(base_url('manajemenajaran/edit21/' . $id)); // Redirect to edit21 method
      }
    }
  }


  public function show21($id)
  {
    $this->model = new Manajemenajaran_model();
    //$data['category'] = $this->Category_model->getCategory($id);
    $data['manajemenajaran'] = $this->model->getCategory($id)->getRowArray();
    echo view('manajemenajaran/show21', $data);
  }


  public function delete21($id)
  {
    $this->model = new Manajemenajaran_model();
    $hapus = $this->model->deleteCategory($id);
    if ($hapus) {
      session()->setFlashdata('warning', 'Deleted Manajemen ajaran Succesfully');
      return redirect()->to(base_url('manajemenajaran'));
    }
  }
}
