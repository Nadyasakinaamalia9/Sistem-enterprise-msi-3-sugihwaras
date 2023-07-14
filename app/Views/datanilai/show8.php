<?php echo view("_partials/header"); ?>
<?php echo view("_partials/sidebar"); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Show Data Nilai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">home</a></li>
                        <li class="breadcrumb-item active">Show Data Nilai</li>
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
                                <div class="col-md-12">
                                    
                                    <dl class="dl-horizontal">
                                    <!-- <img src="<php echo base_url('upload/' . $datanilai['bukti_spp']) ?>" class="img-fluid"> -->
                                    
                                        <dt>NIS</dt>
                                        <dd><?php echo $datanilai['nis']; ?></dd>
                                        <dt>Bahasa Indonesia</dt>
                                        <dd><?php echo $datanilai['bhs_indonesia']; ?></dd>
                                        <dt>Bahasa Inggris</dt>
                                        <dd><?php echo $datanilai['bhs_inggris']; ?></dd>
                                        <dt>Matematika</dt>
                                        <dd><?php echo $datanilai['matematika']; ?></dd>
                                        <dt>IPA</dt>
                                        <dd><?php echo $datanilai['ipa']; ?></dd>
                                        <dt>IPS</dt>
                                        <dd><?php echo $datanilai['ips']; ?></dd>
                                        <dt>Agama</dt>
                                        <dd><?php echo $datanilai['agama']; ?></dd>
                                    </dl>
                                       
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="<?php echo base_url('datanilai'); ?>" class="btn btn-outline-info float-right">back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php echo view('_partials/footer'); ?>