<div class="container-fluid mt-3">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
            <div class="card">
                <div class="card-body text-center">
                    <a href="<?php echo base_url('admin/manajemenkepegawaian/tambahpegawai') ?>" class="btn btn-outline-primary"><i class="fa fa-plus mr-2"></i>Tambah Pegawai</a>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-body">
                    <table id="table_id" class="table table-borderless table-hover table-responsive-lg text-center">
                        <thead>
                            <th width="5%">No.</th>
                            <th width="10%">NIP</th>
                            <th>Nama Lengkap</th>
                            <th width="15%">Jenis Kelamin</th>
                            <th width="10%">No Hp</th>
                            <th width="15%">Menu</th>
                        </thead>
                        <tbody>
                            <?php if ($this->manajemenkepegawaian->GetAllPegawai() != null) : ?>
                                <?php $num = 1; foreach ($this->manajemenkepegawaian->GetAllPegawai() as $row) : ?>
                                    <tr id="element<?php echo $num ?>">
                                        <td><?= $num ?></td>
                                        <td><?= $row['nip'] ?></td>
                                        <td><?php if ($row['gelar_belakang'] == '' || $row['gelar_belakang'] == null) echo $row['gelar_depan'].' '.$row['nama_pegawai']; else echo $row['gelar_depan'].' '.$row['nama_pegawai'].', '.$row['gelar_belakang']; ?></td>
                                        <td><?= $row['jenis_kelamin'] ?></td>
                                        <td><?= $row['no_hp'] ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <input id="btnGroupDrop<?php echo $num ?>" type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="Menu">
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop<?php echo $num ?>">
                                                    <a href="javascript:void(0)" onclick="GetDataPegawai('btnGroupDrop<?php echo $num ?>', '<?php echo $row['id'] ?>', 'Detail')" class="dropdown-item">Detail</a>
                                                    <a href="javascript:void(0)" onclick="GetDataPegawai('btnGroupDrop<?php echo $num ?>', '<?php echo $row['id'] ?>', 'Edit')" class="dropdown-item">Edit</a>
                                                    <a href="javascript:void(0)" onclick="DeletePegawai('element<?php echo $num ?>', 'btnGroupDrop<?php echo $num ?>', '<?php echo $row['id'] ?>')" class="dropdown-item">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php $num++; endforeach ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                    <script>
                        var CSRF_TOKEN = '<?php echo $this->security->get_csrf_hash() ?>';

                        function GetDataPegawai(button_id, data_id, action_type)
                        {
                            ButtonState(button_id, 'button', 'Memproses...');

                            $.ajax({
                                url: '<?php echo base_url('admin/manajemenkepegawaian/do_getdatapegawai') ?>',
                                type: 'GET',
                                dataType: 'JSON',
                                data: {
                                    'pegawai_id' : data_id
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
                                                    window.location = '<?php echo base_url('admin/manajemenkepegawaian/detailpegawai?idx=') ?>' + data_id;
                                                    break;
                                                }

                                            case 'Edit':
                                                {
                                                    window.location = '<?php echo base_url('admin/manajemenkepegawaian/editpegawai?idx=') ?>' + data_id;
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

                        function DeletePegawai(element_id, button_id, data_id)
                        {
                            if (confirm('Apakah anda benar benar ingin menghapus data pegawai ini?')){
                                ButtonState(button_id, 'button', 'Memproses...');
    
                                $.ajax({
                                    url: '<?php echo base_url('admin/manajemenkepegawaian/do_deletepegawai') ?>',
                                    type: 'POST',
                                    dataType: 'JSON',
                                    data: {
                                        '<?php echo $this->security->get_csrf_token_name() ?>' : CSRF_TOKEN,
                                        'pegawai_id' : data_id
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