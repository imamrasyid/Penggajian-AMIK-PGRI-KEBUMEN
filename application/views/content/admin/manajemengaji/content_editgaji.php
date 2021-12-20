<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <?php echo form_open('', 'id="editgaji_form" autocomplete="off"') ?>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Pegawai</label>
                            <input type="text" class="form-control col-9" value="<?php echo $this->manajemengaji->GetNamaPegawaiById($gaji->id_pegawai) ?>" disabled readonly>
                            <input type="hidden" id="id_gaji" name="id_gaji" value="<?php echo $this->input->get('idx', true) ?>">
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Gaji Pokok</label>
                            <input type="number" id="gaji_pokok" name="gaji_pokok" class="form-control col-9" value="<?php echo $gaji->gaji_pokok ?>" placeholder="Masukkan Gaji Pokok (Contoh: 300000)" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Gaji Masa Kerja</label>
                            <input type="number" id="masa_kerja" name="masa_kerja" class="form-control col-9" value="<?php echo $gaji->masa_kerja ?>" placeholder="Masukkan Gaji Masa Kerja" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Gaji Tunjangan</label>
                            <input type="number" id="tunjangan" name="tunjangan" class="form-control col-9" value="<?php echo $gaji->tunjangan ?>" placeholder="Masukkan Gaji Tunjangan" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Gaji Transport</label>
                            <input type="number" id="transport" name="transport" class="form-control col-9" value="<?php echo $gaji->transport ?>" placeholder="Masukkan Gaji Transport" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Gaji SKS</label>
                            <input type="number" id="sks" name="sks" class="form-control col-9" value="<?php echo $gaji->sks ?>" placeholder="Masukkan Gaji SKS" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Gaji Lembur</label>
                            <input type="number" id="lembur" name="lembur" class="form-control col-9" value="<?php echo $gaji->lembur ?>" placeholder="Masukkan Gaji Lembur" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Tabungan Pensiun</label>
                            <input type="number" id="tabungan_pensiun" name="tabungan_pensiun" class="form-control col-9" value="<?php echo $gaji->tabungan_pensiun ?>" placeholder="Masukkan Tabungan Pensiun" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">BPJS Ketenagakerjaan</label>
                            <input type="number" id="bpjs_ketenagakerjaan" name="bpjs_ketenagakerjaan" class="form-control col-9" value="<?php echo $gaji->bpjs_ketenagakerjaan ?>" placeholder="Masukkan BPJS Ketenagakerjaan" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">BPJS Kesehatan</label>
                            <input type="number" id="bpjs_kesehatan" name="bpjs_kesehatan" class="form-control col-9" value="<?php echo $gaji->bpjs_kesehatan ?>" placeholder="Masukkan BPJS Kesehatan" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Potongan</label>
                            <input type="number" id="potongan" name="potongan" class="form-control col-9" value="<?php echo $gaji->potongan ?>" placeholder="Masukkan Potongan" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Keterangan</label>
                            <textarea id="keterangan" name="keterangan" class="form-control col-9" rows="10" placeholder="Masukkan Keterangan (Jika Ada)"><?php echo $gaji->keterangan ?></textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col-3">
                                <label class="col-form-label">Tanggal Gaji</label>
                            </div>
                            <div class="col-3">
                                <select id="bulan_gaji" name="bulan_gaji" class="form-control" required>
                                    <option value="" disabled>Pilih Bulan</option>
                                    <option value="1" <?php if ($gaji->bulan_gaji == 1){echo 'selected';} ?>>Januari</option>
                                    <option value="2" <?php if ($gaji->bulan_gaji == 2){echo 'selected';} ?>>Februari</option>
                                    <option value="3" <?php if ($gaji->bulan_gaji == 3){echo 'selected';} ?>>Maret</option>
                                    <option value="4" <?php if ($gaji->bulan_gaji == 4){echo 'selected';} ?>>April</option>
                                    <option value="5" <?php if ($gaji->bulan_gaji == 5){echo 'selected';} ?>>Mei</option>
                                    <option value="6" <?php if ($gaji->bulan_gaji == 6){echo 'selected';} ?>>Juni</option>
                                    <option value="7" <?php if ($gaji->bulan_gaji == 7){echo 'selected';} ?>>Juli</option>
                                    <option value="8" <?php if ($gaji->bulan_gaji == 8){echo 'selected';} ?>>Agustus</option>
                                    <option value="9" <?php if ($gaji->bulan_gaji == 9){echo 'selected';} ?>>September</option>
                                    <option value="10" <?php if ($gaji->bulan_gaji == 10){echo 'selected';} ?>>Oktober</option>
                                    <option value="11" <?php if ($gaji->bulan_gaji == 11){echo 'selected';} ?>>November</option>
                                    <option value="12" <?php if ($gaji->bulan_gaji == 12){echo 'selected';} ?>>Desember</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <select id="tahun_gaji" name="tahun_gaji" class="form-control" required>
                                    <option value="" disabled selected>Pilih Tahun</option>
                                    <?php for ($i = date('Y'); $i < (date('Y') + 10); $i++) : ?>
                                        <option value="<?php echo $i ?>" <?php if ($gaji->tahun_gaji == $i){ echo 'selected';} ?>><?php echo $i ?></option>
                                    <?php endfor ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Status Publish</label>
                            <select id="status_publish" name="status_publish" class="form-control col-9" required>
                                <option value="" disabled selected>Pilih Status Publish</option>
                                <option value="Publish" <?php if ($gaji->status_publish == "Publish"){echo 'selected';} ?>>Publish</option>
                                <option value="Draft" <?php if ($gaji->status_publish == "Draft"){echo 'selected';} ?>>Draft</option>
                            </select>
                        </div>
                        <div class="form-group text-right">
                            <input type="button" class="btn btn-outline-danger" onclick="self.history.back()" value="Kembali">
                            <input type="submit" id="submit" class="btn btn-outline-primary" value="Edit Gaji">
                        </div>
                    <?php echo form_close() ?>
                    <script>
                        var CSRF_TOKEN = '<?php echo $this->security->get_csrf_hash() ?>';

                        $(document).ready(() => {
                            $('#editgaji_form').on('submit', (e) => {
                                e.preventDefault();

                                return SubmitGaji(document.getElementById('editgaji_form'));
                            });
                        });

                        function SubmitGaji(data){
                            ButtonState('submit', 'button', 'Memproses...');
                            var formData = new FormData(data);

                            $.ajax({
                                url: '<?php echo base_url('admin/manajemengaji/do_editgaji') ?>',
                                type: 'POST',
                                dataType: 'JSON',
                                data: formData,
                                contentType: false,
                                processData: false,
                                timeout: 0,
                                success: (response) => {
                                    var GetString = JSON.stringify(response);
                                    var Result = JSON.parse(GetString);

                                    ButtonState('submit', 'button', 'Edit Gaji');
                                    ShowToast(2000, Result.status, Result.message);
                                    if (Result.status === 'success'){
                                        setTimeout(() => {
                                            self.history.back();
                                        }, 2000);
                                    }
                                    else{
                                        setTimeout(() => {
                                            window.location.reload();
                                        }, 2000);
                                    }
                                },
                                error: () => {
                                    ButtonState('submit', 'submit', 'Edit Gaji');
                                    ShowToast(2000, 'error', 'Error: Server tidak merespon.');
                                    setTimeout(() => {
                                        window.location.reload();
                                    }, 2000);
                                }
                            });
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>