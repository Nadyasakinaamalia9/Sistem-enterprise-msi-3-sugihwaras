<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Datapembayaran_model;

class Datapembayaran extends BaseController
{
    public function __construct()
    {
        helper(['form']);
        $model = new Datapembayaran_model();
    }

    public function index()
    {
        # code...
        //$model = new Category_model();
        //$data['obat0014'] = $model->getCategory();
        $model = new Datapembayaran_model();
        
        // Filtering 
        //$category   =   $this->request->getGet('category');
        $keyword    =   $this->request->getGet('keyword');

        //$data['category']   =   $category; 
        $data['keyword']    =   $keyword;

        $obat0014     =   $model->where('keperluan')->findAll(); 
        $data['pembayaran'] = ['' => 'Pilih Category'] + array_column($obat0014, 'keperluan', 'id_pegawai'); 

        // filter 
        $where      = []; 
        $like       = []; 
        $or_like    = []; 

        //if(!empty($category)){ 
        //    $where = ['products.category_id' => $category]; 
        //}
            
        if(!empty($keyword)){ 
            $like = ['id_pegawai' => $keyword]; 
            $or_like = ['keperluan' => $keyword, 'beban_biaya' => $keyword, 'tgl_bayar' => $keyword]; 
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

        echo view('pembayaran/idx9', $data);
    }

    public function create9()
    {
        # code...
        return view('pembayaran/create9');
    }

    public function store9()
    {
        $validation =  \Config\Services::validation();

        $data = array(
            'tgl_bayar'         => $this->request->getPost('tgl_bayar'),
            'keperluan'         => $this->request->getPost('keperluan'),
            'beban_biaya'    => $this->request->getPost('beban_biaya'),
            'id_pegawai'        => $this->request->getPost('id_pegawai'),

        );

        if($validation->run($data, 'datapembayaran') == FALSE){
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('pembayaran/create9'));
        } else {
            $model = new Datapembayaran_model();
            $simpan = $model->insertCategory($data);
            if($simpan)
            {
                session()->setFlashdata('success', 'Created Successfully');
                return redirect()->to(base_url('datanilai')); 
            }
        }
    }

    public function edit8($id)
    {
        # code...
        $model = new Datapembayaran_model();
        $data['datanilai'] = $model->getCategory($id)->getRowArray();
        echo view('datanilai/edit8',$data);
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

        if($validation->run($data, 'datanilai') == FALSE){
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('datanilai/edit8/'.$id));
        } else {
            $model = new Datapembayaran_model();
            $ubah = $model->updateCategory($data,$id);
            if($ubah)
            {
                session()->setFlashdata('info', 'Updated Successfully');
                return redirect()->to(base_url('datanilai')); 
            }
        }
    }

    public function show($id) 
    {
        $model = new Datapembayaran_model();
        //$data['category'] = $this->Category_model->getCategory($id);
        $data['category'] = $model->getCategory($id)->getRowArray();
        echo view('category/show', $data); 
    } 


    public function delete8($id)
    {
        $model = new Datapembayaran_model();
        $hapus = $model->deleteDatanilai($id);
        if($hapus){
            session()->setFlashdata('warning','Deleted Category Succesfully');
            return redirect()->to(base_url('datanilai'));
        }
    }
    
 }
 ?>
