<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-borderless table-responsive-lg table-responsive-md table-responsive-sm text-center">
                        <thead class="bg-primary-soft">
                            <th colspan="2">Informasi Pegawai</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="30%">NIP</td>
                                <td width="70%"><?php echo $this->manajemengaji->GetPegawai($gaji->id_pegawai)->nip; ?></td>
                            </tr>
                            <tr>
                                <td width="30%">Nama Pegawai</td>
                                <td width="70%"><?php echo $this->manajemengaji->GetNamaPegawaiById($gaji->id_pegawai) ?></td>
                            </tr>
                            <tr>
                                <td width="30%">Jabatan</td>
                                <td width="70%"><?php echo $this->manajemengaji->GetPegawai($gaji->id_pegawai)->jabatan; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-borderless table-responsive-lg table-responsive-md table-responsive-sm text-center">
                        <thead class="bg-primary-soft">
                            <th colspan="2">Informasi Gaji</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="30%">Gaji Pokok</td>
                                <td width="70%">Rp. <?php echo number_format($gaji->gaji_pokok, 0, ',', '.') ?></td>
                            </tr>
                            <tr>
                                <td width="30%">Masa Kerja</td>
                                <td width="70%">Rp. <?php echo number_format($gaji->masa_kerja, 0, ',', '.') ?></td>
                            </tr>
                            <tr>
                                <td width="30%">Tunjangan</td>
                                <td width="70%">Rp. <?php echo number_format($gaji->tunjangan, 0, ',', '.') ?></td>
                            </tr>
                            <tr>
                                <td width="30%">Transport</td>
                                <td width="70%">Rp. <?php echo number_format($gaji->transport, 0, ',', '.') ?></td>
                            </tr>
                            <tr>
                                <td width="30%">SKS</td>
                                <td width="70%">Rp. <?php echo number_format($gaji->sks, 0, ',', '.') ?></td>
                            </tr>
                            <tr>
                                <td width="30%">Lembur</td>
                                <td width="70%">Rp. <?php echo number_format($gaji->lembur, 0, ',', '.') ?></td>
                            </tr>
                            <tr>
                                <td width="30%">Tabungan Pensiun</td>
                                <td width="70%">Rp. <?php echo number_format($gaji->tabungan_pensiun, 0, ',', '.') ?></td>
                            </tr>
                            <tr>
                                <td width="30%">BPJS Ketenagakerjaan</td>
                                <td width="70%">Rp. <?php echo number_format($gaji->bpjs_ketenagakerjaan, 0, ',', '.') ?></td>
                            </tr>
                            <tr>
                                <td width="30%">BPJS Kesehatan</td>
                                <td width="70%">Rp. <?php echo number_format($gaji->bpjs_kesehatan, 0, ',', '.') ?></td>
                            </tr>
                            <tr>
                                <td width="30%">Potongan</td>
                                <td width="70%">Rp. <?php echo number_format($gaji->potongan, 0, ',', '.') ?></td>
                            </tr>
                            <tr>
                                <td width="30%">Keterangan</td>
                                <td width="70%"><?php if ($gaji->keterangan == '' || $gaji->keterangan == null) echo 'Tidak ada keterangan.'; else echo $gaji->keterangan ?></td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>Rp. <?php echo number_format($this->manajemengaji->GetTotalGajiPegawai($this->input->get('idx', true)), 0, ',', '.') ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-right mt-3">
                        <input type="button" class="btn btn-outline-danger" onclick="self.history.back();" value="Kembali">
                        <input type="button" class="btn btn-outline-primary" onclick="ShowToast(2000, 'info' ,'Fitur Cetak Untuk Admin Belum Tersedia.')" value="Cetak">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>