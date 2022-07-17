<div id="page-head">
    <div class="pad-all text-center">
        <h3>Selamat datang di aplikasi <?= $website['nama_website']; ?></h3>
        <p1>Sistem Informasi Penerimaan Anggota Prajurit Baru TNI-AD Terpadu Online</p>
    </div>
</div>

<!--Page content-->
<!--===================================================-->
<div id="page-content">

    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-success panel-colorful media middle pad-all">
                <div class="media-left">
                    <div class="pad-hor">
                        <i class="ti-layout-media-center-alt icon-3x"></i>
                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold"><?php echo $jmlKodam ?></p>
                    <p class="mar-no">Kodam</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-info panel-colorful media middle pad-all">
                <div class="media-left">
                    <div class="pad-hor">
                        <i class="ti-layout-list-thumb icon-3x"></i>
                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold"><?php echo $jmlKorem ?></p>
                    <p class="mar-no">Korem</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-mint panel-colorful media middle pad-all">
                <div class="media-left">
                    <div class="pad-hor">
                        <i class="ti-layout-grid2 icon-3x"></i>
                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold"><?php echo $jmlKodim ?></p>
                    <p class="mar-no">Kodim</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-dark panel-colorful media middle pad-all">
                <div class="media-left">
                    <div class="pad-hor">
                        <i class="ti-layout-grid3 icon-3x"></i>
                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold"><?php echo $jmlKoramil ?></p>
                    <p class="mar-no">Koramil</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-primary panel-colorful media middle pad-all">
                <div class="media-left">
                    <div class="pad-hor">
                        <i class="ti-user icon-3x"></i>
                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold">1000</p>
                    <p class="mar-no">Calon Siswa Masuk</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-warning panel-colorful media middle pad-all">
                <div class="media-left">
                    <div class="pad-hor">
                        <i class="ti-check-box icon-3x"></i>
                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold">800</p>
                    <p class="mar-no">Calon Siswa Terverifikasi</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-danger panel-colorful media middle pad-all">
                <div class="media-left">
                    <div class="pad-hor">
                        <i class="ti-close icon-3x"></i>
                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold">200</p>
                    <p class="mar-no">Calon Siswa Belum Terverifikasi</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-pink panel-colorful media middle pad-all">
                <div class="media-left">
                    <div class="pad-hor">
                        <i class="ti-shine icon-3x"></i>
                    </div>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold">99</p>
                    <p class="mar-no">Calon Siswa Lulus</p>
                </div>
            </div>
        </div>
    </div>

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