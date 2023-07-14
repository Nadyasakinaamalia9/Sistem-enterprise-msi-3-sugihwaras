<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">D A T A - S I S W A</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Data Siswa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('emis/store2'); ?>" method="post" enctype="multipart/form-data">
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
                                        <label for="">NIS</label>
                                        <input type="text" class="form-control" name="nis" placeholder="Masukkan NIS Anda" value="<?php  //echo $inputs['id_daftar']; }                                                                                            
                                                                                                                                    ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">NISN</label>
                                        <input type="text" class="form-control" name="nisn" placeholder="Masukkan NISN Anda" value="<?php  //echo $inputs['id_daftar']; }                                                                                            
                                                                                                                                    ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">NIK</label>
                                        <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK Anda" value="<?php  //echo $inputs['id_daftar']; }                                                                                            
                                                                                                                                    ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Nama Siswa</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Anda" value="<?php  //echo $inputs['id_daftar']; }                                                                                            
                                                                                                                                    ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Alamat</label>
                                        <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat Anda" value="<?php  //echo $inputs['id_daftar']; }                                                                                            
                                                                                                                                        ?>">
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <label for="">NISN</label>
                                        <select name="nisn" id="" class="form-control">
                                            <option value="">Pilih NISN</option>
                                            <?php foreach ($datappdb as $ambildata) : ?>
                                                <option value="<?= $ambildata['nisn'] ?>"><?= $ambildata['nisn'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div> -->
                                    <!-- <div class="col-md-6">
                                        <label for="">NIK</label>
                                        <select name="nik" id="" class="form-control">
                                            <option value="">Pilih NIK</option>
                                            <?php foreach ($datappdb as $ambildata) : ?>
                                                <option value="<?= $ambildata['nik'] ?>"><?= $ambildata['nik'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div> -->
                                    <!-- <div class="col-md-6">
                                        <label for="">Nama Siswa</label>
                                        <select name="nama" id="" class="form-control">
                                            <option value="">Pilih Nama Pendaftar</option>
                                            <?php foreach ($datappdb as $ambildata) : ?>
                                                <option value="<?= $ambildata['nama'] ?>"><?= $ambildata['nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div> -->

                                    <div class="col-md-6">
                                        <label for="">Jenis Kelamin</label>
                                        <select name="jenis_kel" id="" class="form-control">
                                            <option <?php //echo $inputs['status_dosen'] == "Tetap" ? "selected" : ""; 
                                                    ?> value="Tersedia">-- PILIH --</option>
                                            <option <?php //echo $inputs['jenis_kelamin'] == "Laki-Laki" ? "selected" : ""; 
                                                    ?> value="Laki-Laki">Laki-Laki</option>
                                            <option <?php //echo $inputs['jenis_kelamin'] == "Perempuan" ? "selected" : ""; 
                                                    ?> value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lhr" placeholder="Masukkan Tempat Lahir Anda" value="<?php  ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tgl_lahir" placeholder="Masukkan Tempat Lahir Anda" value="<?php  ?>">
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <label for="">Tanggal Lahir</label>
                                        <select name="tgl_lahir" id="" class="form-control">
                                            <option value="">Pilih Tanggal Lahir</option>
                                            <?php foreach ($datappdb as $ambildata) : ?>
                                                <option value="<?= $ambildata['tgl_lhr'] ?>"><?= $ambildata['tgl_lhr'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div> -->
                                    <div class="col-md-6">
                                        <label for="">Agama</label>
                                        <input type="text" class="form-control" name="agama" placeholder="Masukkan Agama" value="<?php  ?>">
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tahun_ajaran">Tahun Ajaran</label>
                                            <select name="tahun_ajaran" class="form-control">
                                                <option value="">Pilih Tahun Ajaran</option>
                                                <?php foreach ($tahun_ajaran as $ajaran_item) : ?>
                                                    <option value="<?php echo $ajaran_item['tahun_ajaran']; ?>"><?php echo $ajaran_item['tahun_ajaran']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <label for="">Tinggi Badan</label>
                                        <input type="text" class="form-control" name="tinggi_bdn" placeholder="Masukkan Tinggi Badan Anda" value="<?php  //echo $inputs['alamat_dosen']; }                                                                                                                          
                                                                                                                                                    ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Berat Badan</label>
                                        <input type="text" class="form-control" name="berat_bdn" placeholder="Masukkan Berat Badan Anda" value="<?php  //echo $inputs['alamat_dosen']; }                                                                                                                          
                                                                                                                                                ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Riwayat Penyakit</label>
                                        <input type="text" class="form-control" name="riwayat_pnykt" placeholder="Masukkan Riwayat Penyakit Anda" value="<?php  //echo $inputs['alamat_dosen']; }                                                                                                                          
                                                                                                                                                            ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Nama Ayah</label>
                                        <input type="text" class="form-control" name="nama_ayah" placeholder="Masukkan Nama Ayah" value="<?php  //echo $inputs['alamat_dosen']; }                                                                                                                          
                                                                                                                                            ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Nama Ibu</label>
                                        <input type="text" class="form-control" name="nama_ibu" placeholder="Masukkan Nama  Ibu" value="<?php  //echo $inputs['alamat_dosen']; }                                                                                                                          
                                                                                                                                        ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Upload Foto</label>
                                        <input type="file" class="form-control" name="foto" placeholder="" value="<?php  ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('emis'); ?>" class="btn btn-outline-info">Back</a>
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