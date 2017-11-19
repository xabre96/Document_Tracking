
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
                                    <h3 class="box-title"><i class="glyphicon glyphicon-plus"></i><span>&nbsp;Courier</span></h3>
                                </div><!-- /.box-header -->

                                <!-- form start -->
                                <form method="POST" action="<?php echo base_url('users_controller/addCourier'); ?>">
                                    <div class="box-body">

                                        <div class="form-group">
                                            <label for="exampleInputLastName">Last Name</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="lname" required="" placeholder="Ex. Cale" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFirstName">First Name</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="fname" required="" placeholder="Ex. Shun Daryl">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputMiddleName">Middle Name</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="mname" required="" placeholder="Ex. Cuaresma">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUserName">User Name</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="uname" required="" placeholder="Ex. Shun2015">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPhoneNumber">Contact Number</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="contact" required="" placeholder="Ex. 09359000499">
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" rows="3" required="" name="address" placeholder="Enter ..."></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" required="" placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputType">User Type:</label>
                                            <!-- <input type="email" class="form-control" id="exampleInputType" name="email" required="" placeholder="Enter email"> -->
                                            <select class="form-control" id="exampleInputType" name="type">
                                                <option value="1">Admin</option>
                                                <option value="2">User</option>
                                                <option value="3">Guest</option>
                                            </select>
                                        </div>

                                    </div><!-- /.box-body -->

                                    <div class="box-footer">

                                        <button type="submit" value="Add" class="btn btn-primary">Submit</button>
                                        <a href="<?php echo base_url('users_controller/adminDashboard'); ?>" style="margin-left: 10px;" class="btn btn-default">Cancel</a>
                                    </div>
                                </form>
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
