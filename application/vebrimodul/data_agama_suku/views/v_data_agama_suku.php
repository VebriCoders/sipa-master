<div id="page-head">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow">Data Agama & Suku</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->


    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="demo-pli-home"></i></a></li>
        <li><a href="<?php echo base_url('data_agama_suku') ?>">Master Data Aplikasi</a></li>
        <li class="active">Data Agama & Suku</li>
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
            <button class="btn btn-success btn-labeled" data-toggle="modal" data-target="#modal-tambah-agama"><i class=" btn-label fa fa-plus"></i> Tambah Data Agama</button>
            <button class="btn btn-success btn-labeled" data-toggle="modal" data-target="#modal-tambah-suku"><i class=" btn-label fa fa-plus"></i> Tambah Data Suku</button>
            <!-- <button class="btn btn-default"><i class="demo-pli-printer"></i></button> -->
        </div>
        <!-- <div class="col-sm-6 toolbar-right">
        </div> -->
    </div>
    <!---------------------------------->

    <br>


    <div class="row">
        <div class="col-md-6">
            <!-- Data Agama Tables -->
            <!--===================================================-->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Data Agama</h3>
                </div>
                <div class="panel-body">
                    <table id="tabel-basic-utama" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    No.
                                </th>
                                <th>Agama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($tampilData_Agama->result() as $data_agama) { ?>
                                <tr>
                                    <td class="text-center min-desktop"><?php echo $i; ?></td>
                                    <td class="min-desktop"><?php echo $data_agama->nama_agama ?></td>
                                    <td>
                                        <button class="btn btn-warning btn-icon" data-toggle="modal" data-target="#modal-edit-agama-<?php echo $data_agama->id_agama ?>"><i class="fa fa-edit icon-lg"></i></button>
                                        <button class="btn btn-danger btn-icon" data-toggle="modal" data-target="#modal-hapus-agama-<?php echo $data_agama->id_agama ?>"><i class="fa fa-trash icon-lg"></i></button>
                                    </td>
                                </tr>
                            <?php $i++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--===================================================-->
            <!-- End Data Agama Table -->
        </div>

        <div class="col-md-6">
            <!-- Data Suku Tables -->
            <!--===================================================-->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Data Suku</h3>
                </div>
                <div class="panel-body">
                    <table id="tabel-basic-utama-2" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    No.
                                </th>
                                <th>Suku</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($tampilData_Suku->result() as $data_suku) { ?>
                                <tr>
                                    <td class="text-center min-desktop"><?php echo $i; ?></td>
                                    <td class="min-desktop"><?php echo $data_suku->nama_suku ?></td>
                                    <td>
                                        <button class="btn btn-warning btn-icon" data-toggle="modal" data-target="#modal-edit-suku-<?php echo $data_suku->id_suku ?>"><i class="fa fa-edit icon-lg"></i></button>
                                        <button class="btn btn-danger btn-icon" data-toggle="modal" data-target="#modal-hapus-suku-<?php echo $data_suku->id_suku ?>"><i class="fa fa-trash icon-lg"></i></button>
                                    </td>
                                </tr>
                            <?php $i++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--===================================================-->
            <!-- End Data Suku Table -->
        </div>
    </div>

</div>
<!--===================================================-->
<!--End page content-->

<?php
foreach ($tampilData_Agama->result() as $data_agama) { ?>

    <!-- Modal Edit Data Agama-->
    <!--===================================================-->
    <?php echo form_open_multipart('data_agama_suku/edit_agama'); ?>
    <div class="modal fade" id="modal-edit-agama-<?php echo $data_agama->id_agama ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Edit Data Agama</h4>
                </div>

                <!-- Id Data -->
                <input type="hidden" name="query_id" value="<?php echo $data_agama->id_agama ?>">

                <!--Modal body-->
                <div class="modal-body">

                    <p>Masukkan Perubahan Data Agama Baru dan Simpan. <code>Input Data Dengan Benar!</code></p><br>

                    <div class="form-group col-12">
                        <label>Nama Agama</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-child"></i></span>
                            <input type="text" name="nama_agama" value="<?php echo $data_agama->nama_agama ?>" class="form-control" placeholder="Nama Agama" required oninvalid="this.setCustomValidity('Nama Agama tidak boleh kosong!')" oninput="setCustomValidity('')">
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
    <!-- End Bootstrap Modal Edit Data Agama-->

    <!--Bootstrap Modal Hapus Agama-->
    <!--===================================================-->
    <?php echo form_open_multipart('data_agama_suku/hapus_agama'); ?>
    <div id="modal-hapus-agama-<?php echo $data_agama->id_agama ?>" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" id="mySmallModalLabel">Hapus Data Agama</h4>
                </div>

                <!-- Id Data -->
                <input type="hidden" name="query_id" value="<?php echo $data_agama->id_agama ?>">

                <div class="modal-body">
                    <p>Anda Yakin Akan Menghapus Data Agama <b><?php echo $data_agama->nama_agama ?></b>? </p>
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
    <!--End Bootstrap Hapus Agama-->

<?php } ?>

<!-- Modal Tambah Data Agama-->
<!--===================================================-->
<?php echo form_open_multipart('data_agama_suku/tambah_agama'); ?>
<div class="modal fade" id="modal-tambah-agama" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Tambah Data Agama</h4>
            </div>

            <!--Modal body-->
            <div class="modal-body">

                <p>Masukkan Data Agama Baru dan Simpan. <code>Input Data Dengan Benar!</code></p><br>

                <div class="form-group col-12">
                    <label>Nama Agama</label>
                    <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="fa fa-child"></i></span>
                        <input type="text" name="nama_agama" class="form-control" placeholder="Nama Agama" required oninvalid="this.setCustomValidity('Nama Agama tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                </div>

            </div>

            <!--Modal footer-->
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button"><i class="fa fa-times"></i> Batal</button>
                <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Data Agama</button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
<!--===================================================-->
<!-- End Bootstrap Modal Tambah Data Agama-->

<script src="<?php echo base_url('assets/templatenifty/') ?>plugins/izitoast/iziToast.min.js"></script>
<script>
    <?= $this->session->flashdata('notifikasi'); ?>

    function tambah_agama_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Agama Berhasil Di Tambah',
            position: 'topCenter'
        });
    };

    function edit_agama_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Agama Berhasil Di Ubah',
            position: 'topCenter'
        });
    };

    function hapus_agama_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Agama Berhasil Di Hapus',
            position: 'topCenter'
        });
    };
</script>

<!-- ------------------------------- -->
<!-- BATAS MASTER DATA -->
<!-- ------------------------------- -->

<?php
foreach ($tampilData_Suku->result() as $data_suku) { ?>

    <!-- Modal Edit Data Suku-->
    <!--===================================================-->
    <?php echo form_open_multipart('data_agama_suku/edit_suku'); ?>
    <div class="modal fade" id="modal-edit-suku-<?php echo $data_suku->id_suku ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Edit Data Suku</h4>
                </div>

                <!-- Id Data -->
                <input type="hidden" name="query_id" value="<?php echo $data_suku->id_suku ?>">

                <!--Modal body-->
                <div class="modal-body">

                    <p>Masukkan Perubahan Data Suku Baru dan Simpan. <code>Input Data Dengan Benar!</code></p><br>

                    <div class="form-group col-12">
                        <label>Nama Suku</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-child"></i></span>
                            <input type="text" name="nama_suku" value="<?php echo $data_suku->nama_suku ?>" class="form-control" placeholder="Nama Suku" required oninvalid="this.setCustomValidity('Nama Suku tidak boleh kosong!')" oninput="setCustomValidity('')">
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
    <!-- End Bootstrap Modal Edit Data Suku-->

    <!--Bootstrap Modal Hapus Suku-->
    <!--===================================================-->
    <?php echo form_open_multipart('data_agama_suku/hapus_suku'); ?>
    <div id="modal-hapus-suku-<?php echo $data_suku->id_suku ?>" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" id="mySmallModalLabel">Hapus Data Suku</h4>
                </div>

                <!-- Id Data -->
                <input type="hidden" name="query_id" value="<?php echo $data_suku->id_suku ?>">

                <div class="modal-body">
                    <p>Anda Yakin Akan Menghapus Data Suku <b><?php echo $data_suku->nama_suku ?></b>? </p>
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
    <!--End Bootstrap Hapus Suku-->

<?php } ?>

<!-- Modal Tambah Data Suku-->
<!--===================================================-->
<?php echo form_open_multipart('data_agama_suku/tambah_suku'); ?>
<div class="modal fade" id="modal-tambah-suku" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Tambah Data Suku</h4>
            </div>

            <!--Modal body-->
            <div class="modal-body">

                <p>Masukkan Data Suku Baru dan Simpan. <code>Input Data Dengan Benar!</code></p><br>

                <div class="form-group col-12">
                    <label>Nama Suku</label>
                    <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="fa fa-star-half-full"></i></span>
                        <input type="text" name="nama_suku" class="form-control" placeholder="Nama Suku" required oninvalid="this.setCustomValidity('Nama Suku tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                </div>

            </div>

            <!--Modal footer-->
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button"><i class="fa fa-times"></i> Batal</button>
                <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Data Suku</button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
<!--===================================================-->
<!-- End Bootstrap Modal Tambah Data Suku-->

<script src="<?php echo base_url('assets/templatenifty/') ?>plugins/izitoast/iziToast.min.js"></script>
<script>
    <?= $this->session->flashdata('notifikasi'); ?>

    function tambah_suku_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Suku Berhasil Di Tambah',
            position: 'topCenter'
        });
    };

    function edit_suku_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Suku Berhasil Di Ubah',
            position: 'topCenter'
        });
    };

    function hapus_suku_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Suku Berhasil Di Hapus',
            position: 'topCenter'
        });
    };
</script>