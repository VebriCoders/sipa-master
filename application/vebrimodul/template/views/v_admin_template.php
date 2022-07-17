<!DOCTYPE html>
<html lang="en">

<head>
    <!-- HEAD - CSS COMPONENT -->
    <!--===================================================-->
    <?php $this->load->view('_partials/_head'); ?>
    <!--===================================================-->
</head>

<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">

        <!--NAVBAR-->
        <!--===================================================-->
        <?php $this->load->view('_partials/_header_navbar'); ?>
        <!--===================================================-->
        <!--END NAVBAR-->

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">

                <!-- MODULE CONTEN -->
                <!--===================================================-->
                <?php $this->load->view($namamodule . '/' . $namafileview); ?>
                <!--===================================================-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->

            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            <?php $this->load->view('_partials/_main_nav_menu'); ?>
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->

        </div>

        <!-- FOOTER -->
        <!--===================================================-->
        <?php $this->load->view('_partials/_footer'); ?>
        <!--===================================================-->
        <!-- END FOOTER -->

        <!-- SCROLL PAGE BUTTON -->
        <!--===================================================-->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->

    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->

    <!--JAVASCRIPT-->
    <!--=================================================-->
    <?php $this->load->view('_partials/_js'); ?>
    <!--=================================================-->

</body>

</html>