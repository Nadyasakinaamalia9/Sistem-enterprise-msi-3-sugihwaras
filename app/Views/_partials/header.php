<?php

?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SIP Online</title>
    <style type="text/css" id="debugbar_dynamic_style"></style>
    <link rel="stylesheet" href="<?php echo base_url('themes/dist'); ?>/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url('themes/plugins'); ?>/fontawesome-free/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script type="text/javascript" id="debugbar_dynamic_script"></script>
    <script type="text/javascript" id="debugbar_loader" data-time="1585277113" src="<?php echo base_url('themes/plugins/'); ?>/index.php?debugbar"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <nav class="main-header navbar navbar-olive accent-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>


                </li>


            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <!-- <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
            </a> -->

                    <div class="user-panel mt-2 pb-2 mb-2 d-flex">
                        <div class="image">
                            <img src="<?php echo base_url('../uploads/') . "/" . session('foto'); ?>" class="brand-image img-circle elevation-2" alt="User Image">
                        </div>

                        <div class="info">
                            <?php $ambildata = session()->get('nama'); ?>
                            <a href="<?php echo base_url('guruprofil/edit14/' . session()->get('id_pegawai'));  ?>" class="d-block"><?php echo "$ambildata"; ?></a>
                        </div>
                    </div>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                        <a href="<?php echo base_url('auth/logout'); ?>" class="dropdown-item">
                            Logout
                        </a>

                    </div>

                </li>
            </ul>
        </nav>