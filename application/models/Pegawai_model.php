<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function semua_pegawai()
    {
        return $this->db->order_by('id', 'asc')->get('pegawai')->result_array();
    }

    function detail_pegawai($param)
    {
        $check = $this->db->get_where('pegawai', array('nip' => $param));
        $result = $check->row();
        if ($result) 
        {
            return $result;
        }
        else
        {
            redirect(base_url('pegawai'), 'refresh');
        }
    }

    function tambah()
    {
        $data = array(
            'nip' => $this->input->post('nip'),
            'password' => md5($this->input->post('password')),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon'),
            'email' => $this->input->post('email'),
            'level_akses' => $this->input->post('jabatan'),
            'pertanyaan_hint' => $this->input->post('pertanyaan_hint'),
            'jawaban_hint' => $this->input->post('jawaban_hint')
        );

        if ($data['jenis_kelamin'] != "L" && $data['jenis_kelamin'] != "P") 
        {
            $this->session->set_flashdata('false', 'Jenis Kelamin Tidak Valid');
            redirect(base_url('pegawai/tambah'), 'refresh');
        }
        if ($data['level_akses'] != 0 && $data['level_akses'] != 1) 
        {
            $this->session->set_flashdata('false', 'Jabatan Tidak Valid');
            redirect(base_url('pegawai/tambah'), 'refresh');
        }

        $check = $this->db->get_where('pegawai', array('nip' => $data['nip']));
        $result = $check->row();
        if ($result) 
        {
            $this->session->set_flashdata('false', 'NIP Sudah Terdaftar');
            redirect(base_url('pegawai/tambah'), 'refresh');
        }
        else 
        {
            // Insert Data Pegawai
            $insert = $this->db->insert('pegawai', array(
                'nip' => $data['nip'],
                'password' => $data['password'],
                'nama_lengkap' => $data['nama_lengkap'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'tempat_lahir' => $data['tempat_lahir'],
                'tanggal_lahir' => $data['tanggal_lahir'],
                'alamat' => $data['alamat'],
                'telepon' => $data['telepon'],
                'email' => $data['email'],
                'level_akses' => $data['level_akses'],
                'pertanyaan_hint' => $data['pertanyaan_hint'],
                'jawaban_hint' => $data['jawaban_hint'],
                'date_registered' => date('d-m-Y h:i:s')
                )
            );
            if ($insert) 
            {
                $this->session->set_flashdata('true', 'Data Pegawai Berhasil Ditambahkan');
                redirect(base_url('pegawai'), 'refresh');
            }
            else 
            {
                $this->session->set_flashdata('false', 'Data Pegawai Gagal Ditambahkan');
                redirect(base_url('pegawai'), 'refresh');
            }
        }
    }

    function update_pegawai()
    {
        $data = array(
            'nip' => $_GET['idx'],
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon'),
            'email' => $this->input->post('email')
        );
        if ($data['jenis_kelamin'] != "L" && $data['jenis_kelamin'] != "P") 
        {
            $this->session->set_flashdata('false', 'Jenis Kelamin Salah.');
            redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }

        // Fetch Akun
        $fetch = $this->db->get_where('pegawai', array('nip' => $data['nip']));
        $result = $fetch->row();
        if ($result) 
        {
            // Update Pegawai
            $update = $this->db->where('nip', $result->nip)->update('pegawai', array(
                'nama_lengkap' => $data['nama_lengkap'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'tempat_lahir' => $data['tempat_lahir'],
                'alamat' => $data['alamat'],
                'telepon' => $data['telepon'],
                'email' => $data['email'],
                'date_updated' => date('d-m-Y h:i:s')
                )
            );
            if ($update) 
            {
                $this->session->set_flashdata('true', 'Data Pegawai Berhasil Diperbarui');
                redirect(base_url('pegawai'), 'refresh');
            }
        }
    }

    function delete($param)
    {
        $check = $this->db->get_where('pegawai', array('nip' => $param));
        $result = $check->row();
        if ($result) 
        {
            // Hapus Pegawai
            $hapus = $this->db->where('nip', $result->nip)->delete('pegawai');
            if ($hapus) 
            {
                $this->session->set_flashdata('true', 'Data Pegawai Berhasil Dihapus');
                redirect(base_url('pegawai'), 'refresh');
            }
        }
        else 
        {
            $this->session->set_flashdata('false', 'Data Pegawai Tidak Ditemukan');
            redirect(base_url('pegawai'), 'refresh');
        }
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>