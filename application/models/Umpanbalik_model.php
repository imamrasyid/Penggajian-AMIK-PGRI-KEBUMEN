<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#2192     //
// ==================== //

defined('BASEPATH') OR exit('No direct script access allowed');

class Umpanbalik_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
    }

    function GetDataPegawai()
    {
        $query = $this->db->get_where('pegawai', array('nip' => $this->session->userdata('nip')))->row();
        if ($query) return $query;
    }

    function AddFeedback()
    {
        $response = array();

        $data = array(
            'id_pegawai' => $this->GetDataPegawai()->nip,
            'judul_pesan' => $this->input->post('judul_pesan', true),
            'kategori_pesan' => $this->input->post('kategori_pesan', true),
            'isi_pesan' => $this->input->post('isi_pesan', true),
            'status_pesan' => '0',
            'date_created' => date('d-m-Y H:i:s'),
            'date_updated' => '0'
        );
        
        $config['upload_path'] = './assets/assets/file_umpanbalik/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['file_ext_tolower'] = TRUE;
        $config['max_size']     = '2048';
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('attachment_pesan'))
        {
            $error = $this->upload->display_errors();
            if ($error != null)
            {
                if ($error == '<p>You did not select a file to upload.</p>')
                {
                    $query = $this->db->insert('penggajian_umpanbalik', $data);
                    if ($query)
                    {
                        $response['status'] = 'success';
                        $response['token'] = $this->security->get_csrf_hash();
                        $response['message'] = 'Umpan Balik berhasil dikirim.';
        
                        echo json_encode($response);
                    }
                    else
                    {
                        $response['status'] = 'error';
                        $response['token'] = $this->security->get_csrf_hash();
                        $response['message'] = 'Umpan Balik gagal dikirim.';
                    }    
                }
                else
                {
                    $response['status'] = 'error';
                    $response['token'] = $this->security->get_csrf_hash();
                    $response['message'] = 'Error Lampiran Pesan';
                    $response['error'] = $error;
    
                    echo json_encode($response);
                }
            }
            else
            {
                $query = $this->db->insert('penggajian_umpanbalik', $data);
                if ($query)
                {
                    $response['status'] = 'success';
                    $response['token'] = $this->security->get_csrf_hash();
                    $response['message'] = 'Umpan Balik berhasil dikirim.';
    
                    echo json_encode($response);
                }
                else
                {
                    $response['status'] = 'error';
                    $response['token'] = $this->security->get_csrf_hash();
                    $response['message'] = 'Umpan Balik gagal dikirim.';
                }
            }

        }
        else
        {
            $data2 = array('upload_data' => $this->upload->data());

            // Add Attachment Data
            $data['attachment_pesan'] = $data2['upload_data']['file_name'];
            
            $query = $this->db->insert('penggajian_umpanbalik', $data);
            if ($query)
            {
                $response['status'] = 'success';
                $response['token'] = $this->security->get_csrf_hash();
                $response['message'] = 'Umpan Balik berhasil dikirim.';

                echo json_encode($response);
            }
            else
            {
                $response['status'] = 'error';
                $response['token'] = $this->security->get_csrf_hash();
                $response['message'] = 'Umpan Balik gagal dikirim.';
            }
        }
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>