<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') OR exit('No direct script access allowed');

class Protection
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
    }

    public function login_protectA()
    {
        if (!empty($this->ci->session->userdata('nip'))) 
        {
            redirect(base_url('home'), 'refresh');
        }
    }

    public function home_protectA()
    {
        if (empty($this->ci->session->userdata('nip')))
        {
            redirect(base_url('login'), 'refresh');
        }
    }

    public function admin_protectA()
    {
        if (empty($this->ci->session->userdata('nip')))
        {
            $this->ci->output->set_status_header('404');
            $this->ci->load->view('content/errors/content_404');
        }
        if ($this->ci->session->userdata('level_akses') != "Admin")
        {
            $this->ci->output->set_status_header('404');
            $this->ci->load->view('content/errors/content_404');
        }
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>