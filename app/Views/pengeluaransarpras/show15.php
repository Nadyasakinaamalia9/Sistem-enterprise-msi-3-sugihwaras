<?php echo view("_partials/header"); ?>
<?php echo view("_partials/sidebar"); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Show Pengeluaran Sarpras</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">home</a></li>
                        <li class="breadcrumb-item active">Show Pengeluaran Sarpras</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="<?php echo base_url('../uploads/' . $pengeluaransarpras['bukti_sarpras']) ?>" class="img-fluid" width="200" height="200">
                                </div>

                                <div class="col-md-12">
                                    <dl class="dl-horizontal">
                                        <dt>Nama Barang</dt>
                                        <dd><?php echo $pengeluaransarpras['keterangan']; ?></dd>
                                        <dt>Jumlah</dt>
                                        <dd><?php echo $pengeluaransarpras['jumlah']; ?></dd>
                                        <dt>Harga</dt>
                                        <dd><?php echo $pengeluaransarpras['harga']; ?></dd>
                                        <dt>Nota</dt>
                                        <dd><?php echo $pengeluaransarpras['bukti_sarpras']; ?></dd>
                                        <dt>ID Pegawai</dt>
                                        <dd><?php echo $pengeluaransarpras['id_pegawai']; ?></dd>



                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="<?php echo base_url('pengeluaransarpras'); ?>" class="btn btn-outline-info float-right">back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php echo view('_partials/footer'); ?>