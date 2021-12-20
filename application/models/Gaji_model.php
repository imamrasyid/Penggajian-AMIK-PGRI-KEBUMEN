<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function GetDataGajiPegawai($id_gaji, $id_pegawai)
    {
        sleep(1);
        $response = array();

        $query = $this->db->get_where('penggajian_gajipegawai', array('id' => $id_gaji, 'id_pegawai' => $id_pegawai))->row();
        if ($query)
        {
            $response['status'] = 'success';
            $response['token'] = $this->security->get_csrf_hash();
            $response['message'] = 'Sukses';

            echo json_encode($response);
        }
        else
        {
            $response['status'] = 'error';
            $response['token'] = $this->security->get_csrf_hash();
            $response['message'] = 'Data yang anda minta tidak ditemukan.';

            echo json_encode($response);
        }
    }

    function GetRiwayatGajiPegawai()
    {
        $query = $this->db->get_where('pegawai', array('nama_pegawai' => $this->session->userdata('nama')))->row();
        if ($query) return $this->db->order_by('id', 'desc')->get_where('penggajian_gajipegawai', array('id_pegawai' => $query->id))->result_array();
        else return null;
    }

    function GetDataPegawai()
    {
        $query = $this->db->get_where('pegawai', array('nama_pegawai' => $this->session->userdata('nama')))->row();
        if ($query)
        {
            return $query;
        }
    }

    function GetDetailGajiPegawai($id)
    {
        $query = $this->db->get_where('pegawai', array('nama_pegawai' => $this->session->userdata('nama')))->row();
        if ($query)
        {
            $query2 = $this->db->get_where('penggajian_gajipegawai', array('id' => $id, 'id_pegawai' => $query->id))->row();
            if ($query2) return $query2;
            else redirect(base_url('gaji/riwayat_gaji'), 'refresh');
        }
        else redirect(base_url('gaji/riwayat_gaji'), 'refresh');
    }

    function GetTotalGajiPegawai($id)
    {
        $query = $this->db->get_where('penggajian_gajipegawai', array('id' => $id))->row();
        if ($query)
        {
            $totalgaji = array(
                1 => $query->gaji_pokok,
                2 => $query->masa_kerja,
                3 => $query->tunjangan,
                4 => $query->transport,
                5 => $query->lembur,
                6 => $query->tabungan_pensiun,
                7 => $query->bpjs_ketenagakerjaan,
                8 => $query->bpjs_kesehatan,
                9 => $query->potongan
            );

            return $totalgaji[1] + $totalgaji[2] + $totalgaji[3] + $totalgaji[4] + $totalgaji[5] + $totalgaji[6] + $totalgaji[7] + $totalgaji[8] - $totalgaji[9];
        }
        else
        {
            return 0;
        }
    }

    function GetGelarPegawai($nama_pegawai)
    {
        $query = $this->db->get_where('pegawai', array('nama_pegawai' => $nama_pegawai))->row();
        if ($query)
        {
            $gelar = array(
                'gelar_depan' => $query->gelar_depan,
                'gelar_belakang' => $query->gelar_belakang
            );

            return $gelar;
        }
        else
        {
            $gelar = array(
                'gelar_depan' => '',
                'gelar_belakang' => ''
            );

            return $gelar;
        }
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>