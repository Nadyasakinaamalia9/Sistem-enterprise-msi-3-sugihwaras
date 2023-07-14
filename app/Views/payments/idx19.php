<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Daftar Pembayaran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">SPP</li>
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
                        <div class="card-header">
                            <!-- List Siswa -->
                            
                        </div>


                        <div class="card-body">
                            <?php
                            if (!empty(session()->getFlashdata('success'))) { ?>
                                <div class="alert alert-success">
                                    <?php echo session()->getFlashdata('success'); ?>
                                </div>
                            <?php } ?>

                            <?php if (!empty(session()->getFlashdata('info'))) { ?>
                                <div class="alert alert-info">
                                    <?php echo session()->getFlashdata('info'); ?>
                                </div>
                            <?php } ?>

                            <?php if (!empty(session()->getFlashdata('warning'))) { ?>
                                <div class="alert alert-warning">
                                    <?php echo session()->getFlashdata('warning'); ?>
                                </div>
                            <?php } ?>

                           

                            <div class="table-responsive">
                                <table class="table table-bordered table-hovered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIS</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Bulan</th>
                                            <th>Beban Pembayaran</th>
                                            <th>Bukti Spp</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php if (!empty($payments)): ?>
                                        <?php
                                        $nomor = 0;
                                       foreach ($payments as $payment): ?>
                                            <tr>
                                                <td><?php echo $nomor+1?></td>
                                                <td><?php echo $payment['nis']; ?></td>
                                                <td><?php echo $payment['tanggal_bayar']; ?></td>
                                                <td><?php echo $payment['bulan']; ?></td>
                                                <td><?php echo $payment['beban_pembayaran']; ?></td>
                                                <td><img src="<?php echo base_url('../uploads/' . $payment['bukti_spp']) ?>" class="rounded-circle" width="50" height="50"></td>
                                                
                                                <td>
                                                <?php endforeach; ?>
                                                    <?php else : ?>
                                                            <p>Tidak ada pembayaran yang ditemukan.</p>
                                                        <?php endif; ?>

                                                    
                                                    <div class="btn-group">
                                                    <a href="<?php echo base_url('viewpembayaran/show19/' . $payment['nis']); ?>" class="btn btn-sm btn-primary">   
                                                   
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                          
                                                        <!-- <a href="<php echo base_url('spp/edit4/' . $row['nis']); ?>" class="btn btn-sm btn-success">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="<php echo base_url('spp/delete4/' . $row['nis']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Pendaftar ini?');">
                                                            <i class="fa fa-trash-alt"></i>
                                                        </a> -->
                                                    </div>
                                                </td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- <div class="row mt-3 float-right">
                                <div class="col-md-12">
                                   echo payment
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo view('_partials/footer'); ?>