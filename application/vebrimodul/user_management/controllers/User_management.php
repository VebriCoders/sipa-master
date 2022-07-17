<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
#    Simple Code By Pradana Industries By.bri_pebri     |
#=======================================================|
class User_management extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        // model
        $this->load->model('M_User_management');

        //Cek Apakah Sudah Login?
        if ($this->session->userdata('is_login') == false) {
            redirect('login');
        }

        if ($this->session->userdata('role_id') != 1) {
            redirect('login');
        }
    }

    public function index()
    {
        $website = $this->M_Setting->set_setting();
        $data = array(
            'namamodule'     => "user_management",
            'namafileview'     => "v_user_management",
            'title'      => "User Management | " . $website['nama_website'],
            //variabel
            'website' => $website,
            'tampilData'    => $this->M_User_management->tampilData(),
        );
        echo Modules::run('template/AdminTemplate', $data);
    }

    public function tambah()
    {
        $this->M_User_management->tambah();
        $this->session->set_flashdata('notifikasi', 'tambah_alert();');

        redirect('user_management');
    }

    public function edit()
    {
        $this->M_User_management->edit();
        $this->session->set_flashdata('notifikasi', 'edit_alert();');

        redirect('user_management');
    }

    public function hapus()
    {
        $this->M_User_management->hapus();
        $this->session->set_flashdata('notifikasi', 'hapus_alert();');

        redirect('user_management');
    }

    public function password()
    {
        $pswd1 = $this->input->post('password1');
        $pswd2 = $this->input->post('password2');

        if ($pswd1 == $pswd2) {
            $this->M_User_management->password();
            $this->session->set_flashdata('notifikasi', 'password_alert();');
        } else {
            $this->session->set_flashdata('notifikasi', 'password_alert_failed();');
        }

        redirect('user_management');
    }
}
