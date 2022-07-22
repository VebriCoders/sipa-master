<nav id="mainnav-container">
    <div id="mainnav">

        <!--Menu-->
        <!--================================-->
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">

                    <!--Profile Widget-->
                    <!--================================-->
                    <div id="mainnav-profile" class="mainnav-profile">
                        <div class="profile-wrap text-center">
                            <div class="pad-btm">

                                <?php if ($this->session->userdata('foto_admin') == "user.jpg") { ?>
                                    <img class="img-circle img-md" src="<?php echo base_url('assets/img/user.jpg') ?>" alt="Profile Picture">
                                <?php } else { ?>
                                    <img class="img-circle img-md" src="<?php echo base_url('assets/upload/foto_admin/') ?><?php echo $this->session->userdata('foto_admin'); ?>" alt="Profile Picture">
                                <?php } ?>

                            </div>
                            <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                <span class="pull-right dropdown-toggle">
                                    <i class="dropdown-caret"></i>
                                </span>
                                <p class="mnp-name"><?php echo $this->session->userdata('nama_admin'); ?></p>
                                <span class="mnp-desc"><span><?php echo $this->session->userdata('email_username'); ?></span></span>
                            </a>
                        </div>
                        <div id="profile-nav" class="collapse list-group bg-trans">
                            <a href="<?php echo base_url('profile') ?>" class="list-group-item">
                                <i class="demo-pli-male icon-lg icon-fw"></i> View Profile
                            </a>
                            <a href="<?php echo base_url('setting') ?>" class="list-group-item">
                                <i class="demo-pli-gear icon-lg icon-fw"></i> Setting Aplikasi
                            </a>

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
                            <a href="<?php echo base_url('login/logout') ?>" class="list-group-item">
                                <i class="demo-pli-unlock icon-lg icon-fw"></i> Logout <span class="label label-success pull-right">Login <?php echo $jam ?> Jam <?php echo  floor($menit / 60) ?> Menit Lalu</span>
                            </a>
                        </div>
                    </div>

                    <!-- Menu Nav -->
                    <ul id="mainnav-menu" class="list-group">

                        <!--Menu-->
                        <li class="list-header">Menu</li>

                        <!--Menu list item-->
                        <?php if ($this->uri->segment('1') == 'dashboard') { ?>
                            <li class="active-link">
                                <a href="<?php echo base_url('dashboard') ?>">
                                    <i class="demo-pli-home"></i>
                                    <span class="menu-title">Dashboard</span>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="">
                                <a href="<?php echo base_url('dashboard') ?>">
                                    <i class="demo-pli-home"></i>
                                    <span class="menu-title">Dashboard</span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($this->uri->segment('1') == 'profile') { ?>
                            <li class="active-link">
                                <a href="<?php echo base_url('profile') ?>">
                                    <i class="ti-user"></i>
                                    <span class="menu-title">Profile</span>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="">
                                <a href="<?php echo base_url('profile') ?>">
                                    <i class="ti-user"></i>
                                    <span class="menu-title">Profile</span>
                                </a>
                            </li>
                        <?php } ?>

                        <li class="list-divider"></li>

                        <!--Master Data-->
                        <li class="list-header">Master Rekrutment</li>

                        <?php if ($this->session->userdata('role_id') == 1) { ?>
                            <!--Menu list item-->
                            <?php if ($this->uri->segment('1') == 'data_rekrutment') { ?>
                                <li class="active-link">
                                    <a href="<?php echo base_url('data_rekrutment') ?>">
                                        <i class="fa fa-graduation-cap"></i>
                                        <span class="menu-title">Data Rekrutment</span>
                                    </a>
                                </li>
                            <?php } else { ?>
                                <li class="">
                                    <a href="<?php echo base_url('data_rekrutment') ?>">
                                        <i class="fa fa-graduation-cap"></i>
                                        <span class="menu-title">Data Rekrutment</span>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <!--Menu list item-->
                        <?php if ($this->uri->segment('1') == 'data_calon') { ?>
                            <li class="active-link">
                                <a href="<?php echo base_url('data_calon') ?>">
                                    <i class="fa fa-group"></i>
                                    <span class="menu-title">Data Calon Siswa</span>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="">
                                <a href="<?php echo base_url('data_calon') ?>">
                                    <i class="fa fa-group"></i>
                                    <span class="menu-title">Data Calon Siswa</span>
                                </a>
                            </li>
                        <?php } ?>

                        <li class="list-divider"></li>

                        <!--Master Data-->
                        <li class="list-header">Master Data Aplikasi</li>


                        <?php if ($this->session->userdata('role_id') == 1) { ?>
                            <!--Menu list item-->
                            <?php if ($this->uri->segment('1') == 'data_agama_suku') { ?>
                                <li class="active-link">
                                    <a href="<?php echo base_url('data_agama_suku') ?>">
                                        <i class="fa fa-street-view"></i>
                                        <span class="menu-title">Data Agama & Suku</span>
                                    </a>
                                </li>
                            <?php } else { ?>
                                <li class="">
                                    <a href="<?php echo base_url('data_agama_suku') ?>">
                                        <i class="fa fa-street-view"></i>
                                        <span class="menu-title">Data Agama & Suku</span>
                                    </a>
                                </li>
                            <?php } ?>

                            <!--Menu list item-->
                            <?php if ($this->uri->segment('1') == 'data_pendidikan') { ?>
                                <li class="active-link">
                                    <a href="<?php echo base_url('data_pendidikan') ?>">
                                        <i class="fa fa-building-o"></i>
                                        <span class="menu-title">Data Pendidikan</span>
                                    </a>
                                </li>
                            <?php } else { ?>
                                <li class="">
                                    <a href="<?php echo base_url('data_pendidikan') ?>">
                                        <i class="fa fa-building-o"></i>
                                        <span class="menu-title">Data Pendidikan</span>
                                    </a>
                                </li>
                            <?php } ?>

                            <!--Menu list item-->
                            <?php if ($this->uri->segment('1') == 'data_wilayah') { ?>
                                <li class="active-link">
                                    <a href="<?php echo base_url('data_wilayah') ?>">
                                        <i class="fa fa-map-o"></i>
                                        <span class="menu-title">Data Wilayah</span>
                                    </a>
                                </li>
                            <?php } else { ?>
                                <li class="">
                                    <a href="<?php echo base_url('data_wilayah') ?>">
                                        <i class="fa fa-map-o"></i>
                                        <span class="menu-title">Data Wilayah</span>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>

                        <!--Menu list item-->
                        <?php if ($this->uri->segment('1') == 'data_instansi') { ?>
                            <li class="active-link">
                                <a href="<?php echo base_url('data_instansi') ?>">
                                    <i class="fa fa-institution"></i>
                                    <span class="menu-title">Data Instansi</span>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="">
                                <a href="<?php echo base_url('data_instansi') ?>">
                                    <i class="fa fa-institution"></i>
                                    <span class="menu-title">Data Instansi</span>
                                </a>
                            </li>
                        <?php } ?>

                        <li class="list-divider"></li>


                        <?php if ($this->session->userdata('role_id') == 1) { ?>
                            <!--Category name-->
                            <li class="list-header">Setting</li>

                            <!--Menu list item-->
                            <?php if ($this->uri->segment('1') == 'user_management') { ?>
                                <li class="active-link">
                                    <a href="<?php echo base_url('user_management') ?>">
                                        <i class="fa fa-vcard-o"></i>
                                        <span class="menu-title">User Management</span>
                                    </a>
                                </li>
                            <?php } else { ?>
                                <li class="">
                                    <a href="<?php echo base_url('user_management') ?>">
                                        <i class="fa fa-vcard-o"></i>
                                        <span class="menu-title">User Management</span>
                                    </a>
                                </li>
                            <?php } ?>

                            <?php if ($this->uri->segment('1') == 'setting') { ?>
                                <li class="active-link">
                                    <a href="<?php echo base_url('setting') ?>">
                                        <i class="ti-settings"></i>
                                        <span class="menu-title">Setting Aplikasi</span>
                                    </a>
                                </li>
                            <?php } else { ?>
                                <li class="">
                                    <a href="<?php echo base_url('setting') ?>">
                                        <i class="ti-settings"></i>
                                        <span class="menu-title">Setting Aplikasi</span>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>

                    </ul>

                </div>
            </div>
        </div>
        <!--================================-->
        <!--End menu-->

    </div>
</nav>