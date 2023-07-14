<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Pembayaran SPP</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Pembayaran SPP</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('spp/update4'); ?>" method="post">
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

                                <input type="hidden" name="nis" value="<?php echo $spp['nis']; ?>">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php echo form_label('Bukti spp', 'bukti_spp'); ?>
                                        <br>
                                        <img src="<?php echo base_url('uploads/' . $spp['bukti_spp']) ?>" class="img-fluid">
                                        <br>
                                        <br>
                                        <?php echo form_label('Ganti Image', 'Ganti Image'); ?>
                                    </div>
                                    <?php echo form_upload('bukti_spp', $spp['bukti_spp']); ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Bayar</label>
                                    <input type="date" value="<?php echo $spp['tanggal_bayar']; ?>" class="form-control" name="tanggal_bayar" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="">Bulan</label>
                                    <input type="text" value="<?php echo $spp['bulan']; ?>" class="form-control" name="bulan" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="">Beban Pembayaran</label>
                                    <input type="text" value="<?php echo $spp['beban_pembayaran']; ?>" class="form-control" name="beban_pembayaran" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="">ID Pegawai</label>
                                    <input type="text" value="<?php echo $spp['id_pegawai']; ?>" class="form-control" name="id_pegawai" placeholder="Enter category name">
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('spp'); ?>" class="btn btn-outline-info">Back</a>
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