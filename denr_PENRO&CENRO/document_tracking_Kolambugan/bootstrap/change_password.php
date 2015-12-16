<html>
    <head>

        <meta charset="UTF-8">
        <title>User Settings | Change Password</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="container">

            <div class="col-lg-12" style="margin-top: 100px;">
                <div class="col-md-4"></div>
                <div class="col-lg-4">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Change Password</h3>
                        </div>
                        <div class="box-body ">
                            <div class="input-group">
                                <span class="input-group-addon" style="font-size: 17px"><i class="fa fa-fw fa-key white"></i></span>
                                <input type="password" name="oldPassword" class="form-control" placeholder="Old Password" required>
                                <span class="input-group-addon" style="font-size: 17px"><i class="fa fa-fw fa-lock white"></i></span>

                                <!-- PHP CODE e butang dri -->

                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon" style="font-size: 17px"><i class="fa fa-fw fa-key white"></i></span>
                                <input type="password" name="newPassowrd" class="form-control" placeholder="New Password" required>
                                <span class="input-group-addon" style="font-size: 17px"><i class="fa fa-fw fa-lock white"></i></span>

                                <!-- PHP CODE e butang dri -->

                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon" style="font-size: 17px"><i class="fa fa-fw fa-key white"></i></span>
                                <input type="password" name="confirmPassword" class="form-control" placeholder="Confirm Password" required>
                                <span class="input-group-addon" style="font-size: 17px"><i class="fa fa-fw fa-lock white"></i></span>

                                <!-- PHP CODE e butang dri -->

                            </div>

                        </div><!-- /.box-body -->
                        <br>
                        <a href="#" class="btn btn-info  pull-right" style="margin-right: 10px;">Submit
                            <i class="fa fa-fw fa-check-square-o"></i>
                        </a>
                        <br>
                        <br>

                    </div>

                </div>

            </div>
        </div>

        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(function() {

                "use strict";

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"]').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                });

                //When unchecking the checkbox
                $("#check-all").on('ifUnchecked', function(event) {
                    //Uncheck all checkboxes
                    $("input[type='checkbox']", ".table-mailbox").iCheck("uncheck");
                });
                //When checking the checkbox
                $("#check-all").on('ifChecked', function(event) {
                    //Check all checkboxes
                    $("input[type='checkbox']", ".table-mailbox").iCheck("check");
                });
                //Handle starring for glyphicon and font awesome
                $(".fa-star, .fa-star-o, .glyphicon-star, .glyphicon-star-empty").click(function(e) {
                    e.preventDefault();
                    //detect type
                    var glyph = $(this).hasClass("glyphicon");
                    var fa = $(this).hasClass("fa");

                    //Switch states
                    if (glyph) {
                        $(this).toggleClass("glyphicon-star");
                        $(this).toggleClass("glyphicon-star-empty");
                    }

                    if (fa) {
                        $(this).toggleClass("fa-star");
                        $(this).toggleClass("fa-star-o");
                    }
                });

                //Initialize WYSIHTML5 - text editor
                $("#email_message").wysihtml5();

            });
        </script>

    </body>



</html>