<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/') ?><?= $website['logo']; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/templatelogin/io-frm/') ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/templatelogin/io-frm/') ?>css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/templatelogin/io-frm/') ?>css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/templatelogin/io-frm/') ?>css/iofrm-theme28.css">
</head>

<body>
    <div class="form-body">
        <div class="website-logo">
            <a href="<?php echo base_url('login') ?>">
                <div class="logo">
                    <img class="logo-size" src="<?php echo base_url('assets/img/') ?><?= $website['logo']; ?>" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">

                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">

                        <h3><?= $website['nama_website']; ?></h3>
                        <p><?= $website['deskripsi']; ?></p>
                        <div class="page-links">
                            <a href="<?php echo base_url('forgot_password/recover') ?>" class="active">Reset Password</a>
                        </div>

                        <?= $this->session->flashdata('message'); ?>

                        <p>Ubah Password Akses Akun Kamu Dengan Email (<?= $this->session->userdata('reset_email'); ?>), Pastikan Jangan Sampai Lupa Lagi Ya.</p>

                        <form action="<?= base_url('forgot_password/recover') ?>" method="post">
                            <div class="form-group">

                                <label>Password</label>
                                <input type="password" name="pswd_1" class="form-control" placeholder="Password" required oninvalid="this.setCustomValidity('Password tidak boleh kosong!')" oninput="setCustomValidity('')">

                                <label>Konfirmasi Password</label>
                                <input type="password" name="pswd_2" class="form-control" placeholder="Konfirmasi Password" required oninvalid="this.setCustomValidity('Konfirmasi Password tidak boleh kosong!')" oninput="setCustomValidity('')">

                                <div class="form-button">
                                    <button id="submit" type="submit" class="ibtn">Reset Password</button>
                                </div>
                            </div>
                        </form>

                        <div class="other-links">
                            <span>Copyright &copy; <?php echo date('Y') ?> <a href="https://www.instagram.com/bri_pebri/" target="_blank">Vebri Pradana</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('assets/templatelogin/io-frm/') ?>js/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/templatelogin/io-frm/') ?>js/popper.min.js"></script>
    <script src="<?php echo base_url('assets/templatelogin/io-frm/') ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/templatelogin/io-frm/') ?>js/main.js"></script>
</body>

</html>