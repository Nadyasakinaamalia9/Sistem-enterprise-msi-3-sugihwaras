<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Datanilai_model;
use App\Models\Emis_model;

class Datanilai extends BaseController
{
    protected $model;
    protected $emismodel;
    public function __construct()
    {
        helper(['form']);
        $this->model = new Datanilai_model();
        $this->emismodel = new Emis_model();
    }

    public function index()
    {
        # code...
        //$model = new Category_model();
        //$data['obat0014'] = $model->getCategory();
        $model = new Datanilai_model();

        // Filtering 
        //$category   =   $this->request->getGet('category');
        $keyword    =   $this->request->getGet('keyword');

        //$data['category']   =   $category; 
        $data['keyword']    =   $keyword;

        $obat0014     =   $model->where('bhs_indonesia')->findAll();
        $data['nilai'] = ['' => 'Pilih Category'] + array_column($obat0014, 'bhs_indonesia', 'nis');

        // filter 
        $where      = [];
        $like       = [];
        $or_like    = [];

        //if(!empty($category)){ 
        //    $where = ['products.category_id' => $category]; 
        //}

        if (!empty($keyword)) {
            $like = ['nis' => $keyword];
            $or_like = ['bhs_indonesia' => $keyword, 'bhs_inggris' => $keyword, 'matematika' => $keyword];
        }
        // end filter

        // paginate 
        $paginate = 15;
        //$data['obat0014'] = $model->paginate($paginate, 'category'); 
        $data['dosen0072'] = $model->where($where)->like($like)->orLike($or_like)->paginate($paginate, 'datanilai');
        $data['pager'] = $model->pager;
        // generate number untuk tetap bertambah meskipun pindah halaman paginate 
        $nomor = $this->request->getGet('page_datanilai');
        // define $nomor = 1 jika tidak ada get page_product 
        if ($nomor == null) {
            $nomor = 1;
        }
        $data['nomor'] = ($nomor - 1) * $paginate;
        // end generate number

        echo view('datanilai/idx8', $data);
    }

    public function create8()
    {
        # code...

        $data['datanis'] = $this->emismodel->findAll();
        return view('datanilai/create8', $data);
    }

    public function create24()
    {
        # code...

        $data['datanis'] = $this->emismodel->findAll();
        return view('datanilai/create24', $data);
    }

    public function store8()
    {
        $validation = \Config\Services::validation();

        $data = array(
            'nis' => $this->request->getPost('nis'),
            'bhs_indonesia' => $this->request->getPost('bhs_indonesia'),
            'bhs_inggris' => $this->request->getPost('bhs_inggris'),
            'matematika' => $this->request->getPost('matematika'),
            'ipa' => $this->request->getPost('ipa'),
            'ips' => $this->request->getPost('ips'),
            'agama' => $this->request->getPost('agama'),
        );

        // Validasi input
        if ($validation->run($data, 'datanilai') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('datanilai/create8'));
        } else {
            $model = new Datanilai_model();

            // Cek apakah NIS sudah ada dalam database
            $existingData = $model->getCategory($this->request->getPost('nis'))->getRow();
            if ($existingData) {
                session()->setFlashdata('error', 'Data dengan NIS tersebut sudah tersedia.');
                return redirect()->to(base_url('datanilai/create8'));
            }

            // Simpan data ke database
            $model->insertCategory($data);

            session()->setFlashdata('success', 'Data berhasil disimpan.');
            return redirect()->to(base_url('datanilai'));
        }
    }

    public function store24()
    {
        $validation =  \Config\Services::validation();

        $data = array(
            'nis'         => $this->request->getPost('nis'),
        );

        if ($validation->run($data, 'pengajuanhasil') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('datanilai/create24'));
        } else {
            $model = new Datanilai_model();
            $simpan = $model->insertCategory($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Created Successfully');
                return redirect()->to(base_url('datanilai'));
            }
        }
    }

    public function edit8($id)
    {
        # code...
        $model = new Datanilai_model();
        $data['datanilai'] = $model->getCategory($id)->getRowArray();
        echo view('datanilai/edit8', $data);
    }

    public function update8()
    {
        # code...
        $id = $this->request->getPost('nis');
        $validation = \Config\Services::validation();

        $data = array(
            'nis'         => $this->request->getPost('nis'),
            'bhs_indonesia'         => $this->request->getPost('bhs_indonesia'),
            'bhs_inggris'    => $this->request->getPost('bhs_inggris'),
            'matematika'        => $this->request->getPost('matematika'),
            'ipa'        => $this->request->getPost('ipa'),
            'ips'       => $this->request->getPost('ips'),
            'agama'       => $this->request->getPost('agama'),
        );

        if ($validation->run($data, 'datanilai') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('datanilai/edit8/' . $id));
        } else {
            $model = new Datanilai_model();
            $ubah = $model->updateCategory($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated Successfully');
                return redirect()->to(base_url('datanilai'));
            }
        }
    }

    public function show8($id)
    {
        $model = new Datanilai_model();
        //$data['category'] = $this->Category_model->getCategory($id);
        $data['datanilai'] = $model->getCategory($id)->getRowArray();
        echo view('datanilai/show8', $data);
    }


    public function delete8($id)
    {
        $model = new Datanilai_model();
        $hapus = $model->deletenilai($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Deleted Category Succesfully');
            return redirect()->to(base_url('datanilai'));
        }
    }
}
