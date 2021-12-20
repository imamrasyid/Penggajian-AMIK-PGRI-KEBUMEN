<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#2192     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

Class Manajemengaji extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->protect->admin_protectA();
        $this->load->model('admin/manajemengaji_model', 'manajemengaji');
    }

    function index()
    {
        $data['title'] = 'Manajemen Gaji';
        $data['content'] = 'content/admin/manajemengaji/content_manajemengaji';
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    function tambahgaji()
    {
        $data['title'] = 'Tambah Gaji';
        $data['content'] = 'content/admin/manajemengaji/content_tambahgaji';
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    function detailgaji()
    {
        if (empty($this->input->get('idx', true))) redirect(base_url('admin/manajemengaji'), 'refresh');
        else
        {
            $data['title'] = 'Detail Gaji';
            $data['gaji'] = $this->manajemengaji->GetGajiPegawai($this->input->get('idx', true));
            $data['content'] = 'content/admin/manajemengaji/content_detailgaji';
            $this->load->view('layout/wrapper', $data, FALSE);
        }
    }

    function cetak_gaji()
    {
        // if (empty($this->input->get('idx', true))) redirect(base_url('admin/manajemengaji'));
        // else
        // {
        //     $data['title'] = 'Cetak Gaji';
        //     $data['gaji'] = $this->gaji->GetDetailGajiPegawai($this->input->get('idx', true));
        //     $this->load->view('content/admin/manajemengaji/content_cetakgaji', $data, FALSE);
        // }
        redirect(base_url('admin/manajemengaji'), 'refresh');
    }

    function editgaji()
    {
        if (empty($this->input->get('idx', true))) redirect(base_url('admin/manajemengaji'), 'refresh');
        else
        {
            $data['title'] = 'Edit Gaji';
            $data['gaji'] = $this->manajemengaji->GetGajiPegawai($this->input->get('idx', true));
            $data['content'] = 'content/admin/manajemengaji/content_editgaji';
            $this->load->view('layout/wrapper', $data, FALSE);
        }
    }

    function laporangaji()
    {
        if (empty($this->input->get('month', true)) && empty($this->input->get('year', true))) redirect(base_url('admin/manajemengaji'), 'refresh');
        else
        {
            $data['title'] = 'Laporan Gaji Pegawai Bulan '.$this->mainlibrary->GetMonths($this->input->get('month', true)).' '.$this->input->get('year', true);
            $data['gaji'] = $this->manajemengaji->GetGajiPegawaiByMonth($this->input->get('month', true), $this->input->get('year', true));
            $this->load->view('content/admin/manajemengaji/content_laporangaji', $data, FALSE);
        }
    }

    function do_tambahgaji()
    {
        $response = array();

        $this->form_validation->set_error_delimiters('', '');

        $this->form_validation->set_rules(
            'gaji_pokok',
            'Gaji Pokok',
            'required|numeric',
            array(
                'required' => '%s tidak boleh kosong.',
                'numeric' => '%s hanya dapat menggunakan angka.'
            )
        );
        $this->form_validation->set_rules(
            'masa_kerja',
            'Gaji Masa Kerja',
            'required|numeric',
            array(
                'required' => '%s tidak boleh kosong.',
                'numeric' => '%s hanya dapat menggunakan angka.'
            )
        );
        $this->form_validation->set_rules(
            'tunjangan',
            'Gaji Tunjangan',
            'required|numeric',
            array(
                'required' => '%s tidak boleh kosong.',
                'numeric' => '%s hanya dapat menggunakan angka.'
            )
        );
        $this->form_validation->set_rules(
            'transport',
            'Gaji Transport',
            'required|numeric',
            array(
                'required' => '%s tidak boleh kosong.',
                'numeric' => '%s hanya dapat menggunakan angka.'
            )
        );
        $this->form_validation->set_rules(
            'sks',
            'SKS',
            'required|numeric',
            array(
                'required' => '%s tidak boleh kosong.',
                'numeric' => '%s hanya dapat menggunakan angka.'
            )
        );
        $this->form_validation->set_rules(
            'lembur',
            'Gaji Lembur',
            'required|numeric',
            array(
                'required' => '%s tidak boleh kosong.',
                'numeric' => '%s hanya dapat menggunakan angka.'
            )
        );
        $this->form_validation->set_rules(
            'tabungan_pensiun',
            'Tabungan Pensiun',
            'required|numeric',
            array(
                'required' => '%s tidak boleh kosong.',
                'numeric' => '%s hanya dapat menggunakan angka.'
            )
        );
        $this->form_validation->set_rules(
            'bpjs_ketenagakerjaan',
            'BPJS Ketenagakerjaan',
            'required|numeric',
            array(
                'required' => '%s tidak boleh kosong.',
                'numeric' => '%s hanya dapat menggunakan angka.'
            )
        );
        $this->form_validation->set_rules(
            'bpjs_kesehatan',
            'BPJS Kesehatan',
            'required|numeric',
            array(
                'required' => '%s tidak boleh kosong.',
                'numeric' => '%s hanya dapat menggunakan angka.'
            )
        );
        $this->form_validation->set_rules(
            'potongan',
            'Potongan',
            'required|numeric',
            array(
                'required' => '%s tidak boleh kosong.',
                'numeric' => '%s hanya dapat menggunakan angka.'
            )
        );
        $this->form_validation->set_rules(
            'bulan_gaji',
            'Bulan Gaji',
            'required|in_list[1,2,3,4,5,6,7,8,9,10,11,12]',
            array(
                'required' => '%s tidak boleh kosong.',
                'in_list' => '%s tidak valid.'
            )
        );
        $this->form_validation->set_rules(
            'tahun_gaji',
            'Tahun Gaji',
            'required|numeric|max_length[4]',
            array(
                'required' => '%s tidak boleh kosong.',
                'numeric' => '%s hanya dapat menggunakan angka.',
                'max_length' => '%s hanya dapat memiliki 4 angka.'
            )
        );
        $this->form_validation->set_rules(
            'status_publish',
            'Status Publish',
            'required|in_list[Publish,Draft]',
            array(
                'required' => '%s tidak boleh kosong.',
                'in_list' => '%s tidak valid.'
            )
        );
        if ($this->form_validation->run())
        {
            $this->manajemengaji->TambahGaji();
        }
        else
        {
            $response['status'] = 'error';
            $response['token'] = $this->security->get_csrf_hash();
            $response['message'] = validation_errors();

            echo json_encode($response);
        }
    }

    function do_getdatagajipegawai()
    {
        $response = array();

        $data = array(
            'id' => $this->input->get('gaji_id', true)
        );

        if ($data['id'] == '' || $data['id'] == null || $data['id'] == 0)
        {
            $response['status'] = 'error';
            $response['token'] = $this->security->get_csrf_hash();
            $response['message'] = 'Data gaji pegawai tidak ditemukan.';

            echo json_encode($response);
        }
        else
        {
            $this->manajemengaji->CekDataGajiPegawai();
        }
    }

    function do_editgaji()
    {
        $response = array();

        $this->form_validation->set_error_delimiters('', '');

        $this->form_validation->set_rules(
            'gaji_pokok',
            'Gaji Pokok',
            'required|numeric',
            array(
                'required' => '%s tidak boleh kosong.',
                'numeric' => '%s hanya dapat menggunakan angka.'
            )
        );
        $this->form_validation->set_rules(
            'masa_kerja',
            'Gaji Masa Kerja',
            'required|numeric',
            array(
                'required' => '%s tidak boleh kosong.',
                'numeric' => '%s hanya dapat menggunakan angka.'
            )
        );
        $this->form_validation->set_rules(
            'tunjangan',
            'Gaji Tunjangan',
            'required|numeric',
            array(
                'required' => '%s tidak boleh kosong.',
                'numeric' => '%s hanya dapat menggunakan angka.'
            )
        );
        $this->form_validation->set_rules(
            'transport',
            'Gaji Transport',
            'required|numeric',
            array(
                'required' => '%s tidak boleh kosong.',
                'numeric' => '%s hanya dapat menggunakan angka.'
            )
        );
        $this->form_validation->set_rules(
            'sks',
            'SKS',
            'required|numeric',
            array(
                'required' => '%s tidak boleh kosong.',
                'numeric' => '%s hanya dapat menggunakan angka.'
            )
        );
        $this->form_validation->set_rules(
            'lembur',
            'Gaji Lembur',
            'required|numeric',
            array(
                'required' => '%s tidak boleh kosong.',
                'numeric' => '%s hanya dapat menggunakan angka.'
            )
        );
        $this->form_validation->set_rules(
            'tabungan_pensiun',
            'Tabungan Pensiun',
            'required|numeric',
            array(
                'required' => '%s tidak boleh kosong.',
                'numeric' => '%s hanya dapat menggunakan angka.'
            )
        );
        $this->form_validation->set_rules(
            'bpjs_ketenagakerjaan',
            'BPJS Ketenagakerjaan',
            'required|numeric',
            array(
                'required' => '%s tidak boleh kosong.',
                'numeric' => '%s hanya dapat menggunakan angka.'
            )
        );
        $this->form_validation->set_rules(
            'bpjs_kesehatan',
            'BPJS Kesehatan',
            'required|numeric',
            array(
                'required' => '%s tidak boleh kosong.',
                'numeric' => '%s hanya dapat menggunakan angka.'
            )
        );
        $this->form_validation->set_rules(
            'potongan',
            'Potongan',
            'required|numeric',
            array(
                'required' => '%s tidak boleh kosong.',
                'numeric' => '%s hanya dapat menggunakan angka.'
            )
        );
        $this->form_validation->set_rules(
            'bulan_gaji',
            'Bulan Gaji',
            'required|in_list[1,2,3,4,5,6,7,8,9,10,11,12]',
            array(
                'required' => '%s tidak boleh kosong.',
                'in_list' => '%s tidak valid.'
            )
        );
        $this->form_validation->set_rules(
            'tahun_gaji',
            'Tahun Gaji',
            'required|numeric|max_length[4]',
            array(
                'required' => '%s tidak boleh kosong.',
                'numeric' => '%s hanya dapat menggunakan angka.',
                'max_length' => '%s hanya dapat memiliki 4 angka.'
            )
        );
        $this->form_validation->set_rules(
            'status_publish',
            'Status Publish',
            'required|in_list[Publish,Draft]',
            array(
                'required' => '%s tidak boleh kosong.',
                'in_list' => '%s tidak valid.'
            )
        );
        if ($this->form_validation->run())
        {
            $this->manajemengaji->EditGaji();
        }
        else
        {
            $response['status'] = 'error';
            $response['token'] = $this->security->get_csrf_hash();
            $response['message'] = validation_errors();

            echo json_encode($response);
        }
    }

    function do_deletegajipegawai()
    {
        $response = array();

        $this->form_validation->set_error_delimiters('', '');

        $this->form_validation->set_rules(
            'id_gaji',
            'ID Gaji',
            'required|numeric',
            array(
                'required' => '%s tidak boleh kosong.',
                'numeric' => '%s hanya dapat menggunakan angka.'
            )
        );
        if ($this->form_validation->run())
        {
            $this->manajemengaji->DeleteGaji();
        }
        else
        {
            $response['status'] = 'false';
            $response['token'] = $this->security->get_csrf_hash();
            $response['message'] = validation_errors();

            echo json_encode($response);
        }
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>