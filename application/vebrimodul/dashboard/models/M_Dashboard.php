<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
#    Simple Code By Pradana Industries By.bri_pebri     |
#=======================================================|
class M_Dashboard extends CI_Model
{
    public function jmlKodam()
    {
        $query = $this->db->get('tbl_data_instansi_kodam');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function jmlKorem()
    {
        $query = $this->db->get('tbl_data_instansi_korem');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function jmlKodim()
    {
        $query = $this->db->get('tbl_data_instansi_kodim');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function jmlKoramil()
    {
        $query = $this->db->get('tbl_data_instansi_koramil');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
