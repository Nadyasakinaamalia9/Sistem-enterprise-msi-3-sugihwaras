<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">D A T A - G U R U</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Data Pegawai</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('dataguru/store3'); ?>" method="post" enctype="multipart/form-data">
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
                                        <label for="">NIP</label>
                                        <input type="text" class="form-control" name="nip" placeholder="Masukkan NIP" value="<?php  //echo $inputs['id_daftar']; }
                                                                                                                                ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">NIK</label>
                                        <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK" value="<?php  //echo $inputs['nisn']; }
                                                                                                                                ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">ID Pegawai</label>
                                        <input type="text" class="form-control" name="id_pegawai" placeholder="Masukkan ID Pegawai" value="<?php  ?>">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Nama</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" value="<?php  ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Alamat</label>
                                        <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat" value="<?php  ?>">
                                    </div>
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
                                        <input type="text" class="form-control" name="tempat_lhr" placeholder="Masukkan Tempat Lahir" value="<?php  ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" value="<?php  ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Agama</label>
                                        <input type="text" class="form-control" name="agama" placeholder="Masukkan Agama" value="<?php  ?>">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Masuk Tahun</label>
                                        <input type="text" class="form-control" name="masuk_thn" placeholder="Masukkan Tahun Anda masuk" value="<?php  //echo $inputs['alamat_dosen']; }
                                                                                                                                                ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">SK Guru</label>
                                        <input type="text" class="form-control" name="sk_guru" placeholder="Masukkan SK Guru Anda" value="<?php  //echo $inputs['alamat_dosen']; }
                                                                                                                                            ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Jabatan</label>
                                        <select name="jabatan" id="" class="form-control">
                                            <option <?php //echo $inputs['status_dosen'] == "Tetap" ? "selected" : ""; 
                                                    ?> value="Tersedia">-- PILIH --</option>
                                            <option <?php //echo $inputs['jenis_kelamin'] == "Laki-Laki" ? "selected" : ""; 
                                                    ?> value="guru">Guru</option>
                                            <option <?php //echo $inputs['jenis_kelamin'] == "Perempuan" ? "selected" : ""; 
                                                    ?> value="tatausaha">Tata Usaha</option>
                                            <option <?php //echo $inputs['jenis_kelamin'] == "Perempuan" ? "selected" : ""; 
                                                    ?> value="sarpras">Sarpras</option>
                                            <!-- <option <php //echo $inputs['jenis_kelamin'] == "Perempuan" ? "selected" : ""; 
                                                            ?> value="siswa">Siswa</option> -->
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Upload Foto</label>
                                        <input type="file" class="form-control" name="foto" placeholder="" value="<?php  ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('dataguru'); ?>" class="btn btn-outline-info">Back</a>
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