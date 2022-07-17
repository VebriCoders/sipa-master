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
        <li><a href="<?php echo base_url('data_instansi') ?>">Data Instansi</a></li>
        <li><?= $kodam['nama_kodam']; ?></li>
        <li class="active">Data Korem</li>
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
            <button class="btn btn-default" onclick="window.location.href='<?php echo base_url('data_instansi') ?>'"><i class="fa fa-angle-left"></i></button>
            <button class="btn btn-success btn-labeled" data-toggle="modal" data-target="#modal-tambah"><i class=" btn-label fa fa-plus"></i> Tambah Korem</button>
            <!-- <button class="btn btn-default"><i class="demo-pli-printer"></i></button> -->
        </div>
        <!-- <div class="col-sm-6 toolbar-right">
        </div> -->
    </div>
    <!---------------------------------->

    <br>

    <!-- Row selection (single row) -->
    <!--===================================================-->
    <div class="panel">

        <div class="panel-heading">
            <h3 class="panel-title">Data Korem - <?= $kodam['nama_kodam']; ?>
            </h3>
        </div>

        <div class="panel-body">
            <table id="tabel-basic-utama" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">
                            No.
                        </th>
                        <th>Foto</th>
                        <th>Nama Korem</th>
                        <th>Wilayah</th>
                        <th width=100>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($tampilDataKorem->result() as $data) { ?>
                        <tr>
                            <td class="text-center"><?php echo $i; ?></td>
                            <td>
                                <?php if ($data->foto == "default.jpg") { ?>
                                    <img class="img-lg img-circle add-tooltip" src="<?php echo base_url('assets/img/default.jpg') ?>" alt="Profile Picture" data-toggle="tooltip" data-original-title="<?php echo $data->nama_korem ?>">
                                <?php } else { ?>
                                    <img class="img-lg img-circle add-tooltip" src="<?php echo base_url('assets/upload/data_instansi/korem/') ?><?php echo $data->foto ?>" alt="Profile Picture" data-toggle="tooltip" data-original-title="<?php echo $data->nama_korem ?>">
                                <?php } ?>
                            </td>
                            <td><?php echo $data->nama_korem ?></td>
                            <td><?php echo $data->wilayah ?></td>
                            <td>
                                <button class="btn btn-warning btn-icon" data-toggle="modal" data-target="#modal-edit-<?php echo $data->id ?>"><i class="fa fa-edit icon-lg"></i></button>
                                <button class="btn btn-danger btn-icon" data-toggle="modal" data-target="#modal-hapus-<?php echo $data->id ?>"><i class="fa fa-trash icon-lg"></i></button>

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
foreach ($tampilDataKorem->result() as $data) { ?>

    <!-- Modal Edit Data -->
    <!--===================================================-->
    <?php echo form_open_multipart('data_instansi/edit_korem'); ?>
    <div class="modal fade" id="modal-edit-<?php echo $data->id ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Edit Data Korem - <?php echo $data->nama_korem ?> - <?= $kodam['nama_kodam']; ?></h4>
                </div>

                <!-- Data Kodam -->
                <input type="hidden" name="id_kodam" value="<?= $kodam['id']; ?>">
                <input type="hidden" name="jml_korem" value="<?= $kodam['jml_korem']; ?>">

                <!--Modal body-->
                <div class="modal-body">

                    <p>Masukkan Data Baru Korem dan Simpan Jika Ada Perubahan. <code>Input Data Dengan Benar!</code></p><br>

                    <!-- Id Data -->
                    <input type="hidden" name="query_id" value="<?php echo $data->id ?>">

                    <div class="form-group col-12">
                        <label>Nama Kodam</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                            <input type="text" value="<?= $kodam['nama_kodam']; ?>" class="form-control" placeholder="Nama Kodam" readonly required>
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Nama Korem</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-building"></i></span>
                            <input type="text" name="nama_korem" value="<?php echo $data->nama_korem ?>" class="form-control" placeholder="Nama Korem" required oninvalid="this.setCustomValidity('Nama Korem tidak boleh kosong!')" oninput="setCustomValidity('')">
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Wilayah Korem</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                            <input type="text" name="wilayah" value="<?php echo $data->wilayah ?>" class="form-control" placeholder="Wilayah Korem ('Contoh : Kab.Malang')" required oninvalid="this.setCustomValidity('Wilayah Korem tidak boleh kosong!')" oninput="setCustomValidity('')">
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Foto Korem</label>
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
    <?php echo form_open_multipart('data_instansi/hapus_korem'); ?>
    <div id="modal-hapus-<?php echo $data->id ?>" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" id="mySmallModalLabel">Hapus Data Korem!</h4>
                </div>

                <!-- Id Data -->
                <input type="hidden" name="query_id" value="<?php echo $data->id ?>">

                <!-- Data Kodam -->
                <input type="hidden" name="id_kodam" value="<?= $kodam['id']; ?>">
                <input type="hidden" name="jml_korem" value="<?= $kodam['jml_korem']; ?>">

                <div class="modal-body">
                    <p>Anda Yakin Akan Menghapus Data Korem <b><?php echo $data->nama_korem ?> - <?= $kodam['nama_kodam']; ?></b>? </p><br> Note : Semua Data Terkait Akan Di Hapus.

                    <code>Coba Cek Kembali!, Data Yang Sudah Di Hapus Tidak Bisa Kembali!</code>
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button"><i class="fa fa-times"></i> Batal</button>
                    <button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus Data Korem</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
    <!--===================================================-->
    <!--End Bootstrap Hapus-->

<?php $i++;
} ?>


<!-- Modal Tambah Data -->
<!--===================================================-->
<?php echo form_open_multipart('data_instansi/tambah_korem'); ?>
<div class="modal fade" id="modal-tambah" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Tambah Data Korem - <?= $kodam['nama_kodam']; ?></h4>
            </div>

            <!-- Data Kodam -->
            <input type="hidden" name="id_kodam" value="<?= $kodam['id']; ?>">
            <input type="hidden" name="jml_korem" value="<?= $kodam['jml_korem']; ?>">

            <!--Modal body-->
            <div class="modal-body">

                <p>Masukkan Data Korem Baru dan Simpan. <code>Input Data Dengan Benar!</code></p><br>

                <div class="form-group col-12">
                    <label>Nama Kodam</label>
                    <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                        <input type="text" value="<?= $kodam['nama_kodam']; ?>" class="form-control" placeholder="Nama Kodam" readonly required>
                    </div>
                </div>

                <div class="form-group col-12">
                    <label>Nama Korem</label>
                    <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
                        <input type="text" name="nama_korem" class="form-control" placeholder="Nama Korem" required oninvalid="this.setCustomValidity('Nama Korem tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                </div>

                <div class="form-group col-12">
                    <label>Wilayah Korem</label>
                    <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                        <input type="text" name="wilayah" class="form-control" placeholder="Wilayah Korem ('Contoh : Kab.Malang')" required oninvalid="this.setCustomValidity('Wilayah Korem tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                </div>

                <div class="form-group col-12">
                    <label>Foto Korem</label>
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
                <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Data Korem</button>
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
            message: 'Data Korem Berhasil Di Tambah',
            position: 'topCenter'
        });
    };

    function edit_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Korem Berhasil Di Ubah',
            position: 'topCenter'
        });
    };

    function hapus_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Korem Berhasil Di Hapus',
            position: 'topCenter'
        });
    };
</script>