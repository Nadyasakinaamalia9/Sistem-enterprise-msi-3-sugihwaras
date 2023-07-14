<?php echo view("_partials/header"); ?>
<?php echo view("_partials/sidebar"); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Show Pembelajaran</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">home</a></li>
            <li class="breadcrumb-item active">Show Pembelajaran</li>
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
                  <dl class="dl-horizontal">
                    <dt>Tahun Ajaran</dt>
                    <dd><?php echo $pembelajaran['tahun_ajaran']; ?></dd>
                    <dt>Kelas</dt>
                    <dd><?php echo $pembelajaran['kelas']; ?></dd>
                    <dt>File</dt>
                    <dd><?php echo $pembelajaran['file']; ?></dd>
                    <a href="<?php echo base_url('../uploads/' . $pembelajaran['file']) ?>">View FILE</a>
                  </dl>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url('Pembelajaran'); ?>" class="btn btn-outline-info float-right">back</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php echo view('_partials/footer'); ?>