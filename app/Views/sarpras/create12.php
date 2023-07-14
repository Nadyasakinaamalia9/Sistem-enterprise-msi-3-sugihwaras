<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">DATA SARPRAS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Data Sarpras</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('sarpras/store12'); ?>" method="post">
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
                                        <label for="">ID Barang </label>
                                        <input type="text" class="form-control" name="id_barang" placeholder="Masukkan ID Barang" value="<?php  //echo $inputs['nisn']; }
                                                                                                                                            ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Tanggal </label>
                                        <input type="date" class="form-control" name="tanggal" placeholder="Masukkan Tanggal" value="<?php  //echo $inputs['nisn']; }
                                                                                                                                        ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Nama Barang</label>
                                        <input type="text" class="form-control" name="keterangan" placeholder="Masukkan Nama Barang" value="<?php  ?>">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="">Status</label>
                                        <select name="status" id="" class="form-control">
                                            <option <?php //echo $inputs['status_dosen'] == "Tetap" ? "selected" : ""; 
                                                    ?> value="Tersedia">-- PILIH --</option>
                                            <option <?php //echo $inputs['jenis_kelamin'] == "Laki-Laki" ? "selected" : ""; 
                                                    ?> value="baik">Baik</option>
                                            <option <?php //echo $inputs['jenis_kelamin'] == "Perempuan" ? "selected" : ""; 
                                                    ?> value="sedang">Sedang</option>
                                            <option <?php //echo $inputs['jenis_kelamin'] == "Perempuan" ? "selected" : ""; 
                                                    ?> value="buruk">Buruk</option>
                                        </select>
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <label for="">Jumlah</label>
                                        <input type="text" class="form-control" name="jumlah" placeholder="Masukkan Jumlah" value="<?php  ?>">
                                    </div> -->
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('sarpras'); ?>" class="btn btn-outline-info">Back</a>
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