<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <!-- Tambahkan judul laporan pembayaran -->
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Laporan Pembayaran</h1>
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-hovered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIS</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Bulan</th>
                                            <th>Beban Pembayaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $nomor = 0;
                                        foreach ($dosen0072 as $key => $row) { ?>
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td><?php echo $row['nis']; ?></td>
                                                <td><?php echo $row['tanggal_bayar']; ?></td>
                                                <td><?php echo $row['bulan']; ?></td>
                                                <td><?php echo $row['beban_pembayaran']; ?></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>

                                </table>
                                <div class="card-footer">
                                    <a href="<?php echo base_url('spp'); ?>" class="btn btn-outline-info">Back</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo view('_partials/footer'); ?>