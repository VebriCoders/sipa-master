<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
#    Simple Code By Pradana Industries By.bri_pebri     |
#=======================================================|
class Login extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        // model
        $this->load->model('M_Login');

        //Cek Apakah Sudah Login?
        // if ($this->session->userdata('is_login') == false) {
        //     redirect('login');
        // }
    }

    public function index()
    {
        $this->session->set_flashdata('alert', 'logout();');
        $logged = $this->session->userdata('is_login');

        if ($logged != true) {
            $this->form_validation->set_rules('email_username', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run() == false) {
                $website = $this->M_Setting->set_setting();

                $data = array(
                    'namamodule'     => "login",
                    'namafileview'     => "v_login",
                    'title'      => 'Login | ' . $website['nama_website'],
                    //variabel
                    'website' => $website,
                );
                $this->load->view('v_login', $data);
            } else {
                // validasinya success
                $this->_proses();
            }
        } else {
            // print_r($this->session->userdata());
            redirect('dashboard');
        }
    }

    private function _proses()
    {
        //Ambil Data Dari Form (Wajib)
        $email_username = $this->input->post('email_username', TRUE);
        $password = $this->input->post('password', TRUE);

        //Cek Apakah Email Terdaftar
        $user = $this->db->get_where('tbl_admin', ['email_username' => $email_username])->row_array();

        //Proses Login
        if ($user) { //Cek Apakah Email User Terdaftar

            if ($user['active'] == 1) { //Jika User Terdaftar Cek Apakah Akun Aktif

                //Jika Akun Aktif Proses Cek Password
                if (password_verify($password, $user['password'])) { //Cek Password

                    //Ubah Data Online & Last Login
                    $update_data = [
                        'admin_online' => '1', // Admin Online
                        'last_login' => date('Y-m-d H:i:s'), // Waktu Login
                    ];
                    $this->db->where('id_admin', $user['id_admin'])->update('tbl_admin', $update_data);
                    $user_update = $this->db->get_where('tbl_admin', ['email_username' => $email_username])->row_array();

                    //Proses Session
                    $userdata = array(
                        'is_login' => true,
                        'id_admin' => $user_update['id_admin'],
                        'email_username' => $user_update['email_username'],
                        'nama_admin' => $user_update['nama_admin'],
                        'foto_admin' => $user_update['foto_admin'],
                        'role_id' => $user_update['role_id'],
                        'active' => $user_update['active'],
                        'last_login' => $user_update['last_login']
                    );
                    $this->session->set_userdata($userdata);

                    //Redirect Halaman Sesuai Level User
                    if ($user['role_id'] == 1) {
                        $this->session->set_flashdata('notifikasi', 'welcome();');
                        redirect('dashboard');
                    } else if ($user['role_id'] == 2) {
                        $this->session->set_flashdata('notifikasi', 'welcome();');
                        redirect('dashboard');
                    }
                } else {
                    //Jika Password Salah Akan Di Arahkan Ke Halaman Login
                    $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-exclamation-triangle"></i> Password Salah!</h5>
                        Masukkan password yang benar!
                    </div>');

                    redirect('login');
                }
            } else {
                //Jika Email Tidak Aktif Akan Di Arahkan Ke Halaman Login
                $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Email tidak aktif!</h5>
                    silahkan konfirmasi email anda atau hubungi administrator!
                </div>');

                redirect('login');
            }
        } else {
            //Jika Tidak Terdaftar Akan Di Arahakan Ke Halaman Login
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-ban"></i> Gagal!</h5>
                Email yang anda masukkan tidak terdaftar. Masukkan data lagi dengan benar!
            </div>');

            redirect('login');
        }
    }

    public function logout()
    {
        // date_default_timezone_set("Asia/Bangkok");
        $id_admin = $this->session->userdata('id_admin');
        $update_data = [
            'admin_online' => '0', // Admin Offline
            'last_logout' => date('Y-m-d H:i:s'), // Waktu Logout
        ];
        $this->db->where('id_admin', $id_admin)->update('tbl_admin', $update_data);

        $this->session->sess_destroy();

        redirect('login');
    }
}
