<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Data Sarpras</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Data Sarpras</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('pengeluaransarpras/update15'); ?>" method="post" enctype="multipart/form-data">
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
                                <!-- <input type="hidden" name="keterangan" value="<php echo $pengeluaransarpras['id']; ?>"> -->
                                <input type="hidden" name="id" value="<?php echo $pengeluaransarpras['id']; ?>">
                                <div class="col-md-6">
                                        <label for="">Bukti Sarpras</label>
                                        <input type="file" class="form-control" name="bukti_sarpras" placeholder="" value="<?php  ?>">
                                    </div>
                                    <!-- <div class="form-group">
                                    <label for="">Tanggal</label>
                                    <input type="date" value="< echo $sarpras['tanggal']; ?>" class="form-control" name="tanggal" placeholder="Masukkan Tanggal">
                                </div> -->
                                <div class="form-group">
                                    <label for="">Nama Barang</label>
                                    <input type="text" value="<?php echo $pengeluaransarpras['keterangan']; ?>" class="form-control" name="keterangan" placeholder="Masukkan Keterangan">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option>Pilih Status</option>
                                        <option value="baik" < echo $sarpras['status'] == "baik" ? 'selected' : '' ?>>Baik</option>
                                        <option value="sedang" <php echo $sarpras['status'] == "sedang" ? 'selected' : '' ?>>Sedang</option>
                                        <option value="buruk" <php echo $sarpras['status'] == "buruk" ? 'selected' : '' ?>>Buruk</option>
                                    </select>
                                </div> -->
                                <div class="form-group">
                                    <label for="">Jumlah</label>
                                    <input type="text" value="<?php echo $pengeluaransarpras['jumlah']; ?>" class="form-control" name="jumlah" placeholder="Masukkan Keterangan">
                                </div>
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="text" value="<?php echo $pengeluaransarpras['harga']; ?>" class="form-control" name="harga" placeholder="Masukkan Keterangan">
                                </div>
                                <div class="form-group">
                                    <label for="">ID Pegawai</label>
                                    <input type="text" value="<?php echo $pengeluaransarpras['id_pegawai']; ?>" class="form-control" name="id_pegawai" placeholder="Enter category name">
                                </div>
                                <div class="card-footer">
                                    <a href="<?php echo base_url('pengeluaransarpras'); ?>" class="btn btn-outline-info">Back</a>
                                    <button type="submit" class="btn btn-primary float-right">Update</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php echo view('_partials/footer'); ?>
</div>