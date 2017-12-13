<script src="<?php echo base_url('node_modules/moment/min/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('bootstrap/script/jquery.js'); ?>"></script>
<script src="<?php echo base_url('assets/angular.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('bootstrap/js/plugins/datatables/jquery.dataTables.js'); ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('bootstrap/js/plugins/datatables/dataTables.bootstrap.js'); ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('bootstrap/js/jquery-ui-1.10.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('bootstrap/js/plugins/fullcalendar/fullcalendar.min.js'); ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('bootstrap/js/plugins/input-mask/jquery.inputmask.js'); ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('bootstrap/js/plugins/input-mask/jquery.inputmask.date.extensions.js'); ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('bootstrap/js/plugins/input-mask/jquery.inputmask.extensions.js'); ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('bootstrap/js/jquery.battatech.excelexport.js'); ?>"></script>
<script src="<?php echo base_url('bootstrap/js/jquery.battatech.excelexport.min.js'); ?>"></script>
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
<script type="text/javascript">
    $("#btnExport").click(function (e) {
        window.open('data:application/vnd.ms-excel,' + $('#dvData').html());
        e.preventDefault();
    });
</script>
<script>
    var documentId = $("#documentId").val();
    var currentDate = new Date();
    var month = currentDate.getMonth() + 1;
    var year = currentDate.getFullYear().toString().slice(2);

    function checkDateIfWeekends(dueAndFollowDate, documentType) {
        var daysToAdd = 0;
        var newDueAndFollowDate = dueAndFollowDate;
        var day = moment(dueAndFollowDate).day();

        if (documentType === 1) { // Document type is rush
            switch (day) {
                case 0: // day is Sunday
                    daysToAdd = 1;
                    break;
                case 6: // day is Saturday
                    daysToAdd = 2;
                    break;
            }
        }

        if (documentType === 3) { // Document type is routinary
            switch (day) {
                case 0: // day is Sunday
                case 1: // day is Monday
                case 2: // day is Tuesday
                case 6: // day is Saturday
                    daysToAdd = 2;
                    break;
            }
        }

        newDueAndFollowDate = moment(dueAndFollowDate).add(daysToAdd, 'days').format('YYYY-MM-DD');

        return newDueAndFollowDate;
    }

    $(".document-id").text(year + '-' + month + '-' + documentId);

    $("#saveBtn").click(function () {
        $("#addDocumentForm").submit();
    });

    $("#cancelBtn").click(function () {
        $("#addDocumentForm")[0].reset();
    });
    
    $(".calculateDate").change(function () {
        var dateReceived = $("#dateReceived").val();
        var tempDate = new Date(dateReceived);

        switch (parseInt($("#complianceType").val())) {
            case 1:
                var dueAndFollowDate = moment(tempDate).add(1, 'days').format('YYYY-MM-DD');
                dueAndFollowDate = checkDateIfWeekends(dueAndFollowDate, 1);
                $("#dueDate").val(dueAndFollowDate);
                $("#followDate").val(dueAndFollowDate);
                break;
            case 3:
                var dueAndFollowDate = moment(tempDate).add(4, 'days').format('YYYY-MM-DD');
                dueAndFollowDate = checkDateIfWeekends(dueAndFollowDate, 3);
                $("#dueDate").val(dueAndFollowDate);
                $("#followDate").val(dueAndFollowDate);
                break;
            case 4:
                $("#dateReceived").val();
                $("#dueDate").val();
                $("#followDate").val();
                console.log('No follow up and due date.');
                break;
            default:
                console.error('Option does not exist.');
        }
    });
</script>

</body>
</html>