<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#2192     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

Class Umpanbalik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('umpanbalik_model', 'umpanbalik');
    }

    function index()
    {
        $data['title'] = 'Umpan Balik Anda';
        $data['content'] = 'content/umpanbalik/content_umpanbalik';
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    function buat_umpanbalik()
    {
        $data['content'] = 'Umpan Balik';
        $data['content'] = 'content/umpanbalik/content_buat_umpanbalik';
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    function do_sendumpanbalik()
    {
        $response = array();

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules(
            'judul_pesan',
            'Judul Pesan',
            'required|max_length[255]',
            array(
                'required' => '%s tidak boleh kosong.',
                'max_length' => '%s hanya dapat menggunakan maksimal 255 karakter.'
            )
        );
        $this->form_validation->set_rules(
            'kategori_pesan',
            'Kategori Pesan',
            'required|in_list[Saran,Kritik,Lapor Kesalahan Ketik,Lapor Error]',
            array(
                'required' => '%s tidak boleh kosong.',
                'in_list' => '%s tidak valid.'
            )
        );
        $this->form_validation->set_rules(
            'isi_pesan',
            'Isi Pesan',
            'required',
            array('required' => '%s tidak boleh kosong.')
        );
        if ($this->form_validation->run())
        {
            $this->umpanbalik->AddFeedback();
        }
        else
        {
            $response['status'] = 'error';
            $response['token'] = $this->security->get_csrf_hash();
            $response['message'] = validation_errors();

            echo json_encode($response);
        }
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>