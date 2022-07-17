<div id="page-head">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow">Data Rekrutment</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->


    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="demo-pli-home"></i></a></li>
        <li class="active">Data Rekrutment</li>
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
            <button class="btn btn-success btn-labeled" data-toggle="modal" data-target="#modal-tambah"><i class=" btn-label fa fa-plus"></i> Tambah Data Rekrutment</button>
            <!-- <button class="btn btn-default"><i class="demo-pli-printer"></i></button> -->
        </div>
        <!-- <div class="col-sm-6 toolbar-right">
        </div> -->
    </div>
    <!---------------------------------->

    <br>


    <div class="row">

        <?php foreach ($tampilData->result() as $data) { ?>
            <div class="col-sm-4 col-md-3">
                <!-- Contact Widget -->
                <!---------------------------------->
                <div class="panel pos-rel">
                    <div class="widget-control text-right">
                        <div class="btn-group dropdown">
                            <a href="#" class="dropdown-toggle btn btn-trans" data-toggle="dropdown" aria-expanded="false"><i class="demo-psi-dot-vertical icon-lg"></i></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a data-toggle="modal" data-target="#modal-edit-<?php echo $data->slug ?>"><i class="icon-lg icon-fw demo-psi-pen-5"></i> Edit</a></li>
                                <li><a data-toggle="modal" data-target="#modal-hapus-<?php echo $data->slug ?>"><i class="icon-lg icon-fw demo-pli-recycling"></i> Hapus</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="pad-all">
                        <div class="media pad-ver">
                            <div class="media-left">
                                <?php if ($data->foto == "default.jpg") { ?>
                                    <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle mar-btm" src="<?php echo base_url('assets/img/default.jpg') ?>"></a>
                                <?php } else { ?>
                                    <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle mar-btm" src="<?php echo base_url('assets//upload/data_rekrutment/') ?><?php echo $data->foto ?>"></a>
                                <?php } ?>
                            </div>
                            <div class="media-body pad-top">
                                <a href="#" class="box-inline">
                                    <span class="text-lg text-semibold text-main"><?php echo $data->nama_rek ?> (<?php echo $data->tahun ?>)</span>
                                    <p class="text-sm"><?php echo $data->start ?> - <?php echo $data->end ?></p>
                                </a>
                            </div>
                        </div>
                        <p class="pad-btm bord-bt text-sm text-center" style="color:red"><?php echo $data->slug ?></p>
                        <div class="text-center pad-to">
                            <div class="btn-group">
                                <button class="btn btn-sm btn-default btn-labeled" data-toggle="modal" data-target="#modal-pengumuman-<?php echo $data->slug ?>"><i class="btn-label fa fa-bullhorn"></i> Pengumuman</button>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-sm btn-default btn-labeled" data-toggle="modal" data-target="#modal-persyaratan-<?php echo $data->slug ?>"><i class="btn-label fa fa-star-half-full"></i> Persyaratan</button>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-sm btn-default btn-labeled" data-toggle="modal" data-target="#modal-lokasi-<?php echo $data->slug ?>"><i class="btn-label fa fa-location-arrow"></i> Lokasi</button>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-sm btn-default btn-labeled" data-toggle="modal" data-target="#modal-jadwal-<?php echo $data->slug ?>"><i class="btn-label fa fa-list-alt"></i> Jadwal</button>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-sm btn-default btn-labeled" data-toggle="modal" data-target="#modal-materi-<?php echo $data->slug ?>"><i class="btn-label fa fa-list-ol"></i> Materi Seleksi</button>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-sm btn-default btn-labeled" data-toggle="modal" data-target="#modal-panduan-<?php echo $data->slug ?>"><i class="btn-label fa fa-pencil-square-o"></i> Panduan</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!---------------------------------->
            </div>
        <?php } ?>

    </div>


</div>
<!--===================================================-->
<!--End page content-->

<?php foreach ($tampilData->result() as $data) { ?>

    <!-- Modal Edit Data -->
    <!--===================================================-->
    <?php echo form_open_multipart('data_rekrutment/edit'); ?>
    <div class="modal fade" id="modal-edit-<?php echo $data->slug ?>" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Edit Data Rekrutment - <?php echo $data->nama_rek ?></h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">

                    <p>Masukkan Data Rekrutment Baru dan Simpan Jika Ada Perubahan. <code>Input Data Dengan Benar!</code></p><br>

                    <!-- Id Data -->
                    <input type="hidden" name="query_id" value="<?php echo $data->id ?>">

                    <div class="form-group col-12">
                        <label>Nama Rekrutment</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                            <input type="text" name="nama_rek" value="<?php echo $data->nama_rek ?>" class="form-control" placeholder="Nama Rekrutment" required oninvalid="this.setCustomValidity('Nama Rekrutment tidak boleh kosong!')" oninput="setCustomValidity('')">
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Tahun Rekrutment</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="number" name="tahun" value="<?php echo $data->tahun ?>" class="form-control" placeholder="Tahun Rekrutment ('Contoh : 2022')" required oninvalid="this.setCustomValidity('Tahun Rekrutment tidak boleh kosong!')" oninput="setCustomValidity('')">
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Url (SLUG) Rekrutment</label>
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-link"></i></span>
                            <input type="text" name="slug" value="<?php echo $data->slug ?>" class="form-control" placeholder="Url (SLUG) Rekrutment ('Contoh : caba-ad-ahli-2022')" required oninvalid="this.setCustomValidity('Url (SLUG) Rekrutment tidak boleh kosong!')" oninput="setCustomValidity('')">
                        </div>
                    </div>

                    <div class="form-group col-12">
                        <label>Waktu Rekrutment</label>
                        <!--Bootstrap Datepicker : Range-->
                        <!--===================================================-->
                        <div id="demo-dp-range">
                            <div class="input-daterange input-group" id="datepicker">
                                <input type="text" class="form-control" name="start" value="<?php echo $data->start ?>" placeholder="Awal daftar" required oninvalid="this.setCustomValidity('Awal daftar tidak boleh kosong!')" oninput="setCustomValidity('')" />
                                <span class="input-group-addon">Sampai</span>
                                <input type="text" class="form-control" name="end" value="<?php echo $data->end ?>" placeholder="Akhir daftar" required oninvalid="this.setCustomValidity('Akhir daftar tidak boleh kosong!')" oninput="setCustomValidity('')" />
                            </div>
                        </div>
                        <!--===================================================-->
                    </div>

                    <div class="form-group col-12">
                        <label>Foto Rekrutment</label>
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
                    <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Perubahan</button>
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
    <?php echo form_open_multipart('data_rekrutment/hapus'); ?>
    <div id="modal-hapus-<?php echo $data->slug ?>" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" id="mySmallModalLabel">Hapus Data!</h4>
                </div>

                <!-- Id Data -->
                <input type="hidden" name="query_id" value="<?php echo $data->id ?>">

                <div class="modal-body">
                    <p>Anda Yakin Akan Menghapus Data Rekrutment <b><?php echo $data->nama_rek ?></b>? </p><br> Note : Semua Data Terkait Akan Di Hapus.

                    <code>Coba Cek Kembali!, Data Yang Sudah Di Hapus Tidak Bisa Kembali!</code>
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button"><i class="fa fa-times"></i> Batal</button>
                    <button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus Data Rekrutment</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
    <!--===================================================-->
    <!--End Bootstrap Hapus-->

<?php } ?>


<!-- Modal Tambah Data -->
<!--===================================================-->
<?php echo form_open_multipart('data_rekrutment/tambah'); ?>
<div class="modal fade" id="modal-tambah" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Tambah Data Rekrutment</h4>
            </div>

            <!--Modal body-->
            <div class="modal-body">

                <p>Masukkan Data Rekrutment Baru dan Simpan. <code>Input Data Dengan Benar!</code></p><br>

                <div class="form-group col-12">
                    <label>Nama Rekrutment</label>
                    <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                        <input type="text" name="nama_rek" class="form-control" placeholder="Nama Rekrutment" required oninvalid="this.setCustomValidity('Nama Rekrutment tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                </div>

                <div class="form-group col-12">
                    <label>Tahun Rekrutment</label>
                    <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="number" name="tahun" class="form-control" placeholder="Tahun Rekrutment ('Contoh : 2022')" required oninvalid="this.setCustomValidity('Tahun Rekrutment tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                </div>

                <div class="form-group col-12">
                    <label>Url (SLUG) Rekrutment</label>
                    <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="fa fa-link"></i></span>
                        <input type="text" name="slug" class="form-control" placeholder="Url (SLUG) Rekrutment ('Contoh : caba-ad-ahli-2022')" required oninvalid="this.setCustomValidity('Url (SLUG) Rekrutment tidak boleh kosong!')" oninput="setCustomValidity('')">
                    </div>
                </div>

                <div class="form-group col-12">
                    <label>Waktu Rekrutment</label>
                    <!--Bootstrap Datepicker : Range-->
                    <!--===================================================-->
                    <div id="demo-dp-range">
                        <div class="input-daterange input-group" id="datepicker">
                            <input type="text" class="form-control" name="start" placeholder="Awal daftar" required oninvalid="this.setCustomValidity('Awal daftar tidak boleh kosong!')" oninput="setCustomValidity('')" />
                            <span class="input-group-addon">Sampai</span>
                            <input type="text" class="form-control" name="end" placeholder="Akhir daftar" required oninvalid="this.setCustomValidity('Akhir daftar tidak boleh kosong!')" oninput="setCustomValidity('')" />
                        </div>
                    </div>
                    <!--===================================================-->
                </div>

                <div class="form-group col-12">
                    <label>Foto Rekrutment</label>
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
                <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Data Rekrutment</button>
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
            message: 'Data Rekrutment Berhasil Di Tambah',
            position: 'topCenter'
        });
    };

    function edit_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Rekrutment Berhasil Di Ubah',
            position: 'topCenter'
        });
    };

    function hapus_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Rekrutment Berhasil Di Hapus',
            position: 'topCenter'
        });
    };

    function pengumuman_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Pengumuman Berhasil Di Simpan',
            position: 'topCenter'
        });
    };

    function persyaratan_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Persyaratan Berhasil Di Simpan',
            position: 'topCenter'
        });
    };

    function lokasi_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Lokasi Berhasil Di Simpan',
            position: 'topCenter'
        });
    };

    function jadwal_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Jadwal Berhasil Di Simpan',
            position: 'topCenter'
        });
    };

    function materi_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Materi Seleksi Berhasil Di Simpan',
            position: 'topCenter'
        });
    };

    function panduan_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Panduan Berhasil Di Simpan',
            position: 'topCenter'
        });
    };
</script>


<?php foreach ($tampilData->result() as $data) { ?>

    <!-- Modal Pengumuman -->
    <!--===================================================-->
    <?php echo form_open_multipart('data_rekrutment/pengumuman'); ?>
    <div id="modal-pengumuman-<?php echo $data->slug ?>" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" id="myLargeModalLabel">Pengumuman Rekrutment - <?php echo $data->nama_rek ?></h4>
                </div>

                <div class="modal-body">

                    <p>Masukkan Data Pengumuman Rekrutment - <?php echo $data->nama_rek ?>. <code>Input Data Dengan Benar!</code></p><br>

                    <!-- Id Data -->
                    <input type="hidden" name="query_id" value="<?php echo $data->id ?>">

                    <div class="form-group col-12">
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-bullhorn"></i></span>
                            <textarea name="isi_pengumuman" placeholder="Message" rows="13" class="form-control"><?php echo $data->isipengumuman ?></textarea>
                        </div>
                    </div>

                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button"><i class="fa fa-times"></i> Batal</button>
                    <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Pengumuman</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
    <!--===================================================-->
    <!--End Modal Pengumuman-->

<?php } ?>


<?php foreach ($tampilData->result() as $data) { ?>

    <!-- Modal Persyaratan -->
    <!--===================================================-->
    <?php echo form_open_multipart('data_rekrutment/persyaratan'); ?>
    <div id="modal-persyaratan-<?php echo $data->slug ?>" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" id="myLargeModalLabel">Persyaratan Rekrutment - <?php echo $data->nama_rek ?></h4>
                </div>

                <div class="modal-body">

                    <p>Masukkan Data Persyaratan Rekrutment - <?php echo $data->nama_rek ?>. <code>Input Data Dengan Benar!</code></p><br>

                    <!-- Id Data -->
                    <input type="hidden" name="query_id" value="<?php echo $data->id ?>">

                    <div class="form-group col-12">
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-star-half-full"></i></span>
                            <textarea name="isi_persyaratan" placeholder="Message" rows="13" class="form-control"><?php echo $data->isipersyaratan ?></textarea>
                        </div>
                    </div>

                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button"><i class="fa fa-times"></i> Batal</button>
                    <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Persyaratan</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
    <!--===================================================-->
    <!--End Modal Persyaratan-->

<?php } ?>

<?php foreach ($tampilData->result() as $data) { ?>

    <!-- Modal Lokasi -->
    <!--===================================================-->
    <?php echo form_open_multipart('data_rekrutment/lokasi'); ?>
    <div id="modal-lokasi-<?php echo $data->slug ?>" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" id="myLargeModalLabel">Lokasi Rekrutment - <?php echo $data->nama_rek ?></h4>
                </div>

                <div class="modal-body">

                    <p>Masukkan Data Lokasi Rekrutment - <?php echo $data->nama_rek ?>. <code>Input Data Dengan Benar!</code></p><br>

                    <!-- Id Data -->
                    <input type="hidden" name="query_id" value="<?php echo $data->id ?>">

                    <div class="form-group col-12">
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                            <textarea name="isi_lokasi" placeholder="Message" rows="13" class="form-control"><?php echo $data->isilokasi ?></textarea>
                        </div>
                    </div>

                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button"><i class="fa fa-times"></i> Batal</button>
                    <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Lokasi</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
    <!--===================================================-->
    <!--End Modal Lokasi-->

<?php } ?>

<?php foreach ($tampilData->result() as $data) { ?>

    <!-- Modal Jadwal -->
    <!--===================================================-->
    <?php echo form_open_multipart('data_rekrutment/jadwal'); ?>
    <div id="modal-jadwal-<?php echo $data->slug ?>" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" id="myLargeModalLabel">Jadwal Rekrutment - <?php echo $data->nama_rek ?></h4>
                </div>

                <div class="modal-body">

                    <p>Masukkan Data Jadwal Rekrutment - <?php echo $data->nama_rek ?>. <code>Input Data Dengan Benar!</code></p><br>

                    <!-- Id Data -->
                    <input type="hidden" name="query_id" value="<?php echo $data->id ?>">

                    <div class="form-group col-12">
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-list-alt"></i></span>
                            <textarea name="isi_jadwal" placeholder="Message" rows="13" class="form-control"><?php echo $data->isijadwal ?></textarea>
                        </div>
                    </div>

                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button"><i class="fa fa-times"></i> Batal</button>
                    <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Jadwal</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
    <!--===================================================-->
    <!--End Modal Jadwal-->

<?php } ?>

<?php foreach ($tampilData->result() as $data) { ?>

    <!-- Modal Materi Seleksi -->
    <!--===================================================-->
    <?php echo form_open_multipart('data_rekrutment/materi'); ?>
    <div id="modal-materi-<?php echo $data->slug ?>" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" id="myLargeModalLabel">Materi Seleksi Rekrutment - <?php echo $data->nama_rek ?></h4>
                </div>

                <div class="modal-body">

                    <p>Masukkan Data Materi Seleksi Rekrutment - <?php echo $data->nama_rek ?>. <code>Input Data Dengan Benar!</code></p><br>

                    <!-- Id Data -->
                    <input type="hidden" name="query_id" value="<?php echo $data->id ?>">

                    <div class="form-group col-12">
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-list-ol"></i></span>
                            <textarea name="isi_materi" placeholder="Message" rows="13" class="form-control"><?php echo $data->isimateri ?></textarea>
                        </div>
                    </div>

                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button"><i class="fa fa-times"></i> Batal</button>
                    <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Materi Seleksi</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
    <!--===================================================-->
    <!--End Modal Materi Seleksi-->

<?php } ?>

<?php foreach ($tampilData->result() as $data) { ?>

    <!-- Modal Panduan -->
    <!--===================================================-->
    <?php echo form_open_multipart('data_rekrutment/panduan'); ?>
    <div id="modal-panduan-<?php echo $data->slug ?>" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title" id="myLargeModalLabel">Panduan Rekrutment - <?php echo $data->nama_rek ?></h4>
                </div>

                <div class="modal-body">

                    <p>Masukkan Data Panduan Rekrutment - <?php echo $data->nama_rek ?>. <code>Input Data Dengan Benar!</code></p><br>

                    <!-- Id Data -->
                    <input type="hidden" name="query_id" value="<?php echo $data->id ?>">

                    <div class="form-group col-12">
                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                            <textarea name="isi_panduan" placeholder="Message" rows="13" class="form-control"><?php echo $data->isipanduan ?></textarea>
                        </div>
                    </div>

                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button"><i class="fa fa-times"></i> Batal</button>
                    <button class="btn btn-success"><i class="fa fa-save"></i> Simpan Panduan</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>
    <!--===================================================-->
    <!--End Modal Panduan-->

<?php } ?>