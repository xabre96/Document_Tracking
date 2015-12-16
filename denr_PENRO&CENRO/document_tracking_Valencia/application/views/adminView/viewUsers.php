
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
                                <div class="box-header" style="background: #4b8355; color: #FFF;">
                                    <h3 class="box-title"><i class="glyphicon glyphicon-list"></i><span>&nbsp;Registered User List</span></h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <div class="col-md-12">
                                        <br>
                                        <?php echo @$message; ?>
                                        <p><?php echo validation_errors(); ?></p>
                                    </div>

                                    <table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th>User Name</th>
                                                <th>Office Phone #</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>


                                        <tbody role="alert" aria-live="polite" aria-relevant="all">

                                            <?php
                                            foreach ($users as $user) {
                                                echo '
                                            <tr>
                                                <td>' . $user->user_name . '</td>
                                                <td>' . $user->contact_number . '</td>
                                                <td>' . '<a href="#" class="btn btn-default btn-flat btn-sm" data-toggle="modal" data-target="#compose-modal' . $user->user_id . '" title="Update User" ><i class="fa fa-edit"></i>Update</a>' . '
                                               ' . ' ' . '<a href="#" class="btn btn-danger btn-flat btn-sm" data-toggle="modal" data-target="#coompose-modal' . $user->user_id . '" title="Delete User" ><i class="fa fa-trash-o"></i>Delete</a>' . '
                                               ' . ' ' . '<a href="'.base_url('Users/resetPass/'.$user->user_id).'" class="btn btn-success btn-flat btn-sm">Reset Password</a>' . '
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
        foreach ($users as $user) {
            if ($user->user_id == 0) {
                continue;
            }
            ?>
            <div class="modal fade" id="compose-modal<?php echo $user->user_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">

                    <div class="box box-solid box-success">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-edit"></i> Update</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <?php echo form_open_multipart('Users/editCourier/' . $user->user_id, array('class' => 'form-horizontal', 'validate' => '')); ?>
                        <div class="box-body">
                            <div class="col-md-12"> 
                                <h4 class="box-title" style="margin-left: 20px; margin-top: 30px;">User Information</h4>
                                <div class="box-body">

                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="editFirstName">First Name</label>
                                                <input type="text" name="userID" class="form-control"  value="<?php echo $user->user_id; ?>" style="display: none;">
                                                <input type="text" name="firstName" class="form-control"  value="<?php echo $user->first_name; ?>" required="">
                                            </div>                        
                                            <div class="form-group">
                                                <label for="editMiddleName">Middle Name</label>
                                                <input type="text" name="middleName" class="form-control"  value="<?php echo $user->middle_name; ?>" required="">
                                            </div>                        
                                            <div class="form-group">
                                                <label for="editLast">Last Name</label>
                                                <input type="text" name="lastName" class="form-control"  value="<?php echo $user->last_name; ?>" required="">
                                            </div>                        
                                            <div class="form-group">
                                                <label for="editContact">Contact No.</label>
                                                <input type="text" name="contact" class="form-control"  value="<?php echo $user->contact_number; ?>" required="">
                                            </div>                        
                                            <div class="form-group">
                                                <label for="editAddress">Address</label>
                                                <input type="text" name="address" class="form-control"  value="<?php echo $user->address; ?>" required="">
                                            </div>                        
                                            <div class="form-group">
                                                <label for="editEmail">Email</label>
                                                <input type="text" name="email" class="form-control"  value="<?php echo $user->email; ?>" required="">
                                            </div>                        
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i>Cancel</button>
                            <button type="submit" class="btn btn-primary btn-sm pull-right"><i class="fa fa-edit"></i> Save</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>

        <?php
        foreach ($users as $user) {
            if ($user->user_id == 0) {
                continue;
            }
            ?>
        <div class="modal fade" id="coompose-modal<?php echo $user->user_id; ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-red">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                        <h3 class="modal-title"><i class="glyphicon glyphicon-warning-sign"></i> Warning!</h3>
                    </div>

                    <div class="modal-body">
                        <h4>Are you sure you want to delete this user?</h4>
                    </div>
                    <div class="modal-footer clearfix">
                        <a href="<?php echo base_url('Users/deleteCourier/' . $user->user_id); ?>" class="btn btn-primary pull-left" style="width: 70px;">Ok</a>
                        <button type="submit" class="btn btn-default pull-right" style="width: 70px;">Cancel</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <?php } ?>


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
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>
        <!--        <footer class="footer bg-black" style="padding: 0px; color:#ffffff; border-top: 3px ridge #cfcfcf;">
                    <p class="" style="padding: 2px; margin: 0px; text-align: center; background-color: #4b8355; font-size: 12px;">
                        <img src="<?php // echo base_url('images/dc_logo.png');                                  ?>" style="height: 20px; width: 20px;">Document Monitoring System<br>
                        Copyright <img src="<?php //echo base_url('images/DENR_Logo.svg_.png');                                  ?>" style="height: 20px; width: 20px; margin-bottom: 3px;"> 2015 Department of Environment and Natural Resources
                    </p>
                </footer>-->
    </body>
</html>