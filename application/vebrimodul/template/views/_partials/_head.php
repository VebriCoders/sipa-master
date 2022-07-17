<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title><?= $title; ?></title>

<!--STYLESHEET-->
<!--=================================================-->

<!--Icon Aplikasi [ OPTIONAL ]-->
<link rel="shortcut icon" href="<?php echo base_url('assets/img/') ?><?= $website['logo']; ?>">

<!--Open Sans Font [ OPTIONAL ]-->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

<!--Bootstrap Stylesheet [ REQUIRED ]-->
<link href="<?php echo base_url('assets/templatenifty/') ?>css/bootstrap.min.css" rel="stylesheet">

<!--Nifty Stylesheet [ REQUIRED ]-->
<link href="<?php echo base_url('assets/templatenifty/') ?>css/nifty.min.css" rel="stylesheet">

<!--Nifty Premium Icon [ DEMONSTRATION ]-->
<link href="<?php echo base_url('assets/templatenifty/') ?>css/demo/nifty-demo-icons.min.css" rel="stylesheet">

<!--=================================================-->

<!--Pace - Page Load Progress Par [OPTIONAL]-->
<link href="<?php echo base_url('assets/templatenifty/') ?>plugins/pace/pace.min.css" rel="stylesheet">
<script src="<?php echo base_url('assets/templatenifty/') ?>plugins/pace/pace.min.js"></script>

<!--Demo [ DEMONSTRATION ]-->
<link href="<?php echo base_url('assets/templatenifty/') ?>css/demo/nifty-demo.min.css" rel="stylesheet">

<!--Themify Icons [ OPTIONAL ]-->
<link href="<?php echo base_url('assets/templatenifty/') ?>plugins/themify-icons/themify-icons.min.css" rel="stylesheet">

<!--Font Awesome [ OPTIONAL ]-->
<link href="<?php echo base_url('assets/templatenifty/') ?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

<!--Bootstrap Select [ OPTIONAL ]-->
<link href="<?php echo base_url('assets/templatenifty/') ?>plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">

<!--Select2 [ OPTIONAL ]-->
<link href="<?php echo base_url('assets/templatenifty/') ?>plugins/select2/css/select2.min.css" rel="stylesheet">

<!--Chosen [ OPTIONAL ]-->
<link href="<?php echo base_url('assets/templatenifty/') ?>plugins/chosen/chosen.min.css" rel="stylesheet">

<!--Animate.css [ OPTIONAL ]-->
<link href="<?php echo base_url('assets/templatenifty/') ?>plugins/animate-css/animate.min.css" rel="stylesheet">

<!--iziToast [ OPTIONAL ]-->
<link href="<?php echo base_url('assets/templatenifty/') ?>plugins/izitoast/iziToast.min.css" rel="stylesheet">

<!--DataTables [ OPTIONAL ]-->
<link href="<?php echo base_url('assets/templatenifty/') ?>plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url('assets/templatenifty/') ?>plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css" rel="stylesheet">

<!--Morris.js [ OPTIONAL ]-->
<link href="<?php echo base_url('assets/templatenifty/') ?>plugins/morris-js/morris.min.css" rel="stylesheet">

<!--Bootstrap Timepicker [ OPTIONAL ]-->
<link href="<?php echo base_url('assets/templatenifty/') ?>plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">

<!--Bootstrap Datepicker [ OPTIONAL ]-->
<link href="<?php echo base_url('assets/templatenifty/') ?>plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">

<!--Bootstrap Image Preview [ OPTIONAL ]-->
<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    #img-upload {
        width: 100%;
    }
</style>