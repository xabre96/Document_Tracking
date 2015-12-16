<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Dashboard</title>
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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <div class="mailbox row">
                <div class="col-xs-12">
                    <div class="box box-solid">
                        <div class="box-body" style="margin-top: 100px;">
                            <div class="row">

                                <div class="col-md-3 col-sm-4">
                                    <!-- BOXES are complex enough to move the .box-header around.
                                         This is an example of having the box header within the box body -->
                                    <div class="box-header">
                                        <i class="fa fa-inbox"></i>
                                        <h3 class="box-title">INBOX</h3>
                                    </div>

                                    <div style="margin-top: 15px;">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li class="header">Folders</li>
                                            <li class="active"><a href="#"><i class="fa fa-inbox"></i> Inbox (14)</a></li>
                                            <li><a href="#"><i class="fa fa-mail-forward"></i> Sent</a></li>

                                        </ul>
                                    </div>
                                </div><!-- /.col (LEFT) -->
                                <div class="col-md-9 col-sm-8">
                                    <div class="row pad">
                                        <div class="col-sm-6">
                                            <label style="margin-right: 10px;">
                                                <div class="icheckbox_minimal-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" id="check-all" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                            </label>
                                            <!-- Action button -->
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-sm btn-flat dropdown-toggle" data-toggle="dropdown">
                                                    Action <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#">Mark as read</a></li>
                                                    <li><a href="#">Mark as unread</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">Delete</a></li>
                                                </ul>
                                            </div>

                                        </div>
                                        <div class="col-sm-6 search-form">
                                            <form action="#" class="text-right">
                                                <div class="input-group">                                                            
                                                    <input type="text" class="form-control input-sm" placeholder="Search">
                                                    <div class="input-group-btn">
                                                        <button type="submit" name="q" class="btn btn-sm bg-gray"><i class="fa fa-search"></i></button>
                                                    </div>
                                                </div>                                                     
                                            </form>
                                        </div>
                                    </div><!-- /.row -->

                                    <div class="table-responsive">
                                        <!-- THE MESSAGES -->
                                        <table class="table table-mailbox">
                                            <tbody><tr class="unread">
                                                    <td class="small-col"><div class="icheckbox_minimal-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div></td>
                                                    <td class="small-col"><i class="fa fa-star"></i></td>
                                                    <td class="name"><a href="#">John Doe</a></td>
                                                    <td class="subject"><a href="#">Urgent! Please read</a></td>
                                                    <td class="time">12:30 PM</td>
                                                </tr>

                                            </tbody></table>
                                    </div><!-- /.table-responsive -->
                                </div><!-- /.col (RIGHT) -->
                            </div><!-- /.row -->
                        </div><!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <div class="pull-right">
                                <small>Showing 1-12/1,240</small>
                                <button class="btn btn-xs btn-bg-gray"><i class="fa fa-caret-left"></i></button>
                                <button class="btn btn-xs btn-bg-gray"><i class="fa fa-caret-right"></i></button>
                            </div>
                        </div><!-- box-footer -->
                    </div><!-- /.box -->
                </div><!-- /.col (MAIN) -->
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