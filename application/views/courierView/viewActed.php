<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Department of Environment and Natural Resources || View Acted Documents</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="shortcut icon" href="<?php echo base_url('images/denr_logo.png'); ?>" type="image/x-icon" /> 
        <link href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('bootstrap/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('bootstrap/css/ionicons.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('bootstrap/css/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('bootstrap/css/AdminLTE.css'); ?>" rel="stylesheet" type="text/css">



    </head>
    <body class="skin-blue fixed">
        <?php include 'header.php'; ?>
        <div class="wrapper row-offcanvas row-offcanvas-left" style="min-height: 590px;">

            <aside class="left-side sidebar-offcanvas" style="min-height: 3749px;">
                <?php include 'sidebar.php' ?>
            </aside>
            <aside class="right-side" >

                <section class="content" >


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box">
                                <div class="box-header" style="background: #cfcdcc; color: black;">
                                    <h3 class="box-title"><i class="glyphicon glyphicon-ok"></i><span>&nbsp;ACTED DOCUMENTS</span></h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">

                                    <table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th style="width: 50px;">#I.D</th>
                                                <th>Subject</th>
                                                <th>Sender</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>


                                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                                            <tr>
                                                <td class=" sorting_1">1502001</td>
                                                <td class=" ">Firefox 1.0</td>
                                                <td class=" ">Win 98+ / OSX.2+</td>
                                                <td class=" ">Win 98+ / OSX.2+</td>
                                                <td class=" ">
                                                    <a href="#" class="btn btn-default btn-sm" data-toggle="modal" data-target="#compose-modal" title="View Document">View User</a>
                                                    <a href="#" class="btn btn-default btn-sm" data-toggle="modal" data-target="#compose-modal1" title="Update Document"><i class="fa fa-edit"></i>Update</a>
                                                    <div class="btn-group">
                                                        <button type="button" style="background-color: #de0000; color: #FFF; width: 85px; height: 28px;" class="btn btn-xs dropdown-toggle" data-toggle="dropdown" title="Delete User">
                                                            <i class="fa fa-trash-o fa-fw"></i>Delete
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <center>
                                                                <p style="background-color: #de0000; color: #FFF;">Delete User</p>
                                                            </center>
                                                            <li><a href="<?php echo base_url('') ?>" style="color: black;"><i class="fa  fa-check fa-fw"></i>Ok</a></li>
                                                            <li><a href="" style="color: black;"><i class="fa  fa-times fa-fw"></i>Cancel</a></li>
                                                        </ul>
                                                    </div>
<!--                                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#compose-modal2" title="Delete Document" style="height: 29px;"><i class="fa fa-trash-o"></i>Delete</a>-->
                                                </td>

                                            </tr>

                                        </tbody>
                                    </table>

                                </div><!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </section>
            </aside>

        </div>

        <div class="modal fade" id="compose-modal<?php //echo $user->User_ID;                  ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">

                <div class="box box-solid" style="background: #4b8355;">
                    <div class="box-header">
                        <h4 class="box-title" style="color: #FFF;"><i class="glyphicon glyphicon-file" style="margin-right: 10px; color: #FFF;"></i>Document Details</h4>
                        <div class="box-tools pull-right">
                            <button class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12"> 
                            <br>
                            <div class="form-group">
                                <label for="exampleDocumentID">Document I.D :</label>
                                <input type="text" class="form-control" id="exampleDocumentID" name="documentID" value="<?php ?>" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="exampleSubject">Subject :</label>
                                <input type="text" class="form-control" id="exampleSubject" name="subject" value="<?php ?>" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="exampleSender">Sender :</label>
                                <input type="text" class="form-control" id="exampleSender" name="sender" value="<?php ?>" disabled="">
                            </div>
                            <div class="form-group">
                                <label>Instructions :</label>
                                <textarea class="form-control" rows="3" required="" name="instructions" value="<?php ?>" disabled=""></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleTimeReceived">Time Received :</label>
                                <input type="text" class="form-control" id="exampleTimeReceived" name="timeReceive" value="<?php ?>" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="exampleDateReceived">Date Received :</label>
                                <input type="text" class="form-control" id="exampleDateReceived" name="dateReceive" value="<?php ?>" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="exampleDueDate">Due Date :</label>
                                <input type="text" class="form-control" id="exampleDueDate" name="dueDate" value="<?php ?>" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="exampleReveive">Released Date :</label>
                                <input type="text" class="form-control" id="exampleReleased1Date" name="dueDate" value="<?php ?>" disabled="">
                            </div>

                            <div class="form-group">
                                <label for="exampleDocumentType">Document Type :</label>
                                <input type="text" class="form-control" id="exampleDocumentType" name="documentType" value="<?php ?>" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="exampleOffice">Referred To :</label>
                                <input type="text" class="form-control" id="exampleOffice" name="office" value="<?php ?>" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="exampleOthers">Others :</label>
                                <input type="text" class="form-control" id="exampleOthers" name="others" value="<?php ?>" disabled="">
                            </div>
                            <div>
                                <hr>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <p class="" style="padding: 10px; margin: 0px; text-align: center;">
                            Document Monitoring System<br>
                            Region 10, Department of Environment and Natural Resources<br>
                            Copyright &copy 2015, ICT Planning Division
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="compose-modal1<?php //echo $user->User_ID;                  ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">

                <div class="box box-solid" style="background: #4b8355;">
                    <div class="box-header">
                        <h4 class="box-title" style="color: #FFF;"><i class="fa fa-edit" style="margin-right: 10px; color: #FFF;"></i>Update Document Details</h4>
                        <div class="box-tools pull-right">
                            <button class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12"> 
                            <br>
                            <div class="form-group">
                                <label for="exampleDocumentID">Document I.D :</label>
                                <input type="text" class="form-control" id="exampleDocumentID" name="documentID" value="<?php ?>" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="exampleSubject">Subject :</label>
                                <input type="text" class="form-control" id="exampleSubject" name="subject" value="<?php ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleSender">Sender :</label>
                                <input type="text" class="form-control" id="exampleSender" name="sender" value="<?php ?>">
                            </div>
                            <div class="form-group">
                                <label>Instructions :</label>
                                <textarea class="form-control" rows="3" required="" name="instructions" value="<?php ?>"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleTimeReceived">Time Received :</label>
                                <input type="text" class="form-control" id="exampleTimeReceived" name="timeReceive" value="<?php ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleDateReceived">Date Received :</label>
                                <input type="text" class="form-control" id="exampleDateReceived" name="dateReceive" value="<?php ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleDueDate">Due Date :</label>
                                <input type="text" class="form-control" id="exampleDueDate" name="dueDate" value="<?php ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleReveive">Released Date :</label>
                                <input type="text" class="form-control" id="exampleReleased1Date" name="dueDate" value="<?php ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectDate">Document Type</label>
                                <select name="compliance" class="form-control" ng-change="due()" ng-model="date">
                                    <?php // foreach ($data2 as $key => $value) { ?>
                                    <option value="<?php //echo $value->compliance_type_id;              ?>"><?php //echo $value->compliance_type;              ?></option>
                                    <?php // } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleOffice">Referred To :</label>
                                <input type="text" class="form-control" id="exampleOffice" name="office" value="<?php ?>" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="exampleOthers">Others :</label>
                                <input type="checkbox" class="form-control" id="exampleOthers" name="othersCheckBox" value="<?php ?>">
                                <input type="text" class="form-control" id="exampleOthers" name="othersInput" value="<?php ?>">
                            </div>
                            <div>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <p class="" style="padding: 10px; margin: 0px; text-align: center;">
                            Document Monitoring System<br>
                            Region 10, Department of Environment and Natural Resources<br>
                            Copyright &copy 2015, ICT Planning Division
                        </p>
                    </div>
                </div>
            </div>
        </div>

<!--        <div class="modal fade" id="compose-modal2<?php //echo $user->User_ID;  ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">

                <div class="box box-solid box-danger">
                    <div class="box-header">
                        <h4 class="box-title" style="color: #FFF;"><i class="fa fa-edit" style="margin-right: 10px; color: #FFF;"></i>Delete Document Record</h4>
                        <div class="box-tools pull-right">
                            <button class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <h4>
                            Are you sure do you want to delete this document record?
                        </h4>

                    </div>
                    <div class="box-footer">
                        <div class="box-footer">
                            <button type="submit" name="documentID" class="btn btn-primary pull-right">Ok</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <?php include 'script.php'; ?>

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
        <!--        <footer class="footer bg-black" style="padding: 0px; color:#ffffff; border-top: 3px ridge #cfcfcf;">
                    <p class="" style="padding: 2px; margin: 0px; text-align: center; background-color: #4b8355; font-size: 12px;">
                        <img src="<?php // echo base_url('images/dc_logo.png');                                   ?>" style="height: 20px; width: 20px;">Document Monitoring System<br>
                        Copyright <img src="<?php //echo base_url('images/DENR_Logo.svg_.png');                                   ?>" style="height: 20px; width: 20px; margin-bottom: 3px;"> 2015 Department of Environment and Natural Resources
                    </p>
                </footer>-->
    </body>
</html>