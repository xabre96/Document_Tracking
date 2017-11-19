<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?php echo base_url('images/denr_logo.png'); ?>" type="image/x-icon" /> 
        <link rel='stylesheet' href="<?php echo base_url('mars_tf_export/html/assets/css/app.css'); ?>">
        <link rel='stylesheet' href="<?php echo base_url('mars_tf_export/html/assets/css/animate.min.css'); ?>">
        <link href="<?php echo base_url('mars_tf_export/html/assets/favicon.ico'); ?>" rel="shortcut icon">
        <link href="<?php echo base_url('mars_tf_export/html/assets/apple-touch-icon.png'); ?>" rel="apple-touch-icon">
        <title>Document Tracking</title>
        <style>
            img{
                height: 110px;
            }
            .imgBackground{
                position: relative;
            }

        </style>
    </head>
    <body style="background-image: url(<?php echo base_url('images/background.png') ?>);" class="imgBackground">
        <header style="background: black;">
            <center>
                <img src="<?php echo base_url('images/test.png'); ?>" alt="image-log">
            </center>
        </header>
        <br>
        <br>
        <div class="all-wrapper no-menu-wrapper">
            <div class="col-md-12" style="margin: 0px;">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="content-wrapper">
                            <div class="content-inner">
                                <div class="main-content" style="background: #FFF;">
                                    <div class="main-content-inner">
                                        <form method="POST" action="<?php echo base_url('login'); ?>">
                                            <h3 class="form-title form-title-first"><i class="icon-lock"></i> Login</h3>
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" placeholder="Username" name="username" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" placeholder="Password" name="password" required="">
                                            </div>
                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Remember me
                                                    </label>
                                                </div>
                                            </div>
                                            <input type="submit" value="Login" class="btn btn-default"/>
                                            <?php echo @$message; ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <footer class="footer bg-black" style="padding: 0px; color:#ffffff; border-top: 3px ridge #cfcfcf;">
            <p class="" style="padding: 2px; margin: 0px; text-align: center; background-color: black; font-size: 12px;">
                <img src="<?php echo base_url('images/dc_logo.png'); ?>" style="height: 20px; width: 20px;">Document Monitoring System<br>
                Copyright <img src="<?php echo base_url('images/DENR_Logo.svg_.png'); ?>" style="height: 20px; width: 20px; margin-bottom: 3px;"> <?php echo date('Y'); ?> Department of Environment and Natural Resources
            </p>
        </footer>

        <script src="<?php echo base_url('mars_tf_export/html/assets/js/jquery.js'); ?>"></script>
        <script src="<?php echo base_url('mars_tf_export/html/assets/js/bootstrap/button.js'); ?>"></script>
        <script src="<?php echo base_url('mars_tf_export/html/assets/js/bootstrap/carousel.js'); ?>"></script>
        <script src="<?php echo base_url('mars_tf_export/html/assets/js/bootstrap/transition.js'); ?>"></script>
        <script src="<?php echo base_url('mars_tf_export/html/assets/js/bootstrap/collapse.js'); ?>"></script>
        <script src="<?php echo base_url('mars_tf_export/html/assets/js/bootstrap/modal.js'); ?>"></script>
        <script src="<?php echo base_url('mars_tf_export/html/assets/js/bootstrap/dropdown.js'); ?>"></script>
        <script src="<?php echo base_url('mars_tf_export/html/assets/js/jquery.visible.min.js'); ?>"></script>
        <script src="<?php echo base_url('mars_tf_export/html/assets/js/bootstrap/tab.js'); ?>"></script>
        <script src="<?php echo base_url('mars_tf_export/html/assets/js/jquery.isotope.min.js'); ?>"></script>
        <script src="<?php echo base_url('mars_tf_export/html/assets/js/jquery.knob.js'); ?>"></script>
        <script src="<?php echo base_url('mars_tf_export/html/assets/js/jquery.scrollUp.min.js'); ?>"></script>
        <script src="<?php echo base_url('mars_tf_export/html/assets/js/application.js'); ?>"></script>
    </body>
</html>