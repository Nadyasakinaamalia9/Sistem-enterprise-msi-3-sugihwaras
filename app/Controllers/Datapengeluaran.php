<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Datapengeluaran_model;

class Datapengeluaran extends BaseController
{
    public function __construct()
    {
        helper(['form']);
        $model = new Datapengeluaran_model();
    }

    public function index()
    {
        # code...
        //$model = new Category_model();
        //$data['obat0014'] = $model->getCategory();
        $model = new Datapengeluaran_model();
        
        // Filtering 
        //$category   =   $this->request->getGet('category');
        $keyword    =   $this->request->getGet('keyword');

        //$data['category']   =   $category; 
        $data['keyword']    =   $keyword;

        $obat0014     =   $model->where('id_pegawai')->findAll(); 
        $data['pengeluaran'] = ['' => 'Pilih Category'] + array_column($obat0014, 'keperluan', 'beban_biaya'); 

        // filter 
        $where      = []; 
        $like       = []; 
        $or_like    = []; 

        //if(!empty($category)){ 
        //    $where = ['products.category_id' => $category]; 
        //}
            
        if(!empty($keyword)){ 
            $like = ['id_pegawai' => $keyword]; 
            $or_like = ['tgl_bayar' => $keyword, 'keperluan' => $keyword, 'beban_biaya' => $keyword]; 
        }
        // end filter

        // paginate 
        $paginate = 6;
        //$data['obat0014'] = $model->paginate($paginate, 'category'); 
        $data['dosen0072'] = $model->where($where)->like($like)->orLike($or_like)->paginate($paginate, 'category'); 
        $data['pager'] = $model->pager; 
        // generate number untuk tetap bertambah meskipun pindah halaman paginate 
        $nomor = $this->request->getGet('page_category'); 
        // define $nomor = 1 jika tidak ada get page_product 
        if($nomor == null){ 
            $nomor = 1; 
        } 
        $data['nomor'] = ($nomor - 1) * $paginate; 
        // end generate number

        echo view('pengeluaran/idx10', $data);
    }

    public function create10()
    {
        # code...
        return view('pengeluaran/create10');
    }

    public function store10()
    {
        $validation =  \Config\Services::validation();

        $data = array(
            
            'tgl_bayar'         => $this->request->getPost('tgl_bayar'),
            'keperluan'    => $this->request->getPost('keperluan'),
            'beban_biaya'        => $this->request->getPost('beban_biaya'),
            'id_pegawai'         => $this->request->getPost('id_pegawai'),       
         );

        if($validation->run($data, 'datapengeluaran') == FALSE){
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('pengeluaran/create10'));
        } else {
            $model = new Datapengeluaran_model();
            $simpan = $model->insertCategory($data);
            if($simpan)
            {
                session()->setFlashdata('success', 'Created Successfully');
                return redirect()->to(base_url('datapengeluaran')); 
            }
        }
    }

    public function edit10($id)
    {
        # code...
        $model = new Datapengeluaran_model();
        $data['datapengeluaran'] = $model->getCategory($id)->getRowArray();
        echo view('datapengeluaran/edit10',$data);
    }

    public function update10()
    {
        # code...
        $id = $this->request->getPost('id_pegawai');
        $validation = \Config\Services::validation();

        $data = array(
            'tgl_bayar'         => $this->request->getPost('tgl_bayar'),
            'keperluan'    => $this->request->getPost('keperluan'),
            'beban_biaya'        => $this->request->getPost('beban_biaya'),
            'id_pegawai'         => $this->request->getPost('id_pegawai'),      
        );

        if($validation->run($data, 'datapengeluaran') == FALSE){
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('datapengeluaran/edit10/'.$id));
        } else {
            $model = new Datapengeluaran_model();
            $ubah = $model->updateCategory($data,$id);
            if($ubah)
            {
                session()->setFlashdata('info', 'Updated Successfully');
                return redirect()->to(base_url('datapengeluaran')); 
            }
        }
    }

    public function show($id) 
    {
        $model = new Datapengeluaran_model();
        //$data['category'] = $this->Category_model->getCategory($id);
        $data['category'] = $model->getCategory($id)->getRowArray();
        echo view('category/show', $data); 
    } 


    public function delete10($id)
    {
        $model = new Datapengeluaran_model();
        $hapus = $model->deleteDatapengeluaran($id);
        if($hapus){
            session()->setFlashdata('warning','Deleted Category Succesfully');
            return redirect()->to(base_url('datapengeluaran'));
        }
    }
    
 }
 ?>
