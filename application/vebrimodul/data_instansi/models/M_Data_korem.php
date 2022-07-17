<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
#    Simple Code By Pradana Industries By.bri_pebri     |
#=======================================================|
class M_Data_korem extends CI_Model
{
    private $_table_kodam = "tbl_data_instansi_kodam";
    private $_table = "tbl_data_instansi_korem";

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    function tampilDataKorem($id_kodam)
    {
        $this->db->select('tbl_data_instansi_korem.*,')
            ->from('tbl_data_instansi_korem')
            ->where('id_kodam', $id_kodam)
            ->order_by('tbl_data_instansi_korem.id', 'DESC'); //ASC
        return $this->db->get();
    }

    function tambah_korem()
    {
        $data = [
            'id_kodam' => $this->input->post('id_kodam'),
            'nama_korem' => $this->input->post('nama_korem'),
            'wilayah' => $this->input->post('wilayah'),
            'foto' => $this->_uploadImage(),
            'created_on' => date('Y-m-d H:i:s'),
        ];

        $awal_jml_korem = $this->input->post('jml_korem');
        $plus = [
            'jml_korem' => $awal_jml_korem + 1,
        ];

        $this->db->insert($this->_table, $data);
        $this->db->where('id', $this->input->post('id_kodam'))->update($this->_table_kodam, $plus);
    }

    function edit_korem()
    {
        if (!empty($_FILES["images"]["name"])) {

            $nm_images_lama = $this->input->post('nm_images_lama');
            $this->_deleteImagesLama($nm_images_lama);

            $data = [
                'id_kodam' => $this->input->post('id_kodam'),
                'nama_korem' => $this->input->post('nama_korem'),
                'wilayah' => $this->input->post('wilayah'),
                'foto' => $this->_uploadImage(),
                'update_at' => date('Y-m-d H:i:s'),
            ];
        } else {
            $data = [
                'id_kodam' => $this->input->post('id_kodam'),
                'nama_korem' => $this->input->post('nama_korem'),
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
            return array_map('unlink', glob(FCPATH . "assets/upload/data_instansi/korem/$filename.*"));
        }
    }

    function hapus_korem()
    {
        $this->_deleteImage($this->input->post('query_id'));
        $this->db->where('id', $this->input->post('query_id'))->delete($this->_table);

        $awal_jml_korem = $this->input->post('jml_korem');
        $plus = [
            'jml_korem' => $awal_jml_korem - 1,
        ];
        $this->db->where('id', $this->input->post('id_kodam'))->update($this->_table_kodam, $plus);
    }

    private function _deleteImage($id)
    {
        $data_foto = $this->getById($id);
        if ($data_foto->foto != "default.jpg") {
            $filename = explode(".", $data_foto->foto)[0];
            return array_map('unlink', glob(FCPATH . "assets/upload/data_instansi/korem/$filename.*"));
        }
    }

    private function _uploadImage()
    {
        $config['upload_path']          = 'assets/upload/data_instansi/korem';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = "PHOTO_KOREM-" . time();
        $config['overwrite']            = true;
        $config['max_size']             = 5120; // 5MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('images')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }
}
