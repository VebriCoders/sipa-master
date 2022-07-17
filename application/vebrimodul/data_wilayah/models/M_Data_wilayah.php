<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
#    Simple Code By Pradana Industries By.bri_pebri     |
#=======================================================|
class M_Data_wilayah extends CI_Model
{
    private $_table = "tbl_data_wilayah";

    function tampilData()
    {
        $this->db->select('tbl_data_wilayah.*,')
            ->from('tbl_data_wilayah')
            ->order_by('tbl_data_wilayah.id', 'DESC'); //ASC
        return $this->db->get();
    }

    function tambah()
    {
        $data = [
            'kelurahan' => $this->input->post('kelurahan'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kabupaten' => $this->input->post('kabupaten'),
            'provinsi' => $this->input->post('provinsi'),
            'kodepos' => $this->input->post('kodepos'),
            // 'created_on' => date('Y-m-d H:i:s'),
        ];

        $this->db->insert($this->_table, $data);
    }

    function edit()
    {
        $data = [
            'kelurahan' => $this->input->post('kelurahan'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kabupaten' => $this->input->post('kabupaten'),
            'provinsi' => $this->input->post('provinsi'),
            'kodepos' => $this->input->post('kodepos'),
            // 'update_at' => date('Y-m-d H:i:s'),
        ];
        $this->db->where('id', $this->input->post('query_id'))->update($this->_table, $data);
    }

    function hapus()
    {
        $this->db->where('id', $this->input->post('query_id'))->delete($this->_table);
    }
}
