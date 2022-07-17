<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
#    Simple Code By Pradana Industries By.bri_pebri     |
#=======================================================|
class Forgot_password extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        // model
        $this->load->model('M_Forgot_password');

        //Cek Apakah Sudah Login?
        if ($this->session->userdata('is_login') == true) {
            redirect('login');
        }
    }

    public function index()
    {
        //cek apakah email valid
        $this->form_validation->set_rules('email_username', 'Email', 'trim|required|valid_email');

        //halaman awal jika tidak ada operasi form
        if ($this->form_validation->run() == false) {

            $website = $this->M_Setting->set_setting();
            $data = array(
                'namamodule'     => "forgot_password",
                'namafileview'     => "v_forgot_password",
                'title'      => "Forgot Password | " . $website['nama_website'],
                //variabel
                'website' => $website,
            );
            $this->load->view('v_forgot_password', $data);

            //proses pengecek an email untuk mengirim kode reset password
        } else {

            //cek user
            $email_username = $this->input->post('email_username');
            $user = $this->db->get_where('tbl_admin', ['email_username' => $email_username, 'active' => 1])->row_array();

            //cek user apakah terdaftar
            if ($user) {

                //jika terdaftar siapkan token
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email_username' => $email_username,
                    'token' => $token,
                    'created_on' => time()
                ];

                //simpan token
                $this->db->insert('tbl_admin_token', $user_token);

                //kirim email
                $this->_sendEmail($token, $email_username);

                //jika sudah selesai di arahkan ke halaman login
                $website = $this->M_Setting->set_setting();
                $email_web = $website['email'];
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                    Informasi reset password sudah di kirimkan ke email kamu, cek sekarang!
                    Email Di Kirim Oleh (' . $email_web . ')
                    </div>');
                redirect('forgot_password');

                //jika email tidak terdaftar
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Gagal!</h5>
                    Email yang anda masukkan tidak terdaftar atau tidak teraktifikasi. Masukkan data lagi dengan benar!
                </div>');
                redirect('forgot_password');
            }
        }
    }

    private function _sendEmail($token, $email_username)
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
        $this->email->to($email_username);

        $this->email->subject('Ubah Password');
        $this->email->message('Klik Reset Password Untuk Merubah Password Kamu Untuk Masuk Ke Aplikasi ' . $website['nama_website'] . ' : <a href="' . base_url() . 'forgot_password/check?email=' . $email_username . '&token=' . urlencode($token) . '">Reset Password</a>');

        //Jika Email Gagal Di Kirim, Tampilkan Debug
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function check()
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
                $this->session->set_userdata('reset_email', $email);
                $this->recover();
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

    public function recover()
    {
        //cek jika tidak ada session ubah email akan di arahkan ke halaman login
        if (!$this->session->userdata('reset_email')) {
            redirect('login');
        }

        //cek apakah password sama, cek manual
        $psw1 = $this->input->post('pswd_1');
        $psw2 = $this->input->post('pswd_2');

        //cek password manual
        if ($psw1 == $psw2) {

            //cek password dengan form validation, cek ke 2
            $this->form_validation->set_rules('pswd_1', 'Password', 'trim|required|min_length[8]|matches[pswd_2]');
            $this->form_validation->set_rules('pswd_2', 'Repeat Password', 'trim|required|min_length[8]|matches[pswd_1]');

            //halaman awal jika tidak ada operasi form
            if ($this->form_validation->run() == false) {
                $website = $this->M_Setting->set_setting();
                $data = array(
                    'namamodule'     => "forgot_password",
                    'namafileview'     => "v_recover",
                    'title'      => "Reset Password | " . $website['nama_website'],
                    //variabel
                    'website' => $website,
                );
                $this->load->view('v_recover', $data);

                //jika form valid proses pemasukan password
            } else {

                //Proses Simpan Password Baru
                $password = password_hash($this->input->post('pswd_1'), PASSWORD_DEFAULT);
                $email = $this->session->userdata('reset_email');

                $this->db->set('password', $password);
                $this->db->where('email_username', $email);
                $this->db->update('tbl_admin');

                //hapus session reset email, agar halaman recover mati
                $this->session->unset_userdata('reset_email');

                //hapus token yang tersimpan
                $this->db->delete('tbl_admin_token', ['email_username' => $email]);

                //selesai ubah password
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                    Password berhasil di ubah, silahkan login kembali!
                </div>');
                redirect('login');
            }

            //jika password tidak sama setelah di cek manual
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Kesalahan!</h5>
                Masukkan password yang sama pada konfirmasi password!
            </div>');
            redirect('forgot_password/recover');
        }
    }
}
