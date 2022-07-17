<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
#    Simple Code By Pradana Industries By.bri_pebri     |
#=======================================================|
class M_Profile extends CI_Model
{
    private $_table = "tbl_admin";

    function tampilData()
    {
        $this->db->select('tbl_admin.*,')
            ->from('tbl_admin')
            ->where('tbl_admin.id_admin', $this->session->userdata('id_admin'))
            ->order_by('tbl_admin.id_admin', 'ASC'); //DESC
        return $this->db->get();
    }

    function edit()
    {
        if (!empty($_FILES["images"]["name"])) {

            $nm_images_lama = $this->input->post('nm_images_lama');
            $this->_deleteImagesLama($nm_images_lama);

            $data = [
                'nama_admin' => $this->input->post('nama_admin'),
                'foto_admin' => $this->_uploadImage(),
                'update_at' => date('Y-m-d H:i:s'),
            ];
        } else {
            $data = [
                'nama_admin' => $this->input->post('nama_admin'),
                'update_at' => date('Y-m-d H:i:s'),
            ];
        }
        $this->db->where('id_admin', $this->input->post('query_id'))->update($this->_table, $data);
    }

    private function _deleteImagesLama($nm_images_lama)
    {
        if ($nm_images_lama != "user.jpg") {
            $filename = explode(".", $nm_images_lama)[0];
            return array_map('unlink', glob(FCPATH . "assets/upload/foto_admin/$filename.*"));
        }
    }

    private function _uploadImage()
    {
        $config['upload_path']          = 'assets/upload/foto_admin';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = "PHOTO_ADMIN-" . time();
        $config['overwrite']            = true;
        $config['max_size']             = 5120; // 5MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('images')) {
            return $this->upload->data("file_name");
        }

        return "user.jpg";
    }

    function password()
    {
        $data = [
            'password' => password_hash($this->input->post('password2'), PASSWORD_DEFAULT),
            'update_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->where('id_admin', $this->input->post('query_id'))->update($this->_table, $data);
    }
}
