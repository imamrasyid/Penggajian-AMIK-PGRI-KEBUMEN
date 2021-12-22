<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#2192     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

Class Logout extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // Write Code Here
    }
    
    function index()
    {
        $this->session->sess_destroy();
        redirect(base_url(), 'refresh');
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>