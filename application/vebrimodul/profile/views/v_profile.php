<div id="page-head">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow">Profile</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->


    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="demo-pli-home"></i></a></li>
        <li class="active">Profile</li>
    </ol>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->

</div>


<!--Page content-->
<!--===================================================-->
<div id="page-content">

    <?= $this->session->flashdata('logout-alert'); ?>
    <?= $this->session->flashdata('alert-pswd-error'); ?>

    <?php $i = 1;
    foreach ($tampilData->result() as $data) { ?>
        <div class="panel">
            <div class="panel-body">

                <div class="fluid">

                    <div class="text-right">
                        <button class="btn btn-sm btn-danger btn-labeled" data-target="#modal-edit-password" data-toggle="modal"><i class="btn-label ti-key"></i> Ubah Password</button>
                        <button class="btn btn-sm btn-info btn-labeled" data-target="#modal-edit-profile" data-toggle="modal"><i class="btn-label ti-pencil-alt"></i> Ubah Profile</button>
                    </div>

                    <!-- Simple profile -->
                    <div class="text-center">
                        <div class="pad-ver">

                            <?php if ($this->session->userdata('foto_admin') == "user.jpg") { ?>
                                <img class="img-lg img-circle" src="<?php echo base_url('assets/img/user.jpg') ?>" alt="Profile Picture">
                            <?php } else { ?>
                                <img class="img-lg img-circle" src="<?php echo base_url('assets/upload/foto_admin/') ?><?php echo $this->session->userdata('foto_admin'); ?>" alt="Profile Picture">
                            <?php } ?>

                        </div>
                        <h4 class="text-lg text-overflow mar-no">
                            <?php echo $data->nama_admin ?>

                            <?php if ($data->admin_online == 1) { ?>
                                <span class="label label-success">Online</span>
                            <?php } elseif ($data->admin_online == 2) { ?>
                                <span class="label label-danger">Off-line</span>
                            <?php } else { ?>
                                <span class="label label-warning">Error</span>
                            <?php } ?>
                        </h4>
                        <p class="text-sm text-muted"><?php echo $data->email_username ?></p>

                    </div>
                    <hr>

                    <!-- Profile Details -->
                    <p class="pad-ver text-main text-sm text-uppercase text-bold">Detail</p>
                    <p><i class="ti-user icon-lg icon-fw"></i> <b>Nama Lengkap :</b> <?php echo $data->nama_admin ?></p>
                    <p><i class="ti-email icon-lg icon-fw"></i> <b>Email :</b> <?php echo $data->email_username ?></p>
                    <p><i class="ti-medall icon-lg icon-fw"></i> <b>Role : </b> <?php if ($data->role_id == 1) {
                                                                                    echo 'Administrator Mabes';
                                                                                } elseif ($data->role_id == 2) {
                                                                                    echo 'Admin Kodam';
                                                                                } elseif ($data->role_id == 3) {
                                                                                    echo 'Admin Ajenrem';
                                                                                } else {
                                                                                    echo 'Ilegal';
                                                                                } ?></p>
                    <p><i class="ti-check-box icon-lg icon-fw"></i> <b>Status :</b> <?php if ($data->active == 1) {
                                                                                        echo 'Aktif';
                                                                                    } else {
                                                                                        echo 'Tidak Aktif';
                                                                                    } ?></p>
                    <p><i class="ti-timer icon-lg icon-fw"></i> <b>Akun Di Buat : </b> <?php echo $data->created_on ?></p>
                    <p><i class="ti-timer icon-lg icon-fw"></i> <b>Akun Di Update : </b> <?php echo $data->update_at ?></p>
                    <p><i class="ti-timer icon-lg icon-fw"></i> <b>Akun Terakhir Login : </b> <?php echo $data->last_login ?></p>
                    <p><i class="ti-timer icon-lg icon-fw"></i> <b>Akun Terakhir Logout : </b> <?php echo $data->last_logout ?></p>

                </div>
            </div>
        </div>
    <?php $i++;
    } ?>

</div>
<!--===================================================-->
<!--End page content-->



<!--Default Bootstrap Modal Edit Profile-->
<!--===================================================-->
<?php echo form_open_multipart('profile/edit'); ?>
<?php foreach ($tampilData->result() as $data) { ?>
    <div class="modal fade" id="modal-edit-profile" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Edit Profile</h4>
                </div>

                <!-- Id Data -->
                <input type="hidden" name="query_id" value="<?php echo $data->id_admin ?>">

                <!--Modal body-->
                <div class="modal-body">

                    <div class="form-group col-12">
                        <label>Nama Lengkap</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="ti-user"></i></span>
                            <input type="text" name="nama_admin" value="<?php echo $data->nama_admin ?>" class="form-control" placeholder="Nama Lengkap" required>
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Email</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="ti-email"></i></span>
                            <input type="email" readonly value="<?php echo $data->email_username ?>" class="form-control" placeholder="Email" required>
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Foto Profile</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="ti-image"></i></span>
                            <span class="pull-left btn btn-mint btn-file">
                                Browse... <input type="file" name="images" id="imgInp" />
                            </span>
                            <!-- <img class="img-responsive" id='img-upload' alt="Image" /> -->
                        </div>
                        <img class="img-responsive" id='img-upload' alt="Profile Picture" height="100">
                        <hr>
                        <p>File Sebelumnya : <?php echo $data->foto_admin ?></p>
                        <input type="hidden" name="nm_images_lama" value="<?php echo $data->foto_admin ?>">
                    </div>

                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button"><i class="fa fa-times"></i> Batal</button>
                    <button class="btn btn-info"><i class="fa fa-save"></i> Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php echo form_close(); ?>
<!--===================================================-->
<!--End Default Bootstrap Modal Edit Profile-->


<!--Default Bootstrap Modal Ubah Password-->
<!--===================================================-->
<?php foreach ($tampilData->result() as $data) { ?>
    <?php echo form_open_multipart('profile/password'); ?>
    <div class="modal fade" id="modal-edit-password" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Ubah Password</h4>
                </div>

                <!-- Id Data -->
                <input type="hidden" name="query_id" value="<?php echo $data->id_admin ?>">

                <!--Modal body-->
                <div class="modal-body">

                    <p>Ubah Password User, Pastikan Menggunakan Karakter Password Yang Tidak Bisa Di Curi Orang Lain. <code>Minimal 8 Karakter!</code></p><br>

                    <div class="form-group col-12">
                        <label>Password Baru</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="text" name="password1" class="form-control" placeholder="Password" required minlength="8" oninvalid="this.setCustomValidity('Password Tidak Boleh Kosong!')" oninput="setCustomValidity('')">
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Konfirmasi Password Baru</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="text" name="password2" class="form-control" placeholder="Konfirmasi Password" required minlength="8" oninvalid="this.setCustomValidity('Konfirmasi Password Tidak Boleh Kosong!')" oninput="setCustomValidity('')">
                        </div>
                    </div>

                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button"><i class="fa fa-times"></i> Batal</button>
                    <button class="btn btn-danger"><i class="fa fa-key"></i> Ubah Password</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
<?php } ?>
<!--===================================================-->
<!--End Default Bootstrap Modal Ubah Password-->

<script src="<?php echo base_url('assets/templatenifty/') ?>plugins/izitoast/iziToast.min.js"></script>
<script>
    <?= $this->session->flashdata('notifikasi'); ?>

    function edit_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Profile Berhasil Di Ubah',
            position: 'topCenter'
        });
    };

    function password_alert_failed() {
        iziToast.error({
            title: 'Gagal!',
            message: 'Percobaan Ubah Password Gagal.',
            position: 'topCenter'
        });
    };

    function password_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Password Berhasil Di Ubah',
            position: 'topCenter'
        });
    };
</script>