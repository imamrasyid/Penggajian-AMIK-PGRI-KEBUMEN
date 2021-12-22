<div class="container-fluid px-4 mt-4">
    <div class="row">
        <div class="col-xl-12">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Form Umpan Balik</div>
                <div class="card-body">
                    <?php echo form_open_multipart('', 'id="umpanbalik_form" autocomplete="off"') ?>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1">Judul Pesan</label>
                                <input type="text" name="judul_pesan" id="judul_pesan" class="form-control" placeholder="Masukkan Judul Pesan" autofocus required>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Kategori Pesan</label>
                                <select name="kategori_pesan" id="kategori_pesan" class="form-control" required>
                                    <option value="" disabled selected>Pilih Kategori Pesan</option>
                                    <option value="Saran">Saran</option>
                                    <option value="Kritik">Kritik</option>
                                    <option value="Lapor Kesalahan Ketik">Lapor Kesalahan Ketik</option>
                                    <option value="Lapor Error">Lapor Error</option>
                                </select>
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1">Isi Pesan</label>
                            <textarea name="isi_pesan" id="isi_pesan" rows="30" class="form-control" placeholder="Masukkan Isi Pesan" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1">Lampiran Pesan (Jika Ada)</label>
                            <input type="file" name="attachment_pesan" id="attachment_pesan" class="form-control-file">
                        </div>
                        <div class="mt-3 text-right">
                            <input type="submit" id="submit_pesan" class="btn btn-outline-primary" value="Kirim Umpan Balik">
                        </div>
                    <?php echo form_close() ?>
                    <script>
                        $(document).ready(() => {
                            $('#umpanbalik_form').on('submit', (e) => {
                                e.preventDefault();

                                return Do_SendFeedback(document.getElementById('umpanbalik_form'));
                            });
                        });

                        function Do_SendFeedback(data)
                        {
                            var formData = new FormData(data);
                            
                            if ($('#judul_pesan').val() == '' || $('#judul_pesan').val() == null){
                                ShowToast(2000, 'warning', 'Judul Pesan tidak boleh kosong.');
                                return;
                            }
                            else if ($('#kategori_pesan').val() == '' || $('#kategori_pesan').val() == null){
                                ShowToast(2000, 'warning', 'Kategori Pesan tidak boleh kosong.');
                                return;
                            }
                            else if ($('#isi_pesan').val() == '' || $('#isi_pesan').val() == null){
                                ShowToast(2000, 'warning', 'Isi Pesan tidak boleh kosong.');
                                return;
                            }
                            else{
                                ButtonState('submit_pesan', 'button', 'Memproses...');

                                $.ajax({
                                    url: '<?php echo base_url('umpanbalik/do_sendumpanbalik') ?>',
                                    type: 'POST',
                                    dataType: 'JSON',
                                    data: formData,
                                    contentType : false,
                                    processData: false,
                                    timeout: 0,
                                    success: (response) => {
                                        var GetString = JSON.stringify(response);
                                        var Result = JSON.parse(GetString);

                                        ButtonState('submit_pesan', 'submit', 'Kirim Umpan Balik');
                                        
                                        
                                        if (Result.status == 'success'){
                                            ShowToast(2000, Result.status, Result.message);
                                            setTimeout(() => {
                                                window.location = '<?php echo base_url('umpanbalik') ?>';
                                            }, 2000);
                                        }
                                        else{
                                            if (Result.error !== 'undefined') ShowToast(2000, Result.status, Result.message + '<br>' +Result.error); else ShowToast(2000, Result.status, Result.message);
                                        }
                                    },
                                    error: () => {
                                        ButtonState('submit_pesan', 'submit', 'Kirim Umpan Balik');
                                        ShowToast(2000, 'error', 'Error: Server tidak merespon.');
                                        setTimeout(() => {
                                            window.location.reload();
                                        }, 2000);
                                    }
                                });
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>