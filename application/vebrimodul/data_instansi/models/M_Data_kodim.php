<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
#    Simple Code By Pradana Industries By.bri_pebri     |
#=======================================================|
class M_Data_kodim extends CI_Model
{
    private $_table_kodam = "tbl_data_instansi_kodam";
    private $_table = "tbl_data_instansi_kodim";

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    function tampilDataKodim($id_kodam)
    {
        $this->db->select('tbl_data_instansi_kodim.*, tbl_data_instansi_korem.nama_korem as nmkorem')
            ->from('tbl_data_instansi_kodim')
            ->where('tbl_data_instansi_kodim.id_kodam', $id_kodam)
            ->join('tbl_data_instansi_korem', 'tbl_data_instansi_kodim.id_korem = tbl_data_instansi_korem.id')
            ->order_by('tbl_data_instansi_kodim.id', 'DESC'); //ASC
        return $this->db->get();
    }

    function joinKorem($id_kodam)
    {
        $this->db->select('*')
            ->from('tbl_data_instansi_korem')
            ->where('id_kodam', $id_kodam);
        $query = $this->db->get();
        return $query;
    }

    function tambah_kodim()
    {
        $data = [
            'id_kodam' => $this->input->post('id_kodam'),
            'id_korem' => $this->input->post('id_korem'),
            'nama_kodim' => $this->input->post('nama_kodim'),
            'wilayah' => $this->input->post('wilayah'),
            'foto' => $this->_uploadImage(),
            'created_on' => date('Y-m-d H:i:s'),
        ];

        $awal_jml_kodim = $this->input->post('jml_kodim');
        $plus = [
            'jml_kodim' => $awal_jml_kodim + 1,
        ];

        $this->db->insert($this->_table, $data);
        $this->db->where('id', $this->input->post('id_kodam'))->update($this->_table_kodam, $plus);
    }

    function edit_kodim()
    {
        if (!empty($_FILES["images"]["name"])) {

            $nm_images_lama = $this->input->post('nm_images_lama');
            $this->_deleteImagesLama($nm_images_lama);

            $data = [
                'id_kodam' => $this->input->post('id_kodam'),
                'id_korem' => $this->input->post('id_korem'),
                'nama_kodim' => $this->input->post('nama_kodim'),
                'wilayah' => $this->input->post('wilayah'),
                'foto' => $this->_uploadImage(),
                'update_at' => date('Y-m-d H:i:s'),
            ];
        } else {
            $data = [
                'id_kodam' => $this->input->post('id_kodam'),
                'id_korem' => $this->input->post('id_korem'),
                'nama_kodim' => $this->input->post('nama_kodim'),
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
            return array_map('unlink', glob(FCPATH . "assets/upload/data_instansi/kodim/$filename.*"));
        }
    }

    function hapus_kodim()
    {
        $this->_deleteImage($this->input->post('query_id'));
        $this->db->where('id', $this->input->post('query_id'))->delete($this->_table);

        $awal_jml_kodim = $this->input->post('jml_kodim');
        $plus = [
            'jml_kodim' => $awal_jml_kodim - 1,
        ];
        $this->db->where('id', $this->input->post('id_kodam'))->update($this->_table_kodam, $plus);
    }

    private function _deleteImage($id)
    {
        $data_foto = $this->getById($id);
        if ($data_foto->foto != "default.jpg") {
            $filename = explode(".", $data_foto->foto)[0];
            return array_map('unlink', glob(FCPATH . "assets/upload/data_instansi/kodim/$filename.*"));
        }
    }

    private function _uploadImage()
    {
        $config['upload_path']          = 'assets/upload/data_instansi/kodim';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = "PHOTO_KODIM-" . time();
        $config['overwrite']            = true;
        $config['max_size']             = 5120; // 5MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('images')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }
}
