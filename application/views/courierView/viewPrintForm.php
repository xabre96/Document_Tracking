
        <?php include 'header.php'; ?>
        <div class="wrapper row-offcanvas row-offcanvas-left" style="min-height: 590px;">

            <aside class="left-side sidebar-offcanvas" style="min-height: 3749px;">
                <?php include 'sidebar.php' ?>
            </aside>
            <aside class="right-side" >
                <section class="content" >
                <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <div class="row">
                          
                                <div class="box" style="border: none;">
                                <div class="row no-print" style="margin-left: 10px;">
                                        <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                                    </div>
                                    <div class="box-header">
                                      <center>
                                            <img src="<?php echo base_url('images/printview_logo.png'); ?>" alt="image-logo" style="position: relative; width: 100%; height: 150px; margin-top: 10px;">
                                        
                                      </center>
                                    </div>
                                    <?php foreach ($document as $key => $value) {
                                            $str = chunk_split($value->document_id, 2, "-");
                                            $str2 = chunk_split($value->document_id, 4, "-");
                                            $str = explode("-",$str);
                                            $str2 = explode("-",$str2);
                                         ?>
                                        <label style="font-size: 12px; margin-left: 17px;">Document ID: <?php echo $str[0]."-".$str[1]."-".$str2[1]; ?></label>
                                       
                                          <label style="font-size: 12px; margin-left: 22px;">Date Received: <?php echo $value->date_received; ?></label>
                                          <?php foreach ($time as $key => $time) { ?>
                                           <label style="font-size: 12px; margin-left: 22px;">Time Received: <?php echo $time->time_received; ?></label>
                                           <?php 
                                           } 
                                           foreach ($date as $key => $date) {
                                                        $due = $date->due_date; 
                                                        $follow = $date->followUp_date;
                                                        $released = $date->released_date;
                                            }
                                           ?>
                                            <label style="font-size: 12px; margin-left: 22px;">Released Date: <?php echo $released; ?></label>
                                           
                                            <br><br>
                                            <label style="font-size: 12px; margin-left: 17px;">Subject : <?php echo $value->subject; ?></label>
                                            <br>
                                            <label style="font-size: 12px; margin-left: 17px;">Sender : <?php echo $value->sender; ?></label>
                                            <br><br>
                                            <label style="font-size: 12px; margin-left: 17px;">Sender Address/Office : <?php echo $value->address; ?></label>
                                            <br>
                                            <?php
                                            // foreach ($detail as $key => $ve) { 
                                            //     $type_id = $ve->compliance_type_id;
                                            //     break;
                                            // }
                                            foreach ($details as $key => $ve) { 
                                                $type_id = $ve->compliance_type_id;
                                                break;
                                            }
                                            foreach ($compliance as $key => $va) {
                                                if($type_id==$va->compliance_type_id){
                                                    $type = $va->compliance_type; 
                                                    break;   
                                                }
                                            }
                                            ?>
                                            <label style="font-size: 12px; margin-left: 17px;">Document Type : <?php echo $type; ?></label>
                                            <br>
                                            <label style="font-size: 12px; margin-left: 17px;">Due Date : <?php echo $due; ?></label>
                                            <br><br>
                                            <?php
                                                $off = "";
                                                $x = 0;
                                                $bool = false;
                                                foreach ($details as $key => $val) { 
                                                        if($value->document_id==$val->document_id){
                                                            foreach ($office as $key => $va) {
                                                                if($val->office_id==$va->office_id){
                                                                    if($va->office_id==13){
                                                                        $bool = true;
                                                                    }else{
                                                                        $off = $off." ".$va->office.", ";
                                                                    }
                                                                }
                                                            }
                                                        }else{} 
                                                    }
                                                $oth = "";
                                                if($bool==true){
                                                    foreach ($other as $key => $val) {
                                                        if($val->document_id==$value->document_id){
                                                            $oth = $val->other;
                                                        }
                                                    }
                                                }else{}
                                            ?>
                                            <label style="font-size: 12px; margin-left: 17px;">Referred To : <?php echo chop($off,", "); ?></label>
                                            <br>
                                            <label style="font-size: 12px; margin-left: 17px;">Action Man : <?php echo $oth; ?></label>
                                            <br>
                                            <label style="font-size: 12px; margin-left: 17px;">Instructions : <?php echo $value->instructions; ?></label>

                                       <br><br><br>
                                       <hr>
                                  <?php } ?>
                                </div>
                            </div>

                        </div>
                </section>
            </aside>

        </div>
         

        <?php include 'script.php'; ?>