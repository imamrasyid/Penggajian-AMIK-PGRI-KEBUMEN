<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="<?php echo $this->mainlibrary->InitSettings(2)->meta_author ?>" />
    <meta name="description" content="<?php echo $this->mainlibrary->InitSettings(2)->meta_description ?>" />
    <meta name="keywords" content="<?php echo $this->mainlibrary->InitSettings(2)->meta_keywords ?>">
    <title><?php echo $this->mainlibrary->InitSettings(2)->web_title ?> - <?php echo $title ?></title>
    <link href="<?php echo base_url() ?>assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/datatables/datatables.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/sweetalert2/dist/sweetalert2.min.css">
    <script src="<?php echo base_url() ?>assets/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/custom.js"></script>
    <script data-search-pseudo-elements defer src="<?php echo base_url() ?>assets/vendors/cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url() ?>assets/vendors/cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
</head>
<body class="nav-fixed">
    <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
        <a class="navbar-brand" href="<?php echo base_url('home') ?>"><?php echo $this->mainlibrary->InitSettings(2)->web_title ?></a>
        <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle"><i data-feather="menu"></i></button>
        <ul class="navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown no-caret mr-3 mr-lg-0 dropdown-user">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="<?php echo base_url() ?>assets/assets/img/illustrations/profiles/profile-1.png" /></a>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                    <h6 class="dropdown-header d-flex align-items-center">
                        <img class="dropdown-user-img" src="<?php echo base_url() ?>assets/assets/img/illustrations/profiles/profile-1.png" />
                        <div class="dropdown-user-details">
                            <div class="dropdown-user-details-name"><?php echo $this->session->userdata('nama') ?></div>
                        </div>
                    </h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url('logout') ?>">
                        <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sidenav shadow-right sidenav-light">
                <div class="sidenav-menu">
                    <div class="nav accordion" id="accordionSidenav">
                        <div class="sidenav-menu-heading">Menu Utama</div>
                        <a class="nav-link <?php if ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'home'){echo 'active';} ?>" href="<?php echo base_url('home') ?>"><i class="fa fa-home mr-2"></i>Home</a>
                        <?php if ($this->session->userdata('level_akses') != "Admin") : ?>
                            <a class="nav-link" href="<?php echo base_url('gaji/penghitungan_gaji') ?>"><i class="fa fa-list mr-2"></i>Penghitungan Gaji</a>
                            <a class="nav-link <?php if ($this->uri->segment(2) == 'gaji'){ echo 'active'; } ?>" href="<?php echo base_url('gaji/riwayat_gaji') ?>"><i class="fa fa-history mr-2"></i>Riwayat</a>
                        <?php endif ?>
                        <?php if ($this->session->userdata('level_akses') == "Admin") : ?>
                            <div class="sidenav-menu-heading">Menu Admin</div>
                            <a class="nav-link <?php if ($this->uri->segment(2) == 'manajemenkepegawaian'){ echo 'active'; } ?>" href="<?php echo base_url('admin/manajemenkepegawaian') ?>"><i class="fa fa-users mr-2"></i>Manajemen Pegawai</a>
                            <a class="nav-link <?php if ($this->uri->segment(2) == 'manajemengaji'){ echo 'active'; } ?>" href="<?php echo base_url('admin/manajemengaji') ?>"><i class="fa fa-briefcase mr-2"></i>Manajemen Gaji</a>
                        <?php endif; ?>
                        <div class="sidenav-menu-heading">Menu Umpan Balik</div>
                        <a href="<?php echo base_url('umpanbalik') ?>" class="nav-link"><i class="fa fa-list mr-2"></i>Umpan Balik Anda</a>
                        <a href="<?php echo base_url('umpanbalik/buat_umpanbalik') ?>" class="nav-link"><i class="fa fa-comments mr-2"></i>Kirim Umpan Balik</a>
                </div>
                <div class="sidenav-footer fixed-bottom">
                    <div class="sidenav-footer-content">
                        <div class="sidenav-footer-subtitle">Login Sebagai:</div>
                        <div class="sidenav-footer-title"><?php echo $this->session->userdata('nama') ?></div>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>