<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#2192     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

Class Logout extends CI_Controller
{
    function index()
    {
        $this->session->sess_destroy();
        redirect(base_url(), 'refresh');
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>