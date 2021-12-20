<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#2192     //
// ==================== //

defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemenkepegawaian_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
    }

    function GetAllPegawai()
    {
        return $this->db->get('pegawai')->result_array();
    }

    function CekDataPegawai()
    {
        sleep(1);
        $data = array(
            'id' => $this->input->get('pegawai_id', true)
        );

        $response = array();

        $query = $this->db->get_where('pegawai', array('id' => $data['id']))->row();
        if ($query)
        {
            $response['status'] = 'success';
            $response['token'] = $this->security->get_csrf_hash();
            $response['message'] = 'Sukses';

            echo json_encode($response);
        }
        else
        {
            $response['status'] = 'error';
            $response['token'] = $this->security->get_csrf_hash();
            $response['message'] = 'Data pegawai tidak ditemukan.';

            echo json_encode($response);
        }
    }

    function GetDetailDataPegawai()
    {
        $data = array(
            'id' => $this->input->get('idx', true)
        );

        $query = $this->db->get_where('pegawai', array('id' => $data['id']))->row();
        if ($query)
        {
            return $query;
        }
        else
        {
            redirect(base_url('admin/manajemenkepegawaian'), 'refresh');
        }
    }

    function TambahPegawai()
    {
        $response = array();

        $data = array(
            'nip' => $this->input->post('nip', true),
            'password' => md5('hidupamikpgri'),
            'nama_pegawai' => $this->input->post('nama_lengkap', true),
            'nidn' => $this->input->post('nidn', true),
            'gelar_depan' => $this->input->post('gelar_depan', true),
            'gelar_belakang' => $this->input->post('gelar_belakang', true),
            'tempat_lahir' => $this->input->post('tempat_lahir', true),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'agama' => $this->input->post('agama', true),
            'alamat' => $this->input->post('alamat', true),
            'email' => $this->input->post('email', true),
            'no_hp' => $this->input->post('kode_negara', true).$this->input->post('no_hp', true),
            'status_pegawai' => $this->input->post('status_pegawai', true),
            'status_kawin' => $this->input->post('status_kawin', true),
            'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir', true)
        );
        
        $config['upload_path'] = './assets/assets/img/foto_pegawai/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_ext_tolower'] = TRUE;
        $config['max_size']     = '2048';
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('foto'))
        {
            $error = array('error' => $this->upload->display_errors());
            if ($error['error'] == '' || $error['error'] == null)
            {
                // Add optional data
                $data['foto'] = 'no_photo.png';
                $data['date_created'] = date('d-m-Y H:i:s');
                $data['date_updated'] = '0';

                $query = $this->db->insert('pegawai', $data);
                if ($query)
                {
                    $response['status'] = 'success';
                    $response['token'] = $this->security->get_csrf_hash();
                    $response['message'] = 'Data pegawai baru berhasil ditambahkan.';

                    echo json_encode($response);
                }
                else
                {
                    $response['status'] = 'error';
                    $response['token'] = $this->security->get_csrf_hash();
                    $response['message'] = 'Data pegawai baru gagal ditambahkan.';

                    echo json_encode($response);
                }
            }
            else
            {
                $response['status'] = 'error';
                $response['token'] = $this->security->get_csrf_hash();
                $response['message'] = $error['error'];

                echo json_encode($response);
            }
        }
        else
        {
            $data2 = array('upload_data' => $this->upload->data());

            // Add photo data
            $data['foto'] = $data2['upload_data']['file_name'];
            $data['date_created'] = date('d-m-Y H:i:s');
            $data['date_updated'] = '0';

            $query = $this->db->insert('pegawai', $data);
            if ($query)
            {
                $response['status'] = 'success';
                $response['token'] = $this->security->get_csrf_hash();
                $response['message'] = 'Data pegawai baru berhasil ditambahkan.';

                echo json_encode($response);
            }
            else
            {
                $response['status'] = 'error';
                $response['token'] = $this->security->get_csrf_hash();
                $response['message'] = 'Data pegawai baru gagal ditambahkan.';

                echo json_encode($response);
            }
        }
    }

    function EditPegawai()
    {
        $response = array();

        $nip = $this->input->post('nip', true);

        $data = array(
            'nama_pegawai' => $this->input->post('nama_lengkap', true),
            'nidn' => $this->input->post('nidn', true),
            'gelar_depan' => $this->input->post('gelar_depan', true),
            'gelar_belakang' => $this->input->post('gelar_belakang', true),
            'tempat_lahir' => $this->input->post('tempat_lahir', true),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'agama' => $this->input->post('agama', true),
            'alamat' => $this->input->post('alamat', true),
            'email' => $this->input->post('email', true),
            'no_hp' => $this->input->post('kode_negara', true).$this->input->post('no_hp', true),
            'status_pegawai' => $this->input->post('status_pegawai', true),
            'status_kawin' => $this->input->post('status_kawin', true),
            'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir', true)
        );
        
        $config['upload_path'] = './assets/assets/img/foto_pegawai/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_ext_tolower'] = TRUE;
        $config['max_size']     = '2048';
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('foto'))
        {
            // $error = array('error' => $this->upload->display_errors());
            // Add optional data
            $data['date_updated'] = date('d-m-Y H:i:s');

            $query = $this->db->where('nip', $nip)->update('pegawai', $data);
            if ($query)
            {
                $response['status'] = 'success';
                $response['token'] = $this->security->get_csrf_hash();
                $response['message'] = 'Data pegawai berhasil diedit.';

                echo json_encode($response);
            }
            else
            {
                $response['status'] = 'error';
                $response['token'] = $this->security->get_csrf_hash();
                $response['message'] = 'Data pegawai gagal diedit.';

                echo json_encode($response);
            }
        }
        else
        {
            $data2 = array('upload_data' => $this->upload->data());

            // Add photo data
            $data['foto'] = $data2['upload_data']['file_name'];
            $data['date_updated'] = date('d-m-Y H:i:s');

            $datapegawai = $this->db->get_where('pegawai', array('nip' => $nip))->row();
            if ($datapegawai->foto != '' || $datapegawai->foto != null) unlink('./assets/assets/img/foto_pegawai/'.$datapegawai->foto);
            
            $query = $this->db->where('nip', $nip)->update('pegawai', $data);
            if ($query)
            {
                $response['status'] = 'success';
                $response['token'] = $this->security->get_csrf_hash();
                $response['message'] = 'Data pegawai berhasil diedit.';

                echo json_encode($response);
            }
            else
            {
                $response['status'] = 'error';
                $response['token'] = $this->security->get_csrf_hash();
                $response['message'] = 'Data pegawai gagal diedit.';

                echo json_encode($response);
            }
        }
    }

    function DeletePegawai()
    {
        sleep(1);
        $response = array();

        $data = array(
            'id' => $this->input->post('pegawai_id', true)
        );

        $query = $this->db->get_where('pegawai', array('id' => $data['id']))->row();
        if ($query)
        {
            if ($query->foto != '' || $query->foto != null) unlink('./assets/assets/img/foto_pegawai/'.$query->foto);

            $delete = $this->db->where('id', $query->id)->delete('pegawai');
            if ($delete)
            {
                $response['status'] = 'success';
                $response['token'] = $this->security->get_csrf_hash();
                $response['message'] = 'Berhasil menghapus data pegawai.';

                echo json_encode($response);
            }
            else
            {
                $response['status'] = 'error';
                $response['token'] = $this->security->get_csrf_hash();
                $response['message'] = 'Gagal menghapus data pegawai.';
            }
        }
        else
        {
            $response['status'] = 'error';
            $response['token'] = $this->security->get_csrf_hash();
            $response['message'] = 'Data pegawai tidak ditemukan atau telah dihapus.';

            echo json_encode($response);
        }
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>