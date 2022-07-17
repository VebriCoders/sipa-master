<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
#    Simple Code By Pradana Industries By.bri_pebri     |
#=======================================================|
class Data_wilayah extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        // model
        $this->load->model('M_Data_wilayah');

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
            'namamodule'     => "data_wilayah",
            'namafileview'     => "v_data_wilayah",
            'title'      => "Data Wilayah | " . $website['nama_website'],
            //variabel
            'website' => $website,
            'tampilData'    => $this->M_Data_wilayah->tampilData(),
        );
        echo Modules::run('template/AdminTemplate', $data);
    }

    public function tambah()
    {
        $this->M_Data_wilayah->tambah();
        $this->session->set_flashdata('notifikasi', 'tambah_alert();');

        redirect('data_wilayah');
    }

    public function edit()
    {
        $this->M_Data_wilayah->edit();
        $this->session->set_flashdata('notifikasi', 'edit_alert();');

        redirect('data_wilayah');
    }

    public function hapus()
    {
        $this->M_Data_wilayah->hapus();
        $this->session->set_flashdata('notifikasi', 'hapus_alert();');

        redirect('data_wilayah');
    }
}
