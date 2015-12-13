
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

                                  <div class="box-header" style="background: #cfcdcc; color: black;">
                                    <h3 class="box-title"><i class="glyphicon glyphicon-ok"></i><span>&nbsp;ACTED DOCUMENTS</span></h3>                                     
                                </div><!-- /.box-header -->
                                <br>
                                <section class="content-header">
                                    <small>
                                        <a href="<?php echo base_url('Users/exportActedDocuments'); ?>" target="_blank" class="btn-success btn-flat btn-xs" style="font-size: 15px; margin-left: 10px;"><i class="fa  fa-file-text-o fa-fw" style="font-size: 13px;"></i>Export to Excel</a>
                                    </small>
                                </section>
                                <div class="box-body table-responsive">

                                    <table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th style="width: 50px;">#I.D</th>
                                                <th>Subject</th>
                                                <th>Sender</th>
                                                <th>Acted Date</th>
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
                                                <td class=" "><?php echo $value->released_date; ?></td>
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

                <div class="box box-solid" style="background: gray;">
                    <div class="box-header">
                        <h4 class="box-title" style="color: #FFF;"><i class="glyphicon glyphicon-file" style="margin-right: 10px; color: #FFF;"></i>Document Details</h4>
                        <div class="box-tools pull-right">
                            <button class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">

                        <div class="col-md-12"> 
                            <br>
                            
                            <div class="col-md-3">
                            <p><b>Document #I.D</b><b style="color: green;">&nbsp; <?php echo $str[0]."-".$str[1]."-".$str2[1]; ?></b></p>
                            </div>
                            <div class="col-md-3">
                             <p><b>Date Received</b>&nbsp; <?php echo $doc->date_received; ?></p>   
                            </div>
                            <div class="col-md-3">
                             <p><b>Time Received</b>&nbsp; <?php echo $doc->time_received; ?></p>
                            </div>
                            <div class="col-md-3">
                                <p><b>Released Date</b><br><b style="color: blue;"> <?php echo $doc->released_date; ?></b></p>
                            </div>
                        </div>
                        <div class="col-md-12" >
                                <hr>
                        <div class="col-md-6">
                             <p><b>Subject :</b> <?php echo $doc->subject; ?></p>
                            <p><b>Sender :</b> <?php echo $doc->sender; ?></p>
                            <p><b>Sender's Address/Office:</b><br/><?php echo $doc->address; ?></p>
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
                            <p><b>Document Type :</b> <?php echo $type;?></p>
                            <p><b>Due Date :</b><b style="color: red;"> <?php echo $doc->due_date; ?></b></p>
                      
                        </div>
                        
                            <div class="col-md-6">
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
                                                        $off = $off." ".$val->office.", ";
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
                                
                                <p><b>Referred To :</b> <?php echo chop($off,", "); ?></p>
                                <p><b>Action Man :</b> <?php echo $oth; ?></p>

                             </div>
                            
                        </div>

                        <div class="col-md-12">
                        <p style=" padding: 10px; margin-left: 5px;"><b>Instructions :</b> <?php echo $doc->instructions; ?></p>
                       
                        </div>

                        
                    </div>

                     <div class="box-footer">
                        <p class="" style="padding: 10px; margin-top: 350px; text-align: center;">
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
