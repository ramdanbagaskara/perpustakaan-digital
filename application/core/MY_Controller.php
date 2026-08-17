<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MY_Controller
 * Controller dasar yang memastikan user sudah login (session aktif)
 * sebelum bisa mengakses halaman CRUD buku.
 */
class MY_Controller extends CI_Controller {

    protected $logged_in_user = null;

    public function __construct()
    {
        parent::__construct();

        // Jika session 'logged_in' belum ada / false -> redirect ke halaman login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        $this->logged_in_user = array(
            'id'     => $this->session->userdata('user_id'),
            'nama'   => $this->session->userdata('nama'),
            'username' => $this->session->userdata('username'),
        );

        // Kirim data user ke semua view lewat $this->data (dipakai di controller anak)
        $this->data['current_user'] = $this->logged_in_user;
    }
}
