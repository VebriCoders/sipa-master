<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
#    Simple Code By Pradana Industries By.bri_pebri     |
#=======================================================|
class Profile extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        // model
        $this->load->model('M_Profile');

        //Cek Apakah Sudah Login?
        if ($this->session->userdata('is_login') == false) {
            redirect('login');
        }
    }

    public function index()
    {
        $website = $this->M_Setting->set_setting();
        $data = array(
            'namamodule'     => "profile",
            'namafileview'     => "v_profile",
            'title'      => "Profile | " . $website['nama_website'],
            //variabel
            'website' => $website,
            'tampilData'    => $this->M_Profile->tampilData(),
        );
        echo Modules::run('template/AdminTemplate', $data);
    }

    public function edit()
    {
        $this->M_Profile->edit();

        $this->session->set_flashdata('notifikasi', 'edit_alert();');
        $simbol = "'";
        $url = $simbol . base_url('login/logout') . $simbol;
        $this->session->set_flashdata('logout-alert', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                <h4 class="alert-heading">Berhasil!</h4>
                <p>Data Anda Telah Di Update!. Silahkan Login Kembali, Untuk Memperbaruhi Session Anda!</p>
                <hr>
                <p class="mb-0">Anda Bisa Klik Tombol Logout Di Samping. <button type="button" class="btn btn-dark" onclick="window.location.href=' . $url . '"><i class="fa fa-sign-out"></i> Logout</button></p>
            </div>');

        redirect('profile');
    }

    public function password()
    {
        $pswd1 = $this->input->post('password1');
        $pswd2 = $this->input->post('password2');

        if ($pswd1 == $pswd2) {
            $this->M_Profile->password();

            $this->session->set_flashdata('notifikasi', 'password_alert();');
            $simbol = "'";
            $url = $simbol . base_url('login/logout') . $simbol;
            $this->session->set_flashdata('logout-alert', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                <h4 class="alert-heading">Berhasil!</h4>
                <p>Data Anda Telah Di Update!. Silahkan Login Kembali, Untuk Memperbaruhi Session Anda!</p>
                <hr>
                <p class="mb-0">Anda Bisa Klik Tombol Logout Di Samping. <button type="button" class="btn btn-dark" onclick="window.location.href=' . $url . '"><i class="fa fa-sign-out"></i> Logout</button></p>
            </div>');

            redirect('profile');
        } else {
            $this->session->set_flashdata('notifikasi', 'password_alert_failed();');
            $this->session->set_flashdata('alert-pswd-error', '<div class="alert alert-danger">
                <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
                <strong>Gagal Merubah Password!</strong> Masukkan Password Dan Konfirmasi Password Dengan Benar!.
            </div>');
            redirect('profile');
        }
    }
}
