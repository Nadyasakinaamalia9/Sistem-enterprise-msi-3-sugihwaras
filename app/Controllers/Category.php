<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Category_model;

class Category extends BaseController
{
    public function __construct()
    {
        helper(['form']);
        $model = new Category_model();
    }

    public function index()
    {
        # code...
        //$model = new Category_model();
        //$data['obat0014'] = $model->getCategory();
        $model = new Category_model();
        
        // Filtering 
        //$category   =   $this->request->getGet('category');
        $keyword    =   $this->request->getGet('keyword');

        //$data['category']   =   $category; 
        $data['keyword']    =   $keyword;

        $obat0014     =   $model->where('tmpt_tinggal', 'orang tua')->findAll(); 
        $data['ppdb'] = ['' => 'Pilih Category'] + array_column($obat0014, 'nama', 'id_daftar'); 

        // filter 
        $where      = []; 
        $like       = []; 
        $or_like    = []; 

        //if(!empty($category)){ 
        //    $where = ['products.category_id' => $category]; 
        //}
            
        if(!empty($keyword)){ 
            $like = ['nisn' => $keyword]; 
            $or_like = ['id_daftar' => $keyword, 'nik' => $keyword, 'nama' => $keyword]; 
        }
        // end filter

        // paginate 
        $paginate = 6;
        //$data['obat0014'] = $model->paginate($paginate, 'category'); 
        //$data['dosen0072'] = $model->where($where)->like($like)->orLike($or_like)->paginate($paginate, 'category'); 
        $data['spp'] = $this->
        $data['pager'] = $model->pager; 
        // generate number untuk tetap bertambah meskipun pindah halaman paginate 
        $nomor = $this->request->getGet('page_category'); 
        // define $nomor = 1 jika tidak ada get page_product 
        if($nomor == null){ 
            $nomor = 1; 
        } 
        $data['nomor'] = ($nomor - 1) * $paginate; 
        // end generate number

        echo view('category/index', $data);
    }

    public function create()
    {
        # code...
        return view('category/create');
    }

    public function store()
    {
        $validation =  \Config\Services::validation();

        $data = array(
            'id_daftar'         => $this->request->getPost('id_daftar'),
            'nisn'         => $this->request->getPost('nisn'),
            'nik'    => $this->request->getPost('nik'),
            'nama'        => $this->request->getPost('nama'),
            'jenis_kel'        => $this->request->getPost('jenis_kel'),
            'alamat'       => $this->request->getPost('alamat'),
            'tempat_lhr'       => $this->request->getPost('tempat_lhr'),
            'tgl_lhr'       => $this->request->getPost('tgl_lhr'),
            'agama'       => $this->request->getPost('agama'),
            'kewarganegaraan'       => $this->request->getPost('kewarganegaraan'),
            'anak_ke'       => $this->request->getPost('anak_ke'),
            'jml_sdr'       => $this->request->getPost('jml_sdr'),
            'berat_bdn'       => $this->request->getPost('berat_bdn'),
            'tinggi_bdn'       => $this->request->getPost('tinggi_bdn'),
            'riwayat_pnykt'       => $this->request->getPost('riwayat_pnykt'),
            'tmpt_tinggal'       => $this->request->getPost('tmpt_tinggal'),
            'nama_ayah'       => $this->request->getPost('nama_ayah'),
            'nama_ibu'       => $this->request->getPost('nama_ibu'),
        );

        if($validation->run($data, 'category') == FALSE){
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('category/create'));
        } else {
            $model = new Category_model();
            $simpan = $model->insertCategory($data);
            if($simpan)
            {
                session()->setFlashdata('success', 'Created Successfully');
                return redirect()->to(base_url('category')); 
            }
        }
    }

    public function edit($id)
    {
        # code...
        $model = new Category_model();
        $data['category'] = $model->getCategory($id)->getRowArray();
        echo view('category/edit',$data);
    }

    public function update()
    {
        # code...
        $id = $this->request->getPost('id_daftar');
        $validation = \Config\Services::validation();

        $data = array(
            'nisn'         => $this->request->getPost('nisn'),
            'nik'    => $this->request->getPost('nik'),
            'nama'        => $this->request->getPost('nama'),
            'jenis_kel'        => $this->request->getPost('jenis_kel'),
            'alamat'       => $this->request->getPost('alamat'),
            'tempat_lhr'       => $this->request->getPost('tempat_lhr'),
            'tgl_lhr'       => $this->request->getPost('tgl_lhr'),
            'agama'       => $this->request->getPost('agama'),
            'kewarganegaraan'       => $this->request->getPost('kewarganegaraan'),
            'anak_ke'       => $this->request->getPost('anak_ke'),
            'jml_sdr'       => $this->request->getPost('jml_sdr'),
            'berat_bdn'       => $this->request->getPost('berat_bdn'),
            'tinggi_bdn'       => $this->request->getPost('tinggi_bdn'),
            'riwayat_pnykt'       => $this->request->getPost('riwayat_pnykt'),
            'tmpt_tinggal'       => $this->request->getPost('tmpt_tinggal'),
            'nama_ayah'       => $this->request->getPost('nama_ayah'),
            'nama_ibu'       => $this->request->getPost('nama_ibu'),
        );

        if($validation->run($data, 'category') == FALSE){
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('category/edit/'.$id));
        } else {
            $model = new Category_model();
            $ubah = $model->updateCategory($data,$id);
            if($ubah)
            {
                session()->setFlashdata('info', 'Updated Successfully');
                return redirect()->to(base_url('category')); 
            }
        }
    }

    public function show($id) 
    {
        $model = new Category_model();
        //$data['category'] = $this->Category_model->getCategory($id);
        $data['category'] = $model->getCategory($id)->getRowArray();
        echo view('category/show', $data); 
    } 


    public function delete($id)
    {
        $model = new Category_model();
        $hapus = $model->deleteCategory($id);
        if($hapus){
            session()->setFlashdata('warning','Deleted Category Succesfully');
            return redirect()->to(base_url('category'));
        }
    }
    
 }
