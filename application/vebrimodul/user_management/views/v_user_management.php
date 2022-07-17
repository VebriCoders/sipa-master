<div id="page-head">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow">User Management</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->


    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="demo-pli-home"></i></a></li>
        <li class="active">User Management</li>
    </ol>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->

</div>


<!--Page content-->
<!--===================================================-->
<div id="page-content">

    <!-- Contact Toolbar -->
    <!---------------------------------->
    <div class="row pad-btm">
        <div class="col-sm-6 toolbar-left">
            <button class="btn btn-success btn-labeled" data-toggle="modal" data-target="#modal-tambah"><i class=" btn-label fa fa-plus"></i> Tambah User</button>
            <!-- <button class="btn btn-default"><i class="demo-pli-printer"></i></button> -->
        </div>
        <!-- <div class="col-sm-6 toolbar-right text-right">
            Sort by :
            <div class="select">
                <select id="demo-ease">
                    <option value="date-created" selected="">Date Created</option>
                    <option value="date-modified">Date Modified</option>
                    <option value="frequency-used">Frequency Used</option>
                    <option value="alpabetically">Alpabetically</option>
                    <option value="alpabetically-reversed">Alpabetically Reversed</option>
                </select>
            </div>
            <button class="btn btn-default">Filter</button>
            <button class="btn btn-primary"><i class="demo-psi-gear icon-lg"></i></button>
        </div> -->
    </div>
    <!---------------------------------->

    <br>

    <!-- Row selection (single row) -->
    <!--===================================================-->
    <div class="panel">

        <div class="panel-heading">
            <h3 class="panel-title">Data User Management
            </h3>
        </div>

        <div class="panel-body">
            <table id="tabel-selection-utama" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">
                            No.
                        </th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th class="min-desktop">Akses - Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($tampilData->result() as $data) { ?>
                        <tr>
                            <td class="text-center"><?php echo $i; ?></td>
                            <td>
                                <?php if ($data->foto_admin == "user.jpg") { ?>
                                    <img class="img-lg img-circle add-tooltip" src="<?php echo base_url('assets/img/user.jpg') ?>" alt="Profile Picture" data-toggle="tooltip" data-original-title="<?php echo $data->nama_admin ?>">
                                <?php } else { ?>
                                    <img class="img-lg img-circle add-tooltip" src="<?php echo base_url('assets//upload/foto_admin/') ?><?php echo $data->foto_admin ?>" alt="Profile Picture" data-toggle="tooltip" data-original-title="<?php echo $data->nama_admin ?>">
                                <?php } ?>
                            </td>
                            <td>
                                <?php echo $data->nama_admin ?>
                                <?php if ($data->admin_online == 1) { ?>
                                    <span class="badge badge-success">Online</span>
                                <?php } else { ?>
                                    <span class="badge badge-warning">Offline</span>
                                <?php } ?>
                            </td>
                            <td><?php echo $data->email_username ?></td>
                            <td>
                                <?php if ($data->role_id == 1) { ?>
                                    <span class="label label-success">Administrator Mabes</span>
                                <?php } else if ($data->role_id == 2) { ?>
                                    <span class="label label-mint">Admin Kodam</span>
                                <?php } else if ($data->role_id == 3) { ?>
                                    <span class="label label-dark">Admin Ajenrem</span>
                                <?php } else { ?>
                                    <span class="label label-danger">Ilegal</span>
                                <?php } ?>
                                -
                                <?php if ($data->active == 1) { ?>
                                    <span class="label label-success">Aktif</span>
                                <?php } else { ?>
                                    <span class="label label-danger">Non-Aktif</span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($data->id_admin != 1) { ?>
                                    <button class="btn btn-info btn-icon" data-toggle="modal" data-target="#modal-password-<?php echo $data->id_admin ?>"><i class="fa fa-key icon-lg"></i></button>
                                    <button class="btn btn-warning btn-icon" data-toggle="modal" data-target="#modal-edit-<?php echo $data->id_admin ?>"><i class="fa fa-edit icon-lg"></i></button>
                                    <button class="btn btn-danger btn-icon" data-toggle="modal" data-target="#modal-hapus-<?php echo $data->id_admin ?>"><i class="fa fa-trash icon-lg"></i></button>
                                <?php } else { ?>
                                    <button disabled class="btn btn-info btn-icon" data-toggle="modal" data-target="#modal-password-<?php echo $data->id_admin ?>"><i class="fa fa-key icon-lg"></i></button>
                                    <button disabled class="btn btn-warning btn-icon" data-toggle="modal" data-target="#modal-edit-<?php echo $data->id_admin ?>"><i class="fa fa-edit icon-lg"></i></button>
                                    <button disabled class="btn btn-danger btn-icon" data-toggle="modal" data-target="#modal-hapus-<?php echo $data->id_admin ?>"><i class="fa fa-trash icon-lg"></i></button>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--===================================================-->
    <!-- End Row selection (single row) -->

</div>
<!--===================================================-->
<!--End page content-->


<?php $i = 1;
foreach ($tampilData->result() as $data) { ?>

    <!-- Modal Edit Data-->
    <!--===================================================-->
    <?php echo form_open_multipart('user_management/edit'); ?>
    <div class="modal fade" id="modal-edit-<?php echo $data->id_admin ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Edit Data - <?php echo $data->nama_admin ?></h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">

                    <p>Masukkan Data Baru dan Simpan Jika Ada Perubahan. <code>Input Data Dengan Benar!</code></p><br>

                    <!-- Id Data -->
                    <input type="hidden" name="query_id" value="<?php echo $data->id_admin ?>">

                    <div class="form-group col-12">
                        <label>Nama Lengkap</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="nama_admin" value="<?php echo $data->nama_admin ?>" class="form-control" placeholder="Nama Lengkap" required oninvalid="this.setCustomValidity('Nama Lengkap tidak boleh kosong!')" oninput="setCustomValidity('')">
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Email</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-at"></i></span>
                            <input type="email" name="email_username" value="<?php echo $data->email_username ?>" class="form-control" placeholder="Email" required oninvalid="this.setCustomValidity('Email tidak boleh kosong!')" oninput="setCustomValidity('')">
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Role / Hak Akses</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                            <select class="form-control" id="demo-chosen-select-role-code<?php echo $i ?>" name="role_id" required>
                                <?php if ($data->role_id == 1) { ?>
                                    <option selected value="1">Administrator Mabes</option>
                                    <option value="2">Admin Kodam</option>
                                    <option value="3">Admin Ajenrem</option>
                                <?php } else if ($data->role_id == 2) { ?>
                                    <option selected value="2">Admin Kodam</option>
                                    <option value="1">Administrator Mabes</option>
                                    <option value="3">Admin Ajenrem</option>
                                <?php } else if ($data->role_id == 3) { ?>
                                    <option selected value="3">Admin Ajenrem</option>
                                    <option value="1">Administrator Mabes</option>
                                    <option value="2">Admin Kodam</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Status</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-check"></i></span>
                            <select class="form-control" id="demo-chosen-select-active-code<?php echo $i ?>" name="active" required>
                                <?php if ($data->active == 1) { ?>
                                    <option selected value="1">Aktif</option>
                                    <option value="0">Non-Aktif</option>
                                <?php } else { ?>
                                    <option selected value="0">Non-Aktif</option>
                                    <option value="1">Aktif</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Foto Profile</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="ti-image"></i></span>
                            <span class="pull-left btn btn-mint btn-file">
                                Browse... <input type="file" name="images" id="imgInp-code<?php echo $i ?>" />
                            </span>
                        </div>
                        <img class="img-responsive" id='img-upload-code<?php echo $i ?>' alt="Profile Picture">
                        <hr>
                        <p>File Sebelumnya : <?php echo $data->foto_admin ?></p>
                        <input type="hidden" name="nm_images_lama" value="<?php echo $data->foto_admin ?>">
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

    <!--jQuery [ REQUIRED ]-->
    <script src="<?php echo base_url('assets/templatenifty/') ?>js/jquery.min.js"></script>
    <!--Chosen [ OPTIONAL ]-->
    <script src="<?php echo base_url('assets/templatenifty/') ?>plugins/chosen/chosen.jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#demo-chosen-select-role-code<?php echo $i ?>').chosen({
                width: '100%'
            });
            $('#demo-chosen-select-active-code<?php echo $i ?>').chosen({
                width: '100%'
            });
        })
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('change', '.btn-file :file', function() {
                var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#img-upload-code<?php echo $i ?>').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp-code<?php echo $i ?>").change(function() {
                readURL(this);
            });
        });
    </script>
    <!--===================================================-->
    <!-- End Bootstrap Modal Edit Data-->

    <!--Bootstrap Modal Hapus-->
    <!--===================================================-->
    <?php echo form_open_multipart('user_management/hapus'); ?>
    <div id="modal-hapus-<?php echo $data->id_admin ?>" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" id="mySmallModalLabel">Hapus Data</h4>
                </div>

                <!-- Id Data -->
                <input type="hidden" name="query_id" value="<?php echo $data->id_admin ?>">

                <div class="modal-body">
                    <p>Anda Yakin Akan Menghapus Data Akun <b><?php echo $data->nama_admin ?></b>? </p><br> Note : Semua Data Terkait Akan Di Hapus Dan User Terkait Sudah Tidak Bisa Masuk Aplikasi.

                    <code>Coba Cek Kembali!, Data Yang Sudah Di Hapus Tidak Bisa Kembali!</code>
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button"><i class="fa fa-times"></i> Batal</button>
                    <button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
    <!--===================================================-->
    <!--End Bootstrap Hapus-->


    <!-- Modal Ubah Password-->
    <!--===================================================-->
    <?php echo form_open_multipart('user_management/password'); ?>
    <div class="modal fade" id="modal-password-<?php echo $data->id_admin ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Ubah Password - <?php echo $data->email_username ?></h4>
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
                            <input type="text" name="password1" class="form-control" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Konfirmasi Password Baru</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="text" name="password2" class="form-control" placeholder="Konfirmasi Password">
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
    <!--===================================================-->
    <!-- End Bootstrap Modal Ubah Password-->


<?php $i++;
} ?>



<!-- Modal Tambah Data-->
<!--===================================================-->
<?php echo form_open_multipart('user_management/tambah'); ?>
<div class="modal fade" id="modal-tambah" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Tambah Data - User Management</h4>
            </div>

            <!--Modal body-->
            <div class="modal-body">

                <p>Masukkan Data User Baru dan Simpan. <code>Input Data Dengan Benar!</code></p><br>

                <div class="form-group col-12">
                    <label>Nama Lengkap</label>
                    <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" name="nama_admin" class="form-control" placeholder="Nama Lengkap" required oninvalid="this.setCustomValidity('Nama Lengkap tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                </div>

                <div class="form-group col-12">
                    <label>Email</label>
                    <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="fa fa-at"></i></span>
                        <input type="email" name="email_username" class="form-control" placeholder="Email" required oninvalid="this.setCustomValidity('Email tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                </div>

                <div class="form-group col-12">
                    <label>Password</label>
                    <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="text" name="password" class="form-control" placeholder="Password" required oninvalid="this.setCustomValidity('Password tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                </div>

                <div class="form-group col-12">
                    <label>Role / Hak Akses</label>
                    <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                        <select class="form-control" id="demo-chosen-select" name="role_id" required>
                            <option value="">--- Pilih Role / Hak Akses ---</option>
                            <option value="1">Administrator Mabes</option>
                            <option value="2">Admin Kodam</option>
                            <option value="3">Admin Ajenrem</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-12">
                    <label>Status</label>
                    <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                        <select class="form-control" id="demo-chosen-select-2" name="active" required>
                            <option value="">--- Pilih Status ---</option>
                            <option value="1">Aktif</option>
                            <option value="0">Non-Aktif</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-12">
                    <label>Foto Profile</label>
                    <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="ti-image"></i></span>
                        <span class="pull-left btn btn-mint btn-file">
                            Browse... <input type="file" name="images" id="imgInp" />
                        </span>
                    </div>
                    <img class="img-responsive" id='img-upload' alt="Profile Picture">
                </div>

            </div>

            <!--Modal footer-->
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button"><i class="fa fa-times"></i> Batal</button>
                <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
<!--===================================================-->
<!-- End Bootstrap Modal Tambah Data-->


<script src="<?php echo base_url('assets/templatenifty/') ?>plugins/izitoast/iziToast.min.js"></script>
<script>
    <?= $this->session->flashdata('notifikasi'); ?>

    function tambah_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Profile Berhasil Di Tambah',
            position: 'topCenter'
        });
    };

    function edit_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Profile Berhasil Di Ubah',
            position: 'topCenter'
        });
    };

    function hapus_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Profile Berhasil Di Hapus',
            position: 'topCenter'
        });
    };

    function password_alert_failed() {
        iziToast.error({
            title: 'Gagal!',
            message: 'Percobaan Ubah Password Gagal. Masukkan Data Yang Sama!',
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