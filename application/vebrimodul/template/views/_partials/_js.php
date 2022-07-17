<!--jQuery [ REQUIRED ]-->
<script src="<?php echo base_url('assets/templatenifty/') ?>js/jquery.min.js"></script>

<!--BootstrapJS [ RECOMMENDED ]-->
<script src="<?php echo base_url('assets/templatenifty/') ?>js/bootstrap.min.js"></script>

<!--NiftyJS [ RECOMMENDED ]-->
<script src="<?php echo base_url('assets/templatenifty/') ?>js/nifty.min.js"></script>

<!--=================================================-->

<!--Flot Chart [ OPTIONAL ]-->
<script src="<?php echo base_url('assets/templatenifty/') ?>plugins/flot-charts/jquery.flot.min.js"></script>
<script src="<?php echo base_url('assets/templatenifty/') ?>plugins/flot-charts/jquery.flot.resize.min.js"></script>
<script src="<?php echo base_url('assets/templatenifty/') ?>plugins/flot-charts/jquery.flot.tooltip.min.js"></script>

<!--Sparkline [ OPTIONAL ]-->
<script src="<?php echo base_url('assets/templatenifty/') ?>plugins/sparkline/jquery.sparkline.min.js"></script>

<!--iziToast [ OPTIONAL ]-->
<script src="<?php echo base_url('assets/templatenifty/') ?>plugins/izitoast/iziToast.min.js"></script>

<!--Bootstrap Select [ OPTIONAL ]-->
<script src="<?php echo base_url('assets/templatenifty/') ?>plugins/bootstrap-select/bootstrap-select.min.js"></script>

<!--Select2 [ OPTIONAL ]-->
<script src="<?php echo base_url('assets/templatenifty/') ?>plugins/select2/js/select2.min.js"></script>

<!--Chosen [ OPTIONAL ]-->
<script src="<?php echo base_url('assets/templatenifty/') ?>plugins/chosen/chosen.jquery.min.js"></script>

<!--DataTables [ OPTIONAL ]-->
<script src="<?php echo base_url('assets/templatenifty/') ?>plugins/datatables/media/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url('assets/templatenifty/') ?>plugins/datatables/media/js/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url('assets/templatenifty/') ?>plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>

<!--Morris.js [ OPTIONAL ]-->
<script src="<?php echo base_url('assets/templatenifty/') ?>plugins/morris-js/morris.min.js"></script>
<script src="<?php echo base_url('assets/templatenifty/') ?>plugins/morris-js/raphael-js/raphael.min.js"></script>

<!--Bootstrap Timepicker [ OPTIONAL ]-->
<script src="<?php echo base_url('assets/templatenifty/') ?>plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>

<!--Bootstrap Datepicker [ OPTIONAL ]-->
<script src="<?php echo base_url('assets/templatenifty/') ?>plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

<!--Specify page [ SAMPLE ]-->
<!-- <script src="<?php echo base_url('assets/templatenifty/') ?>js/demo/dashboard.js"></script> -->

<script>
    $(document).ready(function() {
        $(".preloader").fadeOut();

        // CHOSEN
        // =================================================================
        // Require Chosen
        // http://harvesthq.github.io/chosen/
        // =================================================================
        // $('#demo-chosen-select').chosen();
        $('#demo-chosen-select').chosen({
            width: '100%'
        });
        $('#demo-chosen-select-2').chosen({
            width: '100%'
        });
        $('#demo-chosen-select-3').chosen({
            width: '100%'
        });
        $('#demo-dp-range .input-daterange').datepicker({
            format: "dd-mm-yyyy",
            todayBtn: "linked",
            autoclose: true,
            todayHighlight: true
        });
    })
</script>

<!--Bootstrap Image Preview [ OPTIONAL ]-->
<script>
    $(document).ready(function() {
        $(document).on('change', '.btn-file :file', function() {
            var input = $(this),
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [label]);
        });

        // $('.btn-file :file').on('fileselect', function(event, label) {

        //     var input = $(this).parents('.input-group').find(':text'),
        //         log = label;

        //     if (input.length) {
        //         input.val(log);
        //     } else {
        //         if (log) alert(log);
        //     }

        // });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#img-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });
    });
</script>

<script>
    $(document).on('nifty.ready', function() {
        $.fn.DataTable.ext.pager.numbers_length = 5;
        $('#tabel-basic-utama').dataTable({
            "responsive": true,
            "language": {
                "paginate": {
                    "previous": '<i class="demo-psi-arrow-left"></i>',
                    "next": '<i class="demo-psi-arrow-right"></i>'
                }
            }
        });
        $('#tabel-basic-utama-2').dataTable({
            "responsive": true,
            "language": {
                "paginate": {
                    "previous": '<i class="demo-psi-arrow-left"></i>',
                    "next": '<i class="demo-psi-arrow-right"></i>'
                }
            }
        });
        $('#tabel-basic-utama-3').dataTable({
            "responsive": true,
            "language": {
                "paginate": {
                    "previous": '<i class="demo-psi-arrow-left"></i>',
                    "next": '<i class="demo-psi-arrow-right"></i>'
                }
            }
        });
        var rowSelection = $('#tabel-selection-utama').DataTable({
            "responsive": true,
            "language": {
                "paginate": {
                    "previous": '<i class="demo-psi-arrow-left"></i>',
                    "next": '<i class="demo-psi-arrow-right"></i>'
                }
            }
        });
        $('#tabel-selection-utama').on('click', 'tr', function() {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            } else {
                rowSelection.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });
    });
</script>