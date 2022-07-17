<section class="section">
    <div class="section-header">
        <h1>Setting</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Home</div>
            <div class="breadcrumb-item">Setting Aplikasi</div>
            <div class="breadcrumb-item active"><a href="<?php echo base_url('setting') ?>">Setting</a></div>
            <!-- <div class="breadcrumb-item"><a href="#">Forms</a></div> -->
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Hi, <?php echo $this->session->userdata('nama_admin') ?> ! </h2>
        <p class="section-lead">
            Kamu Bisa ubah setting aplikasi ini.
        </p>


        <?php foreach ($tampilData->result() as $data) { ?>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Setting Utama</h4>
                            <button type="button" class="btn btn-icon icon-left btn-warning" data-toggle="modal" data-target="#modal-edit-utama"><i class="far fa-edit"></i> Edit</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width: 10px">No.</th>
                                            <th scope="col">Setting</th>
                                            <th scope="col">Value</th>
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
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Setting Email</h4>
                            <button type="button" class="btn btn-icon icon-left btn-warning" data-toggle="modal" data-target="#modal-edit-email"><i class="far fa-edit"></i> Edit</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">No.</th>
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
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</section>


<?php foreach ($tampilData->result() as $data) { ?>

    <?php echo form_open_multipart('setting/edit_utama'); ?>
    <!-- Modal Setting Utama -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-edit-utama">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Setting Utama</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Ubah Setting Utama Website Kamu.</p>

                    <!-- Id Data -->
                    <input type="hidden" name="query_id" value="<?php echo $data->id ?>">

                    <div class="form-group col-md-12 col-12">
                        <label>Nama Aplikasi</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-desktop"></i>
                                </div>
                            </div>
                            <input type="text" name="nama_website" value="<?php echo $data->nama_website ?>" class="form-control" placeholder="Nama Aplikasi" required>
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-12">
                        <label>Deskripsi Aplikasi</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-align-center"></i>
                                </div>
                            </div>
                            <input type="text" name="deskripsi" value="<?php echo $data->deskripsi ?>" class="form-control" placeholder="Deskripsi Aplikasi" required>
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-12">
                        <label>Telephone Administrator</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-phone"></i>
                                </div>
                            </div>
                            <input type="number" name="phone" value="<?php echo $data->phone ?>" class="form-control" placeholder="Telephone Administrator" required>
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-12">
                        <label>Email Verifikasi</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>
                            <select class="select2" style="width: 87%" id="email_verifikasi" name="email_verifikasi" required>
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

                    <div class="form-group col-md-12 col-12">
                        <label>Foto</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Pilih Foto</label>
                            <input type="file" name="logo" id="image-upload" />
                        </div>
                        <p>File Sebelumnya : <?php echo $data->logo ?></p>
                        <input type="hidden" name="logo_lama" value="<?php echo $data->logo ?>">
                    </div>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
                    <button class="btn btn-warning"><i class="fas fa-save"></i> Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>



    <?php echo form_open_multipart('setting/edit_email'); ?>
    <!-- Modal Setting Email -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-edit-email">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Ubah Setting Email Website Kamu.</p>

                    <!-- Id Data -->
                    <input type="hidden" name="query_id" value="<?php echo $data->id ?>">

                    <div class="form-group col-md-12 col-12">
                        <label>Email Aplikasi</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-at"></i>
                                </div>
                            </div>
                            <input type="email" name="email" value="<?php echo $data->email ?>" class="form-control" placeholder="Email Aplikasi" required>
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-12">
                        <label>Password Email Aplikasi</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-key"></i>
                                </div>
                            </div>
                            <input type="text" name="email_pswd" value="<?php echo $data->email_pswd ?>" class="form-control" placeholder="Password Email Aplikasi" required>
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-12">
                        <label>Protocol Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-door-open"></i>
                                </div>
                            </div>
                            <input type="text" name="email_protocol" value="<?php echo $data->email_protocol ?>" class="form-control" placeholder="Protocol Email" required>
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-12">
                        <label>Host Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-globe"></i>
                                </div>
                            </div>
                            <input type="text" name="email_host" value="<?php echo $data->email_host ?>" class="form-control" placeholder="Host Email" required>
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-12">
                        <label>Port Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-wifi"></i>
                                </div>
                            </div>
                            <input type="text" name="email_port" value="<?php echo $data->email_port ?>" class="form-control" placeholder="Port Email" required>
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-12">
                        <label>Type Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                            </div>
                            <input type="text" name="email_type" value="<?php echo $data->email_type ?>" class="form-control" placeholder="Type Email" required>
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-12">
                        <label>Charset Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-stream"></i>
                                </div>
                            </div>
                            <input type="text" name="email_charset" value="<?php echo $data->email_charset ?>" class="form-control" placeholder="Charset Email" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
                    <button class="btn btn-warning"><i class="fas fa-save"></i> Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>

<?php } ?>


<script src="<?php echo base_url('assets/template') ?>/modules/jquery.min.js"></script>
<script src="<?php echo base_url('assets/template') ?>/modules/izitoast/js/iziToast.min.js"></script>
<script>
    <?= $this->session->flashdata('alert'); ?>

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