<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Manajemenkelas_model;
use App\Models\Manajemenajaran_model;
use App\Models\Emis_model;

class Manajemenkelas extends BaseController
{
    protected $ajaranmodel;
    protected $model;
    public function __construct()
    {
        helper(['form']);
        // $model = new Emis_model();
        $this->model = new Manajemenkelas_model();
        // $this->modelajaran = new Emis_model();
        $this->ajaranmodel = new Manajemenajaran_model();
    }

    public function index()
    {
        # code...
        //$model = new Category_model();
        //$data['obat0014'] = $model->getCategory();
        $model = new Manajemenkelas_model();

        // Filtering 
        //$category   =   $this->request->getGet('category');
        $keyword    =   $this->request->getGet('keyword');

        //$data['category']   =   $category; 
        $data['keyword']    =   $keyword;

        $obat0014     =   $model->where('tahun_ajaran')->findAll();
        $data['manajemenkelas'] = ['' => 'Pilih Category'] + array_column($obat0014, 'kelas', 'laki_laki');

        // filter 
        $where      = [];
        $like       = [];
        $or_like    = [];

        //if(!empty($category)){ 
        //    $where = ['products.category_id' => $category]; 
        //}

        if (!empty($keyword)) {
            $like = ['tahun_ajaran' => $keyword];
            $or_like = ['kelas' => $keyword, 'laki_laki' => $keyword, 'perempuan' => $keyword];
        }
        // end filter

        // paginate 
        $paginate = 15;
        //$data['obat0014'] = $model->paginate($paginate, 'category'); 
        $data['dosen0072'] = $model->where($where)->like($like)->orLike($or_like)->paginate($paginate, 'manajemenkelas');
        $data['pager'] = $model->pager;
        // generate number untuk tetap bertambah meskipun pindah halaman paginate 
        $nomor = $this->request->getGet('page_manajemenkelas');
        // define $nomor = 1 jika tidak ada get page_product 
        if ($nomor == null) {
            $nomor = 1;
        }
        $data['nomor'] = ($nomor - 1) * $paginate;
        // end generate number

        echo view('manajemenkelas/idx22', $data);
    }

    public function create22()
    {
        # code...
        $data['tahun_ajaran'] = $this->ajaranmodel->findAll();
        return view('manajemenkelas/create22', $data);
    }

    public function store22()
    {
        $validation =  \Config\Services::validation();

        $data = array(
            'tahun_ajaran'         => $this->request->getPost('tahun_ajaran'),
            'kelas'         => $this->request->getPost('kelas'),
            'laki_laki'    => $this->request->getPost('laki_laki'),
            'perempuan'        => $this->request->getPost('perempuan'),
        );

        if ($validation->run($data, 'manajemenkelas') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('manajemenkelas/create22'));
        } else {
            $model = new Manajemenkelas_model();
            $simpan = $model->insertCategory($data);
            if ($simpan) {
                session()->setFlashdata('dark', 'Created Successfully');
                return redirect()->to(base_url('manajemenkelas'));
            }
        }
    }

    public function edit22($id)
    {
        # code...
        $model = new Manajemenkelas_model();
        $data['manajemenkelas'] = $model->getCategory($id)->getRowArray();
        // dd($data);
        echo view('manajemenkelas/edit22', $data);
    }

    public function update22()
    {
        # code...
        $id = $this->request->getPost('kelas');
        $validation = \Config\Services::validation();


        // if (empty($name)) {
        // }
        $data = array(
            'tahun_ajaran'         => $this->request->getPost('tahun_ajaran'),
            'kelas'         => $this->request->getPost('kelas'),
            'laki_laki'    => $this->request->getPost('laki_laki'),
            'perempuan'        => $this->request->getPost('perempuan'),
        );
        // dd($data);
        if ($validation->run($data, 'manajemenkelas') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('manajemenkelas/edit22/' . $id));
        } else {
            $model = new Manajemenkelas_model();

            $ubah = $model->updateCategory($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated Successfully');
                return redirect()->to(base_url('manajemenkelas'));
            }
        }
    }


    public function show22($id)
    {
        $model = new Manajemenkelas_model();
        //$data['category'] = $this->Category_model->getCategory($id);
        $data['manajemenkelas'] = $model->getCategory($id)->getRowArray();
        echo view('manajemenkelas/show22', $data);
    }


    public function delete22($id)
    {
        $model = new Manajemenkelas_model();
        $hapus = $model->deleteCategory($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Deleted Category Succesfully');
            return redirect()->to(base_url('manajemenkelas'));
        }
    }
}
