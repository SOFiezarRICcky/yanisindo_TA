<?php if (!defined('BASEPATH')) exit("No direct script access allowed");

class Transaksi extends CI_MODEL
{

    public function save($input_list)
    {


        // $data_header = array(

        //     "no_faktur" => $this->input->post("no_faktur"),
        //     "tgl_transaksi" => $this->input->post("tgl_transaksi"),
        //     "kode_customer" => $this->input->post("kode_customer"),
        //     "keterangan" => $this->input->post("keterangan"),
        //     "grand_total" => $this->input->post("grand_total"),
        //     "pajak" => $this->input->post("pajak"),
        //     "total_biaya" => $this->input->post("total_biaya"),
        // );


        // $this->db->insert("tb_header_trans", $data_header);

        // $a = count($input_list) - 1;
        // $jumlah = $input_list["jumlah"];
        // $kode_obat = $input_list["kode_obat"];

        // var_dump($jumlah);

        // $q = $this->db->query("UPDATE tb_obat SET stock = stock + '$jumlah' WHERE kode_obat = '$kode_obat'");
        // return $q;


        for ($x = 0; $x <= count($input_list); $x++) {

            $data[] = array(

                // "no_urut" => $input_list[$x]["no"],
                "no_faktur" => $input_list[$x]["no_faktur"],
                "kode_obat" => $input_list[$x]["kode_obat"],
                "nama_obat" => $input_list[$x]["nama_obat"],
                "harga" => $input_list[$x]["harga"],
                "jumlah" => $input_list[$x]["jumlah"],
                "subtotal" => $input_list[$x]["subtotal"],

            );




            // $data_header[] = array(

            //     "no_faktur" => $input_list[$x]["no_faktur"],
            //     "tgl_transaksi" => $input_list[$x]["tgl_transaksi"],
            //     "kode_customer" => $input_list[$x]["kode_customer"],
            //     "keterangan" => $input_list[$x]["keterangan"],
            //     "grand_total" => $input_list[$x]["grand_total"],
            //     "pajak" => $input_list[$x]["pajak"],
            //     "total_biaya" => $input_list[$x]["total_biaya"],
            // );


            // $this->db->insert("tb_header_trans", $data_header[$x]);
        }

        try {

            for ($x = 0; $x < count($input_list); $x++) {
                $this->db->insert("tb_detail_trans", $data[$x]);
            }

            return "success";
        } catch (Exception $e) {
            return "failed";
        }
    }

    public function insert_update_detail($input_list)
    {


        // $a = count($input_list) - 1;
        // $jumlah = $input_list["jumlah"];
        // $kode_obat = $input_list["kode_obat"];

        // var_dump($jumlah);

        // $q = $this->db->query("UPDATE tb_obat SET stock = stock + '$jumlah' WHERE kode_obat = '$kode_obat'");
        // return $q;


        for ($x = count($input_list) - 1; $x <= count($input_list); $x++) {

            $data[] = array(

                // "no_urut" => $input_list[$x]["no"],
                "no_faktur" => $input_list[$x]["no_faktur"],
                "kode_obat" => $input_list[$x]["kode_obat"],
                "nama_obat" => $input_list[$x]["nama_obat"],
                "harga" => $input_list[$x]["harga"],
                "jumlah" => $input_list[$x]["jumlah"],
                "subtotal" => $input_list[$x]["subtotal"],

            );
        }

        try {

            for ($x = 0; $x < count($input_list); $x++) {
                $this->db->insert("tb_detail_trans", $data[$x]);
            }

            return "success";
        } catch (Exception $e) {
            return "failed";
        }
    }

    public function cekNoFaktur()
    {
        $query = $this->db->query("SELECT MAX(no_faktur) AS no_faktur FROM tb_detail_trans");
        $hasil = $query->row();
        return $hasil->no_faktur;
    }

    public function tampil_data_transaksi()
    {
        $query = $this->db->query("SELECT tb_header_trans.no_faktur, tb_header_trans.tgl_transaksi,tb_header_trans.kode_customer, tb_customer.nama_customer, tb_customer.alamat, tb_header_trans.grand_total, tb_header_trans.pajak, tb_header_trans.total_biaya FROM tb_header_trans JOIN tb_customer ON tb_header_trans.kode_customer = tb_customer.kode_customer
        ");
        return $query;
    }

    public function data_customer_transaksi($no_faktur)
    {
        $query = $this->db->query("SELECT tb_customer.nama_customer, tb_customer.alamat FROM tb_customer JOIN tb_header_trans ON tb_customer.kode_customer = tb_header_trans.kode_customer where tb_header_trans.no_faktur = '$no_faktur'");
        return $query;
    }

    public function delete_entry($no_urut)
    {

        try {

            return $this->db->delete('tb_detail_trans', array('no_urut' => $no_urut));


            return "success";
        } catch (Exception $e) {
            return "failed";
        }
    }

    public function update_jumlah($jumlah, $kode_obat)
    {
        $ubah = $this->db->query("UPDATE tb_obat SET stock = stock - $jumlah WHERE kode_obat = '$kode_obat'");
        return $ubah;
    }
}
