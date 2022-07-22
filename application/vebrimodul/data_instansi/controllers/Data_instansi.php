<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
#    Simple Code By Pradana Industries By.bri_pebri     |
#=======================================================|
class Data_instansi extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        // model
        $this->load->model('M_Data_instansi');
        $this->load->model('M_Data_korem');
        $this->load->model('M_Data_kodim');
        $this->load->model('M_Data_koramil');

        //Cek Apakah Sudah Login?
        if ($this->session->userdata('is_login') == false) {
            redirect('login');
        }

        if ($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 2) {
            // redirect('login');
        }

        if ($this->session->userdata('role_id') == 3) {
            redirect('login');
        }
    }

    public function index()
    {
        $website = $this->M_Setting->set_setting();
        $data = array(
            'namamodule'     => "data_instansi",
            'namafileview'     => "v_data_instansi",
            'title'      => "Data Instansi | " . $website['nama_website'],
            //variabel
            'website' => $website,
            'tampilData'    => $this->M_Data_instansi->tampilData(),
        );
        echo Modules::run('template/AdminTemplate', $data);
    }

    public function tambah()
    {
        $this->M_Data_instansi->tambah();
        $this->session->set_flashdata('notifikasi', 'tambah_alert();');

        redirect('data_instansi');
    }

    public function edit()
    {
        $this->M_Data_instansi->edit();
        $this->session->set_flashdata('notifikasi', 'edit_alert();');

        redirect('data_instansi');
    }

    public function hapus()
    {
        $this->M_Data_instansi->hapus();
        $this->session->set_flashdata('notifikasi', 'hapus_alert();');

        redirect('data_instansi');
    }

    // Master Data Korem -----------
    public function korem($id_kodam)
    {
        $website = $this->M_Setting->set_setting();
        $tampilData_kodam = $this->M_Data_instansi->tampilData_kodam($id_kodam);

        $data = array(
            'namamodule'     => "data_instansi",
            'namafileview'     => "v_korem",
            'title'      => "Data Korem | " . $website['nama_website'],
            //variabel
            'website' => $website,
            'kodam' => $tampilData_kodam,
            //Data Korem
            'tampilDataKorem'    => $this->M_Data_korem->tampilDataKorem($id_kodam),
        );
        echo Modules::run('template/AdminTemplate', $data);
    }

    public function tambah_korem()
    {
        $id_kodam = $this->input->post('id_kodam');

        $this->M_Data_korem->tambah_korem();
        $this->session->set_flashdata('notifikasi', 'tambah_alert();');

        redirect('data_instansi/korem/' . $id_kodam);
    }

    public function edit_korem()
    {
        $id_kodam = $this->input->post('id_kodam');

        $this->M_Data_korem->edit_korem();
        $this->session->set_flashdata('notifikasi', 'edit_alert();');

        redirect('data_instansi/korem/' . $id_kodam);
    }

    public function hapus_korem()
    {
        $id_kodam = $this->input->post('id_kodam');

        $this->M_Data_korem->hapus_korem();
        $this->session->set_flashdata('notifikasi', 'hapus_alert();');

        redirect('data_instansi/korem/' . $id_kodam);
    }

    // Master Data Kodim -----------
    public function kodim($id_kodam)
    {
        $website = $this->M_Setting->set_setting();
        $tampilData_kodam = $this->M_Data_instansi->tampilData_kodam($id_kodam);

        $data = array(
            'namamodule'     => "data_instansi",
            'namafileview'     => "v_kodim",
            'title'      => "Data Kodim | " . $website['nama_website'],
            //variabel
            'website' => $website,
            'kodam' => $tampilData_kodam,
            'joinKorem' => $this->M_Data_kodim->joinKorem($id_kodam),
            //Data Kodim
            'tampilDataKodim'    => $this->M_Data_kodim->tampilDataKodim($id_kodam),
        );
        echo Modules::run('template/AdminTemplate', $data);
    }

    public function tambah_kodim()
    {
        $id_kodam = $this->input->post('id_kodam');

        $this->M_Data_kodim->tambah_kodim();
        $this->session->set_flashdata('notifikasi', 'tambah_alert();');

        redirect('data_instansi/kodim/' . $id_kodam);
    }

    public function edit_kodim()
    {
        $id_kodam = $this->input->post('id_kodam');

        $this->M_Data_kodim->edit_kodim();
        $this->session->set_flashdata('notifikasi', 'edit_alert();');

        redirect('data_instansi/kodim/' . $id_kodam);
    }

    public function hapus_kodim()
    {
        $id_kodam = $this->input->post('id_kodam');

        $this->M_Data_kodim->hapus_kodim();
        $this->session->set_flashdata('notifikasi', 'hapus_alert();');

        redirect('data_instansi/kodim/' . $id_kodam);
    }

    // Master Data Koramil -----------
    public function koramil($id_kodam)
    {
        $website = $this->M_Setting->set_setting();
        $tampilData_kodam = $this->M_Data_instansi->tampilData_kodam($id_kodam);

        $data = array(
            'namamodule'     => "data_instansi",
            'namafileview'     => "v_koramil",
            'title'      => "Data Koramil | " . $website['nama_website'],
            //variabel
            'website' => $website,
            'kodam' => $tampilData_kodam,
            'joinKorem' => $this->M_Data_koramil->joinKorem($id_kodam),
            'joinKodim' => $this->M_Data_koramil->joinKodim($id_kodam),
            //Data Koramil
            'tampilDataKoramil'    => $this->M_Data_koramil->tampilDataKoramil($id_kodam),
        );
        echo Modules::run('template/AdminTemplate', $data);
    }

    function get_kodim()
    {
        $id = $this->input->post('id');
        $data = $this->M_Data_koramil->get_kodim($id);
        echo json_encode($data);
    }

    public function tambah_koramil()
    {
        $id_kodam = $this->input->post('id_kodam');

        $this->M_Data_koramil->tambah_koramil();
        $this->session->set_flashdata('notifikasi', 'tambah_alert();');

        redirect('data_instansi/koramil/' . $id_kodam);
    }

    public function edit_koramil()
    {
        $id_kodam = $this->input->post('id_kodam');

        $this->M_Data_koramil->edit_koramil();
        $this->session->set_flashdata('notifikasi', 'edit_alert();');

        redirect('data_instansi/koramil/' . $id_kodam);
    }

    public function hapus_koramil()
    {
        $id_kodam = $this->input->post('id_kodam');

        $this->M_Data_koramil->hapus_koramil();
        $this->session->set_flashdata('notifikasi', 'hapus_alert();');

        redirect('data_instansi/koramil/' . $id_kodam);
    }
}
