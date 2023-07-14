<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Data Pegawai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Data Guru</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('dataguru/update3'); ?>" method="post" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-body">
                                <?php
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
                                <div class="col-md-3">
                                    <img src="<?php echo base_url('../uploads/' . $dataguru['foto']) ?>" class="img-fluid" width="200" height="200">
                                </div>
                                <div class="form-group">
                                    <label for="">Upload Foto</label>
                                    <input type="file" value="<?php echo base_url('../uploads/' . $dataguru['foto']) ?>" class="form-control" name="foto" placeholder="Masukkan Foto Anda jika ingin dirubah">
                                </div>
                                <small>biarkan gambar kosong jika tidak ingin diupdate</small>
                                <br>
                                <div class="form-group">
                                    <label for="">NIP</label>
                                    <input type="text" value="<?php echo $dataguru['nip']; ?>" class="form-control" name="nip" placeholder="Masukkan NIP " readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">NIK</label>
                                    <input type="text" value="<?php echo $dataguru['nik']; ?>" class="form-control" name="nik" placeholder="Masukkan NIK " readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">ID PEGAWAI</label>
                                    <input type="text" value="<?php echo $dataguru['id_pegawai']; ?>" class="form-control" name="id_pegawai" placeholder="Masukkan ID Pegawai " readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama </label>
                                    <input type="text" value="<?php echo $dataguru['nama']; ?>" class="form-control" name="nama" placeholder="Masukkan Nama ">
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat </label>
                                    <input type="text" value="<?php echo $dataguru['alamat']; ?>" class="form-control" name="alamat" placeholder="Masukkan Alamat ">
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis kelamin</label>
                                    <select name="jenis_kel" id="" class="form-control">
                                        <option value="">Pilih Kategori</option>
                                        <option value="laki-laki" <?php echo $dataguru['jenis_kel'] == "laki-laki" ? 'selected' : '' ?>>Laki-Laki</option>
                                        <option value="perempuan" <?php echo $dataguru['jenis_kel'] == "perempuan" ? 'selected' : '' ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Tempat Lahir</label>
                                    <input type="text" value="<?php echo $dataguru['tempat_lhr']; ?>" class="form-control" name="tempat_lhr" placeholder="Masukkan Tempat Lahir">
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" value="<?php echo $dataguru['tgl_lahir']; ?>" class="form-control" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir">
                                </div>
                                <div class="form-group">
                                    <label for="">Agama</label>
                                    <input type="text" value="<?php echo $dataguru['agama']; ?>" class="form-control" name="agama" placeholder="Masukkan Agama">
                                </div>
                                <div class="form-group">
                                    <label for="">Masuk Tahun</label>
                                    <input type="text" value="<?php echo $dataguru['masuk_thn']; ?>" class="form-control" name="masuk_thn" placeholder="Masukkan Tahun Anda Masuk">
                                </div>
                                <div class="form-group">
                                    <label for="">SK GURU</label>
                                    <input type="text" value="<?php echo $dataguru['sk_guru']; ?>" class="form-control" name="sk_guru" placeholder="Masukkan SK Guru Baru">
                                </div>
                                <div class="form-group">
                                    <label for="">Jabatan</label>
                                    <select name="jabatan" id="" class="form-control">
                                        <option value="">Pilih Kategori</option>
                                        <option value="guru" <?php echo $dataguru['jabatan'] == "guru" ? 'selected' : '' ?>>Guru</option>
                                        <option value="tatausaha" <?php echo $dataguru['jabatan'] == "tatausaha" ? 'selected' : '' ?>>Tata Usaha</option>
                                        <option value="sarpras" <?php echo $dataguru['jabatan'] == "sarpras" ? 'selected' : '' ?>>Sarpras</option>
                                        <option value="siswa" <?php echo $dataguru['jabatan'] == "siswa" ? 'selected' : '' ?>>Siswa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('dataguru'); ?>" class="btn btn-outline-info">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?php echo view('_partials/footer'); ?>