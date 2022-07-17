<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
#    Simple Code By Pradana Industries By.bri_pebri     |
#=======================================================|
class Data_agama_suku extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        // model
        $this->load->model('M_Data_agama_suku');

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
            'namamodule'     => "data_agama_suku",
            'namafileview'     => "v_data_agama_suku",
            'title'      => "Data Agama & Suku | " . $website['nama_website'],
            //variabel
            'website' => $website,
            'tampilData_Agama'    => $this->M_Data_agama_suku->tampilData_Agama(),
            'tampilData_Suku'    => $this->M_Data_agama_suku->tampilData_Suku(),
        );
        echo Modules::run('template/AdminTemplate', $data);
    }

    public function tambah_agama()
    {
        $this->M_Data_agama_suku->tambah_agama();
        $this->session->set_flashdata('notifikasi', 'tambah_agama_alert();');

        redirect('data_agama_suku');
    }

    public function edit_agama()
    {
        $this->M_Data_agama_suku->edit_agama();
        $this->session->set_flashdata('notifikasi', 'edit_agama_alert();');

        redirect('data_agama_suku');
    }

    public function hapus_agama()
    {
        $this->M_Data_agama_suku->hapus_agama();
        $this->session->set_flashdata('notifikasi', 'hapus_agama_alert();');

        redirect('data_agama_suku');
    }

    //---------------BATAS-------------------//

    public function tambah_suku()
    {
        $this->M_Data_agama_suku->tambah_suku();
        $this->session->set_flashdata('notifikasi', 'tambah_suku_alert();');

        redirect('data_agama_suku');
    }

    public function edit_suku()
    {
        $this->M_Data_agama_suku->edit_suku();
        $this->session->set_flashdata('notifikasi', 'edit_suku_alert();');

        redirect('data_agama_suku');
    }

    public function hapus_suku()
    {
        $this->M_Data_agama_suku->hapus_suku();
        $this->session->set_flashdata('notifikasi', 'hapus_suku_alert();');

        redirect('data_agama_suku');
    }
}
