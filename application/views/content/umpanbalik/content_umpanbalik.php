<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <table id="table_id" class="table table-borderless table-responsive-lg table-responsive-md table-responsive-sm text-center">
                        <thead>
                            <th>No.</th>
                            <th>Judul Pesan</th>
                            <th>Kategori Pesan</th>
                            <th>Status Pesan</th>
                        </thead>
                        <tbody>
                            <?php if ($this->umpanbalik->GetSemuaUmpanBalikPegawai() != null) : ?>
                                <?php $num = 1; foreach ($this->umpanbalik->GetSemuaUmpanBalikPegawai() as $row) : ?>
                                    <tr>
                                        <td><?php echo $num ?></td>
                                        <td><?php echo $row['judul_pesan'] ?></td>
                                        <td><?php echo $row['kategori_pesan'] ?></td>
                                        <td>
                                            <?php
                                            switch ($row['status_pesan'])
                                            {
                                                case '0':
                                                    {
                                                        echo 'Belum Ditanggapi';
                                                    }
                                                case '1':
                                                    {
                                                        echo 'Sudah Ditanggapi';
                                                    }
                                                
                                                default:
                                                    break;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php $num++; endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>