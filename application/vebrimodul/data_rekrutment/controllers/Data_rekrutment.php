<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
#    Simple Code By Pradana Industries By.bri_pebri     |
#=======================================================|
class Data_rekrutment extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        // model
        $this->load->model('M_Data_rekrutment');

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
            'namamodule'     => "data_rekrutment",
            'namafileview'     => "v_data_rekrutment",
            'title'      => "Data Rekrutment | " . $website['nama_website'],
            //variabel
            'website' => $website,
            'tampilData'    => $this->M_Data_rekrutment->tampilData(),
        );
        echo Modules::run('template/AdminTemplate', $data);
    }

    public function tambah()
    {
        $this->M_Data_rekrutment->tambah();
        $this->session->set_flashdata('notifikasi', 'tambah_alert();');

        redirect('data_rekrutment');
    }

    public function edit()
    {
        $this->M_Data_rekrutment->edit();
        $this->session->set_flashdata('notifikasi', 'edit_alert();');

        redirect('data_rekrutment');
    }

    public function hapus()
    {
        $this->M_Data_rekrutment->hapus();
        $this->session->set_flashdata('notifikasi', 'hapus_alert();');

        redirect('data_rekrutment');
    }

    public function pengumuman()
    {
        $this->M_Data_rekrutment->pengumuman();
        $this->session->set_flashdata('notifikasi', 'pengumuman_alert();');

        redirect('data_rekrutment');
    }

    public function persyaratan()
    {
        $this->M_Data_rekrutment->persyaratan();
        $this->session->set_flashdata('notifikasi', 'persyaratan_alert();');

        redirect('data_rekrutment');
    }

    public function lokasi()
    {
        $this->M_Data_rekrutment->lokasi();
        $this->session->set_flashdata('notifikasi', 'lokasi_alert();');

        redirect('data_rekrutment');
    }

    public function jadwal()
    {
        $this->M_Data_rekrutment->jadwal();
        $this->session->set_flashdata('notifikasi', 'jadwal_alert();');

        redirect('data_rekrutment');
    }

    public function materi()
    {
        $this->M_Data_rekrutment->materi();
        $this->session->set_flashdata('notifikasi', 'materi_alert();');

        redirect('data_rekrutment');
    }

    public function panduan()
    {
        $this->M_Data_rekrutment->panduan();
        $this->session->set_flashdata('notifikasi', 'panduan_alert();');

        redirect('data_rekrutment');
    }

	public function submit()
	{
		$this->M_Data_rekrutment->submit();
	}
}
