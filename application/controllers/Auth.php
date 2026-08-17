<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    /**
     * Halaman & proses login
     */
    public function login()
    {
        // Kalau sudah login, langsung lempar ke halaman buku
        if ($this->session->userdata('logged_in')) {
            redirect('buku');
        }

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Login - Perpustakaan Digital';
            $this->load->view('auth/login', $data);
            return;
        }

        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        $user = $this->User_model->verify_login($username, $password);

        if ($user) {
            // Set session data setelah login berhasil
            $session_data = array(
                'user_id'   => $user['id'],
                'username'  => $user['username'],
                'nama'      => $user['nama'],
                'logged_in' => TRUE,
            );
            $this->session->set_userdata($session_data);

            $this->session->set_flashdata('success', 'Login berhasil, selamat datang ' . $user['nama'] . '!');
            redirect('buku');
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah.');
            redirect('auth/login');
        }
    }

    /**
     * Logout: hapus session
     */
    public function logout()
    {
        $this->session->unset_userdata(array('user_id', 'username', 'nama', 'logged_in'));
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
