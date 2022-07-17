<header id="navbar">
    <div id="navbar-container" class="boxed">

        <!--Brand logo & name-->
        <!--================================-->
        <div class="navbar-header">
            <a href="<?php echo base_url() ?>" class="navbar-brand">
                <img src="<?php echo base_url('assets/img/') ?><?= $website['logo']; ?>" alt="Nifty Logo" class="brand-icon">
                <div class="brand-title">
                    <span class="brand-text"><?= $website['nama_website']; ?></span>
                </div>
            </a>
        </div>
        <!--================================-->
        <!--End brand logo & name-->


        <!--Navbar Dropdown-->
        <!--================================-->
        <div class="navbar-content">
            <ul class="nav navbar-top-links">

                <!--Navigation toogle button-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li class="tgl-menu-btn">
                    <a class="mainnav-toggle" href="#">
                        <i class="demo-pli-list-view"></i>
                    </a>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End Navigation toogle button-->

            </ul>
            <ul class="nav navbar-top-links">

                <!--Notification dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        <i class="demo-pli-bell"></i>
                        <span class="badge badge-header badge-danger"></span>
                    </a>


                    <!--Notification dropdown menu-->
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                        <div class="nano scrollable">
                            <div class="nano-content">
                                <ul class="head-list">
                                    <li>
                                        <a class="media" href="#">
                                            <div class="media-left">
                                                <i class="demo-pli-add-user-star icon-2x"></i>
                                            </div>
                                            <div class="media-body">
                                                <p class="mar-no text-nowrap text-main text-semibold">New User Registered</p>
                                                <small>4 minutes ago</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="media" href="#">
                                            <div class="media-left">
                                                <img class="img-circle img-sm" alt="Profile Picture" src="<?php echo base_url('assets/templatenifty/') ?>img/profile-photos/9.png">
                                            </div>
                                            <div class="media-body">
                                                <p class="mar-no text-nowrap text-main text-semibold">Lucy sent you a message</p>
                                                <small>30 minutes ago</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="media" href="#">
                                            <div class="media-left">
                                                <img class="img-circle img-sm" alt="Profile Picture" src="<?php echo base_url('assets/templatenifty/') ?>img/profile-photos/3.png">
                                            </div>
                                            <div class="media-body">
                                                <p class="mar-no text-nowrap text-main text-semibold">Jackson sent you a message</p>
                                                <small>40 minutes ago</small>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!--Dropdown footer-->
                        <div class="pad-all bord-top">
                            <a href="#" class="btn-link text-main box-block">
                                <i class="pci-chevron chevron-right pull-right"></i>Show All Notifications
                            </a>
                        </div>
                    </div>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End notifications dropdown-->



                <!--User dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li id="dropdown-user" class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                        <span class="ic-user pull-right">
                            <i class="demo-pli-dot-vertical"></i>
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                        <ul class="head-list">
                            <li>
                                <a href="<?php echo base_url('profile') ?>"><i class="demo-pli-male icon-lg icon-fw"></i> View Profile</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('profile') ?>"><i class="demo-pli-gear icon-lg icon-fw"></i> Setting Aplikasi</a>
                            </li>

                            <?php
                            $awal  = strtotime($this->session->userdata('last_login'));
                            $akhir = strtotime(date('Y-m-d H:i:s'));
                            $diff  = $akhir - $awal;

                            $jam   = floor($diff / (60 * 60));
                            $menit = $diff - ($jam * (60 * 60));
                            $detik = $diff % 60;

                            // echo $awal;
                            // echo 'Waktu tinggal: ' . $jam .  ' jam, ' . floor($menit / 60) . ' menit, ' . $detik . ' detik';
                            ?>
                            <li>
                                <a href="<?php echo base_url('login/logout') ?>"><i class="demo-pli-unlock icon-lg icon-fw"></i> Logout <span class="label label-success pull-right">Login <?php echo $jam ?> Jam <?php echo  floor($menit / 60) ?> Menit Lalu</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End user dropdown-->
            </ul>
        </div>
        <!--================================-->
        <!--End Navbar Dropdown-->

    </div>
</header>