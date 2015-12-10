
        <?php include 'header.php'; ?>
        <div class="wrapper row-offcanvas row-offcanvas-left" style="min-height: 590px;">

            <aside class="left-side sidebar-offcanvas" style="min-height: 3749px;">
                <?php include 'sidebar.php' ?>
            </aside>
            <aside class="right-side" >

                <section class="content" >


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box">

                                <div class="box-header" style="background: #c10e0e; color: #FFF;">
                                    <h3 class="box-title"><i class="glyphicon glyphicon-th-list"></i><span>&nbsp;DUE DATE DOCUMENTS</span></h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">

                                    <table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th style="width: 50px;">#I.D</th>
                                                <th>Subject</th>
                                                <th>Sender</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>


                                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                                        <?php foreach ($document as $key => $value) {
                                            $str = chunk_split($value->document_id, 2, "-");
                                            $str2 = chunk_split($value->document_id, 4, "-");
                                            $str = explode("-",$str);
                                            $str2 = explode("-",$str2);
                                         ?>
                                            <tr>
                                                <td class=" sorting_1"><?php echo $str[0]."-".$str[1]."-".$str2[1]; ?></td>
                                                <td class=" "><?php echo $value->subject; ?></td>
                                                <td class=" "><?php echo $value->sender; ?></td>
                                                <td class=" "><?php echo $value->due_date; ?></td>
                                                <td class=" ">
                                                    <a href="#" class="btn btn-default btn-sm" data-toggle="modal" data-target="#compose-modal<?php echo $value->document_id; ?>" title="View Document">View Document</a>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                        </tbody>
                                    </table>

                                </div><!-- /.box-body 
                                -->                            </div>
                        </div>
                    </div>
                </section>
            </aside>

        </div>

         <?php 
            foreach ($document as $doc) {
                if($doc->document_id==0){
                    continue;
                }
                 $str = chunk_split($doc->document_id, 2, "-");
                $str2 = chunk_split($doc->document_id, 4, "-");
                $str = explode("-",$str);
                $str2 = explode("-",$str2);
        ?>
        <div class="modal fade" id="compose-modal<?php echo $doc->document_id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">

                <div class="box box-solid" style="background: #4b8355;">
                    <div class="box-header">
                        <h4 class="box-title" style="color: #FFF;"><i class="glyphicon glyphicon-file" style="margin-right: 10px; color: #FFF;"></i>Document Details</h4>
                        <div class="box-tools pull-right">
                            <button class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-12"> 
                            <br>
                            <div class="form-group">
                                <label for="exampleDocumentID">Document I.D :</label>
                                <input type="text" class="form-control" id="exampleDocumentID" name="documentID" value="<?php echo $str[0]."-".$str[1]."-".$str2[1]; ?>" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="exampleSubject">Subject :</label>
                                <input type="text" class="form-control" id="exampleSubject" name="subject" value="<?php echo $doc->subject; ?>" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="exampleSender">Sender :</label>
                                <input type="text" class="form-control" id="exampleSender" name="sender" value="<?php echo $doc->sender; ?>" disabled="">
                            </div>
                            <div class="form-group">
                                <label>Instructions :</label>
                                <textarea class="form-control" rows="3" required="" name="instructions" value="" disabled=""><?php echo $doc->instructions; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleTimeReceived">Time Received :</label>
                                <input type="text" class="form-control" id="exampleTimeReceived" name="timeReceive" value="<?php echo $doc->time_received; ?>" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="exampleDateReceived">Date Received :</label>
                                <input type="text" class="form-control" id="exampleDateReceived" name="dateReceive" value="<?php echo $doc->date_received; ?>" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="exampleDueDate">Due Date :</label>
                                <input type="text" class="form-control" id="exampleDueDate" name="dueDate" value="<?php echo $doc->due_date; ?>" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="exampleReveive">Released Date :</label>
                                <input type="text" class="form-control" id="exampleReleased1Date" name="dueDate" value="<?php echo $doc->released_date; ?>" disabled="">
                            </div>

                            <div class="form-group">
                                <label for="exampleDocumentType">Document Type :</label>
                                <?php
                                    $type = ""; 
                                    foreach ($details as $key => $value) { 
                                        if($value->document_id==$doc->document_id){
                                            foreach ($compliance as $key => $val) {
                                                if($val->compliance_type_id==$value->compliance_type_id){
                                                    $type = $val->compliance_type;
                                                    break;
                                                }
                                            }
                                            break;
                                        }else{} 
                                    }
                                ?>
                                <input type="text" class="form-control" id="exampleDocumentType" name="documentType" value="<?php echo $type;?>" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="exampleOffice">Referred To :</label>
                                <?php
                                $off = "";
                                $x = 0;
                                $bool = false;
                                foreach ($details as $key => $value) { 
                                        if($value->document_id==$doc->document_id){
                                            foreach ($office as $key => $val) {
                                                if($val->office_id==$value->office_id){
                                                    if($val->office_id==13){
                                                        $bool = true;
                                                    }else{
                                                        $off = $off." ".$val->office;
                                                    }
                                                }
                                            }
                                        }else{} 
                                    }
                                $oth = "";
                                if($bool==true){
                                    foreach ($other as $key => $value) {
                                        if($value->document_id==$doc->document_id){
                                            $oth = $value->other;
                                        }
                                    }
                                }else{}
                                ?>
                                <input type="text" class="form-control" id="exampleOffice" name="office" value="<?php echo $off; ?>" disabled="">
                            </div>
                            <div class="form-group">
                                <label for="exampleOthers">Others :</label>
                                <input type="text" class="form-control" id="exampleOthers" name="others" value="<?php echo $oth; ?>" disabled="">
                            </div>
                            <div>
                                <hr>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <p class="" style="padding: 10px; margin: 0px; text-align: center;">
                            Document Monitoring System<br>
                            Region 10, Department of Environment and Natural Resources<br>
                            Copyright &copy 2015, ICT Planning Division
                        </p>
                    </div>

                </div>
            </div>
        </div>
        <?php } ?>





        
        
        <?php include 'script.php'; ?>
        <!--        <footer class="footer bg-black" style="padding: 0px; color:#ffffff; border-top: 3px ridge #cfcfcf;">
                    <p class="" style="padding: 2px; margin: 0px; text-align: center; background-color: #4b8355; font-size: 12px;">
                        <img src="<?php // echo base_url('images/dc_logo.png');                                          ?>" style="height: 20px; width: 20px;">Document Monitoring System<br>
                        Copyright <img src="<?php //echo base_url('images/DENR_Logo.svg_.png');                                          ?>" style="height: 20px; width: 20px; margin-bottom: 3px;"> 2015 Department of Environment and Natural Resources
                    </p>
                </footer>-->
