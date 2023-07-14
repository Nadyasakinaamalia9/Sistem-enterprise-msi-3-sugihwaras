<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Nilai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Nilai</li>
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
                            List Nilai
                            <a href="<?php echo base_url('datanilai/create8'); ?>" class="btn btn-primary float-right">Tambah</a>
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

                            <!-- <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php
                                        // echo form_label('Cari Disini'); 
                                        // $form_keyword = [ 
                                        //     'type'  => 'text', 
                                        //     'name'  => 'keyword', 
                                        //     'id'    => 'keyword', 
                                        //     'value' => $keyword, 
                                        //     'class' => 'form-control', 
                                        //     'placeholder' => 'Silahkan Cari'
                                        // ]; 
                                        // echo form_input($form_keyword); 
                                        ?>
                                    </div>
                                </div>
                            </div> -->

                            <div class="table-responsive">
                                <table class="table table-bordered table-hovered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIS</th>
                                            <th>B.Indonesia</th>
                                            <th>B.Inggris</th>
                                            <th>Matematika</th>
                                            <th>IPA</th>
                                            <th>IPS</th>
                                            <th>Agama</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $nomor = 0;
                                        foreach ($dosen0072 as $key => $row) { ?>
                                            <tr>
                                                <td><?php echo $key + 1; ?></td>
                                                <td><?php echo $row['nis']; ?></td>
                                                <td><?php echo $row['bhs_indonesia']; ?></td>
                                                <td><?php echo $row['bhs_inggris']; ?></td>
                                                <td><?php echo $row['matematika']; ?></td>
                                                <td><?php echo $row['ipa']; ?></td>
                                                <td><?php echo $row['ips']; ?></td>
                                                <td><?php echo $row['agama']; ?></td>

                                                <!-- <td>
            
            
            <php if ($row['status'] == 'verifikasi') : ?>
                <span class="badge badge-success">Diverifikasi</span>
            <php elseif ($row['status'] == 'tolak') : ?>
                <span class="badge badge-danger">Ditolak</span>
            <php elseif ($row['status'] == 'tunggu') : ?>
                <span class="badge badge-secondary">Tunggu</span>
            <php endif; ?>
            
        </td> -->
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?php echo base_url('datanilai/show8/' . $row['nis']); ?>" class="btn btn-sm btn-primary">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="<?php echo base_url('datanilai/edit8/' . $row['nis']); ?>" class="btn btn-sm btn-success">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="<?php echo base_url('datanilai/delete8/' . $row['nis']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data nilai ini?');">
                                                            <i class="fa fa-trash-alt"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mt-3 float-right">
                                <div class="col-md-12">
                                    <?php echo $pager->links('datanilai', 'bootstrap_pagination')
                                    ?>
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