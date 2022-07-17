<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
#    Simple Code By Pradana Industries By.bri_pebri     |
#=======================================================|
class M_Data_instansi extends CI_Model
{
    private $_table = "tbl_data_instansi_kodam";

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    function tampilData()
    {
        $this->db->select('tbl_data_instansi_kodam.*,')
            ->from('tbl_data_instansi_kodam')
            ->order_by('tbl_data_instansi_kodam.id', 'DESC'); //ASC
        return $this->db->get();
    }

    function tambah()
    {
        $data = [
            'nama_kodam' => $this->input->post('nama_kodam'),
            'wilayah' => $this->input->post('wilayah'),
            'foto' => $this->_uploadImage(),
            'created_on' => date('Y-m-d H:i:s'),
        ];

        $this->db->insert($this->_table, $data);
    }

    function edit()
    {
        if (!empty($_FILES["images"]["name"])) {

            $nm_images_lama = $this->input->post('nm_images_lama');
            $this->_deleteImagesLama($nm_images_lama);

            $data = [
                'nama_kodam' => $this->input->post('nama_kodam'),
                'wilayah' => $this->input->post('wilayah'),
                'foto' => $this->_uploadImage(),
                'update_at' => date('Y-m-d H:i:s'),
            ];
        } else {
            $data = [
                'nama_kodam' => $this->input->post('nama_kodam'),
                'wilayah' => $this->input->post('wilayah'),
                'update_at' => date('Y-m-d H:i:s'),
            ];
        }
        $this->db->where('id', $this->input->post('query_id'))->update($this->_table, $data);
    }

    private function _deleteImagesLama($nm_images_lama)
    {
        if ($nm_images_lama != "default.jpg") {
            $filename = explode(".", $nm_images_lama)[0];
            return array_map('unlink', glob(FCPATH . "assets/upload/data_instansi/$filename.*"));
        }
    }

    function hapus()
    {
        $this->_deleteImage($this->input->post('query_id'));
        $this->db->where('id', $this->input->post('query_id'))->delete($this->_table);
    }

    private function _deleteImage($id)
    {
        $data_foto = $this->getById($id);
        if ($data_foto->foto != "default.jpg") {
            $filename = explode(".", $data_foto->foto)[0];
            return array_map('unlink', glob(FCPATH . "assets/upload/data_instansi/$filename.*"));
        }
    }

    private function _uploadImage()
    {
        $config['upload_path']          = 'assets/upload/data_instansi';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = "PHOTO_KODAM-" . time();
        $config['overwrite']            = true;
        $config['max_size']             = 5120; // 5MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('images')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    //Untuk Modul Korem, Kodim, Koramil
    public function tampilData_kodam($id_kodam)
    {
        $this->db->select('*');
        $this->db->from('tbl_data_instansi_kodam');
        $this->db->where('id', $id_kodam);
        $query = $this->db->get();
        return $query->row_array();
    }
}
