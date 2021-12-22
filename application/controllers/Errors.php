<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#2192     //
// ==================== //

defined('BASEPATH') or exit('No direct script access allowed');

Class Errors extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // Write Code Here
    }

    function index()
    {
        $data['title'] = '404 - Not Found';

        $this->load->view('content/errors/content_404', $data, FALSE);
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>