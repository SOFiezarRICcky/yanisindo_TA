<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library("form_validation");

        $this->load->model("Login_model");

        $this->load->library("session");
    }

    public function index()
    {
        // Validation
        $this->form_validation->set_rules("username", "Username", "trim|required");
        $this->form_validation->set_rules("password", "Password", "trim|required");
        // Validation

        if ($this->form_validation->run() == false) {
            $data["title"] = "Login Page";
            $this->load->view("templates/auth_header", $data);
            $this->load->view('auth/login_cara2');
            $this->load->view("templates/auth_footer");
        } else {
            $this->proses_login();
        }
    }

    private function proses_login()
    {
        $username = $this->input->post("username");

        // $password = md5($this->input->post("password"));
        // diatas di pakai jika di database passwordnya sudah MD5
        $password = $this->input->post("password");


        $cekuserdaftar = $this->Login_model->cekuserdaftar($username);
        if ($cekuserdaftar) {

            $ceklogin = $this->Login_model->ceklogin($username, $password);

            if ($ceklogin) {

                foreach ($ceklogin as $data)

                    if ($data->status == "Aktif") {

                        $this->session->set_userdata("username", $data->username);
                        $this->session->set_userdata("name", $data->name);
                        $this->session->set_userdata("level", $data->level);
                        $this->session->set_userdata("email", $data->email);
                        $this->session->set_userdata("login", true);

                        if ($this->session->userdata("level") == "Admin") {
                            redirect("Admin", "refresh");
                        } elseif ($this->session->userdata("level") == "User") {
                            redirect("User", "refresh");
                        } else {
                            $this->session->sess_destroy();
                            echo "<script>alert('Anda Tidak Memilki Akses Masuk !');document.location='index'</script>";
                        }
                    } else {
                        echo "<script>alert('Akun Anda Belum Diverivikasi');</script>";
                        redirect("Login", "refresh");
                    }
            } else {
                echo "<script>alert('Username dan Password Salah');</script>";
                redirect("Login", "refresh");
            }
        } else {
            echo "<script>alert('Akun Anda Belum Terdaftar');</script>";
            redirect("Login", "refresh");
        }
    }


    public function logout()
    {
        $this->session->unset_userdata("username");
        $this->session->unset_userdata("nama");
        $this->session->unset_userdata("level");
        $this->session->unset_userdata("email");
        $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>
        Logout Success</div>");
        redirect("login");
    }
}
