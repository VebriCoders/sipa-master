<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
#    Simple Code By Pradana Industries By.bri_pebri     |
#=======================================================|
class Register extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        // model
        $this->load->model('M_Register');

        //Cek Apakah Sudah Login?
        if ($this->session->userdata('is_login') == true) {
            redirect('login');
        }
    }

    public function index()
    {
        $website = $this->M_Setting->set_setting();

        $data = array(
            'namamodule'     => "register",
            'namafileview'     => "v_register",
            'title'      => "Register | " . $website['nama_website'],
            //variabel
            'website' => $website,
        );
        $this->load->view('v_register', $data);
    }

    public function proses()
    {
        //Ambil Setting
        $website = $this->M_Setting->set_setting();

        //Cek Email Apakah Sudah Terdaftar Apa Belum
        $cekemail = $this->input->post('email_username');
        $sql = $this->db->query("SELECT email_username FROM tbl_admin where email_username='$cekemail'");
        $cekemail = $sql->num_rows();

        //Cek Password 1 & 2
        $pswd1 = $this->input->post('pswd_1');
        $pswd2 = $this->input->post('pswd_2');
        if ($pswd1 != $pswd2) {
            $cekpswd = false;
        } else {
            $cekpswd = true;
        }

        //Proses Register Data Admin
        if ($cekemail > 0) {
            //Jika Email Yang Di MAsukkan Sudah Terdaftar
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-ban"></i> Gagal!</h5>
                Email yang anda masukkan sudah terdaftar. Masukkan data lagi dengan benar!
            </div>');

            //Kembali Ke Halaman Login
            redirect('register');
        } else if ($cekpswd == false) {
            //Jika Password Yang Di Masukkan Tidak Sama / Tidak Match
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Kesalahan!</h5>
                Masukkan password yang sama pada konfirmasi password!
            </div>');

            //Kembali Ke Halaman Login
            redirect('register');
        } else {

            //Cek Setting Aktifikasi Jika Setting Aktifikasi 1
            if ($website['email_verifikasi'] == 1) {

                //Data Input User
                $data_user = [
                    'email_username' => htmlspecialchars($this->input->post('email_username', true)),
                    'password' => password_hash($pswd1, PASSWORD_DEFAULT),
                    'nama_admin' => htmlspecialchars($this->input->post('nama_admin')),
                    'foto_admin' => 'user.jpg',
                    'role_id' => $this->input->post('role_id'), //Custom Login 1 Admin Utama & 2 Admin Lokal
                    'active' => '0', //Bisa Di Ganti 0 Jika Membutuhkan Email Verifikasi SMTP
                    'admin_online' => '0', //Indikator Admin Masuk Aplikasi
                    'created_on' => date('Y-m-d H:i:s'), //Data Admin Membuat Akun
                ];

                //Data Token Untuk Verifikasi
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email_username' => htmlspecialchars($this->input->post('email_username', true)),
                    'token' => $token,
                    'created_on' => time()
                ];

                //Masukkan Data User
                $this->db->insert('tbl_admin', $data_user);
                //Masukkan Data Token
                $this->db->insert('tbl_admin_token', $user_token);

                //Kirim Email
                $this->_sendEmail($token, htmlspecialchars($this->input->post('email_username', true)));

                //Jika Data Baru Sudah Valid Akan DI Arahkan Ke Halaman Login
                $email_web = $website['email'];
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                    Akun sudah di buat, silahkan buka gmail anda & konfirmasi email anda.
                    Email Di Kirim Oleh (' . $email_web . ')
                    </div>');
                redirect('login');


                //Email Verifikasi Non-Aktif
            } else { //Jika TIdak Ada Aktifikasi Maka User Aktif Status 1

                //Data Input User
                $data_user = [
                    'email_username' => htmlspecialchars($this->input->post('email_username', true)),
                    'password' => password_hash($pswd1, PASSWORD_DEFAULT),
                    'nama_admin' => htmlspecialchars($this->input->post('nama_admin')),
                    'foto_admin' => 'user.jpg',
                    'role_id' => $this->input->post('role_id'), //Custom Login 1 Admin Utama & 2 Admin Lokal
                    'active' => '1', //Bisa Di Ganti 0 Jika Membutuhkan Email Verifikasi SMTP
                    'admin_online' => '0', //Indikator Admin Masuk Aplikasi
                    'created_on' => date('Y-m-d H:i:s'), //Data Admin Membuat Akun
                ];

                //Masukkan Data User
                $this->db->insert('tbl_admin', $data_user);

                //Jika Data Baru Sudah Valid Akan DI Arahkan Ke Halaman Login
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                    Akun sudah di buat, silahkan login.
                    </div>');
                redirect('login');
            }
        }
    }

    private function _sendEmail($token, $email_user)
    {
        //Ambil Setting
        $website = $this->M_Setting->set_setting();

        //Konfigurasi Email Setting
        $config = [
            'protocol'  => $website['email_protocol'],
            'smtp_host' => $website['email_host'],
            'smtp_user' => $website['email'],
            'smtp_pass' => $website['email_pswd'],
            'smtp_port' => $website['email_port'],
            'mailtype'  => $website['email_type'],
            'charset'   => $website['email_charset'],
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('pradanaindustries.project@gmail.com', $website['nama_website']);
        $this->email->to($email_user);

        $this->email->subject('Aktifikasi Akun Pengguna');
        $this->email->message('Klik Activate Untuk Aktifikasi Akun Anda Dan Mulai Masuk Ke Aplikasi ' . $website['nama_website'] . ' : <a href="' . base_url() . 'register/verify?email=' . $email_user . '&token=' . urlencode($token) . '">Activate</a>');

        //Jika Email Gagal Di Kirim, Tampilkan Debug
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        //Ambil Data Pada Url
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        //Cek Apakah Email Terdaftar
        $user = $this->db->get_where('tbl_admin', ['email_username' => $email])->row_array();

        if ($user) {
            //Cek Apakah Token Terdaftar
            $user_token = $this->db->get_where('tbl_admin_token', ['token' => $token])->row_array();

            if ($user_token) {

                //Cek Apakah Token Expired, Jika TIdak Maka Data Akan Di Proses
                if (time() - $user_token['created_on'] < (60 * 60 * 24)) {

                    //Proses Aktifikasi Email User
                    $this->db->set('active', 1);
                    $this->db->where('email_username', $email);
                    $this->db->update('tbl_admin');

                    //Hapus Token Yang Sudah Teraktifikasi
                    $this->db->delete('tbl_admin_token', ['email_username' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                    Email kamu ' . $email . ' berhasil di aktifikasi, silahkan login!.
                    </div>');
                    redirect('login');
                } else {

                    //Jika Token Expires Maka Hapus Semua Data User Dan Data Token
                    $this->db->delete('tbl_admin', ['email_username' => $email]);
                    $this->db->delete('tbl_admin_token', ['email_username' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-exclamation-triangle"></i> Kesalahan!</h5>
                        Aktifikasi gagal! Masa berlaku token habis, siahkan daftar ulang!
                    </div>');
                    redirect('login');
                }
            } else {

                //Jika Token Salah
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Gagal!</h5>
                    Token yang anda masukkan salah!
                </div>');
                redirect('login');
            }
        } else {

            //Jika Email Salah
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-ban"></i> Gagal!</h5>
                Email yang anda masukkan salah!
            </div>');
            redirect('login');
        }
    }
}
