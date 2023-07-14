<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Data Nilai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Data Nilai</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('datanilai/update8'); ?>" method="post">
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

                                <!-- <div class="form-group">
                                    <label for="">NIS</label>
                                    <input type="hidden" value="<?php echo $datanilai['nis']; ?>" class="form-control" name="nis" placeholder="Enter category name">
                                </div> -->
                                <div class="form-group">
                                    <label for="">NIS</label>
                                    <input type="text" name="nis" value="<?php echo isset($datanilai['nis']) ? $datanilai['nis'] : ''; ?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">B.Indonesia</label>
                                    <input type="text" value="<?php echo $datanilai['bhs_indonesia']; ?>" class="form-control" name="bhs_indonesia" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="">B.Inggris</label>
                                    <input type="text" value="<?php echo $datanilai['bhs_inggris']; ?>" class="form-control" name="bhs_inggris" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="">Matematika </label>
                                    <input type="text" value="<?php echo $datanilai['matematika']; ?>" class="form-control" name="matematika" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="">IPA</label>
                                    <input type="text" value="<?php echo $datanilai['ipa']; ?>" class="form-control" name="ipa" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="">IPS</label>
                                    <input type="text" value="<?php echo $datanilai['ips']; ?>" class="form-control" name="ips" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="">Agama</label>
                                    <input type="text" value="<?php echo $datanilai['agama']; ?>" class="form-control" name="agama" placeholder="Enter category name">  
                                </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('datanilai'); ?>" class="btn btn-outline-info">Back</a>
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
