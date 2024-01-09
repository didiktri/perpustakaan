<!DOCTYPE html>
<html>

<head>
    <title>Dashboard - Aplikasi Perpustakaan</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/datatable/datatables.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/dist/sweetalert.css' ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url() . 'assets/img/LOGO SMK ASSA.png'; ?>">
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/datatable/jquery.dataTables.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/datatable/datatables.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/dist/sweetalert.min.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/dist/sweetalert-dev.js' ?>"></script>
</head>

<body class="hold-transition layout-top-nav layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <nav class=" main navbar navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url() . 'admin'; ?>">Perpustakaan</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo base_url() . 'admin'; ?>"><span class="glyphicon glyphicon-home"></span> Dashboard <span class="sr-only">(current)</span></a></li>
                        <li><a href="<?php echo base_url() . 'admin/buku'; ?>"><span class="glyphicon glyphicon-book"></span>
                        Data Buku</a></li>
                        <li><a href="<?php echo base_url() . 'admin/anggota'; ?>"><span class="glyphicon glyphicon-user"></span> Data Anggota</a></li>
                        <li><a href="<?php echo base_url() . 'admin/transaksi'; ?>"><span class="glyphicon glyphicon-sort"></span> Transaksi Peminjaman</a></li>
                        <li><a href="<?php echo base_url() . 'admin/laporan'; ?>"><span class="glyphicon glyphicon-list-alt"></span> Laporan</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo "Halo, <b>" . $this->session->userdata('nama'); ?> [<?php echo $this->session->userdata('username'); ?>]</b></b>
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo base_url() . 'admin/ganti_password' ?>"><i class="glyphicon glyphicon-lock"></i> Ganti Password</a>
                                    </li>
                                    <li><a href="<?php echo base_url() . 'user/'; ?>"><span class="glyphicon glyphicon-user"></span> Tambah User</a></li>
                                    <li><a href="<?php echo base_url() . 'admin/logout'; ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <div class="container mt-3">