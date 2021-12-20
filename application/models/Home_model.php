<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function GetIdGajiBulanIni()
    {
        $query = $this->db->get_where('pegawai', array('nama_pegawai' => $this->session->userdata('nama')))->row();
        if ($query)
        {
            $query2 = $this->db->get_where('penggajian_gajipegawai', array('id_pegawai' => $query->id, 'bulan_gaji' => date('m'), 'tahun_gaji' => date('Y')))->row();
            if ($query2) return $query2->id;
        }
    }

    function GetGajiPegawaiBulanIni()
    {
        $query = $this->db->get_where('pegawai', array('nama_pegawai' => $this->session->userdata('nama')))->row();
        if ($query)
        {
            $query2 = $this->db->get_where('penggajian_gajipegawai', array('id_pegawai' => $query->id, 'bulan_gaji' => date('m'), 'tahun_gaji' => date('Y')))->row();
            if ($query2) echo 'Tersedia'; else echo 'Belum Tersedia';
        }
    }

    function CekGajiPegawaiBulanIni()
    {
        $query = $this->db->get_where('pegawai', array('nama_pegawai' => $this->session->userdata('nama')))->row();
        if ($query)
        {
            $query2 = $this->db->get_where('penggajian_gajipegawai', array('id_pegawai' => $query->id, 'bulan_gaji' => date('m'), 'tahun_gaji' => date('Y')))->row();
            if ($query2) return true; else return false;
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