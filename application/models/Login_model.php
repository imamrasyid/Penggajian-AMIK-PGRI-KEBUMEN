<?php

// ==================== //
//   [DEV] EyeTracker   //
//     Lolsecs#6289     //
// ==================== //

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * login_auth
     * 
     * DEPRECATED!!!
     */
    function login_auth()
    {
        $data = array(
            'nip' => $this->input->post('nip'),
            'password' => md5($this->input->post('password'))
        );
        $check = $this->db->get_where('pegawai', array('nip' => $data['nip'], 'password' => $data['password']));
        $result = $check->row();
        if ($result) 
        {
            $this->session->set_userdata('nip', $result->nip);
            $this->session->set_userdata('nama', $result->nama_lengkap);
            $this->session->set_userdata('level_akses', $result->level_akses);
            redirect(base_url('home'), 'refresh');
        }
        else 
        {
            $this->session->set_flashdata('false', 'NIP atau Password salah');
            redirect(base_url('login'), 'refresh');
        }
    }

    function LoginValidation()
    {
        sleep(1);
        $response = array();
        
        $data = array(
            'nip' => $this->encryption->encrypt($this->input->post('nip', true)),
            'password' => $this->encryption->encrypt(md5($this->input->post('password', true))),
            'level_access' => $this->encryption->encrypt($this->input->post('level_access', true))
        );

        switch ($this->encryption->decrypt($data['level_access']))
        {
            case 'Pegawai':
                {
                    $query = $this->db->get_where('pegawai', array(
                        'nip' => $this->encryption->decrypt($data['nip']),
                        'password' => $this->encryption->decrypt($data['password'])
                    ))->row();
                    if ($query)
                    {
                        $sessionData = array(
                            'nip' => $query->nip,
                            'nama' => $query->gelar_depan.' '.$query->nama_pegawai.' '.$query->gelar_belakang,
                            'level_akses' => 'Pegawai'
                        );

                        $this->session->set_userdata($sessionData);

                        $response['status'] = true;
                        $response['token'] = $this->security->get_csrf_hash();
                        $response['message'] = 'Login berhasil. Selamat datang '.$this->session->userdata('nama').'.';

                        echo json_encode($response);
                    }
                    else
                    {
                        $query2 = $this->db->get_where('pegawai', array('nip' => $this->encryption->decrypt($data['nip'])))->row();
                        if ($query2)
                        {
                            $response['status'] = false;
                            $response['token'] = $this->security->get_csrf_hash();
                            $response['message'] = 'Password salah.<br> Pastikan password yang anda masukkan sudah benar.';

                            echo json_encode($response);
                        }
                        else
                        {
                            $response['status'] = false;
                            $response['token'] = $this->security->get_csrf_hash();
                            $response['message'] = 'Tidak ditemukan akun dengan nip tersebut.';

                            echo json_encode($response);
                        }
                    }
                    break;
                }
            case 'Admin':
                {
                    $query = $this->db->get_where('admin', array(
                        'nip' => $this->encryption->decrypt($data['nip']),
                        'password' => $this->encryption->decrypt($data['password'])
                    ))->row();
                    if ($query)
                    {
                        $sessionData = array(
                            'nip' => $query->nip,
                            'nama' => $query->nama_lengkap,
                            'level_akses' => 'Admin'
                        );

                        $this->session->set_userdata($sessionData);

                        $response['status'] = true;
                        $response['token'] = $this->security->get_csrf_hash();
                        $response['message'] = 'Login berhasil. Selamat datang '.$this->session->userdata('nama').'.';

                        echo json_encode($response);
                    }
                    else
                    {
                        $query2 = $this->db->get_where('Admin', array('nip' => $this->encryption->decrypt($data['nip'])))->row();
                        if ($query2)
                        {
                            $response['status'] = false;
                            $response['token'] = $this->security->get_csrf_hash();
                            $response['message'] = 'Password salah.<br> Pastikan password yang anda masukkan sudah benar.';

                            echo json_encode($response);
                        }
                        else
                        {
                            $response['status'] = false;
                            $response['token'] = $this->security->get_csrf_hash();
                            $response['message'] = 'Tidak ditemukan akun dengan nip tersebut.';

                            echo json_encode($response);
                        }
                    }
                    break;
                }
            
            default:
                {
                    $response['status'] = false;
                    $response['token'] = $this->security->get_csrf_hash();
                    $response['message'] = 'Error: "Masuk Sebagai" tidak didefinisikan.';

                    echo json_encode($response);
                    break;
                }
        }
    }
}

// This Code Generated Automatically By EyeTracker Snippets. //

?>