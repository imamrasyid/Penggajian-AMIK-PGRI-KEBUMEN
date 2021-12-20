<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header bg-primary-soft text-center">Detail Pegawai</div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <table class="table table-striped table-responsive-lg table-responsive-md table-responsive-sm">
                                    <tbody>
                                        <tr>
                                            <td width="30%">NIP</td>
                                            <td width="70%"><?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->nip ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Lengkap</td>
                                            <td>
                                                <?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->gelar_depan . ' ' . $this->manajemenkepegawaian->GetDetailDataPegawai()->nama_pegawai . ', '.$this->manajemenkepegawaian->GetDetailDataPegawai()->gelar_belakang ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>NIDN</td>
                                            <td><?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->nidn ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tempat / Tgl Lahir</td>
                                            <td><?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->tempat_lahir ?>, <?php echo $this->mainlibrary->ParseTanggalLahir($this->manajemenkepegawaian->GetDetailDataPegawai()->tanggal_lahir) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td><?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->jenis_kelamin ?></td>
                                        </tr>
                                        <tr>
                                            <td>Agama</td>
                                            <td><?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->agama ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td><?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->alamat ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <table class="table table-striped table-responsive-lg table-responsive-md table-responsive-sm">
                                    <tbody>
                                        <tr>
                                            <td width="30%">Email</td>
                                            <td width="70%"><?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->email ?></td>
                                        </tr>
                                        <tr>
                                            <td>No Hp</td>
                                            <td><?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->no_hp ?></td>
                                        </tr>
                                        <tr>
                                            <td>Status Pegawai</td>
                                            <td><?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->status_pegawai ?></td>
                                        </tr>
                                        <tr>
                                            <td>Status Kawin</td>
                                            <td><?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->status_kawin ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pendidikan Terakhir</td>
                                            <td><?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->pendidikan_terakhir ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jabatan</td>
                                            <td><?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->jabatan ?></td>
                                        </tr>
                                        <tr>
                                            <td>Foto</td>
                                            <td><img src="<?php echo base_url() ?>assets/assets/img/foto_pegawai/<?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->foto ?>" alt="Foto Pegawai" style="max-width: 150px;"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row justify-content-start">
                            <button type="button" class="btn btn-danger" onclick="self.history.back()"><i class="fa fa-arrow-left mr-2"></i>Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>