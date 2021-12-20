<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header text-center">Formulir Tambah Pegawai</div>
                <div class="card-body">
                    <?php echo form_open_multipart('', 'id="tambahpegawai_form" autocomplete="off"') ?>
                        <div class="form-group row">
                            <label class="col-form-label col-3">NIP</label>
                            <input type="text" id="nip" name="nip" class="form-control col-9" placeholder="Masukkan NIP" autofocus required>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Nama Lengkap</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control col-9" placeholder="Masukkan Nama Lengkap" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">NIDN</label>
                            <input type="text" id="nidn" name="nidn" class="form-control col-9" placeholder="Masukkan NIDN (Jika Ada)">
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Gelar Depan</label>
                            <input type="text" id="gelar_depan" name="gelar_depan" class="form-control col-9" placeholder="Masukkan Gelar Depan (Jika Ada)">
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Gelar Belakang</label>
                            <input type="text" id="gelar_belakang" name="gelar_belakang" class="form-control col-9" placeholder="Masukkan Gelar Belakang (Jika Ada)">
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control col-9" placeholder="Masukkan Tempat Lahir" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Tanggal Lahir</label>
                            <input type="text" id="tanggal_lahir" name="tanggal_lahir" class="form-control col-9" placeholder="Masukkan Tanggal Lahir (01-01-1970)" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control col-9" required>
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Agama</label>
                            <select id="agama" name="agama" class="form-control col-9" required>
                                <option value="" disabled selected>Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Alamat</label>
                            <textarea id="alamat" name="alamat" rows="8" class="form-control col-9" placeholder="Masukkan Alamat" required></textarea>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Email</label>
                            <input type="email" id="email" name="email" class="form-control col-9" placeholder="Masukkan Email (Aktif)" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">No Hp</label>
                            <select id="kode_negara" name="kode_negara" class="form-control col-1" title="Kode Negara" required>
                                <option value="+62" selected>+62</option>
                            </select>
                            <input type="number" id="no_hp" name="no_hp" class="form-control col-8" placeholder="Masukkan No Hp" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Status Pegawai</label>
                            <select id="status_pegawai" name="status_pegawai" class="form-control col-9" required>
                                <option value="" disabled selected>Pilih Status Pegawai</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Status Kawin</label>
                            <select id="status_kawin" name="status_kawin" class="form-control col-9" required>
                                <option value="" disabled selected>Pilih Status Kawin</option>
                                <option value="Kawin">Kawin</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Pendidikan Terakhir</label>
                            <input type="text" id="pendidikan_terakhir" name="pendidikan_terakhir" class="form-control col-9" placeholder="Masukkan Pendidikan Terakhir (D3 MANAJEMEN INFORMATIKA AMIK PGRI KEBUMEN)" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Jabatan</label>
                            <input type="text" id="jabatan" name="jabatan" class="form-control col-9" placeholder="Masukkan Jabatan" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3">Foto</label>
                            <input type="file" id="foto" name="foto" class="form-control-file col-9">
                        </div>
                        <div class="form-group text-right">
                            <input type="submit" id="submit" class="btn btn-outline-primary" value="Submit Data">
                        </div>
                    <?php echo form_close() ?>
                    <script>
                        $(document).ready(() => {
                            $('#tambahpegawai_form').on('submit', (e) => {
                                e.preventDefault();

                                return Do_TambahPegawai(document.getElementById('tambahpegawai_form'));
                            });
                        });

                        function Do_TambahPegawai(data)
                        {
                            var formData = new FormData(data);
                            ButtonState('submit', 'button', 'Memproses...');

                            $.ajax({
                                url: '<?php echo base_url('admin/manajemenkepegawaian/do_tambahpegawai') ?>',
                                type: 'POST',
                                dataType: 'JSON',
                                data: formData,
                                contentType: false,
                                processData: false,
                                timeout: 0,
                                success: (response) => {
                                    var GetString = JSON.stringify(response);
                                    var Result = JSON.parse(GetString);

                                    ButtonState('submit', 'submit', 'Submit Data');
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
                                    ButtonState('submit', 'submit', 'Submit Data');
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