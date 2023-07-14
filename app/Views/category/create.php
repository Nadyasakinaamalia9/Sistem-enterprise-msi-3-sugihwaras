<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">P E N D A F T A R A N   -   S I S W A</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Buku</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('category/store'); ?>" method="post">
                        <div class="card">
                            <div class="card-body">
                                <?php
                               // if (!empty($inputs)){
                                 //   $inputs = session()->getFlashdata('inputs');
                                //}
                                $errors = session()->getFlashdata('errors');
                                if (!empty($errors)) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        Whoops! Ada kesalahan saat input data, yaitu:
                                        <ul>
                                            <?php foreach ($errors as $error) : ?>
                                                <li><?= esc($error) ?></li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                <?php } ?>
                                <div class="row">
                                <div class="col-md-6">
                                    <label for="">ID Pendaftaran</label>
                                    <input type="text" class="form-control" name="id_daftar" placeholder="Masukkan ID Pendaftaran" value="<?php  //echo $inputs['id_daftar']; }?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="">NISN</label>
                                    <input type="text" class="form-control" name="nisn" placeholder="Masukkan NISN" value="<?php  //echo $inputs['nisn']; }?>">
                                </div>  
                                <div class="col-md-6">
                                    <label for="">NIK</label>
                                    <input type="text" class="form-control" name="nik" placeholder="Masukkan Agama" value="<?php  ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Nama Pendaftar</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Pendaftaran" value="<?php  //echo $inputs['nama_dosen']; }?>">
                                </div>  
                                <div class="col-md-6">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jenis_kel" id="" class="form-control">
                                    <option <?php //echo $inputs['status_dosen'] == "Tetap" ? "selected" : ""; ?> value="Tersedia">-- PILIH --</option>
                                        <option <?php //echo $inputs['jenis_kelamin'] == "Laki-Laki" ? "selected" : ""; ?> value="Laki-Laki">Laki-Laki</option>
                                        <option <?php //echo $inputs['jenis_kelamin'] == "Perempuan" ? "selected" : ""; ?> value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" placeholder="Masukkan Agama" value="<?php  ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lhr" placeholder="Masukkan Agama" value="<?php  ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgl_lhr" placeholder="Masukkan Agama" value="<?php  ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Agama</label>
                                    <input type="text" class="form-control" name="agama" placeholder="Masukkan Agama" value="<?php  ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Kewarganegaraan</label>
                                    <select name="kewarganegaraan" id="" class="form-control">
                                    <option <?php //echo $inputs['status_dosen'] == "Tetap" ? "selected" : ""; ?> value="Tersedia">-- PILIH --</option>
                                        <option <?php //echo $inputs['status_dosen'] == "Tetap" ? "selected" : ""; ?> value="Tersedia">WNI</option>
                                        <option <?php //echo $inputs['status_dosen'] == "Luar" ? "selected" : ""; ?> value="Dipinjam">WNA Keturunan</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Anak ke-</label>
                                    <input type="text" class="form-control" name="anak_ke" placeholder="Masukkan Anak Ke-" value="<?php  //echo $inputs['alamat_dosen']; }?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Jumlah Saudara</label>
                                    <input type="text" class="form-control" name="jml_sdr" placeholder="Masukkan Jumlah Saudara" value="<?php  //echo $inputs['alamat_dosen']; }?>">
                                </div>

                                <div class="col-md-6">
                                    <label for="">Berat Badan</label>
                                    <input type="text" class="form-control" name="berat_bdn" placeholder="Masukkan Berat Badan" value="<?php  //echo $inputs['alamat_dosen']; }?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Tinggi Badan</label>
                                    <input type="text" class="form-control" name="tinggi_bdn" placeholder="Masukkan Tinggi Badan" value="<?php  //echo $inputs['alamat_dosen']; }?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Riwayat Penyakit</label>
                                    <input type="text" class="form-control" name="riwayat_pnykt" placeholder="Masukkan Riwayat Penyakit" value="<?php  //echo $inputs['alamat_dosen']; }?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Tempat Tinggal</label>
                                    <select name="tmpt_tinggal" id="" class="form-control">
                                    <option <?php //echo $inputs['status_dosen'] == "Tetap" ? "selected" : ""; ?> value="Tersedia">-- PILIH --</option> 
                                        <option <?php //echo $inputs['status_dosen'] == "Tetap" ? "selected" : ""; ?> value="Tersedia">Orang Tua</option>
                                        <option <?php //echo $inputs['status_dosen'] == "Luar" ? "selected" : ""; ?> value="Dipinjam">Menumpang</option>
                                        <option <?php //echo $inputs['status_dosen'] == "Luar" ? "selected" : ""; ?> value="Dipinjam">Asrama</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Nama Ayah</label>
                                    <input type="text" class="form-control" name="nama_ayah" placeholder="Masukkan Nama Ayah" value="<?php  //echo $inputs['alamat_dosen']; }?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Nama Ibu</label>
                                    <input type="text" class="form-control" name="nama_ibu" placeholder="Masukkan Nama Ibu" value="<?php  //echo $inputs['alamat_dosen']; }?>">
                                </div>
                                </div>

                                
                          
                                
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('category'); ?>" class="btn btn-outline-info">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo view('_partials/footer'); ?>
