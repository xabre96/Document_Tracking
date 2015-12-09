<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Department of Environment and Natural Resources || Courier Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="shortcut icon" href="<?php // echo base_url('images/denr_logo.png');                     ?>" type="image/x-icon" /> 
        <link rel="stylesheet" href="<?php echo base_url('bootstrap/bootstrap.css/bootstrap.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('bootstrap/bootstrap.css/bootstrap-theme.css'); ?>">
    </head>
    <body class="skin-blue fixed">

        <?php include 'header.php'; ?>
        <div class="wrapper row-offcanvas row-offcanvas-left" style="min-height: 590px;">

            <aside class="left-side sidebar-offcanvas" style="min-height: 3749px;">
                <?php include 'sidebar.php' ?>
            </aside>
            <aside class="right-side" >
                <section class="content-header">
                    <h1>
                        Notifications

                    </h1>

                </section>
                <section class="content" >
                    <div class="col-lg-12">
                        <div class="col-md-6">

                            <!-- small box -->
                            <div class="small-box" style="background: #c10e0e;">
                                <div class="inner">
                                    <h3>
                                        32
                                    </h3>
                                    <br>         
                                    <center>
                                        <p style="font-size: 40px; margin-bottom: 50px;">
                                            <a href="<?php echo base_url('Users/viewCourierDueDate') ?>" style="color: #FFF;">DOCUMENTS DUE TODAY</a>
                                        </p>
                                    </center>
                                </div>

                                <div class="icon">
                                    <i class="glyphicon glyphicon-th-list"></i>
                                </div>

                            </div>

                        </div>
                        <div class="col-md-6">
                            <!-- small box -->
                            <div class="small-box" style="background: #ffe600;">
                                <div class="inner">
                                    <h3>
                                        23
                                    </h3>
                                    <br>
                                    <center>
                                        <p style="font-size: 35px; margin-bottom: 57px;">
                                            <a href="<?php echo base_url('Users/viewCourierFollowUp'); ?>" style="color: black;">DOCUMENTS FOR FOLLOW-UP</a>
                                        </p>
                                    </center>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-6">
                                <div class="small-box" style="background: #cfcdcc;">
                                    <div class="inner">
                                        <h3>
                                            53
                                        </h3>
                                        <br>
                                        <center>
                                            <p style="font-size: 40px; margin-bottom: 50px;">
                                                <a href="<?php echo base_url('Users/viewCourierActed') ?>" style="color: black;">ACTED DOCUMENTS </a>
                                            </p>
                                        </center>
                                    </div>
                                    <div class="icon">
                                        <i class="glyphicon glyphicon-ok"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                    </div><!-- /.row -->
                </section>
            </aside>

        </div>




        <?php include 'script.php'; ?>

    </body>
</html>