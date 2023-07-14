<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Peminjaman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Peminjaman</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('peminjaman/update13'); ?>" method="post">
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

                                <input type="hidden" name="id" value="<?php echo $peminjaman['id']; ?>">
                                <div class="form-group">
                                    <label for="">Keterangan</label>
                                    <input type="text   " value="<?php echo $peminjaman['keterangan']; ?>" class="form-control" name="keterangan" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah</label>
                                    <input type="text" value="<?php echo $peminjaman['jumlah']; ?>" class="form-control" name="jumlah" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="">ID Pegawai</label>
                                    <input type="text" value="<?php echo $peminjaman['id_pegawai']; ?>" class="form-control" name="id_pegawai" placeholder="Enter category name">
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('peminjaman'); ?>" class="btn btn-outline-info">Back</a>
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