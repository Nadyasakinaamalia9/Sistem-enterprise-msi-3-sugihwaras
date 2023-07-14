<?php echo view('_partials/header'); ?> 
<?php echo view('_partials/sidebar'); ?> 

<div class="content-wrapper"> 
    <div class="content-header"> 
        <div class="container-fluid"> 
            <div class="row mb-2"> 
                <div class="col-sm-6"> 
                    <h1 class="m-0 text-dark">Show Buku</h1> 
                </div> 
                <div class="col-sm-6"> 
                    <ol class="breadcrumb float-sm-right"> 
                        <li class="breadcrumb-item"><a href="#">Home</a></li> 
                        <li class="breadcrumb-item active">Show Buku</li> 
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
                                <div class="col-and-8"> 
                                    <dl class="dl-horizontal"> 
                                        <dt>Judul Buku</dt>
                                        <dd><?php echo $category['judul_buku']; ?></dd> 
                                        
                                        <dt>Penulis</dt>
                                        <dd><?php echo $category['penulis']; ?></dd> 
                                        
                                        <dt>Penerbit</dt> 
                                        <dd><?php echo $category['penerbit']; ?></dd>
                                        <dt>Stok Buku</dt> 
                                        <dd><?php echo $category['stok_buku']; ?></dd> 
                                        <dt>Status Buku</dt> 
                                        <dd><?php echo $category['status_buku']; ?></dd> 
                                    </dl> 
                                </div> 
                            </div> 
                        </div>
                        <div class="card-footer"> 
                            <a href="<?php echo base_url('category'); ?>" class="btn btn-outline-info float-right">Back</a> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</div> 
<?php echo view('_partials/footer'); ?> 
