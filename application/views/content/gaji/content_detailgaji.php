<div class="container mt-3">
    <div class="row">
        <div class="col-lg-6 col-12 mt-3">
            <div class="card" style="border: 1px solid blue">
                <div class="card-header text-center">
                    <h3 class="card-title mt-3"><b>INFORMASI PEGAWAI</b></h3>
                </div>
                <div class="card-body">
                    <table class="table table-borderless table-hover text-center">
                        <tbody>
                            <tr>
                                <td width="50%">NIP</td>
                                <td><?php echo $this->gaji->GetDataPegawai()->nip ?></td>
                            </tr>
                            <tr>
                                <td>Nama Lengkap</td>
                                <td><?php echo $this->gaji->GetGelarPegawai($this->session->userdata('nama'))['gelar_depan'].' '.$this->session->userdata('nama').', '.$this->gaji->GetGelarPegawai($this->session->userdata('nama'))['gelar_belakang'] ?></td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td><?php echo $this->gaji->GetDataPegawai()->jabatan ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12 mt-3">
            <div class="card" style="border: 1px solid blue">
                <div class="card-header">
                    <h3 class="card-title text-center mt-3"><b>Informasi Gaji <?php echo $this->mainlibrary->GetMonths($gaji->bulan_gaji).' '.$gaji->tahun_gaji ?></b></h3>
                </div>
                <div class="card-body">
                    <table class="table table-borderless table-hover text-center">
                        <tbody>
                            <tr>
                                <td width="50%">Gaji Pokok</td>
                                <td>Rp. <?php echo number_format($gaji->gaji_pokok, '0',',','.') ?></td>
                            </tr>
                            <tr>
                                <td width="50%">Masa Kerja</td>
                                <td>Rp. <?php echo number_format($gaji->masa_kerja, '0',',','.') ?></td>
                            </tr>
                            <tr>
                                <td width="50%">Tunjangan</td>
                                <td>Rp. <?php echo number_format($gaji->tunjangan, '0',',','.') ?></td>
                            </tr>
                            <tr>
                                <td width="50%">Transport</td>
                                <td>Rp. <?php echo number_format($gaji->transport, '0',',','.') ?></td>
                            </tr>
                            <tr>
                                <td width="50%">Jumlah SKS</td>
                                <td>Rp. <?php echo number_format($gaji->sks, '0',',','.') ?></td>
                            </tr>
                            <tr>
                                <td width="50%">Lembur</td>
                                <td>Rp. <?php echo number_format($gaji->lembur, '0',',','.') ?></td>
                            </tr>
                            <tr>
                                <td width="50%">Tabungan Pensiun</td>
                                <td>Rp. <?php echo number_format($gaji->tabungan_pensiun, '0',',','.') ?></td>
                            </tr>
                            <tr>
                                <td width="50%">BPJS Ketenagakerjaan</td>
                                <td>Rp. <?php echo number_format($gaji->bpjs_ketenagakerjaan, '0',',','.') ?></td>
                            </tr>
                            <tr>
                                <td width="50%">BPJS Kesehatan</td>
                                <td>Rp. <?php echo number_format($gaji->bpjs_kesehatan, '0',',','.') ?></td>
                            </tr>
                            <tr>
                                <td width="50%">Potongan</td>
                                <td>Rp. <?php echo number_format($gaji->potongan, '0',',','.') ?></td>
                            </tr>
                            <tr>
                                <td width="50%">Total</td>
                                <td>Rp.<?php echo number_format($this->gaji->GetTotalGajiPegawai($gaji->id), 0, ',', '.') ?></td>
                            </tr>
                            <tr>
                                <td width="50%">Keterangan</td>
                                <td><?php echo $gaji->keterangan ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-12 mt-3">
            <div class="card">
                <div class="card-body text-center" style="border: 1px solid blue; border-radius: 5px">
                    <button type="button" class="btn btn-outline-danger" onclick="self.history.back()"><i class="fa fa-arrow-left mr-2"></i>Kembali</button>
                    <a href="<?php echo base_url('gaji/cetak_gaji?idx='.$gaji->id) ?>" target="_blank" class="btn btn-outline-primary"><i class="fa fa-print mr-2"></i>Cetak Detail Gaji</a>
                </div>
            </div>
        </div>
    </div>
</div>
</main>