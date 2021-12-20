<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function semua_gaji()
    {
        $check = $this->db->get_where('penggajian_gajipegawai', array('id_pegawai' => $this->session->userdata('nip')));
        $result = $check->result_array();
        if ($result) 
        {
            return $result;
        }
        else 
        {
            echo "Riwayat Gaji Belum Tersedia";
        }
    }

    function detail_pegawai()
    {
        $check = $this->db->get_where('pegawai', array('nip' => $this->session->userdata('nip')));
        $result = $check->row();
        if ($result) 
        {
            return $result;
        }
    }

    function detail_gaji($param)
    {
        $check = $this->db->get_where('penggajian_gajipegawai', array('id_pegawai' => $this->session->userdata('nip'), 'id' => $param));
        $result = $check->row();
        if ($result) 
        {
            return $result;
        }
        else 
        {
            $this->session->set_flashdata('false', 'Detail Data Riwayat Gaji Tidak Ditemukan');
            redirect(base_url('riwayat'), 'refresh');
        }
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>