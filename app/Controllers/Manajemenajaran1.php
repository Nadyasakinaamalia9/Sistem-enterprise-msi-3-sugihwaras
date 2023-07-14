<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Manajemenajaran1_model;

class Manajemenajaran1 extends BaseController
{
    public function __construct()
    {
        helper(['form']);
        $model = new Manajemenajaran1_model();
    }

    public function index()
    {
        # code...
        //$model = new Category_model();
        //$data['obat0014'] = $model->getCategory();
        $model = new Manajemenajaran1_model();

        // Filtering 
        //$category   =   $this->request->getGet('category');
        $keyword    =   $this->request->getGet('keyword');

        //$data['category']   =   $category; 
        $data['keyword']    =   $keyword;

        $obat0014     =   $model->where('tahun_ajaran')->findAll();
        $data['manajemenajaran1'] = ['' => 'Pilih Category'] + array_column($obat0014, 'jumlah_kelas', 'kurikulum');

        // filter 
        $where      = [];
        $like       = [];
        $or_like    = [];

        //if(!empty($category)){ 
        //    $where = ['products.category_id' => $category]; 
        //}

        if (!empty($keyword)) {
            $like = ['tahun_ajaran' => $keyword];
            $or_like = ['jumlah_kelas' => $keyword, 'kurikulum' => $keyword];
        }
        // end filter

        // paginate 
        $paginate = 15;
        //$data['obat0014'] = $model->paginate($paginate, 'category'); 
        $data['dosen0072'] = $model->where($where)->like($like)->orLike($or_like)->paginate($paginate, 'manajemenajaran1');
        $data['pager'] = $model->pager;
        // generate number untuk tetap bertambah meskipun pindah halaman paginate 
        $nomor = $this->request->getGet('page_manajemenajaran1');
        // define $nomor = 1 jika tidak ada get page_product 
        if ($nomor == null) {
            $nomor = 1;
        }
        $data['nomor'] = ($nomor - 1) * $paginate;
        // end generate number

        echo view('manajemenajaran1/idx23', $data);
    }

    public function create23()
    {
        # code...

        return view('manajemenajaran1/create23');
    }

    public function store23()
    {
        $validation =  \Config\Services::validation();

        $data = array(
            'tahun_ajaran'         => $this->request->getPost('tahun_ajaran'),
            'jumlah_kelas'         => $this->request->getPost('jumlah_kelas'),
            'kurikulum'    => $this->request->getPost('kurikulum'),
        );

        if ($validation->run($data, 'manajemenajaran1') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('manajemenajaran1/create23'));
        } else {
            $model = new Manajemenajaran1_model();
            $simpan = $model->insertCategory($data);
            if ($simpan) {
                session()->setFlashdata('dark', 'Created Successfully');
                return redirect()->to(base_url('manajemenajaran1'));
            }
        }
    }

    public function edit23($id, $id2)
    {
        # code...
        $model = new Manajemenajaran1_model();
        $data['manajemenajaran1'] = $model->getCategory($id, $id2)->getRowArray();
        // dd($data);
        echo view('manajemenajaran1/edit23', $data);
    }

    public function update23()
    {
        # code...
        $id = $this->request->getPost('tahun_ajaran');
        $validation = \Config\Services::validation();


        // if (empty($name)) {
        // }
        $data = array(
            'tahun_ajaran'         => $this->request->getPost('tahun_ajaran'),
            'jumlah_kelas'         => $this->request->getPost('jumlah_kelas'),
            'kurikulum'    => $this->request->getPost('kurikulum'),
        );
        // dd($data);
        if ($validation->run($data, 'manajemenajaran1') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('manajemenajaran1/edit23/' . $id));
        } else {
            $model = new Manajemenajaran1_model();

            $ubah = $model->updateCategory($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated Successfully');
                return redirect()->to(base_url('manajemenajaran1'));
            }
        }
    }


    public function show23($id)
    {
        $model = new Manajemenajaran1_model();
        //$data['category'] = $this->Category_model->getCategory($id);
        $data['manajemenajaran1'] = $model->getCategory($id)->getRowArray();
        echo view('manajemenajaran1/show23', $data);
    }


    public function delete23($id)
    {
        $model = new Manajemenajaran1_model();
        $hapus = $model->deleteCategory($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Deleted Category Succesfully');
            return redirect()->to(base_url('manajemenajaran1'));
        }
    }
}
