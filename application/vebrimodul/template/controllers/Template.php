<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
#    Simple Code By Pradana Industries By.bri_pebri     |
#=======================================================|
class Template extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        // model
        $this->load->model('M_Template');

        //Cek Apakah Sudah Login?
        if ($this->session->userdata('is_login') == false) {
            redirect('login');
        }
    }


    public function index()
    {
        $data['title'] = 'Template';
        $data['website'] =  $this->M_Setting->set_setting();;
        $this->load->view('index', $data);
    }

    public function AdminTemplate($data)
    {
        $this->load->view('v_admin_template', $data);
    }
}
