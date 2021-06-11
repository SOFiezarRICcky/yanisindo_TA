<?php if (!defined('BASEPATH')) exit("No direct script access allowed");

class Model_Obat extends CI_MODEL
{

    public function get_obat()
    {
        // $q = $this->db->query("SELECT * FROM tbl_pelajar"); //cara lama
        $q = $this->db->get("tb_obat");
        return $q;
    }

    public function drop_obat($kode_obat)
    {
        $query = $this->db->get_where("tb_obat", array("kode_obat" => $kode_obat));
        return $query;
    }

    public function cekkodeobat()
    {
        $query = $this->db->query("SELECT MAX(kode_obat) AS kode_obat from tb_obat");
        $hasil = $query->row();
        return $hasil->kode_obat;
    }
}
