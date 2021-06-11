<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Model_Obat");
        $this->load->model("Model_Customer");
        $this->load->model("Transaksi");
        $this->load->library("form_validation");
        $this->load->helper("url");
    }

    public function index()
    {
        // Pengkodisian Jika Belum ada Data Di Session Atau Kosong Berarti Otomatis Ke Login
        if ($this->db->get_where("tb_user", ["username" => $this->session->userdata("username")])->row_array()) {
            $data["title"] = "Dashboard";
            $data['user'] = $this->db->get_where("tb_user", ["username" => $this->session->userdata("username")])->row_array();


            $this->load->view("templates/header", $data);
            $this->load->view("templates/sidebar", $data);
            $this->load->view("templates/topbar", $data);
            $this->load->view("admin/index", $data);
            $this->load->view("templates/footer", $data);
        } else {
            redirect("login");
        }
    }

    // --- Master Obat ---
    public function index_obat()
    {
        // Pengkodisian Jika Belum ada Data Di Session Atau Kosong Berarti Otomatis Ke Login
        if ($this->db->get_where("tb_user", ["username" => $this->session->userdata("username")])->row_array()) {
            $data["title"] = "Data Master Obat";
            $data['user'] = $this->db->get_where("tb_user", ["username" => $this->session->userdata("username")])->row_array();

            $data["obat"] = $this->Model_Obat->get_obat();

            $this->load->view("templates/header", $data);
            $this->load->view("templates/sidebar", $data);
            $this->load->view("templates/topbar", $data);
            $this->load->view("master/index_obat", $data);
            // $this->load->view("templates/footer", $data);
        } else {
            redirect("login");
        }
    }

    public function create_obat()
    {

        // Pengkodisian Jika Belum ada Data Di Session Atau Kosong Berarti Otomatis Ke Login
        if ($this->db->get_where("tb_user", ["username" => $this->session->userdata("username")])->row_array()) {


            // $this->form_validation->set_rules("kode_obat", "Kode Obat", "required|trim|is_unique[tb_obat.kode_obat]", [
            //     "is_unique" => "Kode Obat Sudah Pernah Di Input"
            // ]);
            $this->form_validation->set_rules("nama_obat", "Kode Obat", "required|trim");
            $this->form_validation->set_rules("isi_per_q", "Satuan Per Q", "required|trim|numeric");
            $this->form_validation->set_rules("stock", "Stock", "required|trim|numeric");
            $this->form_validation->set_rules("harga", "Harga", "required|trim");
            $this->form_validation->set_rules("harga_ppn", "Harga", "required|trim");
            $this->form_validation->set_rules("harga_total", "Harga", "required|trim");

            if ($this->form_validation->run() == false) {

                // Kode Obat Otomatis
                $cekData = $this->Model_Obat->cekkodeobat();
                $nourut = substr($cekData, 3, 3);
                $kodeobatSekarang = $nourut + 1;
                $data["kode_obat"] = $kodeobatSekarang;
                // Kode Obat Otomatis

                $data["title"] = "Data Master Obat";
                $data['user'] = $this->db->get_where("tb_user", ["username" => $this->session->userdata("username")])->row_array();

                $this->load->view("templates/header", $data);
                $this->load->view("templates/sidebar", $data);
                $this->load->view("templates/topbar", $data);
                $this->load->view("master/create_obat", $data);
            } else {
                $data = array(
                    "kode_obat" => $this->input->post("kode_obat"),
                    "nama_obat" => $this->input->post("nama_obat"),
                    "isi_per_q" => $this->input->post("isi_per_q"),
                    "satuan" => $this->input->post("satuan"),
                    "stock" => $this->input->post("stock"),
                    "harga" => $this->input->post("harga"),
                    "harga_ppn" => $this->input->post("harga_ppn"),
                    "harga_total" => $this->input->post("harga_total"),
                    "expired" => $this->input->post("expired_obat")
                );
                if ($this->db->insert("tb_obat", $data)) {
                    $this->session->set_flashdata("success", "Berhasil Menambahkan Data Obat");
                    echo "<script>window.location.href='" . base_url() . "admin/index_obat" . "';</script>";
                } else {
                    $this->session->set_flashdata("error", "Gagal Menambahkan Data Obat");
                    echo "<script>window.location.href='" . base_url() . "admin/index_obat" . "';</script>";
                }
            }
        } else {
            redirect("login");
        }
    }

    public function edit_obat($kode_obat = "")
    {

        // Pengkodisian Jika Belum ada Data Di Session Atau Kosong Berarti Otomatis Ke Login
        if ($this->db->get_where("tb_user", ["username" => $this->session->userdata("username")])->row_array()) {

            $this->form_validation->set_rules("nama_obat", "Nama Obat", "required|trim");
            $this->form_validation->set_rules("isi_per_q", "Satuan Per Q", "required|trim");
            $this->form_validation->set_rules("stock", "Stock", "required|trim");
            $this->form_validation->set_rules("harga", "Harga", "required|trim");
            $this->form_validation->set_rules("harga_ppn", "Harga", "required|trim");
            $this->form_validation->set_rules("harga_total", "Harga", "required|trim");

            if ($this->form_validation->run() == false) {
                $data['user'] = $this->db->get_where("tb_user", ["username" => $this->session->userdata("username")])->row_array();

                $data["obat"] = $this->db->get_where("tb_obat", array("kode_obat" => $kode_obat), 1)->row();

                $this->load->view("templates/header", $data);
                $this->load->view("templates/sidebar", $data);
                $this->load->view("templates/topbar", $data);
                $this->load->view("master/edit_obat", $data);
            } else {
                $data = array(
                    "kode_obat" => $this->input->post("kode_obat"),
                    "nama_obat" => $this->input->post("nama_obat"),
                    "isi_per_q" => $this->input->post("isi_per_q"),
                    "satuan" => $this->input->post("satuan"),
                    "stock" => $this->input->post("stock"),
                    "harga" => $this->input->post("harga"),
                    "harga_ppn" => $this->input->post("harga_ppn"),
                    "harga_total" => $this->input->post("harga_total"),
                    "expired" => $this->input->post("expired_obat")
                );

                $this->db->where("kode_obat", $this->input->post("kode_obat"));
                if ($this->db->update("tb_obat", $data)) {
                    $this->session->set_flashdata("success", "Berhasil Merubah Data Obat");
                    echo "<script>window.location.href='" . base_url() . "admin/index_obat" . "';</script>";
                } else {
                    $this->session->set_flashdata("error", "Gagal Merubah Data Obat");
                    echo "<script>window.location.href='" . base_url() . "admin/index_obat" . "';</script>";
                }
            }
        } else {
            redirect("login");
        }
    }

    public function delete_obat($kode_obat = "")
    {
        // Pengkodisian Jika Belum ada Data Di Session Atau Kosong Berarti Otomatis Ke Login
        if ($this->db->get_where("tb_user", ["username" => $this->session->userdata("username")])->row_array()) {

            if ($this->db->delete("tb_obat", array("kode_obat" => $kode_obat))) {

                $this->session->set_flashdata("success", "Berhasil Hapus Data Obat");
                echo "<script>window.location.href='" . base_url() . "admin/index_obat" . "';</script>";
            }
        } else {
            redirect("login");
        }
    }
    // --- Master Obat ---


    // --- Master Customer ---
    public function index_customer()
    {
        // Pengkodisian Jika Belum ada Data Di Session Atau Kosong Berarti Otomatis Ke Login
        if ($this->db->get_where("tb_user", ["username" => $this->session->userdata("username")])->row_array()) {

            $data["title"] = "Data Master Customer";
            $data['user'] = $this->db->get_where("tb_user", ["username" => $this->session->userdata("username")])->row_array();

            $data["customer"] = $this->Model_Customer->get_customer();

            $this->load->view("templates/header", $data);
            $this->load->view("templates/sidebar", $data);
            $this->load->view("templates/topbar", $data);
            $this->load->view("master/index_customer", $data);
            // $this->load->view("templates/footer", $data);
        } else {
            redirect("login");
        }
    }

    public function create_customer()
    {
        // Pengkodisian Jika Belum ada Data Di Session Atau Kosong Berarti Otomatis Ke Login
        if ($this->db->get_where("tb_user", ["username" => $this->session->userdata("username")])->row_array()) {

            // $this->form_validation->set_rules("kode_obat", "Kode Obat", "required|trim|is_unique[tb_obat.kode_obat]", [
            //     "is_unique" => "Kode Obat Sudah Pernah Di Input"
            // ]);
            $this->form_validation->set_rules("kode_customer", "Kode Customer", "required|trim");
            $this->form_validation->set_rules("nama_customer", "Nama Customer", "required|trim");
            $this->form_validation->set_rules("alamat", "Alamat", "required|trim");
            $this->form_validation->set_rules("email", "email", "required|valid_email");
            $this->form_validation->set_rules("no_telp", "No Telepon", "required|numeric");
            $this->form_validation->set_rules("fax", "Fax", "required|numeric");
            $this->form_validation->set_rules("con_pers", "Personal Contact", "required|numeric");

            if ($this->form_validation->run() == false) {

                // Kode Obat Otomatis
                $cekData = $this->Model_Customer->cekkodeCustomer();
                $nourut = substr($cekData, 3, 3);
                $kodeCustomerBaru = $nourut + 1;
                $data["kode_customer"] = $kodeCustomerBaru;
                // // Kode Obat Otomatis

                $data["title"] = "Data Master Obat";
                $data['user'] = $this->db->get_where("tb_user", ["username" => $this->session->userdata("username")])->row_array();

                $this->load->view("templates/header", $data);
                $this->load->view("templates/sidebar", $data);
                $this->load->view("templates/topbar", $data);
                $this->load->view("master/create_customer", $data);
            } else {
                $data = array(
                    "kode_customer" => $this->input->post("kode_customer"),
                    "nama_customer" => $this->input->post("nama_customer"),
                    "alamat" => $this->input->post("alamat"),
                    "email" => $this->input->post("email"),
                    "no_telp" => $this->input->post("no_telp"),
                    "fax" => $this->input->post("fax"),
                    "con_pers" => $this->input->post("con_pers")
                );
                if ($this->db->insert("tb_customer", $data)) {
                    $this->session->set_flashdata("success", "Berhasil Menambahkan Data Customer");
                    echo "<script>window.location.href='" . base_url() . "admin/index_customer" . "';</script>";
                } else {
                    $this->session->set_flashdata("error", "Gagal Menambahkan Data Customer");
                    echo "<script>window.location.href='" . base_url() . "admin/index_customer" . "';</script>";
                }
            }
        } else {
            redirect("login");
        }
    }

    public function edit_customer($kode_customer = "")
    {
        // Pengkodisian Jika Belum ada Data Di Session Atau Kosong Berarti Otomatis Ke Login
        if ($this->db->get_where("tb_user", ["username" => $this->session->userdata("username")])->row_array()) {

            $this->form_validation->set_rules("kode_customer", "Kode Customer", "required|trim");
            $this->form_validation->set_rules("nama_customer", "Nama Customer", "required|trim");
            $this->form_validation->set_rules("alamat", "Alamat", "required|trim");
            $this->form_validation->set_rules("email", "email", "required|valid_email");
            $this->form_validation->set_rules("no_telp", "No Telepon", "required|numeric");
            $this->form_validation->set_rules("fax", "Fax", "required|numeric");
            $this->form_validation->set_rules("con_pers", "Personal Contact", "required|numeric");


            if ($this->form_validation->run() == false) {
                $data['user'] = $this->db->get_where("tb_user", ["username" => $this->session->userdata("username")])->row_array();

                $data["customer"] = $this->db->get_where("tb_customer", array("kode_customer" => $kode_customer), 1)->row();

                $this->load->view("templates/header", $data);
                $this->load->view("templates/sidebar", $data);
                $this->load->view("templates/topbar", $data);
                $this->load->view("master/edit_customer", $data);
            } else {
                $data = array(
                    "kode_customer" => $this->input->post("kode_customer"),
                    "nama_customer" => $this->input->post("nama_customer"),
                    "alamat" => $this->input->post("alamat"),
                    "email" => $this->input->post("email"),
                    "no_telp" => $this->input->post("no_telp"),
                    "fax" => $this->input->post("fax"),
                    "con_pers" => $this->input->post("con_pers")
                );

                $this->db->where("kode_customer", $this->input->post("kode_customer"));
                if ($this->db->update("tb_customer", $data)) {
                    $this->session->set_flashdata("success", "Berhasil Merubah Data Customer");
                    echo "<script>window.location.href='" . base_url() . "admin/index_customer" . "';</script>";
                } else {
                    $this->session->set_flashdata("error", "Gagal Merubah Data Customer");
                    echo "<script>window.location.href='" . base_url() . "admin/index_customer" . "';</script>";
                }
            }
        } else {
            redirect("login");
        }
    }

    public function delete_customer($kode_customer = "")
    {
        // Pengkodisian Jika Belum ada Data Di Session Atau Kosong Berarti Otomatis Ke Login
        if ($this->db->get_where("tb_user", ["username" => $this->session->userdata("username")])->row_array()) {

            if ($this->db->delete("tb_customer", array("kode_customer" => $kode_customer))) {

                $this->session->set_flashdata("success", "Berhasil Hapus Data Obat");
                echo "<script>window.location.href='" . base_url() . "admin/index_customer" . "';</script>";
            }
        } else {
            redirect("login");
        }
    }
    // --- Master Customer ---



    // ------------ Transaksi

    public function index_transaksi()
    {
        // Pengkodisian Jika Belum ada Data Di Session Atau Kosong Berarti Otomatis Ke Login
        if ($this->db->get_where("tb_user", ["username" => $this->session->userdata("username")])->row_array()) {

            $data["title"] = "Data Master Customer";
            $data['user'] = $this->db->get_where("tb_user", ["username" => $this->session->userdata("username")])->row_array();

            $data["transaksi"] = $this->Transaksi->tampil_data_transaksi();

            $this->load->view("templates/header", $data);
            $this->load->view("templates/sidebar", $data);
            $this->load->view("templates/topbar", $data);
            $this->load->view("transaksi/index_transaksi", $data);
            // $this->load->view("templates/footer", $data);
        } else {
            redirect("login");
        }
    }

    public function transaksi()
    {
        if ($this->db->get_where("tb_user", ["username" => $this->session->userdata("username")])->row_array()) {

            // $this->form_validation->set_rules("nama_customer", "Nama Customer", "required|trim", ["reuqired" => "Pilih Data Customer Terlebih Dahulu"]);


            // No Faktur Otomatis
            $cekDatatrans = $this->Transaksi->cekNoFaktur();
            $no_uruttrans = substr($cekDatatrans, 3, 3);
            $no_faktur_baru = $no_uruttrans + 1;
            $data["no_faktur_baru"] = $no_faktur_baru;

            $data["title"] = "Insert Transaksi";
            $data['user'] = $this->db->get_where("tb_user", ["username" => $this->session->userdata("username")])->row_array();

            $data["dropdown_cus"] = $this->Model_Customer->get_customer();
            $data["dropdown_obt"] = $this->Model_Obat->get_obat();



            $this->load->view("templates/header", $data);
            $this->load->view("templates/sidebar", $data);
            $this->load->view("templates/topbar", $data);
            $this->load->view("transaksi/create_transaksi", $data);
            // $this->load->view("templates/footer", $data);


        } else {
            redirect("login");
        }
    }

    // Auto Fill Customer
    public function autofill_cus()
    {
        $kode_customer = $_GET["kode_customer"];
        $tampil = $this->Model_Customer->data_drop($kode_customer)->result();
        echo json_encode($tampil);
    }
    // Auto Fill Customer

    // Auto Fill Obat
    public function autofill_obt()
    {
        $kode_obat = $_GET["kode_obat"];
        $drop_obat = $this->Model_Obat->drop_obat($kode_obat)->result();
        echo json_encode($drop_obat);
    }

    public function insert_transaksi_detail()
    {

        // $data = [
        //     "no_faktur" => $this->input->post("no_faktur"),
        // ];

        // $this->db->insert("tb_header_trans", $data);

        // Insert Datatable untuk Tabel Detail Transaksi
        $input_list = $this->input->post("data_table");

        $this->load->model("Transaksi");

        $status = $this->Transaksi->save($input_list);

        $this->output->set_content_type("application/json");
        echo json_encode(array("status" => $status));
    }

    public function edit_transaksi_header($no_faktur = "")
    {

        $data = [
            "no_faktur" => $this->input->post("no_faktur"),
            "tgl_transaksi" => $this->input->post("tgl_transaksi"),
            "kode_customer" => $this->input->post("kode_customer"),
            "keterangan" => $this->input->post("keterangan"),
            "grand_total" => $this->input->post("grand_total"),
            "pajak" => $this->input->post("pajak"),
            "total_biaya" => $this->input->post("total_biaya")
        ];

        $this->db->where("no_faktur", $this->input->post("no_faktur"));
        if ($this->db->update("tb_header_trans", $data)) {
            $this->session->set_flashdata("success", "Berhasil Merubah Data Transaksi");
            echo "<script>window.location.href='" . base_url() . "admin/index_transaksi" . "';</script>";
        } else {
            $this->session->set_flashdata("error", "Gagal Merubah Data Transaksi");
            echo "<script>window.location.href='" . base_url() . "admin/index_transaksi" . "';</script>";
        }
    }

    public function insert_update_transaksi_detail()
    {

        // $data = [
        //     "no_faktur" => $this->input->post("no_faktur"),
        // ];

        // $this->db->insert("tb_header_trans", $data);

        // Insert Datatable untuk Tabel Detail Transaksi
        $input_list = $this->input->post("data_table");

        $this->load->model("Transaksi");

        $status = $this->Transaksi->insert_update_detail($input_list);

        $this->output->set_content_type("application/json");
        echo json_encode(array("status" => $status));
    }

    public function insert_transaksi_header()
    {

        $data = [
            "no_faktur" => $this->input->post("no_faktur"),
            "tgl_transaksi" => $this->input->post("tgl_transaksi"),
            "kode_customer" => $this->input->post("kode_customer"),
            "keterangan" => $this->input->post("keterangan"),
            "grand_total" => $this->input->post("grand_total"),
            "pajak" => $this->input->post("pajak"),
            "total_biaya" => $this->input->post("total_biaya")
        ];

        $this->db->insert("tb_header_trans", $data);
        $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>
            Register Success</div>");
        redirect("admin");
    }

    public function tampil_data_edit_transaksi($no_faktur = "")
    {
        if ($this->db->get_where("tb_user", ["username" => $this->session->userdata("username")])->row_array()) {


            $data["title"] = "Edit Data Transaksi";
            $data['user'] = $this->db->get_where("tb_user", ["username" => $this->session->userdata("username")])->row_array();

            $data["transaksi_header"] = $this->db->get_where("tb_header_trans", array("no_faktur" => $no_faktur), 1)->row();
            // $data["transaksi_detail"] = $this->db->get_where("tb_detail_trans", array("no_faktur" => $no_faktur), 1)->row();
            $sql = "SELECT * FROM tb_detail_trans where no_faktur = ?";
            $data["transaksi_detail"] = $this->db->query($sql, array($no_faktur))->result();
            $data["dataCustomer_transaksi"] = $this->db->query("SELECT tb_customer.nama_customer, tb_customer.alamat FROM tb_customer JOIN tb_header_trans ON tb_customer.kode_customer = tb_header_trans.kode_customer where tb_header_trans.no_faktur = '$no_faktur'")->row();


            $data["dropdown_cus"] = $this->Model_Customer->get_customer();
            $data["dropdown_obt"] = $this->Model_Obat->get_obat();



            $this->load->view("templates/header", $data);
            $this->load->view("templates/sidebar", $data);
            $this->load->view("templates/topbar", $data);
            $this->load->view("transaksi/edit_transaksi", $data);
        } else {
            redirect("login");
        }
    }

    public function delete_detail_traksaksi($no_urut = "")
    {
        // Pengkodisian Jika Belum ada Data Di Session Atau Kosong Berarti Otomatis Ke Login
        if ($this->db->get_where("tb_user", ["username" => $this->session->userdata("username")])->row_array()) {

            if ($this->db->delete("tb_detail_trans", array("no_urut" => $no_urut))) {


                $subtotal_item = $this->db->query("SELECT subtotal from tb_detail_trans where no_urut = $no_urut");


                $subtotal = $this->db->query("UPDATE tb_detail_trans set subtotal = subtotal - $subtotal_item where no_urut = $no_urut");
                return $subtotal;

                $this->session->set_flashdata("success", "Berhasil Hapus Data Obat");
                echo "<script>window.location.href='" . base_url() . "admin/index_customer" . "';</script>";
            }
        } else {
            redirect("login");
        }
    }

    public function delete_transaksi_detail()
    {
        if ($this->input->is_ajax_request()) {
            $del_id = $this->input->post('del_id');

            $status = $this->Transaksi->delete_entry($del_id);

            $this->output->set_content_type("application/json");
            echo json_encode(array("status" => $status));
        }
    }

    public function update_jumlah_barang()
    {
        $jumlah = $this->input->post("jumlah");
        $kode_obat = $this->input->post("kode_obat");
        $data = $this->Transaksi->update_jumlah($jumlah, $kode_obat);
        echo json_encode($data);
    }
}
