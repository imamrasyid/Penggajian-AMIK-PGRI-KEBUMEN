<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header">Table Riwayat Gaji</div>
                <div class="card-body">
                    <table id="table_id" class="table table-borderless table-hover text-center">
                        <thead>
                            <th width="5%">No.</th>
                            <th width="10%">Bulan</th>
                            <th width="10%">Tahun</th>
                            <th>Total Gaji</th>
                            <th width="15%">Menu</th>
                        </thead>
                        <tbody>
                            <?php
                            if ($this->gaji->GetRiwayatGajiPegawai() != null)
                            {
                                ?>
                                <?php $num = 1; foreach ($this->gaji->GetRiwayatGajiPegawai() as $row) : ?>
                                    <tr>
                                        <td><?php echo $num ?></td>
                                        <td><?php echo $this->mainlibrary->GetMonths($row['bulan_gaji']) ?></td>
                                        <td><?php echo $row['tahun_gaji'] ?></td>
                                        <td>Rp. <?php echo number_format($this->gaji->GetTotalGajiPegawai($row['id']), 0, ',', '.') ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <input id="btnGroupDrop<?php echo $num ?>" type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="Menu">
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop<?php echo $num ?>">
                                                    <a href="javascript:void(0)" class="dropdown-item" onclick="GetDataGaji('btnGroupDrop<?php echo $num ?>', '<?php echo $row['id'] ?>', 'Detail')">Detail</a>
                                                    <a href="javascript:void(0)" class="dropdown-item" onclick="GetDataGaji('btnGroupDrop<?php echo $num ?>', '<?php echo $row['id'] ?>', 'Cetak')">Cetak</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php $num++; endforeach; ?>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <script>
                        function GetDataGaji(button_id, data_id, action_type)
                        {
                            ButtonState(button_id, 'button', 'Memproses...');

                            $.ajax({
                                url: '<?php echo base_url('gaji/do_cekdatagajipegawai') ?>',
                                type: 'GET',
                                dataType: 'JSON',
                                data: {
                                    'id_gaji' : data_id,
                                    'id_pegawai' : '<?php echo $this->gaji->GetDataPegawai()->id ?>'
                                },
                                success: (response) => {
                                    var GetString = JSON.stringify(response);
                                    var Result = JSON.parse(GetString);

                                    ButtonState(button_id, 'button', 'Menu');
                                    if (Result.status == 'success'){
                                        switch (action_type) {
                                            case 'Detail':{
                                                window.location = '<?php echo base_url('gaji/detail_gaji') ?>?idx=' + data_id;
                                                break;
                                            }
                                            case 'Cetak':{
                                                window.open('<?php echo base_url('gaji/cetak_gaji') ?>?idx=' + data_id);
                                                break;
                                            }
                                        
                                            default:
                                                break;
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
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>