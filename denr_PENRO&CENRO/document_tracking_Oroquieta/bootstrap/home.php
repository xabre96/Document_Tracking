<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="bootstrap/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="bootstrap/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="skin-blue fixed">

        <div class="container" style="margin-top: 40px;">
            <br>
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header">
                        <div class="box-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="#">
                    <div class="box box-solid box-danger">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-exclamation"></i> Warning</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <h4>
                                <label>Email Address</label>
                                <input type="email" placeholder="Input Your Email" name="email" class="form-control">
                            </h4>
                        </div>
                        <div class="box-footer">
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                            <button type="submit" name="userid" class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Ok</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <footer class="" style="background-color: #d8d8d8;">

            <p class="text-center no-margin pad" style="width: 100%; background-color: #3C8DBC;">&COPY; 2015 Digitalization</p>
        </footer>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="<?php echo base_url('bootstrap/js/AdminLTE/app_1.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
    </body>
</html>