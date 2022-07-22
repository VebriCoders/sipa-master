<div id="page-head">

    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow">Data Calon</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->


    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="demo-pli-home"></i></a></li>
        <li><a href="<?php echo base_url('data_calon') ?>">Master Data Aplikasi</a></li>
        <li class="active">Data Calon</li>
    </ol>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->

</div>

<!--Page content-->
<!--===================================================-->
<div id="page-content">

    <!-- Konten -->

</div>
<!--===================================================-->
<!--End page content-->



<script src="<?php echo base_url('assets/templatenifty/') ?>plugins/izitoast/iziToast.min.js"></script>

<script>
    <?= $this->session->flashdata('notifikasi'); ?>

    function welcome() {
        iziToast.info({
            title: 'Selamat Datang!',
            message: 'Di Aplikasi <?= $website['nama_website']; ?>',
            position: 'topCenter'
        });
    };
</script>