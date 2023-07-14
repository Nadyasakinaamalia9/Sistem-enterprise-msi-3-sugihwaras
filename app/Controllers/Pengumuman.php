<?php

namespace App\Controllers;

use App\Models\Category_model;
use CodeIgniter\Controller;
use App\Models\Pengumuman_model;

class Pengumuman extends BaseController
{
  protected $model;
  protected $ppdbmodel;
  public function __construct()
  {
    helper(['form']);
    $this->model = new Pengumuman_model();
    // $this->ppdbmodel = new Category_model();
  }

  public function index()
  {
    //////////////////////////
    // $this->model = new Pengumuman_model();
    // $filterData = [
    //     'nama' => $this->request->getVar('nama') // Mendapatkan nilai filter dari request
    // ];

    // $data['filter'] = $this->model->getFilteredData($filterData); // Mendapatkan data yang telah difilter
    ////////////////////////

    $keyword    =   $this->request->getGet('keyword');

    $data['keyword']    =   $keyword;


    // filter 
    $where      = [];
    $like       = [];
    $or_like    = [];


    if (!empty($keyword)) {
      $like = ['id' => $keyword];
      $or_like = ['konten' => $keyword, 'tanggal' => $keyword];
    }
    // end filter

    // paginate 
    $paginate = 15;
    $data['dosen0072'] = $this->model->where($where)->like($like)->orLike($or_like)->orderBy('id', 'ASC')->paginate($paginate, 'pengumuman');
    $data['pager'] = $this->model->pager;

    $nomor = $this->request->getGet('page_pengumuman');

    if ($nomor == null) {
      $nomor = 1;
    }
    $data['nomor'] = ($nomor - 1) * $paginate;
    // end generate number

    echo view('pengumuman/idx24', $data);
  }

  public function create24()
  {
    // # code...
    // $data['datappdb'] = $this->ppdbmodel->findAll();
    // $data['tahun_ajaran'] = $this->model->getTahunajaran();
    return view('pengumuman/create24');
  }

  public function store24()
  {
    $validation =  \Config\Services::validation();

    // $filename = $this->request->getFile('foto');
    // // dd($filename);  
    // $name = $filename->getName();

    $data = array(
      'konten'         => $this->request->getPost('konten'),
      'tanggal'         => $this->request->getPost('tanggal'),
    );

    if ($validation->run($data, 'pengumuman') == FALSE) {
      session()->setFlashdata('inputs', $this->request->getPost());
      session()->setFlashdata('errors', $validation->getErrors());
      return redirect()->to(base_url('pengumuman/create24'));
    } else {
      $model = new Pengumuman_model();
      // $filename->move(ROOTPATH . 'public/uploads', $name);
      $simpan = $model->insertCategory($data);
      if ($simpan) {
        session()->setFlashdata('danger', 'Created Data Siswa Successfully');
        return redirect()->to(base_url('pengumuman'));
      }
    }
  }

  public function edit24($id)
  {
    # code...
    $model = new Pengumuman_model();
    $data['pengumuman'] = $model->getCategory($id)->getRowArray();
    echo view('pengumuman/edit24', $data);
  }

  public function update24()
  {
    # code...
    $id = $this->request->getPost('id');
    $validation = \Config\Services::validation();
    // $filename = $this->request->getFile('foto');
    // $name = $filename->getName();
    // if (empty($name)) {
    // }
    $data = array(
      'konten'         => $this->request->getPost('konten'),
      'tanggal'         => $this->request->getPost('tanggal'),

    );

    if ($validation->run($data, 'pengumuman') == FALSE) {
      session()->setFlashdata('inputs', $this->request->getPost());
      session()->setFlashdata('errors', $validation->getErrors());
      return redirect()->to(base_url('pengumuman/edit24/' . $id));
    } else {
      $model = new Pengumuman_model();
      // $filename->move(ROOTPATH . 'public/uploads', $name);
      $ubah = $model->updateCategory($data, $id);
      if ($ubah) {
        session()->setFlashdata('info', 'Updated Successfully');
        return redirect()->to(base_url('pengumuman'));
      }
    }
  }

  public function show24($id)
  {
    $model = new Pengumuman_model();
    //$data['category'] = $this->Category_model->getCategory($id);
    // $data['Pengumuman'] = $model->getCategory($id)->getRowArray();
    $data['pengumuman'] = $model->getCategory($id)->getRowArray();
    echo view('pengumuman/show24', $data);
  }


  public function delete24($id)
  {
    $model = new Pengumuman_model();
    $hapus = $model->deleteCategory($id);
    if ($hapus) {
      session()->setFlashdata('warning', 'Deleted Data Siswa Succesfully');
      return redirect()->to(base_url('pengumuman'));
    }
  }
}
