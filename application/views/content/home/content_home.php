<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title"><i class="<?php if ($this->uri->segment(1) == "home"){echo 'fa fa-home mr-2';} if ($this->uri->segment(1) == "penggajian"){echo 'fa fa-briefcase mr-2';} ?>"></i><?php echo $header ?></h1>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container mt-n10">
    <div class="row">
        <div class="col-xxl-4 col-xl-12 mb-4">
            <div class="card h-100">
                <div class="card-body h-100 d-flex flex-column justify-content-center py-5 py-xl-4">
                    <div class="row align-items-center">
                        <div class="col-xl-8 col-xxl-12">
                            <div class="text-center text-xl-left text-xxl-center px-4 mb-4 mb-xl-0 mb-xxl-4">
                                <h1 class="text-primary">Selamat Datang Di Sistem Informasi Penggajian Pegawai AMIK PGRI KEBUMEN!</h1>
                            </div>
                        </div>
                        <div class="col-xl-4 col-xxl-12 text-center">
                            <img class="img-fluid" src="<?php echo base_url() ?>assets/assets/img/illustrations/at-work.svg" style="max-width: 26rem">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-3 col-lg-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mr-3">
                            <div class="text-white-75 small">Nama Lengkap</div>
                            <div class="text-lg font-weight-bold"><?php echo $this->home->GetGelarPegawai($this->session->userdata('nama'))['gelar_depan'] ?> <?php echo $this->session->userdata('nama') ?>, <?php echo $this->home->GetGelarPegawai($this->session->userdata('nama'))['gelar_belakang'] ?></div>
                        </div>
                        <i class="fa fa-user"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-lg-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mr-3">
                            <div class="text-white-75 small">Masa Kerja</div>
                            <div class="text-lg font-weight-bold">-</div>
                        </div>
                        <i class="fa fa-calendar"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-lg-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mr-3">
                            <div class="text-white-75 small">Jabatan</div>
                            <div class="text-lg font-weight-bold">
                                <?php echo $this->session->userdata('level_akses') ?>
                            </div>
                        </div>
                        <i class="fa fa-briefcase"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-lg-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mr-3">
                            <div class="text-white-75 small">Status Gaji Bulan Ini</div>
                            <div class="text-lg font-weight-bold"><?php echo $this->home->GetGajiPegawaiBulanIni() ?></div>
                        </div>
                        <i class="fa fa-list"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center">
            <a href="<?php echo base_url('gaji/penghitungan_gaji') ?>" class="btn btn-primary">Bagaimana Cara Menghitung Gaji Anda?</a>
            <?php
            switch ($this->home->CekGajiPegawaiBulanIni())
            {
                case true:
                    {
                        ?>
                        <a href="<?php echo base_url('gaji/detail_gaji?idx='.$this->home->GetIdGajiBulanIni()) ?>" class="btn btn-primary">Gaji Bulan Ini Telah Tersedia</a>
                        <?php
                        break;
                    }
                case false:
                default:
                    break;
            }
            ?>
        </div>
    </div>
</div>