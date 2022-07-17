<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
#    Simple Code By Pradana Industries By.bri_pebri     |
#=======================================================|
class Dashboard extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        // model
        $this->load->model('M_Dashboard');

        //Cek Apakah Sudah Login?
        if ($this->session->userdata('is_login') == false) {
            redirect('login');
        }
    }

    public function index()
    {
        $website = $this->M_Setting->set_setting();
        $data = array(
            'namamodule'     => "dashboard",
            'namafileview'     => "v_dashboard",
            'title'      => "Dashboard | " . $website['nama_website'],
            //variabel
            'website' => $website,
            'jmlKodam'    => $this->M_Dashboard->jmlKodam(),
            'jmlKorem'    => $this->M_Dashboard->jmlKorem(),
            'jmlKodim'    => $this->M_Dashboard->jmlKodim(),
            'jmlKoramil'    => $this->M_Dashboard->jmlKoramil(),
        );
        echo Modules::run('template/AdminTemplate', $data);
    }
}
