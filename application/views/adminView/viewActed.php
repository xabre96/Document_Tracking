
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
                                <br>
                                <section class="content-header">
                                    <small>
                                        <a href="<?php echo base_url('Users/exportActedDocuments'); ?>" target="_blank" class="btn-success btn-flat btn-xs" style="font-size: 15px; margin-left: 10px;"><i class="fa  fa-file-text-o fa-fw" style="font-size: 13px;"></i>Export to Excel</a>
                                    </small>
                                </section>
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
                                            <?php foreach ($documents as $key => $value) { ?>

                                                <?php
                                                echo' 
                                                    
                                                    <tr>
                                                     <td>' . $value->document_id . '</td>
                                                     <td>' . $value->subject . '</td>
                                                     <td>' . $value->sender . '</td>
                                                     <td>' . $value->status_id . '</td>
                                                    <td>' . '<a href="#" class="btn btn-default btn-flat btn-sm" data-toggle="modal" data-target="#compose-modal' . $value->document_id . '" title="Update User" ><i class="fa fa-edit"></i>Update</a>' . '
                                                    </td>
                                                </tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                </div><!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </section>
            </aside>

        </div>
        <?php
        foreach ($documents as $document) {

            if ($document->document_id == 0) {
                continue;
            }
            ?>

            <div class="modal fade" id="compose-modal<?php echo $document->document_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <input type="text" class="form-control" id="exampleDocumentID" name="documentID" value="<?php echo $document->document_id; ?>" disabled="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleSubject">Subject :</label>
                                    <input type="text" class="form-control" id="exampleSubject" name="subject" value="<?php echo $document->subject; ?>" disabled="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleSender">Sender :</label>
                                    <input type="text" class="form-control" id="exampleSender" name="sender" value="<?php echo $document->sender; ?>" disabled="">
                                </div>
                                <div class="form-group">
                                    <label>Instructions :</label>
                                    <textarea class="form-control" rows="3" required="" name="instructions" value="<?php echo $document->instructions; ?>" disabled=""></textarea>
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

        <?php }
        ?>
        <?php //include 'script.php'; ?>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="<?php echo base_url('bootstrap/script/jquery.js'); ?>"></script>
        <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js" type="text/javascript'); ?>"></script>

        <script src="<?php echo base_url('bootstrap/js/plugins/datatables/jquery.dataTables.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('bootstrap/js/plugins/datatables/dataTables.bootstrap.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('bootstrap/js/AdminLTE/app.js'); ?>" type="text/javascript"></script>
        <script type="text/javascript">
            $(function () {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true, "bAutoWidth": false
                });
            });
        </script>
        <!--        <footer class="footer bg-black" style="padding: 0px; color:#ffffff; border-top: 3px ridge #cfcfcf;">
                    <p class="" style="padding: 2px; margin: 0px; text-align: center; background-color: #4b8355; font-size: 12px;">
                        <img src="<?php // echo base_url('images/dc_logo.png');                                                     ?>" style="height: 20px; width: 20px;">Document Monitoring System<br>
                        Copyright <img src="<?php //echo base_url('images/DENR_Logo.svg_.png');                                                     ?>" style="height: 20px; width: 20px; margin-bottom: 3px;"> 2015 Department of Environment and Natural Resources
                    </p>
                </footer>-->
    </body>
</html>