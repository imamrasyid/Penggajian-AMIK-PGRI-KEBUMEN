<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header text-center">Formulir Tambah Pegawai</div>
                <div class="card-body">
                    <?php echo form_open_multipart('', 'id="editpegawai_form" autocomplete="off"') ?>
                        <p id="optional_message"></p>
                        <div class="form-group row">
                            <label class="col-form-label col-3">NIP</label>
                            <input type="text" class="form-control col-9" value="<?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->nip ?>" disabled readonly>
                            <input type="hidden" id="nip" name="nip" value="<?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->nip ?>">
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Nama Lengkap</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control col-9" value="<?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->nama_pegawai ?>" placeholder="Masukkan Nama Lengkap" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">NIDN</label>
                            <input type="text" id="nidn" name="nidn" class="form-control col-9" value="<?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->nidn ?>" placeholder="Masukkan NIDN (Jika Ada)">
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Gelar Depan</label>
                            <input type="text" id="gelar_depan" name="gelar_depan" class="form-control col-9" value="<?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->gelar_depan ?>" placeholder="Masukkan Gelar Depan (Jika Ada)">
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Gelar Belakang</label>
                            <input type="text" id="gelar_belakang" name="gelar_belakang" class="form-control col-9" value="<?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->gelar_belakang ?>" placeholder="Masukkan Gelar Belakang (Jika Ada)">
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control col-9" value="<?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->tempat_lahir ?>" placeholder="Masukkan Tempat Lahir" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Tanggal Lahir</label>
                            <input type="text" id="tanggal_lahir" name="tanggal_lahir" class="form-control col-9" value="<?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->tanggal_lahir ?>" placeholder="Masukkan Tanggal Lahir (01-01-1970)" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control col-9" required>
                                <option value="" disabled>Pilih Jenis Kelamin</option>
                                <option value="Pria" <?php if ($this->manajemenkepegawaian->GetDetailDataPegawai()->jenis_kelamin == "Pria"){echo 'selected';} ?>>Pria</option>
                                <option value="Wanita" <?php if ($this->manajemenkepegawaian->GetDetailDataPegawai()->jenis_kelamin == "Wanita"){echo 'selected';} ?>>Wanita</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Agama</label>
                            <select id="agama" name="agama" class="form-control col-9" required>
                                <option value="" disabled selected>Pilih Agama</option>
                                <option value="Islam" <?php if ($this->manajemenkepegawaian->GetDetailDataPegawai()->agama == 'Islam'){ echo 'selected';} ?>>Islam</option>
                                <option value="Katolik" <?php if ($this->manajemenkepegawaian->GetDetailDataPegawai()->agama == 'Katolik'){ echo 'selected';} ?>>Katolik</option>
                                <option value="Protestan" <?php if ($this->manajemenkepegawaian->GetDetailDataPegawai()->agama == 'Protestan'){ echo 'selected';} ?>>Protestan</option>
                                <option value="Hindu" <?php if ($this->manajemenkepegawaian->GetDetailDataPegawai()->agama == 'Hindu'){ echo 'selected';} ?>>Hindu</option>
                                <option value="Budha" <?php if ($this->manajemenkepegawaian->GetDetailDataPegawai()->agama == 'Budha'){ echo 'selected';} ?>>Budha</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Alamat</label>
                            <textarea id="alamat" name="alamat" rows="8" class="form-control col-9" placeholder="Masukkan Alamat" required><?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->alamat ?></textarea>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Email</label>
                            <input type="email" id="email" name="email" class="form-control col-9" value="<?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->email ?>" placeholder="Masukkan Email (Aktif)" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">No Hp</label>
                            <select id="kode_negara" name="kode_negara" class="form-control col-1" title="Kode Negara" required>
                                <option value="+62" selected>+62</option>
                            </select>
                            <input type="number" id="no_hp" name="no_hp" class="form-control col-8" value="<?php echo $this->mainlibrary->ParseNomorHp($this->manajemenkepegawaian->GetDetailDataPegawai()->no_hp) ?>" placeholder="Masukkan No Hp" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Status Pegawai</label>
                            <select id="status_pegawai" name="status_pegawai" class="form-control col-9" required>
                                <option value="" disabled selected>Pilih Status Pegawai</option>
                                <option value="Aktif" <?php if ($this->manajemenkepegawaian->GetDetailDataPegawai()->status_pegawai == 'Aktif'){echo 'selected';} ?>>Aktif</option>
                                <option value="Tidak Aktif" <?php if ($this->manajemenkepegawaian->GetDetailDataPegawai()->status_pegawai == 'Tidak Aktif'){echo 'selected';} ?>>Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Status Kawin</label>
                            <select id="status_kawin" name="status_kawin" class="form-control col-9" required>
                                <option value="" disabled selected>Pilih Status Kawin</option>
                                <option value="Kawin" <?php if ($this->manajemenkepegawaian->GetDetailDataPegawai()->status_kawin == 'Kawin'){echo 'selected';} ?>>Kawin</option>
                                <option value="Belum Kawin" <?php if ($this->manajemenkepegawaian->GetDetailDataPegawai()->status_kawin == 'Belum Kawin'){echo 'selected';} ?>>Belum Kawin</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Pendidikan Terakhir</label>
                            <input type="text" id="pendidikan_terakhir" name="pendidikan_terakhir" class="form-control col-9" value="<?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->pendidikan_terakhir ?>" placeholder="Masukkan Pendidikan Terakhir (D3 MANAJEMEN INFORMATIKA AMIK PGRI KEBUMEN)" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Jabatan</label>
                            <input type="text" id="jabatan" name="jabatan" class="form-control col-9" value="<?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->jabatan ?>" placeholder="Masukkan Jabatan" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Foto</label>
                            <input type="file" id="foto" name="foto" class="form-control-file col-9">
                        </div>
                        <div class="form-group row">
                            <div class="col-3">
                                <label class="col-form-label">Foto Lama</label>
                            </div>
                            <div class="col-9">
                                <img src="<?php echo base_url() ?>assets/assets/img/foto_pegawai/<?php echo $this->manajemenkepegawaian->GetDetailDataPegawai()->foto ?>" alt="Foto Pegawai" style="max-width: 150px;">
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <input type="submit" id="submit" class="btn btn-primary" value="Edit Data">
                        </div>
                    <?php echo form_close() ?>
                    <script>
                        $(document).ready(() => {
                            $('#editpegawai_form').on('submit', (e) => {
                                e.preventDefault();

                                return Do_EditPegawai(document.getElementById('editpegawai_form'));
                            });
                        });

                        function Do_EditPegawai(data)
                        {
                            var formData = new FormData(data);
                            ButtonState('submit', 'button', 'Memproses...');

                            $.ajax({
                                url: '<?php echo base_url('admin/manajemenkepegawaian/do_editpegawai') ?>',
                                type: 'POST',
                                dataType: 'JSON',
                                data: formData,
                                contentType: false,
                                processData: false,
                                timeout: 0,
                                success: (response) => {
                                    var GetString = JSON.stringify(response);
                                    var Result = JSON.parse(GetString);

                                    ButtonState('submit', 'submit', 'Edit Data');
                                    ShowToast(2000, Result.status, Result.message);
                                    if (Result.status == 'success'){
                                        setTimeout(() => {
                                            window.location = '<?php echo base_url('admin/manajemenkepegawaian') ?>';
                                        }, 2000);
                                    }
                                    CSRF_TOKEN = Result.token;
                                    return;
                                },
                                error: () => {
                                    ButtonState('submit', 'submit', 'Edit Data');
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