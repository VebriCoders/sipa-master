<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
#    Simple Code By Pradana Industries By.bri_pebri     |
#=======================================================|
class Data_pendidikan extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        // model
        $this->load->model('M_Data_pendidikan');

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
            'namamodule'     => "data_pendidikan",
            'namafileview'     => "v_data_pendidikan",
            'title'      => "Data Pendidikan | " . $website['nama_website'],
            //variabel
            'website' => $website,
        );
        echo Modules::run('template/AdminTemplate', $data);
    }
}
