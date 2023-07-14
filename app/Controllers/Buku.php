<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Buku_model;
use App\Models\Emis_model;
use App\Models\Dataguru_model;

class Buku extends BaseController
{
    protected $model;
    protected $nismodel;
    protected $gurumodel;
    public function __construct()
    {
        helper(['form']);
        $this->model = new Buku_model();
        $this->nismodel = new Emis_model();
        $this->gurumodel = new Dataguru_model();
    }

    public function index()
    {
        # code...
        //$model = new Category_model();
        //$data['obat0014'] = $model->getCategory();
        $this->model = new Buku_model();

        // Filtering 
        //$category   =   $this->request->getGet('category');
        $keyword    =   $this->request->getGet('keyword');

        //$data['category']   =   $category; 
        $data['keyword']    =   $keyword;

        $obat0014     =   $this->model->where('beban_pembayaran')->findAll();
        $data['Pegawai'] = ['' => 'Pilih Category'] + array_column($obat0014, 'nama', 'id_pegawai');

        // filter 
        $where      = [];
        $like       = [];
        $or_like    = [];

        //if(!empty($category)){ 
        //    $where = ['products.category_id' => $category]; 
        //}

        if (!empty($keyword)) {
            $like = ['nis' => $keyword];
            $or_like = ['id_pegawai' => $keyword, 'nis' => $keyword];
        }
        // end filter

        // paginate 
        $paginate = 6;
        //$data['obat0014'] = $model->paginate($paginate, 'category'); 
        $data['dosen0072'] = $this->model->where($where)->like($like)->orLike($or_like)->paginate($paginate, 'category');
        $data['pager'] = $this->model->pager;
        // generate number untuk tetap bertambah meskipun pindah halaman paginate 
        $nomor = $this->request->getGet('page_category');
        // define $nomor = 1 jika tidak ada get page_product 
        if ($nomor == null) {
            $nomor = 1;
        }
        $data['nomor'] = ($nomor - 1) * $paginate;
        // end generate number

        echo view('buku/idx6', $data);
    }

    public function create6()
    {
        # code...
        $data['datanis'] = $this->nismodel->findAll();
        $data['datapegawai'] = $this->gurumodel->findAll();
        return view('buku/create6', $data);
    }

    public function store6()
    {
        $validation =  \Config\Services::validation();

        $data = array(
            'nis'         => $this->request->getPost('nis'),
            'tanggal_bayar'         => $this->request->getPost('tanggal_bayar'),
            'nama_buku'    => $this->request->getPost('nama_buku'),
            'beban_pembayaran'        => $this->request->getPost('beban_pembayaran'),
            'id_pegawai'        => $this->request->getPost('id_pegawai'),
        );

        if ($validation->run($data, 'buku') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('buku/create6'));
        } else {
            $model = new Buku_model();
            $simpan = $model->insertCategory($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Created Successfully');
                return redirect()->to(base_url('buku'));
            }
        }
    }
    public function delete6($id)
    {
        $model = new Buku_model();
        $hapus = $model->deleteCategory($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Deleted Buku Succesfully');
            return redirect()->to(base_url('buku'));
        }
    }
}
