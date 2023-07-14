<?php echo view("_partials/header"); ?>
<?php echo view("_partials/sidebar"); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Show Pembayaran SPP</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">home</a></li>
                        <li class="breadcrumb-item active">Show Data Pembayaran</li>
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
                            <?php foreach ($payments as $payment): ?>
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="<?php echo base_url('../uploads/' . $payment['bukti_spp']) ?>" class="img-fluid" width="200" height="200">
                                </div>
                                <div class="col-md-8">
                                    <dl class="dl-horizontal">
                                        <dt>NIS</dt>
                                        <dd><?php echo $payment['nis']; ?></dd>
                                        <dt>Tanggal Bayar</dt>
                                        <dd><?php echo $payment['tanggal_bayar']; ?></dd>
                                        <dt>Bulan</dt>
                                        <dd><?php echo $payment['bulan']; ?></dd>
                                        <dt>Beban Bayar</dt>
                                        <dd><?php echo 'Rp. ' . number_format($payment['beban_pembayaran']); ?></dd>
                                    </dl>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="card-footer">
                            <a href="<?php echo base_url('viewpembayaran'); ?>" class="btn btn-outline-info float-right">back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo view('_partials/footer'); ?>
