<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Data Emis</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Data Pendaftaran</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <form action="<?php echo base_url('emis/update2'); ?>" method="post" enctype="multipart/form-data">
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

                                <div class="form-group">
                                    <label for="">NIS</label>
                                    <input type="text" name="nis" value="<?php echo $emis['nis']; ?>" class="form-control" name="nis" placeholder="Masukkan NIS" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">NISN</label>
                                    <input type="text" value="<?php echo $emis['nisn']; ?>" class="form-control" name="nisn" placeholder="Masukkan NISN" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">NIK</label>
                                    <input type="text" value="<?php echo $emis['nik']; ?>" class="form-control" name="nik" placeholder="Masukkan NIK" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" value="<?php echo $emis['nama']; ?>" class="form-control" name="nama" placeholder="Masukkan Nama">
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" value="<?php echo $emis['alamat']; ?>" class="form-control" name="alamat" placeholder="Masukkan Alamat">
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis kelamin</label>
                                    <select name="jenis_kel" id="" class="form-control">
                                        <option value="">Pilih Kelamin</option>
                                        <option value="laki-laki" <?php echo $emis['jenis_kel'] == "laki-laki" ? 'selected' : '' ?>>Laki-Laki</option>
                                        <option value="perempuan" <?php echo $emis['jenis_kel'] == "perempuan" ? 'selected' : '' ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Tempat Lahir</label>
                                    <input type="text" value="<?php echo $emis['tempat_lhr']; ?>" class="form-control" name="tempat_lhr" placeholder="Masukkan Tempat Lahir">
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" value="<?php echo $emis['tgl_lahir']; ?>" class="form-control" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir">
                                </div>
                                <div class="form-group">
                                    <label for="">Agama</label>
                                    <input type="text" value="<?php echo $emis['agama']; ?>" class="form-control" name="agama" placeholder="Masukkan Agama">
                                </div>
                                <div class="form-group">
                                    <label for="">Tahun Ajaran</label>
                                    <input type="text" value="<?php echo $emis['tahun_ajaran']; ?>" class="form-control" name="tahun_ajaran" placeholder="Masukkan Tahun Ajaran">
                                </div>
                                <div class="form-group">
                                    <label for="">Tinggi Badan</label>
                                    <input type="text" value="<?php echo $emis['tinggi_bdn']; ?>" class="form-control" name="tinggi_bdn" placeholder="Masukkan Tinggi Badan">
                                </div>
                                <div class="form-group">
                                    <label for="">Berat Badan</label>
                                    <input type="text" value="<?php echo $emis['berat_bdn']; ?>" class="form-control" name="berat_bdn" placeholder="Masukkan Berat Badan">
                                </div>
                                <div class="form-group">
                                    <label for="">Riwayat Penyakit</label>
                                    <input type="text" value="<?php echo $emis['riwayat_pnykt']; ?>" class="form-control" name="riwayat_pnykt" placeholder="Masukkan Riwayat Penyakit">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Ayah</label>
                                    <input type="text" value="<?php echo $emis['nama_ayah']; ?>" class="form-control" name="nama_ayah" placeholder="Masukkan Nama Ayah">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Ibu</label>
                                    <input type="text" value="<?php echo $emis['nama_ibu']; ?>" class="form-control" name="nama_ibu" placeholder="Masukkan Nama Ibu">
                                </div>
                                <div class="col-md-3">
                                    <img src="<?php echo base_url('../uploads/' . $emis['foto']) ?>" class="img-fluid" width="200" height="200">
                                </div>
                                <div class="col-md-12">
                                    <label for="">Upload Foto</label>
                                    <input type="file" value="<?php echo $emis['foto']; ?>" class="form-control" name="foto" placeholder="Masukkan Foto Anda jika ingin dirubah">
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('emis'); ?>" class="btn btn-outline-info">Back</a>
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