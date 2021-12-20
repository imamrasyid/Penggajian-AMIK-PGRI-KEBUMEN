<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="<?php echo base_url() ?>assets/vendors/jquery/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title><?php echo $title ?></title>
    </head>
    <body>
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header text-center">Laporan Gaji Bulan <?php echo $this->mainlibrary->GetMonths($this->input->get('month', true)).' '.$this->input->get('year', true) ?></div>
                        <div class="card-body">
                            <table class="table table-borderless table-responsive-lg table-responsive-md table-responsive-sm text-center">
                                <thead>
                                    <th width="5%">No.</th>
                                    <th>Nama Pegawai</th>
                                    <th width="15%">Tanggal Gaji</th>
                                    <th width="20%">Total Gaji</th>
                                    <th width="15%">Status Gaji</th>
                                </thead>
                                <tbody>
                                    <?php if ($gaji != null) : ?>
                                        <?php $num = 1; foreach ($gaji as $row) : ?>
                                            <tr>
                                                <td><?php echo $num ?></td>
                                                <td><?php echo $this->manajemengaji->GetNamaPegawaiById($row['id_pegawai']) ?></td>
                                                <td><?php echo $this->mainlibrary->GetMonths($row['bulan_gaji']).' '.$row['tahun_gaji'] ?></td>
                                                <td>Rp. <?php echo number_format($this->manajemengaji->GetTotalGajiPegawai($row['id_pegawai']), 0, ',', '.') ?></td>
                                                <td><?php echo $row['status_publish'] ?></td>
                                            </tr>
                                        <?php $num++; endforeach; ?>
                                    <?php endif; ?>
                                    <?php if ($gaji == null) : ?>
                                        <tr>
                                            <td colspan="5">Tidak Ada Data Gaji Pegawai</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        $(document).ready(() => {
            window.print();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>