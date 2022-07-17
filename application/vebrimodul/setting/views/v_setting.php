<div id="page-head">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow">Setting</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->


    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="demo-pli-home"></i></a></li>
        <li class="active">Setting</li>
    </ol>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->

</div>


<!--Page content-->
<!--===================================================-->
<div id="page-content">

    <div class="row">
        <div class="col-sm-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Setting Utama</h3>
                </div>

                <!--Setting Utama-->
                <!--===================================================-->
                <?php foreach ($tampilData->result() as $data) { ?>
                    <div class="panel-body">
                        <div class="pad-btm form-inline">
                            <div class="row">
                                <div class="col-sm-6 table-toolbar-left">
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-utama"><i class="fa fa-edit"></i> Edit</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Setting</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>Nama Website</td>
                                        <td><?php echo $data->nama_website ?></td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Deskripsi Website</td>
                                        <td><?php echo $data->deskripsi ?></td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Phone Website</td>
                                        <td><?php echo $data->phone ?></td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Email Verifikasi</td>
                                        <td>
                                            <?php if ($data->email_verifikasi == 1) { ?>
                                                <span class="badge badge-success">Aktif - Fitur Berjalan</span>
                                            <?php } else { ?>
                                                <span class="badge badge-danger">Tidak Aktif</span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Logo Website</td>
                                        <td><img class="img" src="<?php echo base_url('assets/img/') ?><?php echo $data->logo ?>" width="100"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php } ?>
                <!--===================================================-->
                <!--Setting Utama-->

            </div>
        </div>

        <div class="col-sm-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Setting Email</h3>
                </div>

                <!--Setting Email-->
                <!--===================================================-->
                <?php foreach ($tampilData->result() as $data) { ?>
                    <div class="panel-body">
                        <div class="pad-btm form-inline">
                            <div class="row">
                                <div class="col-sm-6 table-toolbar-left">
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-email"><i class="fa fa-edit"></i> Edit Email</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Setting</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>Email</td>
                                        <td><?php echo $data->email ?></td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Password Email</td>
                                        <td><?php echo $data->email_pswd ?></td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Protocol Email</td>
                                        <td><?php echo $data->email_protocol ?></td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Host Email</td>
                                        <td><?php echo $data->email_host ?></td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Port Email</td>
                                        <td><?php echo $data->email_port ?></td>
                                    </tr>
                                    <tr>
                                        <td>6.</td>
                                        <td>Type Email</td>
                                        <td><?php echo $data->email_type ?></td>
                                    </tr>
                                    <tr>
                                        <td>7.</td>
                                        <td>Charset Email</td>
                                        <td><?php echo $data->email_charset ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php } ?>
                <!--===================================================-->
                <!--Setting Email-->

            </div>
        </div>
    </div>

</div>
<!--===================================================-->
<!--End page content-->

<?php foreach ($tampilData->result() as $data) { ?>

    <!-- Modal Setting Utama-->
    <!--===================================================-->
    <?php echo form_open_multipart('setting/edit_utama'); ?>
    <div class="modal fade" id="modal-edit-utama" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Edit Setting Utama</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">

                    <p>Ubah Setting Utama Website Kamu. <code>Input Data Dengan Benar!</code></p><br>

                    <!-- Id Data -->
                    <input type="hidden" name="query_id" value="<?php echo $data->id ?>">

                    <div class="form-group col-12">
                        <label>Nama Aplikasi</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-desktop"></i></span>
                            <input type="text" name="nama_website" value="<?php echo $data->nama_website ?>" class="form-control" placeholder="Nama Aplikasi" required>
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Deskripsi Aplikasi</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-align-center"></i></span>
                            <input type="text" name="deskripsi" value="<?php echo $data->deskripsi ?>" class="form-control" placeholder="Deskripsi Aplikasi" required>
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Telephone Administrator</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="number" name="phone" value="<?php echo $data->phone ?>" class="form-control" placeholder="Telephone Administrator" required>
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Email Verifikasi</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-check-circle"></i></span>
                            <select class="form-control" id="demo-chosen-select" name="email_verifikasi" required>
                                <?php if ($data->email_verifikasi == 1) { ?>
                                    <option selected="selected" value="1">Aktif - FItur Berjalan</option>
                                    <option value="0">Non Aktif - Fitur Berhenti</option>
                                <?php } else { ?>
                                    <option selected="selected" value="0">Non Aktif - Fitur Berhenti</option>
                                    <option value="1">Aktif - FItur Berjalan</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Foto</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="ti-image"></i></span>
                            <span class="pull-left btn btn-mint btn-file">
                                Browse... <input type="file" name="logo" id="imgInp" />
                            </span>
                        </div>
                        <img class="img-responsive" id='img-upload' alt="Profile Picture">
                        <hr>
                        <p>File Sebelumnya : <?php echo $data->logo ?></p>
                        <input type="hidden" name="logo_lama" value="<?php echo $data->logo ?>">
                    </div>

                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button"><i class="fa fa-times"></i> Batal</button>
                    <button class="btn btn-warning"><i class="fa fa-save"></i> Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
    <!--===================================================-->
    <!-- End Modal Setting Utama-->


    <!-- Modal Setting Email-->
    <!--===================================================-->
    <?php echo form_open_multipart('setting/edit_email'); ?>
    <div class="modal fade" id="modal-edit-email" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Edit Setting Email</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">

                    <p>Ubah Setting Email Website Kamu. <code>Input Data Dengan Benar!</code></p><br>

                    <!-- Id Data -->
                    <input type="hidden" name="query_id" value="<?php echo $data->id ?>">

                    <div class="form-group col-12">
                        <label>Email Aplikasi</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                            <input type="email" name="email" value="<?php echo $data->email ?>" class="form-control" placeholder="Email Aplikasi" required>
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Password Email Aplikasi</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="text" name="email_pswd" value="<?php echo $data->email_pswd ?>" class="form-control" placeholder="Password Email Aplikasi" required>
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Protocol Email</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-exchange"></i></span>
                            <input type="text" name="email_protocol" value="<?php echo $data->email_protocol ?>" class="form-control" placeholder="Protocol Email" required>
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Host Email</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                            <input type="text" name="email_host" value="<?php echo $data->email_host ?>" class="form-control" placeholder="Host Email" required>
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Port Email</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-wifi"></i></span>
                            <input type="text" name="email_port" value="<?php echo $data->email_port ?>" class="form-control" placeholder="Port Email" required>
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Type Email</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-sliders"></i></span>
                            <input type="text" name="email_type" value="<?php echo $data->email_type ?>" class="form-control" placeholder="Type Email" required>
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Charset Email</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-terminal"></i></span>
                            <input type="text" name="email_charset" value="<?php echo $data->email_charset ?>" class="form-control" placeholder="Charset Email" required>
                        </div>
                    </div>

                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button"><i class="fa fa-times"></i> Batal</button>
                    <button class="btn btn-warning"><i class="fa fa-save"></i> Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
    <!--===================================================-->
    <!-- End Modal Setting Email-->


<?php } ?>

<script src="<?php echo base_url('assets/templatenifty/') ?>plugins/izitoast/iziToast.min.js"></script>
<script>
    <?= $this->session->flashdata('notifikasi'); ?>

    function edit_alert_utama() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Setting Utama Berhasil Di Ubah',
            position: 'topCenter'
        });
    };

    function edit_alert_email() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Email Berhasil Di Ubah',
            position: 'topCenter'
        });
    };
</script>