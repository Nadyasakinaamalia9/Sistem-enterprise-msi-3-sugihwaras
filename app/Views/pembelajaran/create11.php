<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">P E M B E L A J A R A N </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Pembelajaran</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('pembelajaran/store11'); ?>" method="post" enctype="multipart/form-data">
                        <!-- <?php echo form_open_multipart('pembelajaran/store11') ?> -->
                        <div class="card">
                            <div class="card-body">
                                <?php
                                // if (!empty($inputs)){
                                //   $inputs = session()->getFlashdata('inputs');
                                //}
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
                                <div class="row">
                                    <!-- <div class="col-md-6">
                                    <label for="">ID Pembelajaran</label>
                                    <input type="text" class="form-control" name="id_pembelajaran" placeholder="Masukkan id_pembelajaran" value="<?php  //echo $inputs['id_daftar']; }
                                                                                                                                                    ?>">
                                </div> -->
                                    <!-- Dropdown untuk memilih tahun ajaran -->
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tahun_ajaran">Tahun Ajaran</label>
                                        <select name="tahun_ajaran" class="form-control">
                                        <option value="">Pilih Tahun Ajaran</option>
                                        <?php foreach ($tahun_ajaran as $ajaran_item) : ?>
                                            <option value="<?php echo $ajaran_item['tahun_ajaran']; ?>"><?php echo $ajaran_item['tahun_ajaran']; ?></option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                    </div>
                                   <!-- Dropdown untuk memilih kelas -->
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kelas">Kelas</label>
                                        <select name="kelas" class="form-control">
                                        <option value="">Pilih Kelas</option>
                                        <?php foreach ($kelas as $kelas_item) : ?>
                                            <option value="<?php echo $kelas_item['kelas']; ?>"><?php echo $kelas_item['kelas']; ?></option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                    </div>
                                   
                                    <div class="col-md-6">
                                        <label for="">File</label>
                                        <input type="file" class="form-control" name="file" placeholder="Masukkan file" value="<?php  ?>">
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('pembelajaran'); ?>" class="btn btn-outline-info">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                            </div>
                        </div>
                        <!-- <?php form_close() ?> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo view('_partials/footer'); ?>