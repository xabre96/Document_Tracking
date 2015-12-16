<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta charset="UTF-8">
        <title>Department of Environment and Natural Resources || Export Documents</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="shortcut icon" href="<?php echo base_url('images/denr_logo.png'); ?>" type="image/x-icon" /> 
        <link href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('bootstrap/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('bootstrap/css/ionicons.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('bootstrap/css/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('bootstrap/css/AdminLTE.css'); ?>" rel="stylesheet" type="text/css">

        <style>
            table, th, td {
                border: 1px solid #ccc;
                border-collapse: collapse;
                text-align: center;

            }
            table > thead > tr > th {
                padding: 10px;
                text-align: center;

            }
            table > tbody > tr > td{
                padding: 10px;
                text-align: center;
            }
            #dvData{
                border-radius: 0px !important;
            }
            #dvData .box-body{
                min-height: 500px;
            }
            #dvData .box-header{
                border-radius: 0px !important;
            }
            #btnExport{
                border: 0px !important;
                border-radius: 0px !important;
            }
        </style>

    </head>
    <body class="skin-black fixed">
        <div class="box box-success" style="margin-top:10px;">
            <div id="dvData">
                <div class="box-header bg-green">

                    <center>
                        <i class="fa fa-download fa-fw" style="font-size: 50px; margin-top: 10px;"></i>
                        <br>
                        <button href="#" id="btnExport" class="btn-success btn-sm btn-flat" style="width: 200px;">Download Reports</button>
                        <br/>
                        <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                    </center>
                </div>
                <div class="box-header bg-green" style="display: none;">
                    <h5 style="display: none; text-align: center;">Department&nbsp; of&nbsp; Environment&nbsp; and&nbsp; Natural&nbsp; Resources<br>
                        Region&nbsp; 10,&nbsp; Macabalan,&nbsp; Cagayan &nbsp;de&nbsp; Oro &nbsp;City<br>
                        Copy &nbsp;Right&nbsp; &copy &nbsp;ICT &nbsp;Planning &nbsp;Division</h5>
                </div>
                <div class="box-body ">
                    <center class="table-responsive" style="margin-top: 20px;">
                        <table>
                            <thead style="font-size: 13px;">
                                <tr>
                                    <th>#I.D</th>
                                    <th>Subject</th>
                                    <th>Sender</th>
                                    <th>Document Type</th>
                                    <th>Action Man</th>
                                    <th>Instructions</th>
                                    <th>Released Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 13px;"> 
                             <?php foreach ($document as $key => $value) {
                                            $str = chunk_split($value->document_id, 2, "-");
                                            $str2 = chunk_split($value->document_id, 4, "-");
                                            $str = explode("-",$str);
                                            $str2 = explode("-",$str2);
                                         ?>
                                    
                                            <tr>
                                                <td><?php echo $str[0]."-".$str[1]."-".$str2[1]; ?></td>
                                                <td><?php echo $value->subject; ?></td>
                                                <td><?php echo $value->sender; ?></td>
                                                <?php
                                                    $type = ""; 
                                                    foreach ($details as $key => $valu) { 
                                                        if($valu->document_id==$value->document_id){
                                                            foreach ($compliance as $key => $val) {
                                                                if($val->compliance_type_id==$valu->compliance_type_id){
                                                                    $type = $val->compliance_type;
                                                                    break;
                                                                }
                                                            }
                                                            break;
                                                        }else{} 
                                                    }
                                                    $oth = "";
                                                        foreach ($other as $key => $valu) {
                                                            if($value->document_id==$valu->document_id){
                                                                $oth = $valu->other;
                                                            }
                                                        }
                                                ?>
                                                <td><?php echo $type; ?></td>
                                                <td><?php echo $oth; ?></td>
                                                <td><?php echo $value->instructions; ?></td>
                                                <td><?php echo $value->released_date; ?></td>
                                                <?php 
                                                if($value->status_id==1){
                                                    $status = "Pending";
                                                    }else{
                                                    $status = "Acted";
                                                }
                                                ?>

                                                <td><?php echo $status; ?></td>
                                            </tr>
                                              <?php } ?>
                            </tbody>
                        </table>
                    </center>
                </div>
            </div>
        </div>


        <?php
        include 'script.php';
        ?>
        <script>
            $("#example1").dataTable();
            $('#example2').dataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": false,
                "bSort": false,
                "bInfo": false,
                "bAutoWidth": false
            });
        </script>
    </body>
</html>