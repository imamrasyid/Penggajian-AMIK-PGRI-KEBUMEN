<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

Class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->protect->home_protectA();
        $this->load->library('mainlibrary');
        $this->load->model('home_model', 'home');
    }

    function index()
    {
        $data['title'] = 'Aplikasi Penggajian Pegawai || Dashboard';
        $data['header'] = 'Dashboard';
        $data['content'] = 'content/home/content_home';
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>