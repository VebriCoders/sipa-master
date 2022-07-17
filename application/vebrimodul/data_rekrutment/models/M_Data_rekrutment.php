<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
#    Simple Code By Pradana Industries By.bri_pebri     |
#=======================================================|
class M_Data_rekrutment extends CI_Model
{
    private $_table = "data_rekrutment";

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    function tampilData()
    {
        $this->db->select('data_rekrutment.*
        , data_rekrutment_pengumuman.isi_pengumuman as isipengumuman
        , data_rekrutment_persyaratan.isi_persyaratan as isipersyaratan
        , data_rekrutment_lokasi.isi_lokasi as isilokasi
        , data_rekrutment_jadwal.isi_jadwal as isijadwal
        , data_rekrutment_materi.isi_materi as isimateri
        , data_rekrutment_panduan.isi_panduan as isipanduan
        ')
            ->from('data_rekrutment')
            ->join('data_rekrutment_pengumuman', 'data_rekrutment.id = data_rekrutment_pengumuman.id_rek')
            ->join('data_rekrutment_persyaratan', 'data_rekrutment.id = data_rekrutment_persyaratan.id_rek')
            ->join('data_rekrutment_lokasi', 'data_rekrutment.id = data_rekrutment_lokasi.id_rek')
            ->join('data_rekrutment_jadwal', 'data_rekrutment.id = data_rekrutment_jadwal.id_rek')
            ->join('data_rekrutment_materi', 'data_rekrutment.id = data_rekrutment_materi.id_rek')
            ->join('data_rekrutment_panduan', 'data_rekrutment.id = data_rekrutment_panduan.id_rek')
            ->order_by('data_rekrutment.id', 'DESC'); //ASC
        return $this->db->get();
    }

    function tambah()
    {
        $id_utama = uniqid();

        $data = [
            'id' => $id_utama,
            'slug' => $this->input->post('slug'),
            'nama_rek' => $this->input->post('nama_rek'),
            'tahun' => $this->input->post('tahun'),
            'start' => $this->input->post('start'),
            'end' => $this->input->post('end'),
            'foto' => $this->_uploadImage(),
            'created_on' => date('Y-m-d H:i:s'),
        ];

        $this->db->insert($this->_table, $data);


        //Create Data All Tabel Rekrutment

        $data_pengumuman = [
            'id_rek' => $id_utama,
            'isi_pengumuman' => 'Isi Pengumuman Di Sini....',
            'created_on' => date('Y-m-d H:i:s'),
        ];
        $this->db->insert('data_rekrutment_pengumuman', $data_pengumuman);

        $data_persyaratan = [
            'id_rek' => $id_utama,
            'isi_persyaratan' => 'Isi Persyaratan Di Sini....',
            'created_on' => date('Y-m-d H:i:s'),
        ];
        $this->db->insert('data_rekrutment_persyaratan', $data_persyaratan);

        $data_lokasi = [
            'id_rek' => $id_utama,
            'isi_lokasi' => 'Isi Lokasi Di Sini....',
            'created_on' => date('Y-m-d H:i:s'),
        ];
        $this->db->insert('data_rekrutment_lokasi', $data_lokasi);

        $data_jadwal = [
            'id_rek' => $id_utama,
            'isi_jadwal' => 'Isi Jadwal Di Sini....',
            'created_on' => date('Y-m-d H:i:s'),
        ];
        $this->db->insert('data_rekrutment_jadwal', $data_jadwal);

        $data_materi = [
            'id_rek' => $id_utama,
            'isi_materi' => 'Isi Materi Di Sini....',
            'created_on' => date('Y-m-d H:i:s'),
        ];
        $this->db->insert('data_rekrutment_materi', $data_materi);

        $data_Panduan = [
            'id_rek' => $id_utama,
            'isi_panduan' => 'Isi Panduan Di Sini....',
            'created_on' => date('Y-m-d H:i:s'),
        ];
        $this->db->insert('data_rekrutment_panduan', $data_Panduan);
    }

    function edit()
    {
        if (!empty($_FILES["images"]["name"])) {

            $nm_images_lama = $this->input->post('nm_images_lama');
            $this->_deleteImagesLama($nm_images_lama);

            $data = [
                'slug' => $this->input->post('slug'),
                'nama_rek' => $this->input->post('nama_rek'),
                'tahun' => $this->input->post('tahun'),
                'start' => $this->input->post('start'),
                'end' => $this->input->post('end'),
                'foto' => $this->_uploadImage(),
                'update_at' => date('Y-m-d H:i:s'),
            ];
        } else {
            $data = [
                'slug' => $this->input->post('slug'),
                'nama_rek' => $this->input->post('nama_rek'),
                'tahun' => $this->input->post('tahun'),
                'start' => $this->input->post('start'),
                'end' => $this->input->post('end'),
                'update_at' => date('Y-m-d H:i:s'),
            ];
        }
        $this->db->where('id', $this->input->post('query_id'))->update($this->_table, $data);
    }

    private function _deleteImagesLama($nm_images_lama)
    {
        if ($nm_images_lama != "default.jpg") {
            $filename = explode(".", $nm_images_lama)[0];
            return array_map('unlink', glob(FCPATH . "assets/upload/data_rekrutment/$filename.*"));
        }
    }

    function hapus()
    {
        $this->_deleteImage($this->input->post('query_id'));
        $this->db->where('id', $this->input->post('query_id'))->delete($this->_table);

        //Hapus Data All Tabel Rekrutment
        $this->db->where('id_rek', $this->input->post('query_id'))->delete('data_rekrutment_pengumuman');
        $this->db->where('id_rek', $this->input->post('query_id'))->delete('data_rekrutment_persyaratan');
        $this->db->where('id_rek', $this->input->post('query_id'))->delete('data_rekrutment_lokasi');
        $this->db->where('id_rek', $this->input->post('query_id'))->delete('data_rekrutment_jadwal');
        $this->db->where('id_rek', $this->input->post('query_id'))->delete('data_rekrutment_materi');
        $this->db->where('id_rek', $this->input->post('query_id'))->delete('data_rekrutment_panduan');
    }

    private function _deleteImage($id)
    {
        $data_foto = $this->getById($id);
        if ($data_foto->foto != "default.jpg") {
            $filename = explode(".", $data_foto->foto)[0];
            return array_map('unlink', glob(FCPATH . "assets/upload/data_rekrutment/$filename.*"));
        }
    }

    private function _uploadImage()
    {
        $config['upload_path']          = 'assets/upload/data_rekrutment';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = "PHOTO_REK-" . time();
        $config['overwrite']            = true;
        $config['max_size']             = 5120; // 5MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('images')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    // Tabel Isi Rekrutment
    function pengumuman()
    {
        $data = [
            'isi_pengumuman' => $this->input->post('isi_pengumuman'),
            'update_at' => date('Y-m-d H:i:s'),
        ];
        $this->db->where('id_rek', $this->input->post('query_id'))->update('data_rekrutment_pengumuman', $data);
    }

    function persyaratan()
    {
        $data = [
            'isi_persyaratan' => $this->input->post('isi_persyaratan'),
            'update_at' => date('Y-m-d H:i:s'),
        ];
        $this->db->where('id_rek', $this->input->post('query_id'))->update('data_rekrutment_persyaratan', $data);
    }

    function lokasi()
    {
        $data = [
            'isi_lokasi' => $this->input->post('isi_lokasi'),
            'update_at' => date('Y-m-d H:i:s'),
        ];
        $this->db->where('id_rek', $this->input->post('query_id'))->update('data_rekrutment_lokasi', $data);
    }

    function jadwal()
    {
        $data = [
            'isi_jadwal' => $this->input->post('isi_jadwal'),
            'update_at' => date('Y-m-d H:i:s'),
        ];
        $this->db->where('id_rek', $this->input->post('query_id'))->update('data_rekrutment_jadwal', $data);
    }

    function materi()
    {
        $data = [
            'isi_materi' => $this->input->post('isi_materi'),
            'update_at' => date('Y-m-d H:i:s'),
        ];
        $this->db->where('id_rek', $this->input->post('query_id'))->update('data_rekrutment_materi', $data);
    }

    function panduan()
    {
        $data = [
            'isi_panduan' => $this->input->post('isi_panduan'),
            'update_at' => date('Y-m-d H:i:s'),
        ];
        $this->db->where('id_rek', $this->input->post('query_id'))->update('data_rekrutment_panduan', $data);
    }
}
