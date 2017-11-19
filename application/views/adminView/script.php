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

    $(".document-id").text(year + '-' + month + '-' + documentId);

    $("#saveBtn").click(function () {
        $("#addDocumentForm").submit();
    });

    $("#cancelBtn").click(function () {
        $("#addDocumentForm")[0].reset();
    });
    
    $("#dateReceived").change(function () {
        var dateReceived = $("#dateReceived").val();
        var tempDate = new Date(dateReceived);

        switch (parseInt($("#complianceType").val())) {
            case 1:
                tempDate.setDate(tempDate.getDate() + 1);
                var dueAndFollowDate = tempDate.getFullYear() + '-' + tempDate.getMonth() + '-' + tempDate.getDate();
                $("#dueDate").val(dueAndFollowDate);
                $("#followDate").val(dueAndFollowDate);
                break;
            case 3:
                tempDate.setDate(tempDate.getDate() + 4);
                var dueAndFollowDate = tempDate.getFullYear() + '-' + tempDate.getMonth() + '-' + tempDate.getDate();
                $("#dueDate").val(dueAndFollowDate);
                $("#followDate").val(dueAndFollowDate);
                break;
            case 4:
                console.log('No follow up and due date.');
                break;
            default:
                console.error('Option does not exist.');
        }
    });
</script>

</body>
</html>