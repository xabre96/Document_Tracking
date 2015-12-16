        <?php include 'header.php'; ?>
        <div class="wrapper row-offcanvas row-offcanvas-left" style="min-height: 590px;">

            <aside class="left-side sidebar-offcanvas" style="min-height: 3749px;">
                <?php include 'sidebar.php' ?>
            </aside>
            <aside class="right-side" >
                <section class="content" >
                    <div class="col-lg-12">

                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="box">
                                <div class="box-header" style="background: #4b8355; color: #FFF;">
                                    <h3 class="box-title"><i class="glyphicon glyphicon-edit"></i><span>&nbsp;My Profile</span></h3>
                                </div><!-- /.box-header -->

                                <!-- form start -->
                                <?php foreach ($user as $key => $value) { ?>
                                <form method="POST" action="<?php echo base_url('Users/addCourier'); ?>">
                                    <div class="box-body">

                                        <div class="form-group">
                                            <label for="exampleInputLastName">Last Name</label>
                                            <input type="text" class="form-control" value="<?php echo $value->last_name; ?>" id="exampleInputPassword1" name="lname" required="" placeholder="Ex. Cale" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFirstName">First Name</label>
                                            <input type="text" class="form-control" value="<?php echo $value->first_name; ?>" id="exampleInputPassword1" name="fname" required="" placeholder="Ex. Shun Daryl">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputMiddleName">Middle Name</label>
                                            <input type="text" class="form-control" value="<?php echo $value->middle_name; ?>" id="exampleInputPassword1" name="mname" required="" placeholder="Ex. Cuaresma">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUserName">User Name</label>
                                            <input type="text" class="form-control" value="<?php echo $value->user_name; ?>" id="exampleInputPassword1" name="uname" required="" placeholder="Ex. Shun2015">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPhoneNumber">Contact Number</label>
                                            <input type="text" class="form-control" value="<?php echo $value->contact_number; ?>" id="exampleInputPassword1" name="contact" required="" placeholder="Ex. 09359000499">
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" rows="3" required="" name="address" placeholder="Enter ..."><?php echo $value->address; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" value="<?php echo $value->email; ?>" id="exampleInputEmail1" name="email" required="" placeholder="Enter email">
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="exampleInputPassword">Old Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword" name="old_pass" required="" placeholder="Old password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" name="new_pass" required="" placeholder="Enter New password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword2">Confirm Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword2" name="new_pass2" required="" placeholder="Confirm New password">
                                        </div> -->
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">

                                        <button type="submit" value="Add" class="btn btn-primary">Submit</button>
                                        <a href="<?php echo base_url('Users/adminDashboard'); ?>" style="margin-left: 10px;" class="btn btn-default">Cancel</a>
                                    </div>
                                </form>
                             <?php } ?>
                            </div><!-- /.box -->

                            <p><?php echo validation_errors(); ?></p>

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
