<html>
    <head>

        <meta charset="utf-8">
        <title>Online Faculty Evaluation || Evaluation Form</title>
        <meta name="description" content="Bootstrap Metro Dashboard">
        <meta name="author" content="Dennis Ji">
        <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
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

            <div class="row-fluid">
                <div class="box" style="background-color: #1A1851;">
                    <div class="box-header" style="background-color: #1A1851; color: #fff;">
                        <h2><i class="halflings-icon white file"></i><span class="break"></span>Evaluation Form</h2>
                    </div>
                    <div class="box-content">
                        <div class="row-fluid">
                            <div class="col-md-12">
                                <form method="POST" action="">
                                    <br>
                                    <h3 class="text-center">Republic of the Philippines</h3>
                                    <h2 class="text-center">MINDANAO UNIVERSITY OF SCIENCE AND TECHNOLOGY</h2>
                                    <h4 class="text-center"> College of Information and Technology</h4>
                                    <h5 class="text-center">The QCE of the NBC No. 461</h5>
                                    <h5 class="text-center">Instruments for Instructor/Teaching Effectiveness</h5>

                                    <br>
                                    <br>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-9">

                                        <table class="table table-bordered table-striped table-condensed">
                                            <thead>
                                                <tr role="row">
                                                    <th><center>Scale</center></th>
                                            <th><center>Descriptive Rating</center></th>
                                            <th><center>Qualitative Description</center></th>
                                            </tr>
                                            </thead>
                                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                                                <tr class="odd">
                                                    <td class=" sorting_1"><center>5</center></td>
                                            <td class=" sorting_1"><center>Outstanding</center></td>
                                            <td class=" sorting_1"><center>aslkdjalsjdkaljsdasasdas</center></td>
                                            </tr>
                                            <tr class="odd">
                                                <td class=" sorting_1"><center>4</center></td>
                                            <td class=" sorting_1"><center>Very Satisfy</center></td>
                                            <td class=" sorting_1"><center> aslkdjalsjdkaljsdasasdas</center></td>
                                            </tr>
                                            <tr class="odd">
                                                <td class=" sorting_1"><center>3</center></td>
                                            <td class=" sorting_1"><center>Satisfy</center></td>
                                            <td class=" sorting_1"><center>aslkdjalsjdkaljsdasasdas</center></td>
                                            </tr>
                                            <tr class="odd">
                                                <td class=" sorting_1"><center>2</center></td>
                                            <td class=" sorting_1"><center>Poor</center></td>
                                            <td class=" sorting_1"><center>aslkdjalsjdkaljsdasasdas</center></td>
                                            </tr>
                                            <tr class="odd">
                                                <td class=" sorting_1"><center>1</center></td>
                                            <td class=" sorting_1"><center>Very Poor</center></td>
                                            <td class=" sorting_1"><center>aslkdjalsjdkaljsdasasdas</center></td>

                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="col-md-12">

                                        <div class="col-md-7">

                                            <table class="table table-bordered table-striped table-condensed">
                                                <thead>
                                                    <tr role="row">
                                                        <th>A.Commitment</th>

                                                    </tr>
                                                </thead>
                                                <tbody role="alert" aria-live="polite" aria-relevant="all">
                                                    <tr class="odd">

                                                        <td class=" sorting_1">1.1  Shun Chuy Gwapo</td>
                                                    </tr>
                                                    <tr class="odd">

                                                        <td class=" sorting_1">1.2  Shun Chuy Gwapo</td>
                                                    </tr>
                                                    <tr class="odd">

                                                        <td class=" sorting_1">1.3  Shun Chuy Gwapo</td>
                                                    </tr>
                                                    <tr class="odd">

                                                        <td class=" sorting_1">1.4  Shun Chuy Gwapo</td>
                                                    </tr>
                                                    <tr class="odd">

                                                        <td class=" sorting_1">1.5  Shun Chuy Gwapo</td>

                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="col-md-4">

                                            <table class="table table-bordered table-striped table-condensed">
                                                <thead>
                                                    <tr role="row">
                                                        <th><center>Scale</center></th>

                                                </tr>
                                                </thead>
                                                <?php
                                                for ($x = 0; $x < 5; $x++) {
                                                    ?>
                                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                                        <tr role="row">

                                                            <td class="checker" id="uniform-inlineCheckbox2"> 
                                                                <span class="">

                                                                    <center>
                                                                        <input type="radio" id="inlineCheckbox2" name ="1.1" value="option2"> 
                                                                        <input type="radio" id="inlineCheckbox2" name ="1.2" value="option2">
                                                                        <input type="radio" id="inlineCheckbox2" name ="1.3" value="option2">
                                                                        <input type="radio" id="inlineCheckbox2" name ="1.4" value="option2">
                                                                        <input type="radio" id="inlineCheckbox2" name ="1.5" value="option2">

                                                                    </center>
                                                                <?php } ?>

                                                            </span>
                                                        </td>
                                                    </tr>

                                                </tbody>


                                            </table>

                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                        <div class="col-md-7">

                                            <table class="table table-bordered table-striped table-condensed">
                                                <thead>
                                                    <tr role="row">
                                                        <th>B. Knowledge of Subjects</th>

                                                    </tr>
                                                </thead>
                                                <tbody role="alert" aria-live="polite" aria-relevant="all">
                                                    <tr class="odd">

                                                        <td class=" sorting_1">1.1  Shun Chuy Gwapo</td>
                                                    </tr>
                                                    <tr class="odd">

                                                        <td class=" sorting_1">1.2  Shun Chuy Gwapo</td>
                                                    </tr>
                                                    <tr class="odd">

                                                        <td class=" sorting_1">1.3  Shun Chuy Gwapo</td>
                                                    </tr>
                                                    <tr class="odd">

                                                        <td class=" sorting_1">1.4  Shun Chuy Gwapo</td>
                                                    </tr>
                                                    <tr class="odd">

                                                        <td class=" sorting_1">1.5  Shun Chuy Gwapo</td>

                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="col-md-4">

                                            <table class="table table-bordered table-striped table-condensed">
                                                <thead>
                                                    <tr role="row">
                                                        <th><center>Scale</center></th>

                                                </tr>
                                                </thead>
                                                <?php
                                                for ($x = 0; $x < 5; $x++) {
                                                    ?>
                                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                                        <tr role="row">

                                                            <td class="checker" id="uniform-inlineCheckbox2"> 
                                                                <span class="">

                                                                    <center>
                                                                        <input type="radio" id="inlineCheckbox2" name ="1.1" value="option2"> 
                                                                        <input type="radio" id="inlineCheckbox2" name ="1.2" value="option2">
                                                                        <input type="radio" id="inlineCheckbox2" name ="1.3" value="option2">
                                                                        <input type="radio" id="inlineCheckbox2" name ="1.4" value="option2">
                                                                        <input type="radio" id="inlineCheckbox2" name ="1.5" value="option2">
                                                                    </center>
                                                                <?php } ?>

                                                            </span>
                                                        </td>
                                                    </tr>

                                                </tbody>


                                            </table>

                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                        <div class="col-md-7">

                                            <table class="table table-bordered table-striped table-condensed">
                                                <thead>
                                                    <tr role="row">
                                                        <th>C. Teaching for Independent Learning</th>

                                                    </tr>
                                                </thead>
                                                <tbody role="alert" aria-live="polite" aria-relevant="all">
                                                    <tr class="odd">

                                                        <td class=" sorting_1">1.1  Shun Chuy Gwapo</td>
                                                    </tr>
                                                    <tr class="odd">

                                                        <td class=" sorting_1">1.2  Shun Chuy Gwapo</td>
                                                    </tr>
                                                    <tr class="odd">

                                                        <td class=" sorting_1">1.3  Shun Chuy Gwapo</td>
                                                    </tr>
                                                    <tr class="odd">

                                                        <td class=" sorting_1">1.4  Shun Chuy Gwapo</td>
                                                    </tr>
                                                    <tr class="odd">

                                                        <td class=" sorting_1">1.5  Shun Chuy Gwapo</td>

                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="col-md-4">

                                            <table class="table table-bordered table-striped table-condensed">
                                                <thead>
                                                    <tr role="row">
                                                        <th><center>Scale</center></th>

                                                </tr>
                                                </thead>
                                                <?php
                                                for ($x = 0; $x < 5; $x++) {
                                                    ?>
                                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                                        <tr role="row">

                                                            <td class="checker" id="uniform-inlineCheckbox2"> 
                                                                <span class="">

                                                                    <center>
                                                                        <input type="radio" id="inlineCheckbox2" name ="1.1" value="option2"> 
                                                                        <input type="radio" id="inlineCheckbox2" name ="1.2" value="option2">
                                                                        <input type="radio" id="inlineCheckbox2" name ="1.3" value="option2">
                                                                        <input type="radio" id="inlineCheckbox2" name ="1.4" value="option2">
                                                                        <input type="radio" id="inlineCheckbox2" name ="1.5" value="option2">
                                                                    </center>
                                                                <?php } ?>

                                                            </span>
                                                        </td>
                                                    </tr>

                                                </tbody>


                                            </table>

                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                        <div class="col-md-7">

                                            <table class="table table-bordered table-striped table-condensed">
                                                <thead>
                                                    <tr role="row">
                                                        <th>D. Management of Learning</th>

                                                    </tr>
                                                </thead>
                                                <tbody role="alert" aria-live="polite" aria-relevant="all">
                                                    <tr class="odd">

                                                        <td class=" sorting_1">1.1  Shun Chuy Gwapo</td>
                                                    </tr>
                                                    <tr class="odd">

                                                        <td class=" sorting_1">1.2  Shun Chuy Gwapo</td>
                                                    </tr>
                                                    <tr class="odd">

                                                        <td class=" sorting_1">1.3  Shun Chuy Gwapo</td>
                                                    </tr>
                                                    <tr class="odd">

                                                        <td class=" sorting_1">1.4  Shun Chuy Gwapo</td>
                                                    </tr>
                                                    <tr class="odd">

                                                        <td class=" sorting_1">1.5  Shun Chuy Gwapo</td>

                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="col-md-4">

                                            <table class="table table-bordered table-striped table-condensed">
                                                <thead>
                                                    <tr role="row">
                                                        <th><center>Scale</center></th>

                                                </tr>
                                                </thead>
                                                <?php
                                                for ($x = 0; $x < 5; $x++) {
                                                    ?>
                                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                                        <tr role="row">

                                                            <td class="checker" id="uniform-inlineCheckbox2"> 
                                                                <span class="">

                                                                    <center>
                                                                        <input type="radio" id="inlineCheckbox2" name ="1.1" value="option2"> 
                                                                        <input type="radio" id="inlineCheckbox2" name ="1.2" value="option2">
                                                                        <input type="radio" id="inlineCheckbox2" name ="1.3" value="option2">
                                                                        <input type="radio" id="inlineCheckbox2" name ="1.4" value="option2">
                                                                        <input type="radio" id="inlineCheckbox2" name ="1.5" value="option2">
                                                                    </center>
                                                                <?php } ?>

                                                            </span>
                                                        </td>
                                                    </tr>

                                                </tbody>


                                            </table>

                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <a href="#" class="btn btn-success  pull-right">Submit</a>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>


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



    </body>
</html>