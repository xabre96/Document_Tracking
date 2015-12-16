
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
                                        <?php echo $due_num; ?>
                                    </h3>
                                    <br>         
                                    <center>
                                        <p style="font-size: 40px; margin-bottom: 50px;">
                                            <a href="<?php echo base_url('Users/viewAdminDueDate') ?>" style="color: #FFF;">DOCUMENTS DUE TODAY</a>
                                        </p>
                                    </center>
                                </div>

                                <div class="icon">
                                    <i class="glyphicon glyphicon-warning-sign"></i>
                                </div>

                            </div>

                        </div>
                        <div class="col-md-6">
                            <!-- small box -->
                            <div class="small-box" style="background: #ffe600;">
                                <div class="inner">
                                    <h3>
                                        <?php echo $follow_num; ?>
                                    </h3>
                                    <br>
                                    <center>
                                        <p style="font-size: 35px; margin-bottom: 57px;">
                                            <a href="<?php echo base_url('Users/viewAdminFollowUp'); ?>" style="color: black;">DOCUMENTS FOR FOLLOW-UP</a>
                                        </p>
                                    </center>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="col-md-6">
                            <div class="small-box" style="background: #cfcdcc;">
                                <div class="inner">
                                    <h3>
                                        <?php echo $acted_num; ?>
                                    </h3>
                                    <br>
                                    <center>
                                        <p style="font-size: 40px; margin-bottom: 57px;">
                                            <a href="<?php echo base_url('Users/viewAdminActed') ?>" style="color: black;">ACTED DOCUMENTS </a>
                                        </p>
                                    </center>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-ok"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="small-box" style="background: #4b8355;">
                                <div class="inner">
                                    <h3>
                                        <?php echo $num; ?>
                                    </h3>
                                    <br>
                                    <center>
                                        <p style="font-size: 40px; margin-bottom: 57px;">
                                            <a href="<?php echo base_url('Users/viewSearchDocuments') ?>" style="color: #FFF;">SEARCH DOCUMENTS </a>
                                        </p>
                                    </center>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-search"></i>
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