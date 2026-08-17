<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    protected $table = 'users';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Cari user berdasarkan username
     */
    public function get_by_username($username)
    {
        return $this->db->get_where($this->table, array('username' => $username))->row_array();
    }

    /**
     * Verifikasi login: cek username + password (hash)
     * Mengembalikan data user jika berhasil, false jika gagal.
     */
    public function verify_login($username, $password)
    {
        $user = $this->get_by_username($username);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }
}
