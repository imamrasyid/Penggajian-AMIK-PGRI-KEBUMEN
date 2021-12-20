<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

Class Gaji extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->protect->home_protectA();
        $this->load->model('gaji_model', 'gaji');
    }

    function index()
    {
        redirect(base_url(), 'refresh');
    }

    function penghitungan_gaji()
    {
        $data['title'] = 'Penghitungan Gaji';
        $data['content'] = 'content/gaji/content_penghitungan_gaji';
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    function riwayat_gaji()
    {
        $data['title'] = 'Riwayat Gaji';
        $data['content'] = 'content/gaji/content_riwayatgaji';
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    function detail_gaji()
    {
        if (empty($this->input->get('idx', true))) redirect(base_url('gaji/riwayat_gaji'), 'refresh');
        else
        {
            $data['title'] = 'Detail Gaji';
            $data['gaji'] = $this->gaji->GetDetailGajiPegawai($this->input->get('idx', true));
            $data['content'] = 'content/gaji/content_detailgaji';
            $this->load->view('layout/wrapper', $data, FALSE);
        }
    }

    function cetak_gaji()
    {
        if (empty($this->input->get('idx', true))) redirect(base_url('gaji/riwayat_gaji'));
        else
        {
            $data['title'] = 'Cetak Gaji';
            $data['gaji'] = $this->gaji->GetDetailGajiPegawai($this->input->get('idx', true));
            $this->load->view('content/gaji/content_cetakgaji', $data, FALSE);
        }
    }

    function do_cekdatagajipegawai()
    {
        $response = array();

        if (empty($this->input->get('id_gaji', true)) && empty($this->input->get('id_pegawai')))
        {
            $response['status'] = 'error';
            $response['token'] = $this->security->get_csrf_hash();
            $response['message'] = 'Data yang anda minta tidak valid.';

            echo json_encode($response);
        }
        else
        {
            $this->gaji->GetDataGajiPegawai($this->input->get('id_gaji', true), $this->input->get('id_pegawai', true));
        }
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>