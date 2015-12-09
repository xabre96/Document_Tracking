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
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <hr>
                </div>
                <div class="col-md-12">
                    <div class="box box-success box-solid" >
                        <div id="dvData">
                            <div class="box-header bg-green">
                                <h3 class="box-title" style="width: 100%;"><i class="fa fa-file-excel-o fa-fw"></i><strong>Acted Reports</strong> ( <?php echo date("F j, Y"); ?> )</h3>
                            </div>
                            <div class="box-header bg-green" style="display: none;">
                                <h5 style="display: none; text-align: center;">Department&nbsp; of&nbsp; Environment&nbsp; and&nbsp; Natural&nbsp; Resources<br>
                                    Region&nbsp; 10,&nbsp; Macabalan,&nbsp; Cagayan &nbsp;de&nbsp; Oro &nbsp;City<br>
                                    Copy &nbsp;Right&nbsp; &copy &nbsp;ICT &nbsp;Planning &nbsp;Division</h5>
                            </div>
                            <div class="box-body ">
                                <center class="table-responsive" style="margin-top: 20px;">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>#I.D</th>
                                                <th>Subject</th>
                                                <th>Sender</th>
                                                <th>Time Receive</th>
                                                <th>Date Receive</th>
                                                <th>Due Date</th>
                                                <th>Released Date</th>
                                                <th>Document Type</th>
                                                <th>Referred To</th>
                                                <th>Others</th>
                                            </tr>
                                        </thead>
                                        <tbody>   
                                            <tr>
                                                <td>1502001</td>
                                                <td>A</td>
                                                <td>A</td>
                                                <td>A</td>
                                                <td>A</td>
                                                <td>A</td>
                                                <td>A</td>
                                                <td>A</td>
                                                <td>A</td>
                                                <td>A</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </center>

                            </div>
                        </div>
                        <div class="box-footer">
                            <button id="btnExport" class="btn-success btn-flat btn-sm btn-flat"><i class="fa fa-download fa-fw"> </i> Download Report</button>
                        </div>
                    </div>
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