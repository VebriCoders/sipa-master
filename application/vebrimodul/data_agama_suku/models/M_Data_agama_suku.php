<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
#    Simple Code By Pradana Industries By.bri_pebri     |
#=======================================================|
class M_Data_agama_suku extends CI_Model
{
    // Master Data Agama

    private $_table_agama = "tbl_data_agama";

    function tampilData_Agama()
    {
        $this->db->select('tbl_data_agama.*,')
            ->from('tbl_data_agama')
            ->order_by('tbl_data_agama.id_agama', 'ASC'); //DESC
        return $this->db->get();
    }

    function tambah_agama()
    {
        $data = [
            'nama_agama' => $this->input->post('nama_agama'),
            'created_on' => date('Y-m-d H:i:s'),
        ];

        $this->db->insert($this->_table_agama, $data);
    }

    function edit_agama()
    {
        $data = [
            'nama_agama' => $this->input->post('nama_agama'),
            'update_at' => date('Y-m-d H:i:s'),
        ];
        $this->db->where('id_agama', $this->input->post('query_id'))->update($this->_table_agama, $data);
    }

    function hapus_agama()
    {
        $this->db->where('id_agama', $this->input->post('query_id'))->delete($this->_table_agama);
    }

    // End Master Data Agama

    //---------------BATAS-------------------//

    // Master Data Suku

    private $_table_suku = "tbl_data_suku";

    function tampilData_Suku()
    {
        $this->db->select('tbl_data_suku.*,')
            ->from('tbl_data_suku')
            ->order_by('tbl_data_suku.id_suku', 'ASC'); //DESC
        return $this->db->get();
    }

    function tambah_suku()
    {
        $data = [
            'nama_suku' => $this->input->post('nama_suku'),
            'created_on' => date('Y-m-d H:i:s'),
        ];

        $this->db->insert($this->_table_suku, $data);
    }

    function edit_suku()
    {
        $data = [
            'nama_suku' => $this->input->post('nama_suku'),
            'update_at' => date('Y-m-d H:i:s'),
        ];
        $this->db->where('id_suku', $this->input->post('query_id'))->update($this->_table_suku, $data);
    }

    function hapus_suku()
    {
        $this->db->where('id_suku', $this->input->post('query_id'))->delete($this->_table_suku);
    }

    // End Master Data Suku
}
