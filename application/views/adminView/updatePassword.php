
        <?php include 'header.php'; ?>
        <div class="wrapper row-offcanvas row-offcanvas-left" style="min-height: 590px;">

            <aside class="left-side sidebar-offcanvas" style="min-height: 3749px;">
                <?php include 'sidebar.php' ?>
            </aside>
            <aside class="right-side" >
                <section class="content" >
                    <div class="col-lg-12">

                        <div class="col-md-6">
                        <?php echo @$message; ?>
                        
                            <!-- general form elements -->
                            <div class="box">
                                <div class="box-header" style="background: #4b8355; color: #FFF;">
                                    <h3 class="box-title"><i class="glyphicon glyphicon-edit"></i><span>&nbsp;Change Password</span></h3>
                                </div><!-- /.box-header -->

                                <!-- form start -->
                                <?php //foreach ($user as $key => $value) { ?>
                                <form method="POST" action="<?php echo base_url('Users/changePass'); ?>">
                                
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputPassword">Old Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword" name="old_pass" required="" placeholder="Old password">
                                            <?php echo form_error('old_pass'); ?>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" name="new_pass" required="" placeholder="Enter New password">
                                            <?php echo form_error('new_pass'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword2">Confirm Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword2" name="new_pass2" required="" placeholder="Confirm New password">
                                            <?php echo form_error('new_pass2'); ?>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">

                                        <button type="submit" value="Add" class="btn btn-primary">Submit</button>
                                        <a href="<?php echo base_url('Users/adminDashboard'); ?>" style="margin-left: 10px;" class="btn btn-default">Cancel</a>
                                    </div>
                                </form>
                             <?php //} ?>
                            </div><!-- /.box -->

                        </div>

                    </div>

                    <div class="row">





                    </div><!-- /.row -->
                </section>
            </aside>

        </div>
        <?php include 'script.php'; ?>
<!--        <footer class="footer bg-black" style="padding: 0px; color:#ffffff; border-top: 3px ridge #cfcfcf;">
            <p class="" style="padding: 2px; margin: 0px; text-align: center; background-color: #4b8355; font-size: 12px;">
                <img src="<?php // echo base_url('images/dc_logo.png'); ?>" style="height: 20px; width: 20px;">Document Monitoring System<br>
                Copyright <img src="<?php// echo base_url('images/DENR_Logo.svg_.png'); ?>" style="height: 20px; width: 20px; margin-bottom: 3px;"> 2015 Department of Environment and Natural Resources
            </p>
        </footer>-->
