<?php if (!defined('BASEPATH')) exit("No direct script access allowed");

class Model_Customer extends CI_MODEL
{

    public function get_customer()
    {
        // $q = $this->db->query("SELECT * FROM tbl_pelajar"); //cara lama
        $q = $this->db->get("tb_customer");
        return $q;
    }

    public function data_drop($kode_customer)
    {
        $query = $this->db->get_where("tb_customer", array("kode_customer" => $kode_customer));
        return $query;
    }

    public function cekkodeCustomer()
    {
        $query = $this->db->query("SELECT MAX(kode_customer) AS kode_customer from tb_customer");
        $hasil = $query->row();
        return $hasil->kode_customer;
    }
}
