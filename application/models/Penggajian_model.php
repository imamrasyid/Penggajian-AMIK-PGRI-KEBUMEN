<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') OR exit('No direct script access allowed');

class Penggajian_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function detail_pegawai()
    {
        $check = $this->db->get_where('pegawai', array('nip' => $this->session->userdata('nip')));
        $result = $check->row();
        if ($result) 
        {
            return $result;
        }
        else 
        {
            redirect(base_url('home/logout'), 'refresh');
        }
    }

    function detail_gaji()
    {
        $check = $this->db->get_where('penggajian', array('pegawai' => $_SESSION['nip'], 'bulan' => date('m'), 'tahun' => date('Y')));
        $result = $check->row();
        if ($result) 
        {
            return $result;
        }
        else 
        {
            $this->session->set_flashdata('false', 'Data Gaji Belum Tersedia');
            redirect(base_url('home'), 'refresh');
        }
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>