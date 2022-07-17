<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
#    Simple Code By Pradana Industries By.bri_pebri     |
#=======================================================|
class M_Setting extends CI_Model
{
    private $_table = "tbl_setting";

    //Menampilkan Data Setting Pada Templating Setiap Halaman
    public function set_setting()
    {
        $this->db->select('*');
        $this->db->from('tbl_setting');
        $query = $this->db->get();
        return $query->row_array();
    }

    function tampilData()
    {
        $this->db->select('tbl_setting.*,')
            ->from('tbl_setting')
            ->order_by('tbl_setting.id', 'ASC'); //DESC
        return $this->db->get();
    }

    function edit_utama()
    {
        if (!empty($_FILES["logo"]["name"])) {

            $nm_logo_lama = $this->input->post('logo_lama');
            $this->_deleteLogoLama($nm_logo_lama);

            $data = [
                'nama_website' => $this->input->post('nama_website'),
                'deskripsi' => $this->input->post('deskripsi'),
                'email_verifikasi' => $this->input->post('email_verifikasi'),
                'phone' => $this->input->post('phone'),
                'logo' => $this->_uploadLogo(),
                'update_at' => date('Y-m-d H:i:s'),
            ];
        } else {
            $data = [
                'nama_website' => $this->input->post('nama_website'),
                'deskripsi' => $this->input->post('deskripsi'),
                'email_verifikasi' => $this->input->post('email_verifikasi'),
                'phone' => $this->input->post('phone'),
                'update_at' => date('Y-m-d H:i:s'),
            ];
        }
        $this->db->where('id', $this->input->post('query_id'))->update($this->_table, $data);
    }

    private function _deleteLogoLama($nm_logo_lama)
    {
        if ($nm_logo_lama != "default.jpg") {
            $filename = explode(".", $nm_logo_lama)[0];
            return array_map('unlink', glob(FCPATH . "assets/img/$filename.*"));
        }
    }

    private function _uploadLogo()
    {
        $config['upload_path']          = 'assets/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = "PHOTO_WEBSITE-" . time();
        $config['overwrite']            = true;
        $config['max_size']             = 5120; // 5MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('logo')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    function edit_email()
    {
        $data = [
            'email' => $this->input->post('email'),
            'email_pswd' => $this->input->post('email_pswd'),
            'email_protocol' => $this->input->post('email_protocol'),
            'email_host' => $this->input->post('email_host'),
            'email_port' => $this->input->post('email_port'),
            'email_type' => $this->input->post('email_type'),
            'email_charset' => $this->input->post('email_charset'),
            'update_at' => date('Y-m-d H:i:s'),
        ];
        $this->db->where('id', $this->input->post('query_id'))->update($this->_table, $data);
    }
}
