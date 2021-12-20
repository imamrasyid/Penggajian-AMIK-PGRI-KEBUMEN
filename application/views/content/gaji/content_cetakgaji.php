<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="author" content="<?php echo $this->mainlibrary->InitSettings(2)->meta_author ?>" />
        <meta name="description" content="<?php echo $this->mainlibrary->InitSettings(2)->meta_description ?>" />
        <meta name="keywords" content="<?php echo $this->mainlibrary->InitSettings(2)->meta_keywords ?>">
        <title><?php echo $this->mainlibrary->InitSettings(2)->web_title ?> - <?php echo $title ?></title>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/datatables/datatables.min.css">
    </head>
    <body onload="window.print();">
        <style>
            body
            {
                font-family: Arial, Helvetica, sans-serif;
            }
        </style>
        <br><br><br>
        <table class="table table-borderless" align="center">
            <tbody>
                <tr>
                    <td align="center"><img src="<?php echo base_url() ?>assets/assets/img/logoamik.png" style="max-width: 100px;" alt=""></td>
                    <td align="center">AKADEMI MANAJEMEN INFORMATIKA DAN KOMPUTER<br>AMIK PGRI KEBUMEN<br></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">Detail Gaji Bulan <?php echo $this->mainlibrary->GetMonths($gaji->bulan_gaji).' '.$gaji->tahun_gaji ?></td>
                </tr>
                <tr align="center">
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr align="center">
                    <td>Nama</td>
                    <td><?php echo $this->gaji->GetGelarPegawai($this->session->userdata('nama'))['gelar_depan'].' '.$this->session->userdata('nama').', '.$this->gaji->GetGelarPegawai($this->gaji->GetDataPegawai()->nama_pegawai)['gelar_belakang'] ?></td>
                </tr>
                <tr align="center">
                    <td>NIP</td>
                    <td><?php echo $this->gaji->GetDataPegawai($this->session->userdata('nama'))->nip ?></td>
                </tr>
                <tr align="center">
                    <td>Jabatan</td>
                    <td><?php echo $this->gaji->GetDataPegawai($this->session->userdata('nama'))->jabatan ?></td>
                </tr>
                <tr align="center">
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr align="center">
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr align="center">
                    <td>Gaji Pokok</td>
                    <td>Rp. <?php echo number_format($gaji->gaji_pokok, '0',',','.') ?></td>
                </tr>
                <tr align="center">
                    <td>Masa Kerja</td>
                    <td>Rp. <?php echo number_format($gaji->masa_kerja, '0',',','.') ?></td>
                </tr>
                <tr align="center">
                    <td>Tunjangan</td>
                    <td>Rp. <?php echo number_format($gaji->tunjangan, '0',',','.') ?></td>
                </tr>
                <tr align="center">
                    <td>Transport</td>
                    <td>Rp. <?php echo number_format($gaji->transport, '0',',','.') ?></td>
                </tr>
                <tr align="center">
                    <td>SKS</td>
                    <td>Rp. <?php echo number_format($gaji->sks, '0',',','.') ?></td>
                </tr>
                <tr align="center">
                    <td>Lembur</td>
                    <td>Rp. <?php echo number_format($gaji->lembur, '0',',','.') ?></td>
                </tr>
                <tr align="center">
                    <td>Tabungan Pensiun</td>
                    <td>Rp. <?php echo number_format($gaji->tabungan_pensiun, '0',',','.') ?></td>
                </tr>
                <tr align="center">
                    <td>BPJS Ketenagakerjaan</td>
                    <td>Rp. <?php echo number_format($gaji->bpjs_ketenagakerjaan, '0',',','.') ?></td>
                </tr>
                <tr align="center">
                    <td>BPJS Kesehatan</td>
                    <td>Rp. <?php echo number_format($gaji->bpjs_kesehatan, '0',',','.') ?></td>
                </tr>
                <tr align="center">
                    <td>Potongan</td>
                    <td>Rp. <?php echo number_format($gaji->potongan, '0',',','.') ?></td>
                </tr>
                <tr align="center">
                    <td>Total</td>
                    <td><b>Rp. </b></td>
                </tr>
                <tr align="center">
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr align="center">
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" align="right">Kebumen, <?php echo $this->mainlibrary->GetMonths(date('m')) ?> <?php echo date('Y') ?></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>