<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

Class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->protect->login_protectA();
        $this->load->model('login_model', 'login');
    }

    function index()
    {
        $data['title'] = 'Login';
        $this->load->view('content/login/content_login', $data, FALSE);
    }

    function do_login()
    {
        $response = array();

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules(
            'nip',
            'NIP',
            'required|alpha_numeric',
            array(
                'required' => '%s tidak boleh kosong.',
                'alpha_numeric' => '%s hanya dapat menggunakan huruf dan angka.'
            )
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array('required' => '%s tidak boleh kosong.')
        );
        $this->form_validation->set_rules(
            'level_access',
            'Masuk Sebagai',
            'required|in_list[Pegawai,Admin]',
            array(
                'required' => '%s tidak boleh kosong.',
                'in_list' => '%s tidak valid.'
            )
        );
        if ($this->form_validation->run())
        {
            $this->login->LoginValidation();
        }
        else
        {
            $response['status'] = false;
            $response['token'] = $this->security->get_csrf_hash();
            $response['message'] = validation_errors();
            
            echo json_encode($response);
        }
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>