<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->
<script src="<?php echo base_url('bootstrap/script/jquery.js'); ?>"></script>
<script src="<?php echo base_url('assets/angular.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('bootstrap/js/plugins/datatables/jquery.dataTables.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('bootstrap/js/plugins/datatables/dataTables.bootstrap.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('bootstrap/js/jquery-ui-1.10.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('bootstrap/js/plugins/fullcalendar/fullcalendar.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('bootstrap/js/plugins/input-mask/jquery.inputmask.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('bootstrap/js/plugins/input-mask/jquery.inputmask.date.extensions.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('bootstrap/js/plugins/input-mask/jquery.inputmask.extensions.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('bootstrap/js/jquery.battatech.excelexport.js'); ?>"></script>
<script src="<?php //echo base_url('bootstrap/js/jquery.btechco.excelexport.js'); ?>"></script>
<script src="<?php echo base_url('bootstrap/js/jquery.battatech.excelexport.min.js'); ?>"></script>
<script src="<?php //echo base_url('bootstrap/js/jquery.base64.js'); ?>"></script>
<script src="<?php //echo base_url('bootstrap/ajax/salaryUpdate.js'); ?>"></script>
<script src="<?php //echo base_url('bootstrap/js/plugins/jQuery-Plugins-master/numeric/jquery.numeric.min.js'); ?>"></script>
<script src="<?php echo base_url('bootstrap/js/AdminLTE/app.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/app.js'); ?>" type="text/javascript"></script>

 <script type="text/javascript">
            $(function () {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>

<script>
    // $(document).ready(function () {
    //     $(".numeric").numeric();
    // });

    // function getUrl() {
    //     var protocol, host, pathname, url;

    //     protocol = window.location.protocol;
    //     host = window.location.host;
    //     pathname = window.location.pathname;

    //     url = protocol + "//" + host + "/" + pathname[1] + "/";

    //     return url;
    // }
</script>


<script type="text/javascript">
    $("#btnExport").click(function (e) {
        window.open('data:application/vnd.ms-excel,' + $('#dvData').html());
        e.preventDefault();
    });
</script>



<script type="text/javascript">
    $(function () {
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                        'Last 7 Days': [moment().subtract('days', 6), moment()],
                        'Last 30 Days': [moment().subtract('days', 29), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                    },
                    startDate: moment().subtract('days', 29),
                    endDate: moment()
                },
        function (start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal',
            radioClass: 'iradio_minimal'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-red',
            radioClass: 'iradio_flat-red'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
            showInputs: false
        });
    });
</script>



 </body>
</html>