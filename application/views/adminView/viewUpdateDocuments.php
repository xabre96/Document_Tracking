
        <?php include 'header.php'; ?>
        <div class="wrapper row-offcanvas row-offcanvas-left" style="min-height: 590px;">

            <aside class="left-side sidebar-offcanvas" style="min-height: 3749px;">
                <?php include 'sidebar.php' ?>
            </aside>
            <aside class="right-side" >

                <section class="content" >
                    <?php echo $this->session->flashdata('message'); ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box">

                                <div class="box-header" style="background: #d98c3a; color: #FFF;">
                                    <h3 class="box-title"><i class="glyphicon glyphicon-pencil"></i><span>&nbsp; UPDATE DOCUMENTS</span></h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">

                                    <table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th style="width: 80px;">#I.D</th>
                                                <th>Subject</th>
                                                <th>Sender</th>
                                                <th>Due Date</th>
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
                                                    <a href="#" class="btn btn-default btn-sm" data-toggle="modal" data-target="#compose-modal<?php echo $value->document_id; ?>" title="View Document">View Document
                                                    </a>
                                                    <a href="<?php echo base_url('Users/viewUpdateComplianceForm/'.$value->document_id); ?>" class="btn btn-default btn-flat btn-sm" title="Update Document"><i class="glyphicon glyphicon-pencil"></i>Update</a>
                                                    <?php if($this->session->userdata('user_name')=="ICT"){ ?>
                                                    <!-- <a href="<?php echo base_url('Users/deleteComplianceForm/'.$value->document_id); ?>" class="btn btn-default btn-flat btn-sm" title="Update Document"><i class="glyphicon glyphicon-trash"></i>Delete</a> -->
                                                    <a href="#" data-toggle="modal" data-target="#delete<?php echo $value->document_id; ?>" class="btn btn-default btn-flat btn-sm" title="Update Document"><i class="glyphicon glyphicon-trash"></i>Delete</a>
                                                    <?php } ?>
                                                    <a href="<?php echo base_url('Users/viewPrint/'.$value->document_id); ?>" class="btn btn-default btn-sm" title="View Print">View Print</a>
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


<!-- Delete Modal -->
<?php 
    foreach ($document as $doc) {
        if($doc->document_id==0){
        continue;
    }
?>
<div class="modal fade" id="delete<?php echo $doc->document_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete Document</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this document?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="<?php echo base_url('Users/deleteComplianceForm/'.$doc->document_id); ?>" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>

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
                             <p><b>Due Date</b><br><b style="color: red;"><?php echo $doc->due_date; ?></b></p>
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
                            <p><b>Released Date :</b><b style="color: blue;"> <?php echo $doc->released_date; ?></b></p>
                      
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






       
        <script src="<?php echo base_url('bootstrap/script/jquery.js'); ?>"></script>
        <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js" type="text/javascript'); ?>"></script>

        <script src="<?php echo base_url('bootstrap/js/plugins/datatables/jquery.dataTables.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('bootstrap/js/plugins/datatables/dataTables.bootstrap.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('bootstrap/js/AdminLTE/app.js'); ?>" type="text/javascript"></script>
        <script type="text/javascript">
            $(function () {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>
 <?php  include 'script.php'; ?>