<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#2192     //
// ==================== //

defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemengaji_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        // Write Code Here
    }

    function GetDetailGajiPegawai($nama_pegawai, $id)
    {
        $query = $this->db->get_where('pegawai', array('nama_pegawai' => $nama_pegawai))->row();
        if ($query)
        {
            $query2 = $this->db->get_where('penggajian_gajipegawai', array('id' => $id, 'id_pegawai' => $query->id))->row();
            if ($query2) return $query2;
            else redirect(base_url('gaji/riwayat_gaji'), 'refresh');
        }
        else redirect(base_url('gaji/riwayat_gaji'), 'refresh');
    }

    function GetGajiPegawaiByMonth($month, $year)
    {
        $query = $this->db->order_by('id', 'asc')->get_where('penggajian_gajipegawai', array('bulan_gaji' => $month, 'tahun_gaji' => $year))->result_array();
        if ($query) return $query;
        else return null;
    }

    function CekDataGajiPegawai()
    {
        sleep(1);
        $data = array(
            'id' => $this->input->get('gaji_id', true)
        );

        $response = array();

        $query = $this->db->get_where('penggajian_gajipegawai', array('id' => $data['id']))->row();
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
            $response['message'] = 'Data pegawai tidak ditemukan.';

            echo json_encode($response);
        }
    }

    function GetAllGajiPegawai()
    {
        return $this->db->order_by('id', 'desc')->get('penggajian_gajipegawai')->result_array();
    }

    function GetAllPegawai()
    {
        return $this->db->order_by('id', 'asc')->get('pegawai')->result_array();
    }

    function GetPegawai($id)
    {
        $query = $this->db->get_where('pegawai', array('id' => $id))->row();
        if ($query) return $query;
        else return "";
    }

    function GetNamaPegawaiById($id)
    {
        $query = $this->db->get_where('pegawai', array('id' => $id))->row();
        if ($query)
        {
            return $query->gelar_depan.' '.$query->nama_pegawai.', '.$query->gelar_belakang;
        }
    }

    function GetGajiPegawai($id)
    {
        $query = $this->db->get_where('penggajian_gajipegawai', array('id' => $id))->row();
        if ($query) return $query;
        else redirect(base_url('admin/manajemengaji'), 'refresh');
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

    function TambahGaji()
    {
        $response = array();

        $data = array(
            'id_pegawai' => $this->input->post('pegawai', true),
            'gaji_pokok' => $this->input->post('gaji_pokok', true),
            'masa_kerja' => $this->input->post('masa_kerja', true),
            'tunjangan' => $this->input->post('tunjangan', true),
            'transport' => $this->input->post('transport', true),
            'sks' => $this->input->post('sks', true),
            'lembur' => $this->input->post('lembur', true),
            'tabungan_pensiun' => $this->input->post('tabungan_pensiun', true),
            'bpjs_ketenagakerjaan' => $this->input->post('bpjs_ketenagakerjaan', true),
            'bpjs_kesehatan' => $this->input->post('bpjs_kesehatan', true),
            'potongan' => $this->input->post('potongan', true),
            'bulan_gaji' => $this->input->post('bulan_gaji', true),
            'tahun_gaji' => $this->input->post('tahun_gaji', true),
            'status_publish' => $this->input->post('status_publish', true),
            'date_created' => date('d-m-Y H:i:s')
        );
        
        $check = $this->db->get_where('penggajian_gajipegawai', array('id_pegawai' => $data['id_pegawai'], 'bulan_gaji' => $data['bulan_gaji'], 'tahun_gaji' => $data['tahun_gaji']))->row();
        if ($check)
        {
            $response['status'] = 'error';
            $response['token'] = $this->security->get_csrf_hash();
            $response['message'] = 'Gaji pegawai pada bulan yang dipilih telah dibuat.';

            echo json_encode($response);
        }
        else
        {
            $insert = $this->db->insert('penggajian_gajipegawai', $data);
            if ($insert)
            {
                $response['status'] = 'success';
                $response['token'] = $this->security->get_csrf_hash();
                $response['message'] = 'Gaji pegawai berhasil dibuat.';

                echo json_encode($response);
            }
            else
            {
                $response['status'] = 'error';
                $response['token'] = $this->security->get_csrf_hash();
                $response['message'] = 'Gaji pegawai gagal dibuat.';

                echo json_encode($response);
            }
        }
    }

    function EditGaji()
    {
        $response = array();

        $id_gaji = $this->input->post('id_gaji', true);

        $data = array(
            'gaji_pokok' => $this->input->post('gaji_pokok', true),
            'masa_kerja' => $this->input->post('masa_kerja', true),
            'tunjangan' => $this->input->post('tunjangan', true),
            'transport' => $this->input->post('transport', true),
            'sks' => $this->input->post('sks', true),
            'lembur' => $this->input->post('lembur', true),
            'tabungan_pensiun' => $this->input->post('tabungan_pensiun', true),
            'bpjs_ketenagakerjaan' => $this->input->post('bpjs_ketenagakerjaan', true),
            'bpjs_kesehatan' => $this->input->post('bpjs_kesehatan', true),
            'potongan' => $this->input->post('potongan', true),
            'bulan_gaji' => $this->input->post('bulan_gaji', true),
            'tahun_gaji' => $this->input->post('tahun_gaji', true),
            'status_publish' => $this->input->post('status_publish', true),
            'date_created' => date('d-m-Y H:i:s')
        );
        
        $query = $this->db->get_where('penggajian_gajipegawai', array('id' => $id_gaji))->row();
        if ($query)
        {
            $update = $this->db->where('id', $query->id)->update('penggajian_gajipegawai', $data);
            if ($update)
            {
                $response['status'] = 'success';
                $response['token'] = $this->security->get_csrf_hash();
                $response['message'] = 'Data gaji pegawai berhasil diedit.';

                echo json_encode($response);
            }
            else
            {
                $response['status'] = 'error';
                $response['token'] = $this->security->get_csrf_hash();
                $response['message'] = 'Data gaji pegawai gagal diedit.';

                echo json_encode($response);
            }
        }
        else
        {
            $response['status'] = 'error';
            $response['token'] = $this->security->get_csrf_hash();
            $response['message'] = 'Data gaji pegawai tidak ditemukan.';

            echo json_encode($response);
        }
    }

    function DeleteGaji()
    {
        $response = array();

        $data = array(
            'id' => $this->input->post('id_gaji', true)
        );

        $query = $this->db->get_where('penggajian_gajipegawai', array('id' => $data['id']))->row();
        if ($query)
        {
            $delete = $this->db->where('id', $query->id)->delete('penggajian_gajipegawai');
            if ($delete)
            {
                $response['status'] = 'success';
                $response['token'] = $this->security->get_csrf_hash();
                $response['message'] = 'Data gaji pegawai berhasil dihapus.';

                echo json_encode($response);
            }
            else
            {
                $response['status'] = 'error';
                $response['token'] = $this->security->get_csrf_hash();
                $response['message'] = 'Data gaji pegawai gagal dihapus.';

                echo json_encode($response);
            }
        }
        else
        {
            $response['status'] = 'error';
            $response['token'] = $this->security->get_csrf_hash();
            $response['message'] = 'Data gaji pegawai tidak ditemukan.';

            echo json_encode($response);
        }
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>