<div id="page-head">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow">Data Wilayah</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->


    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="demo-pli-home"></i></a></li>
        <li><a href="<?php echo base_url('data_wilayah') ?>">Master Data Aplikasi</a></li>
        <li class="active">Data Wilayah</li>
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
            <button class="btn btn-success btn-labeled" data-toggle="modal" data-target="#modal-tambah"><i class=" btn-label fa fa-plus"></i> Tambah Data Wilayah</button>
            <!-- <button class="btn btn-default"><i class="demo-pli-printer"></i></button> -->
        </div>
        <!-- <div class="col-sm-6 toolbar-right">
        </div> -->
    </div>
    <!---------------------------------->

    <br>


    <div class="row">
        <div class="col-md-12">

            <!-- Data Wilayah Tables -->
            <!--===================================================-->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Data Wilayah</h3>
                </div>
                <div class="panel-body">
                    <table id="tabel-basic-utama" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    No.
                                </th>
                                <th>Provinsi</th>
                                <th>Kabupaten</th>
                                <th>Kecamatan</th>
                                <th>Kelurahan</th>
                                <th>Kodepos</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($tampilData->result() as $data) { ?>
                                <tr>
                                    <td class="text-center min-desktop"><?php echo $i; ?></td>
                                    <td class="min-desktop"><?php echo $data->provinsi ?></td>
                                    <td class="min-desktop"><?php echo $data->kabupaten ?></td>
                                    <td class="min-desktop"><?php echo $data->kecamatan ?></td>
                                    <td class="min-desktop"><?php echo $data->kelurahan ?></td>
                                    <td class="min-desktop"><?php echo $data->kodepos ?></td>
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
            <!-- End Data Wilayah Table -->
        </div>
    </div>

</div>
<!--===================================================-->
<!--End page content-->

<script src="<?php echo base_url('assets/templatenifty/') ?>plugins/izitoast/iziToast.min.js"></script>
<script>
    <?= $this->session->flashdata('notifikasi'); ?>

    function tambah_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Wilayah Berhasil Di Tambah',
            position: 'topCenter'
        });
    };

    function edit_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Wilayah Berhasil Di Ubah',
            position: 'topCenter'
        });
    };

    function hapus_alert() {
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Wilayah Berhasil Di Hapus',
            position: 'topCenter'
        });
    };
</script>