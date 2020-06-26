<?php


class Login extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('login')) {
            redirect('');
        }
        $this->load->view('login');
    }
    public function doLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('pengguna', ['username' => $username])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session = [
                    'id_jabatan' => $user['id_jabatan'],
                    'username' => $user['username'],
                    'id_user' => $user['id_pengguna'],
                    'login' => TRUE
                ];
                $this->session->set_userdata($session);
                redirect('');
            } else {
                echo "<script>alert('Login Gagal, Username/Password Salah')</script>";
                redirect('login', 'refresh');
            }
        } else {
            echo "<script>alert('Login Gagal, Username/Password Salah')</script>";
            redirect('login', 'refresh');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }
}
