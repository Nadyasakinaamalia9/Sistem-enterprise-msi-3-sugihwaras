<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Data Pendaftaran</h1>
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
                    <form action="<?php echo base_url('category/update'); ?>" method="post">
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

                                <input type="hidden" name="id_daftar" value="<?php echo $category['id_daftar']; ?>">
                                <div class="form-group">
                                    <label for="">NISN</label>
                                    <input type="text" value="<?php echo $category['nisn']; ?>" class="form-control" name="nisn" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="">NIK</label>
                                    <input type="text" value="<?php echo $category['nik']; ?>" class="form-control" name="nik" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Pendaftar</label>
                                    <input type="text" value="<?php echo $category['nama']; ?>" class="form-control" name="nama" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis kelamin</label>
                                    <select name="jenis_kel" id="" class="form-control">
                                        <option value="">Pilih Kategori</option>
                                        <option value="laki-laki" <?php echo $category['jenis_kel'] == "laki-laki" ? 'selected' : '' ?>>Laki-Laki</option>
                                        <option value="perempuan" <?php echo $category['jenis_kel'] == "perempuan" ? 'selected' : '' ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" value="<?php echo $category['alamat']; ?>" class="form-control" name="alamat" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="">Tempat Lahir</label>
                                    <input type="text" value="<?php echo $category['tempat_lhr']; ?>" class="form-control" name="tempat_lhr" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" value="<?php echo $category['tgl_lhr']; ?>" class="form-control" name="tgl_lhr" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="">Agama</label>
                                    <input type="text" value="<?php echo $category['agama']; ?>" class="form-control" name="agama" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="">Kewarganegaraan</label>
                                    <select name="kewarganegaraan" id="" class="form-control">
                                        <option value="">Pilih Kategori</option>
                                        <option value="WNI" <?php echo $category['kewarganegaraan'] == "WNI" ? 'selected' : '' ?>>WNI</option>
                                        <option value="WNA Keturunan" <?php echo $category['kewarganegaraan'] == "WNA Keturunan" ? 'selected' : '' ?>>WNA Keturunan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Anak Ke-</label>
                                    <input type="text" value="<?php echo $category['anak_ke']; ?>" class="form-control" name="anak_ke" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah Saudara</label>
                                    <input type="text" value="<?php echo $category['jml_sdr']; ?>" class="form-control" name="jml_sdr" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="">Berat Badan</label>
                                    <input type="text" value="<?php echo $category['berat_bdn']; ?>" class="form-control" name="berat_bdn" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="">Tinggi Badan</label>
                                    <input type="text" value="<?php echo $category['tinggi_bdn']; ?>" class="form-control" name="tinggi_bdn" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="">Riwayat Penyakit</label>
                                    <input type="text" value="<?php echo $category['riwayat_pnykt']; ?>" class="form-control" name="riwayat_pnykt" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="">Tempat Tinggal</label>
                                    <select name="tmpt_tinggal" id="" class="form-control">
                                        <option value="">Pilih Kategori</option>
                                        <option value="orang tua" <?php echo $category['tmpt_tinggal'] == "orang tua" ? 'selected' : '' ?>>Orang Tua</option>
                                        <option value="menumpang" <?php echo $category['tmpt_tinggal'] == "menumpang" ? 'selected' : '' ?>>Menumpang</option>
                                        <option value="asrama" <?php echo $category['tmpt_tinggal'] == "asrama" ? 'selected' : '' ?>>Asrama</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Ayah</label>
                                    <input type="text" value="<?php echo $category['nama_ayah']; ?>" class="form-control" name="nama_ayah" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Ibu</label>
                                    <input type="text" value="<?php echo $category['nama_ibu']; ?>" class="form-control" name="nama_ibu" placeholder="Enter category name">
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('category'); ?>" class="btn btn-outline-info">Back</a>
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
