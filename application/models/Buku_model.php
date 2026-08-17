<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

    protected $table = 'buku';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Ambil daftar buku dengan dukungan pencarian (keyword) + pagination.
     *
     * @param string $keyword  kata kunci pencarian (judul/penulis/kategori)
     * @param int    $limit    jumlah data per halaman
     * @param int    $offset   offset data (dari CI pagination library)
     * @return array
     */
    public function get_all($keyword = '', $limit = 5, $offset = 0)
    {
        $this->_apply_search($keyword);

        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $offset);

        return $this->db->get($this->table)->result_array();
    }

    /**
     * Hitung total baris data (untuk pagination), mengikuti filter keyword yang sama.
     */
    public function count_all($keyword = '')
    {
        $this->_apply_search($keyword);
        return $this->db->count_all_results($this->table);
    }

    /**
     * Terapkan filter pencarian ke query builder (dipakai bareng get_all & count_all
     * supaya total pagination selalu sinkron dengan hasil pencarian).
     */
    private function _apply_search($keyword = '')
    {
        if ($keyword !== '') {
            $this->db->group_start();
            $this->db->like('judul', $keyword);
            $this->db->or_like('penulis', $keyword);
            $this->db->or_like('kategori', $keyword);
            $this->db->or_like('penerbit', $keyword);
            $this->db->group_end();
        }
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, array('id' => $id))->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}
