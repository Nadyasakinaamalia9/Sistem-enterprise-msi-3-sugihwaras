<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pembelajaran_model;
use App\Models\Manajemenkelas_model;
use App\Models\Manajemenajaran_model;

class Pembelajaran extends BaseController
{
    protected $model;
    protected $pembelajaran_model;

    public function __construct()
    {
        helper(['form']);
        $this->model = new Pembelajaran_model();
    }

    public function index()
    {
        # code...
        //$model = new Category_model();
        //$data['obat0014'] = $model->getCategory();
        // $model = new Pembelajaran_model();

        // Filtering 
        //$category   =   $this->request->getGet('category');
        $keyword    =   $this->request->getGet('keyword');

        //$data['category']   =   $category; 
        $data['keyword']    =   $keyword;

        // $obat0014     =   $model->findAll();
        // $data['Pembelajaran'] = ['' => 'Pilih Category'] + array_column($obat0014, 'file', 'id_pembelajaran');

        // filter 
        $where      = [];
        $like       = [];
        $or_like    = [];

        //if(!empty($category)){ 
        //    $where = ['products.category_id' => $category]; 
        //}

        if (!empty($keyword)) {
            $like = ['tahun_ajaran' => $keyword];
            $or_like = ['id_pembelajaran' => $keyword, 'file' => $keyword, 'kelas' => $keyword];
        }
        // end filter

        // paginate 
        $paginate = 15;
        //$data['obat0014'] = $model->paginate($paginate, 'category'); 
        $data['dosen0072'] = $this->model->where($where)->like($like)->orLike($or_like)->paginate($paginate, 'pembelajaran');
        $data['pager'] = $this->model->pager;
        // generate number untuk tetap bertambah meskipun pindah halaman paginate 
        $nomor = $this->request->getGet('page_pembelajaran');
        // define $nomor = 1 jika tidak ada get page_product 
        if ($nomor == null) {
            $nomor = 1;
        }
        $data['nomor'] = ($nomor - 1) * $paginate;
        // end generate number

        echo view('pembelajaran/idx11', $data);
    }

    public function create11()
    {
        # code...
        // $config['upload_path'] = 'public/uploads/';
        // $config['allowed_types'] = 'pdf|doc|docx';
        // $config['max_size'] = 0;
        // $this->model->library('upload', $config);
        $data['kelas'] = $this->model->getKelas();
        $data['tahun_ajaran'] = $this->model->getTahunajaran();
        // return view('pembelajaran/create11');
        return view('pembelajaran/create11', $data);
    }

    public function store11()
    {
        $validation =  \Config\Services::validation();
        $filename = $this->request->getFile('file');
        $name = $filename->getName();
        // $name = $filename->getExtension() == 'pdf';
        $data = array(
            'id_pembelajaran'    => $this->request->getPost('id_pembelajaran'),
            'tahun_ajaran'        => $this->request->getPost('tahun_ajaran'),
            'kelas'        => $this->request->getPost('kelas'),
            'file'       => $name,
        );

        if ($validation->run($data, 'pembelajaran') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('pembelajaran/create11'));
        } else {
            $model = new Pembelajaran_model();
            $filename->move(ROOTPATH . 'public/uploads', $name);
            $simpan = $model->insertCategory($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Created Successfully');
                return redirect()->to(base_url('pembelajaran'));
            }
        }
    }
    public function viewPdf()
    {
        $filename = $this->request->getFile('file');
        $pdfFilePath = ROOTPATH . 'public/uploads/' . $filename;

        if (file_exists($pdfFilePath)) {
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="design db msi3_baru.pdf"');
            readfile($pdfFilePath);
            exit;
        } else {
            echo "File PDF tidak ditemukan.";
        }
    }

    public function edit11($id)
    {
        # code...
        $model = new Pembelajaran_model();
        $data['pembelajaran'] = $model->getCategory($id)->getRowArray();
        echo view('pembelajaran/edit11', $data);
    }

    public function update11()
    {
        # code...
        $id = $this->request->getPost('id_pembelajaran');
        $validation = \Config\Services::validation();
        $filename = $this->request->getFile('file');
        $name = $filename->getName();
        $data = array(
            'id_pembelajaran'    => $this->request->getPost('id_pembelajaran'),
            'tahun_ajaran'        => $this->request->getPost('tahun_ajaran'),
            'kelas'        => $this->request->getPost('kelas'),
            'file' => $name
        );

        if ($validation->run($data, 'pembelajaran') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('pembelajaran/edit11/' . $id));
        } else {
            $model = new Pembelajaran_model();
            $filename->move(ROOTPATH . 'public/uploads', $name);
            $ubah = $model->updateCategory($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated Successfully');
                return redirect()->to(base_url('pembelajaran'));
            }
        }
    }

    public function show11($id)
    {
        $model = new Pembelajaran_model();
        //$data['category'] = $this->Category_model->getCategory($id);
        $data['pembelajaran'] = $model->getCategory($id)->getRowArray();
        echo view('pembelajaran/show11', $data);
    }

    public function delete11($id)
    {
        $model = new Pembelajaran_model();
        $hapus = $model->deleteCategory($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Deleted Category Succesfully');
            return redirect()->to(base_url('pembelajaran'));
        }
    }
}
