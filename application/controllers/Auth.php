<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library("form_validation");
    }

    public function index()
    {
        // Validation
        $this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
        $this->form_validation->set_rules("password", "Password", "trim|required");
        // Validation

        if ($this->form_validation->run() == false) {
            $data["title"] = "Login Page";
            $this->load->view("templates/auth_header", $data);
            $this->load->view('auth/login');
            $this->load->view("templates/auth_footer");
        } else {
            // Validation Berhasil
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post("email");
        $password = $this->input->post("password");

        $user = $this->db->get_where("user", ["email" => $email])->row_array();
        // Jika User Ada
        if ($user) {
            // Jika User Active
            if ($user["is_active"] == 1) {
                // Cek Password
                if (password_verify($password, $user["password"])) {
                    $data = [
                        "email" => $user["email"],
                        "role_id" => $user["role_id"]
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect("admin");
                    } else {
                        redirect("user");
                    }
                    redirect("user");
                } else {
                    $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>
                    Password Salah</div>");
                    redirect("auth");
                }
            } else {
                $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>
                Email Belum Tergistrasi</div>");
                redirect("auth");
            }
        } else {
            $this->session->set_flashdata("message", "<div class='alert alert-danger' role='alert'>
            Email Tidak Tersedia!</div>");
            redirect("auth");
        }
    }


    public function registration()
    {

        // Validation
        $this->form_validation->set_rules("name", "Name", "required|trim"); //trim berfungsi untuk karakter spasi tidak masuk ke database
        $this->form_validation->set_rules("email", "Email", "required|trim|valid_email|is_unique[user.email]", [
            "is_unique" => "Email Sudah Pernah Di Input"
        ]);
        $this->form_validation->set_rules("password1", "Password", "required|trim|min_length[3]|matches[password2]", [
            "matches" => "Password dont match!",
            "min_length" => "Password Too Short"
        ]);
        $this->form_validation->set_rules("password2", "Password", "required|trim|min_length[3]|matches[password1]");
        // Validation


        // Kondisi Jika Gagal
        if ($this->form_validation->run() == false) {
            $data["title"] = "User Registration";
            $this->load->view("templates/auth_header", $data);
            $this->load->view('auth/registration');
            $this->load->view("templates/auth_footer");
        }
        // Kondisi Jika Berhasil 
        else {
            $data = [
                "name" => htmlspecialchars($this->input->POST("name", true)),
                "email" => htmlspecialchars($this->input->POST("email", true)),
                "image" => "defualt.jpg",
                "password" => password_hash($this->input->post("password1"), PASSWORD_DEFAULT),
                "role_id" => 2,
                "is_active" => 1,
                "date_created" => time()
            ];

            $this->db->insert("user", $data);
            $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>
            Register Success</div>");
            redirect("auth");
        }
    }

    public function logout()
    {
        $this->session->unset_userdata("email");
        $this->session->unset_userdata("role_id");
        $this->session->set_flashdata("message", "<div class='alert alert-success' role='alert'>
        Logout Success</div>");
        redirect("auth");
    }
}
