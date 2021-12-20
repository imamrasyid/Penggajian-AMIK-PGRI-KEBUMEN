<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#2192     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

Class Manajemenkepegawaian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->protect->admin_protectA();
        $this->load->model('admin/manajemenkepegawaian_model', 'manajemenkepegawaian');
    }

    function index()
    {
        $data['title'] = 'Manajemen Kepegawaian';
        $data['content'] = 'content/admin/manajemenkepegawaian/content_manajemenkepegawaian';
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    function tambahpegawai()
    {
        $data['title'] = 'Tambah Pegawai';
        $data['content'] = 'content/admin/manajemenkepegawaian/content_tambahpegawai';
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    function detailpegawai()
    {
        if (empty($this->input->get('idx', true))) redirect(base_url('admin/manajemenkepegawaian'), 'refresh');
        else
        {
            $data['title'] = 'Informasi Detail Pegawai';
            $data['content'] = 'content/admin/manajemenkepegawaian/content_detailpegawai';
            $this->load->view('layout/wrapper', $data, FALSE);
        }
    }

    function editpegawai()
    {
        if (empty($this->input->get('idx', true))) redirect(base_url('admin/manajemenkepegawaian'), 'refresh');
        else
        {
            $data['title'] = 'Edit Pegawai';
            $data['content'] = 'content/admin/manajemenkepegawaian/content_editpegawai';
            $this->load->view('layout/wrapper', $data, FALSE);
        }
    }

    function do_getdatapegawai()
    {
        $response = array();

        $data = array(
            'pegawai_id' => $this->input->get('pegawai_id', true)
        );

        if ($data['pegawai_id'] == '' || $data['pegawai_id'] == null || $data['pegawai_id'] == 0)
        {
            $response['status'] = 'error';
            $response['token'] = $this->security->get_csrf_hash();
            $response['message'] = 'Data pegawai tidak ditemukan.';

            echo json_encode($response);
        }
        else
        {
            $this->manajemenkepegawaian->CekDataPegawai();
        }
    }

    function do_tambahpegawai()
    {
        $response = array();

        $this->form_validation->set_error_delimiters('', '');

        $this->form_validation->set_rules(
            'nip',
            'NIP',
            'trim|required|is_unique[pegawai.nip]|alpha_numeric',
            array(
                'required' => '%s tidak boleh kosong.',
                'is_unique' => '%s telah terdaftar.',
                'alpha_numeric' => '%s hanya dapat menggunakan huruf dan angka.'
            )
        );
        $this->form_validation->set_rules(
            'nama_lengkap',
            'Nama Lengkap',
            'required|alpha_numeric_spaces|max_length[255]',
            array(
                'required' => '%s tidak boleh kosong.',
                'alpha_numeric_spaces' => '%s hanya dapat menggunakan huruf, angka, dan spasi.',
                'max_length' => '%s tidak dapat memiliki lebih dari 255 karakter.'
            )
        );
        $this->form_validation->set_rules(
            'tempat_lahir',
            'Tempat Lahir',
            'required|alpha',
            array(
                'required' => '%s tidak boleh kosong.',
                'alpha' => '%s hanya dapat menggunakan huruf.'
            )
        );
        $this->form_validation->set_rules(
            'tanggal_lahir',
            'Tanggal Lahir',
            'required|alpha_dash',
            array(
                'required' => '%s tidak boleh kosong.',
                'alpha_dash' => '%s hanya dapat menggunakan huruf / angka, dan simbol (-).'
            )
        );
        $this->form_validation->set_rules(
            'jenis_kelamin',
            'Jenis Kelamin',
            'required|in_list[Pria,Wanita]',
            array(
                'required' => '%s tidak boleh kosong.',
                'in_list' => '%s tidak valid.'
            )
        );
        $this->form_validation->set_rules(
            'agama',
            'Agama',
            'required|in_list[Islam,Katolik,Protestan,Hindu,Budha]',
            array(
                'required' => '%s tidak boleh kosong.',
                'in_list' => '%s tidak valid.'
            )
        );
        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required',
            array('required' => '%s tidak boleh kosong.')
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email|is_unique[pegawai.email]',
            array(
                'required' => '%s tidak boleh kosong.',
                'valid_email' => '%s tidak valid.',
                'is_unique' => '%s telah terdaftar.'
            )
        );
        $this->form_validation->set_rules(
            'kode_negara',
            'Kode Negara',
            'required|in_list[+62]',
            array(
                'required' => '%s tidak boleh kosong.',
                'in_list' => '%s tidak valid.'
            )
        );
        $this->form_validation->set_rules(
            'no_hp',
            'No Hp',
            'required|min_length[10]|max_length[12]',
            array(
                'required' => '%s tidak boleh kosong.',
                'min_length' => '%s harus memiliki minimal 11 digit angka.',
                'max_length' => '%s hanya boleh memiliki maksimal 13 digit angka.'
            )
        );
        $this->form_validation->set_rules(
            'status_pegawai',
            'Status Pegawai',
            'required|in_list[Aktif, Tidak Aktif]',
            array(
                'required' => '%s tidak boleh kosong.',
                'in_list' => '%s tidak valid.'
            )
        );
        $this->form_validation->set_rules(
            'status_kawin',
            'Status Kawin',
            'required|in_list[Kawin, Belum Kawin]',
            array(
                'required' => '%s tidak boleh kosong.',
                'in_list' => '%s tidak valid.'
            )
        );
        $this->form_validation->set_rules(
            'pendidikan_terakhir',
            'Pendidikan Terakhir',
            'required',
            array('required' => '%s tidak boleh kosong.')
        );
        if ($this->form_validation->run())
        {
            $this->manajemenkepegawaian->TambahPegawai();
        }
        else
        {
            $response['status'] = 'error';
            $response['token'] = $this->security->get_csrf_hash();
            $response['message'] = validation_errors();

            echo json_encode($response);
        }
    }

    function do_editpegawai()
    {
        $response = array();

        $this->form_validation->set_error_delimiters('', '');

        $this->form_validation->set_rules(
            'nama_lengkap',
            'Nama Lengkap',
            'required|alpha_numeric_spaces|max_length[255]',
            array(
                'required' => '%s tidak boleh kosong.',
                'alpha_numeric_spaces' => '%s hanya dapat menggunakan huruf, angka, dan spasi.',
                'max_length' => '%s tidak dapat memiliki lebih dari 255 karakter.'
            )
        );
        $this->form_validation->set_rules(
            'tempat_lahir',
            'Tempat Lahir',
            'required|alpha',
            array(
                'required' => '%s tidak boleh kosong.',
                'alpha' => '%s hanya dapat menggunakan huruf.'
            )
        );
        $this->form_validation->set_rules(
            'tanggal_lahir',
            'Tanggal Lahir',
            'required|alpha_dash',
            array(
                'required' => '%s tidak boleh kosong.',
                'alpha_dash' => '%s hanya dapat menggunakan huruf / angka, dan simbol (-).'
            )
        );
        $this->form_validation->set_rules(
            'jenis_kelamin',
            'Jenis Kelamin',
            'required|in_list[Pria,Wanita]',
            array(
                'required' => '%s tidak boleh kosong.',
                'in_list' => '%s tidak valid.'
            )
        );
        $this->form_validation->set_rules(
            'agama',
            'Agama',
            'required|in_list[Islam,Katolik,Protestan,Hindu,Budha]',
            array(
                'required' => '%s tidak boleh kosong.',
                'in_list' => '%s tidak valid.'
            )
        );
        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required',
            array('required' => '%s tidak boleh kosong.')
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email',
            array(
                'required' => '%s tidak boleh kosong.',
                'valid_email' => '%s tidak valid.'
            )
        );
        $this->form_validation->set_rules(
            'kode_negara',
            'Kode Negara',
            'required|in_list[+62]',
            array(
                'required' => '%s tidak boleh kosong.',
                'in_list' => '%s tidak valid.'
            )
        );
        $this->form_validation->set_rules(
            'no_hp',
            'No Hp',
            'required|min_length[10]|max_length[12]',
            array(
                'required' => '%s tidak boleh kosong.',
                'min_length' => '%s harus memiliki minimal 11 digit angka.',
                'max_length' => '%s hanya boleh memiliki maksimal 13 digit angka.'
            )
        );
        $this->form_validation->set_rules(
            'status_pegawai',
            'Status Pegawai',
            'required|in_list[Aktif,Tidak Aktif]',
            array(
                'required' => '%s tidak boleh kosong.',
                'in_list' => '%s tidak valid.'
            )
        );
        $this->form_validation->set_rules(
            'status_kawin',
            'Status Kawin',
            'required|in_list[Kawin,Belum Kawin]',
            array(
                'required' => '%s tidak boleh kosong.',
                'in_list' => '%s tidak valid.'
            )
        );
        $this->form_validation->set_rules(
            'pendidikan_terakhir',
            'Pendidikan Terakhir',
            'required',
            array('required' => '%s tidak boleh kosong.')
        );
        if ($this->form_validation->run())
        {
            $this->manajemenkepegawaian->EditPegawai();
        }
        else
        {
            $response['status'] = 'error';
            $response['token'] = $this->security->get_csrf_hash();
            $response['message'] = validation_errors();

            echo json_encode($response);
        }
    }

    function do_deletepegawai()
    {
        $response = array();
        
        $this->form_validation->set_error_delimiters('', '');

        $this->form_validation->set_rules(
            'pegawai_id',
            'ID Pegawai',
            'required',
            array('required' => '%s tidak boleh kosong.')
        );
        if ($this->form_validation->run())
        {
            $this->manajemenkepegawaian->DeletePegawai();
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