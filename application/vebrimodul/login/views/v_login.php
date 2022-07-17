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
                            <a href="<?php echo base_url('login') ?>" class="active">Login</a>
                            <a href="<?php echo base_url('register') ?>">Register</a>
                            <!-- <a href="<?php echo base_url('forgot_password') ?>">Forgot password</a> -->
                        </div>

                        <?= $this->session->flashdata('message'); ?>

                        <form action="<?= base_url('login') ?>" method="post">

                            <label>Email</label>
                            <input id="email" type="email" name="email_username" class="form-control" placeholder="Email" tabindex="1" required autofocus oninvalid="this.setCustomValidity('Email Tidak Boleh Kosong!')" oninput="setCustomValidity('')">

                            <label>Password</label>
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password" tabindex="2" required oninvalid="this.setCustomValidity('Password Tidak Boleh Kosong!')" oninput="setCustomValidity('')">

                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Login</button>
                                <a href="<?php echo base_url('forgot_password') ?>">Forgot password?</a>
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