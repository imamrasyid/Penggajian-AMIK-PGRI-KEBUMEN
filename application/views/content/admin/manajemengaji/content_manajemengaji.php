<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body text-center">
                    <a href="<?php echo base_url('admin/manajemengaji/tambahgaji') ?>" class="btn btn-outline-primary">Tambah Data Gaji</a>
                    <input type="button" id="showmodal_laporangajipegawai" class="btn btn-outline-success" value="Lihat Laporan Gaji" onclick="ShowModalLaporan()">
                </div>
                <div id="modal_laporangajipegawai" class="card-body text-center" style="display: none">
                    <form id="laporangaji_form" autocomplete="off">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Bulan</label>
                                        <select id="bulan_gaji" name="bulan_gaji" class="form-control" required>
                                            <option value="" disabled selected>Pilih Bulan</option>
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Maret</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Juni</option>
                                            <option value="7">Juli</option>
                                            <option value="8">Agustus</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Tahun</label>
                                        <select id="tahun_gaji" name="tahun_gaji" class="form-control" required>
                                            <option value="" disabled selected>Pilih Tahun</option>
                                            <?php for ($i=2021; $i < 2030; $i++) : ?>
                                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                            <?php endfor ?>
                                        </select>
                                    </div>
                                    <div class="form-group text-center">
                                        <input type="submit" id="submit_laporangaji" class="btn btn-outline-success" value="Lihat Laporan Gaji">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <table id="table_id" class="table table-borderless table-responsive-lg table-responsive-md table-responsive-sm text-center">
                        <thead>
                            <th width="5%">No.</th>
                            <th>Nama</th>
                            <th width="15%">Tanggal Gaji</th>
                            <th width="10%">Status</th>
                            <th width="15%">Menu</th>
                        </thead>
                        <tbody>
                            <?php $num = 1; foreach ($this->manajemengaji->GetAllGajiPegawai() as $row) : ?>
                                <tr id="element_<?php echo $num ?>">
                                    <td><?php echo $num ?></td>
                                    <td><?php echo $this->manajemengaji->GetNamaPegawaiById($row['id_pegawai']) ?></td>
                                    <td><?php echo $this->mainlibrary->GetMonths($row['bulan_gaji']).' '.$row['tahun_gaji'] ?></td>
                                    <td><?php echo $row['status_publish'] ?></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <input id="btnGroupDrop<?php echo $num ?>" type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="Menu">
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop<?php echo $num ?>">
                                                <a href="javascript:void(0)" onclick="GetDataGajiPegawai('btnGroupDrop<?php echo $num ?>', '<?php echo $row['id'] ?>', 'Detail')" class="dropdown-item">Detail</a>
                                                <a href="javascript:void(0)" onclick="GetDataGajiPegawai('btnGroupDrop<?php echo $num ?>', '<?php echo $row['id'] ?>', 'Edit')" class="dropdown-item">Edit</a>
                                                <a href="javascript:void(0)" onclick="DeleteGajiPegawai('element_<?php echo $num ?>', 'btnGroupDrop<?php echo $num ?>', '<?php echo $row['id'] ?>')" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php $num++; endforeach ?>
                        </tbody>
                    </table>
                    <script>
                        var CSRF_TOKEN = '<?php echo $this->security->get_csrf_hash() ?>';
                        
                        $(document).ready(() => {
                            $('#laporangaji_form').on('submit', (e) => {
                                e.preventDefault();

                                return GetLaporanDataGajiPegawai();
                            });
                        });

                        function ShowModalLaporan()
                        {
                            document.getElementById('showmodal_laporangajipegawai').remove();
                            var a = document.getElementById('modal_laporangajipegawai').removeAttribute("style");
                        }

                        function GetLaporanDataGajiPegawai()
                        {
                            if ($('#bulan_gaji').val() == '' || $('#bulan_gaji').val() == null){
                                ShowToast(2000, 'warning', 'Bulan tidak boleh kosong.');
                                return;
                            }
                            else if ($('#tahun_gaji').val() == '' || $('#tahun_gaji').val() == null){
                                ShowToast(2000, 'warning', 'Tahun tidak boleh kosong.');
                                return;
                            }
                            else{
                                ButtonState('submit_laporangaji', 'button', 'Memproses...');
                                setTimeout(() => {
                                    window.open('<?php echo base_url('admin/manajemengaji/laporangaji') ?>?month=' + $('#bulan_gaji').val() + '&year=' + $('#tahun_gaji').val());
                                    window.location.reload();
                                }, 2000);
                            }
                        }

                        function GetDataGajiPegawai(button_id, data_id, action_type)
                        {
                            ButtonState(button_id, 'button', 'Memproses...');

                            $.ajax({
                                url: '<?php echo base_url('admin/manajemengaji/do_getdatagajipegawai') ?>',
                                type: 'GET',
                                dataType: 'JSON',
                                data: {
                                    'gaji_id' : data_id
                                },
                                success: (response) => {
                                    var GetString = JSON.stringify(response);
                                    var Result = JSON.parse(GetString);

                                    if (Result.status === 'success'){
                                        ButtonState(button_id, 'button', 'Menu');
                                        switch (action_type)
                                        {
                                            case 'Detail':
                                                {
                                                    window.location = '<?php echo base_url('admin/manajemengaji/detailgaji?idx=') ?>' + data_id;
                                                    break;
                                                }

                                            case 'Edit':
                                                {
                                                    window.location = '<?php echo base_url('admin/manajemengaji/editgaji?idx=') ?>' + data_id;
                                                    break;
                                                }
                                        
                                            default:
                                                {
                                                    return;
                                                }
                                        }
                                    }
                                    else{
                                        ButtonState(button_id, 'button', 'Menu');
                                        ShowToast(2000, Result.status, Result.message);
                                        return;
                                    }
                                },
                                error: () => {
                                    ButtonState(button_id, 'button', 'Menu');
                                    ShowToast(2000, 'error', 'Error: Server tidak merespon.');
                                    return;
                                }
                            });
                        }
                        function DeleteGajiPegawai(element_id, button_id, data_id)
                        {
                            if (confirm('Apakah anda benar benar ingin menghapus data gaji pegawai ini?')){
                                ButtonState(button_id, 'button', 'Memproses...');
    
                                $.ajax({
                                    url: '<?php echo base_url('admin/manajemengaji/do_deletegajipegawai') ?>',
                                    type: 'POST',
                                    dataType: 'JSON',
                                    data: {
                                        '<?php echo $this->security->get_csrf_token_name() ?>' : CSRF_TOKEN,
                                        'id_gaji' : data_id
                                    },
                                    success: (response) => {
                                        var GetString = JSON.stringify(response);
                                        var Result = JSON.parse(GetString);
    
                                        ButtonState(button_id, 'button', 'Menu');
                                        CSRF_TOKEN = Result.token;
                                        if (Result.status == 'success'){
                                            document.getElementById(element_id).remove();
                                            ShowToast(2000, Result.status, Result.message);
                                            return;
                                        }
                                        else{
                                            ShowToast(2000, Result.status, Result.message);
                                            return;
                                        }
                                    },
                                    error: () => {
                                        ButtonState(button_id, 'button', 'Menu');
                                        ShowToast(2000, 'error', 'Error: Server tidak merespon.');
                                        setTimeout(() => {
                                            window.location.reload();
                                        }, 2000);
                                    }
                                });
                            }
                            else{
                                return;
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>