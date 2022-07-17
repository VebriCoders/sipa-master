<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
#    Simple Code By Pradana Industries By.bri_pebri     |
#=======================================================|
class Setting extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        // model
        $this->load->model('M_Setting');

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
            'namamodule'     => "setting",
            'namafileview'     => "v_setting",
            'title'      => "Setting | " . $website['nama_website'],
            //variabel
            'website' => $website,
            'tampilData'    => $this->M_Setting->tampilData(),
        );
        echo Modules::run('template/AdminTemplate', $data);
    }

    public function edit_utama()
    {
        $this->M_Setting->edit_utama();
        $this->session->set_flashdata('notifikasi', 'edit_alert_utama();');

        redirect('setting');
    }

    public function edit_email()
    {
        $this->M_Setting->edit_email();
        $this->session->set_flashdata('notifikasi', 'edit_alert_email();');

        redirect('setting');
    }
}
