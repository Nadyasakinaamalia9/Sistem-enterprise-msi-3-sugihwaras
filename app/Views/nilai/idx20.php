<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Daftar Nilai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">NILAI</li>
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
                                        <th>B. Indo</th>
                                        <th>B. Inggris</th>
                                        <th>Matematika</th>
                                        <th>IPA</th>
                                        <th>IPS</th>
                                        <th>Agama</th>

                                            <!--  <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php if (!empty($nilaiSiswa)): ?>
                                        <?php
                                        $nomor = 0;
                                       foreach ($nilaiSiswa as $siswa): ?>
                                            <tr>
                                                <td><?php echo $nomor+1?></td>
                                                <td><?php echo $siswa['nis']; ?></td>
                                                <td><?php echo $siswa['bhs_indonesia']; ?></td>
                                                <td><?php echo $siswa['bhs_inggris']; ?></td>
                                                <td><?php echo $siswa['matematika']; ?></td>
                                                <td><?php echo $siswa['ipa']; ?></td>
                                                <td><?php echo $siswa['ips']; ?></td>
                                                <td><?php echo $siswa['agama']; ?></td>
                                                
                                                
                                                <?php endforeach; ?>
                                <?php else : ?>
                                        <p>Tidak ada nis yang ditemukan.</p>
                                    <?php endif; ?>

                                                    
                                                    
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