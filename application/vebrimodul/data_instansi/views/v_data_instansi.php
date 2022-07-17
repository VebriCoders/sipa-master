<div id="page-head">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow">Data Instansi</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->


    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="demo-pli-home"></i></a></li>
        <li><a href="<?php echo base_url('data_instansi') ?>">Master Data Aplikasi</a></li>
        <li class="active">Data Instansi</li>
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
            <button class="btn btn-success btn-labeled" data-toggle="modal" data-target="#modal-tambah"><i class=" btn-label fa fa-plus"></i> Tambah Kodam</button>
            <button class="btn btn-default"><i class="demo-pli-printer"></i></button>
        </div>
        <!-- <div class="col-sm-6 toolbar-right">
        </div> -->
    </div>
    <!---------------------------------->

    <br>

    <div class="row">

        <?php foreach ($tampilData->result() as $data) { ?>
            <div class="col-sm-3">
                <!--Profile Widget-->
                <!--===================================================-->
                <div class="panel">
                    <div class="panel-body text-center">
                        <?php if ($data->foto == "default.jpg") { ?>
                            <img class="img-md img-circle mar-btm" src="<?php echo base_url('assets/img/default.jpg') ?>" alt="Profile Picture" data-toggle="tooltip" data-original-title="<?php echo $data->nama_kodam ?>">
                        <?php } else { ?>
                            <img class="img-md img-circle mar-btm" src="<?php echo base_url('assets//upload/data_instansi/') ?><?php echo $data->foto ?>" alt="Profile Picture" data-toggle="tooltip" data-original-title="<?php echo $data->nama_kodam ?>">
                        <?php } ?>
                        <p class="text-lg text-semibold mar-no text-main"><?php echo $data->nama_kodam ?></p>
                        <p class="text-muted"><?php echo $data->wilayah ?></p>
                        <ul class="list-unstyled text-center bord-top pad-top mar-no row">
                            <li class="col-xs-4">
                                <span class="text-lg text-semibold text-main"><?php echo $data->jml_korem ?></span>
                                <p class="text-muted mar-no"> <button class="btn btn-mint mar-ver" onclick="window.location.href='<?php echo base_url('data_instansi/korem/') ?><?php echo $data->id ?>'">Korem</button>
                                </p>
                            </li>
                            <li class="col-xs-4">
                                <span class="text-lg text-semibold text-main"><?php echo $data->jml_kodim ?></span>
                                <p class="text-muted mar-no"> <button class="btn btn-mint mar-ver" onclick="window.location.href='<?php echo base_url('data_instansi/kodim/') ?><?php echo $data->id ?>'">Kodim</button>
                                </p>
                            </li>
                            <li class="col-xs-4">
                                <span class="text-lg text-semibold text-main"><?php echo $data->jml_koramil ?></span>
                                <p class="text-muted mar-no"> <button class="btn btn-mint mar-ver" onclick="window.location.href='<?php echo base_url('data_instansi/koramil/') ?><?php echo $data->id ?>'">Koramil</button>
                                </p>
                            </li>
                        </ul>

                        <button class="btn btn-warning mar-ver" data-toggle="modal" data-target="#modal-edit-<?php echo $data->id ?>"><i class="fa fa-edit icon-fw"></i>Edit</button>
                        <button class="btn btn-danger mar-ver" data-toggle="modal" data-target="#modal-hapus-<?php echo $data->id ?>"><i class="fa fa-trash icon-fw"></i>Hapus</button>

                    </div>
                </div>
                <!--===================================================-->
            </div>
        <?php } ?>

    </div>

</div>
<!--===================================================-->
<!--End page content-->

<?php foreach ($tampilData->result() as $data) { ?>

    <!-- Modal Edit Data -->
    <!--===================================================-->
    <?php echo form_open_multipart('data_instansi/edit'); ?>
    <div class="modal fade" id="modal-edit-<?php echo $data->id ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Edit Data - <?php echo $data->nama_kodam ?></h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">

                    <p>Masukkan Data Baru Kodam dan Simpan Jika Ada Perubahan. <code>Input Data Dengan Benar!</code></p><br>

                    <!-- Id Data -->
                    <input type="hidden" name="query_id" value="<?php echo $data->id ?>">

                    <div class="form-group col-12">
                        <label>Nama Kodam</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                            <input type="text" name="nama_kodam" value="<?php echo $data->nama_kodam ?>" class="form-control" placeholder="Nama Kodam" required oninvalid="this.setCustomValidity('Nama Kodam tidak boleh kosong!')" oninput="setCustomValidity('')">
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Wilayah Kodam</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                            <input type="text" name="wilayah" value="<?php echo $data->wilayah ?>" class="form-control" placeholder="Wilayah Kodam ('Contoh : Jawa Timur')" required oninvalid="this.setCustomValidity('Wilayah Kodam tidak boleh kosong!')" oninput="setCustomValidity('')">
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Foto Kodam</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="ti-image"></i></span>
                            <span class="pull-left btn btn-mint btn-file">
                                Browse... <input type="file" name="images" id="imgInp-code<?php echo $data->id ?>" />
                            </span>
                        </div>
                        <img class="img-responsive" id='img-upload-code<?php echo $data->id ?>' alt="Profile Picture">
                        <hr>
                        <p>File Sebelumnya : <?php echo $data->foto ?></p>
                        <input type="hidden" name="nm_images_lama" value="<?php echo $data->foto ?>">
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
                        $('#img-upload-code<?php echo $data->id ?>').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp-code<?php echo $data->id ?>").change(function() {
                readURL(this);
            });
        });
    </script>

    <!--===================================================-->
    <!-- End Bootstrap Modal Edit Data -->

    <!--Bootstrap Modal Hapus-->
    <!--===================================================-->
    <?php echo form_open_multipart('data_instansi/hapus'); ?>
    <div id="modal-hapus-<?php echo $data->id ?>" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" id="mySmallModalLabel">Hapus Data!</h4>
                </div>

                <!-- Id Data -->
                <input type="hidden" name="query_id" value="<?php echo $data->id ?>">

                <div class="modal-body">
                    <p>Anda Yakin Akan Menghapus Data <b><?php echo $data->nama_kodam ?></b>? </p><br> Note : Semua Data Terkait Akan Di Hapus.

                    <code>Coba Cek Kembali!, Data Yang Sudah Di Hapus Tidak Bisa Kembali!</code>
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button"><i class="fa fa-times"></i> Batal</button>
                    <button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus Data Kodam</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
    <!--===================================================-->
    <!--End Bootstrap Hapus-->

<?php  } ?>

<!-- Modal Tambah Data -->
<!--===================================================-->
<?php echo form_open_multipart('data_instansi/tambah'); ?>
<div class="modal fade" id="modal-tambah" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Tambah Data Kodam</h4>
            </div>

            <!--Modal body-->
            <div class="modal-body">

                <p>Masukkan Data Kodam Baru dan Simpan. <code>Input Data Dengan Benar!</code></p><br>

                <div class="form-group col-12">
                    <label>Nama Kodam</label>
                    <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                        <input type="text" name="nama_kodam" class="form-control" placeholder="Nama Kodam" required oninvalid="this.setCustomValidity('Nama Kodam tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                </div>

                <div class="form-group col-12">
                    <label>Wilayah Kodam</label>
                    <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                        <input type="text" name="wilayah" class="form-control" placeholder="Wilayah Kodam ('Contoh : Jawa Timur')" required oninvalid="this.setCustomValidity('Wilayah Kodam tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                </div>

                <div class="form-group col-12">
                    <label>Foto Kodam</label>
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
                <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Data Kodam</button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
<!--===================================================-->
<!-- End Bootstrap Modal Tambah Data -->

<script src="<?php echo base_url('assets/templatenifty/') ?>plugins/izitoast/iziToast.min.js"></script>
<script>
    <?= $this->session->flashdata('notifikasi'); ?>

    function tambah_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Kodam Berhasil Di Tambah',
            position: 'topCenter'
        });
    };

    function edit_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Kodam Berhasil Di Ubah',
            position: 'topCenter'
        });
    };

    function hapus_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Kodam Berhasil Di Hapus',
            position: 'topCenter'
        });
    };
</script>