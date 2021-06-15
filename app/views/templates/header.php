<html class="no-js">
 <head>
        <title>Dashboard Admin</title>
        <!-- Bootstrap -->
        <link href="<?= BASEURL;?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?= BASEURL;?>/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="<?= BASEURL;?>/js/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="<?= BASEURL;?>/assets/styles.css" rel="stylesheet" media="screen">
        <script src="<?= BASEURL;?>/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    
     
     
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="">Admin Panel</a>
                    <a class="brand" href=""></b> <?php echo $data['nama']; ?></a> 
                    <a class="brand" href=""><b></b></a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><? echo $_SESSION['username'] ?><i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href=" <?= BASEURL; ?>/admin/logout">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                               </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
    <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li class="active">
                            <a href="<?= BASEURL; ?>/admin/index"><i class="icon-chevron-right"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?= BASEURL; ?>/admin/infoKPSPAMS"><i class="icon-chevron-right"></i> Identitas KPSPAMS</a>
                        </li>
                        <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Master Data<i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="<?= BASEURL; ?>/admin/tambahpelanggan">Tambah Pelanggan</a>
                                        <a tabindex="-1" href="<?= BASEURL; ?>/admin/tambahinventaris">Tambah Inventaris</a>
                                        <a tabindex="-1" href="<?= BASEURL; ?>/admin/tambahtarif">Tambah Tarif</a>
                                        <a tabindex="-1" href="<?= BASEURL; ?>/admin/tambahakun">Tambah Akun</a>
                                        <a tabindex="-1" href="<?= BASEURL; ?>/admin/tambahkaryawan">Tambah Karyawan</a> 
                                    </li>
                                </ul> 
                            </li>
                        <li>
                        <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Transaksi<i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="<?= BASEURL; ?>/admin/pencatatan">Pencatatan</a>
                                        <a tabindex="-1" href="<?= BASEURL; ?>/admin/pembayaran">Pembayaran</a>
                                        <a tabindex="-1" href="<?= BASEURL; ?>/admin/transaksihutang">Transaksi Hutang Pelanggan</a>
                                    </li>
                                </ul>
                            </li>
                        <li>
                            <a href="<?= BASEURL; ?>/admin/kontakdeveloper"><i class="icon-chevron-right"></i> Kontak</a>
                        </li>
                        <li>
                            <a href="<?= BASEURL; ?>/admin/keterangan"><i class="icon-chevron-right"></i> Keterangan</a>
                        </li>
                    </ul>
                </div>