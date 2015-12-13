
        <?php include 'header.php'; ?>
        <div class="wrapper row-offcanvas row-offcanvas-left" style="min-height: 590px;">

            <aside class="left-side sidebar-offcanvas" style="min-height: 3749px;">
                <?php include 'sidebar.php' ?>
            </aside>
            <aside class="right-side" >
                <section class="content" >
                    <div class="row">    

                        <div class="col-md-12">
                            <div class="box box-solid">
                                <div class="row">
                                <?php 
                                
                                    foreach ($data as $key => $value) {
                                     $str = chunk_split($value->document_id, 2, "-");
                                     $str2 = chunk_split($value->document_id, 4, "-");
                                    $str = explode("-",$str);
                                    $str2 = explode("-",$str2);
                                ?>
                                    <form method="POST" action="<?php echo base_url('Users/editDocument/'.$value->document_id); ?>">
                                        <div class="col-md-12"> 
                                            <section class="content-header">
                                                <br>
                                                <div class="col-md-3">
                                                    
                                                    <b>DOCUMENT #I.D </b> <b style="color: red;">
                                                        <h3>
                                                            <?php echo $str[0]."-".$str[1]."-".$str2[1]; ?>
                                                        </h3>
                                                    </b>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="exampleInputDate">Date Received </label>
                                                    <input type="text" class="form-control" id="exampleInputDate" value="<?php echo $value->date_received; ?>" disabled="">
                                                    <input type="text" class="form-control" id="exampleInputDate" value="<?php echo $value->date_received; ?>" style="display:none;" name="date_received">
                                                    <!-- <input type="date" class="form-control" id="exampleInputDate" ng-change="due()" ng-model="date_received"> -->
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Time Received</label>
                                                    <?php foreach ($time as $key => $time) { ?>
                                                    <input type="text" value="<?php echo $time->time_received; ?>" style="display: none;" class="form-control" name="time_received">
                                                    <input type="text" value="<?php echo $time->time_received; ?>" class="form-control"  disabled="">
                                                </div>
                                                <?php 
                                                    break;
                                                    } 
                                                    foreach ($date as $key => $date) {
                                                        $due = $date->due_date; 
                                                        $follow = $date->followUp_date;
                                                ?>
                                                <div class="col-md-3">
                                                    <label>DUE DATE RESULT</label>
                                                    <!-- <input type="text" name="follow_up" ng-model="follow" hidden="" value="<?php echo $due; ?>"/>
                                                    <input type="text"  name="due" disabled="" ng-model="date" hidden="" style="display: none;"/>
                                                    <input type="text"  name="due_date" value="<?php echo $due; ?>" ng-model="slow" hidden="" style="display: none;"/>
                                                    <input type="text" class="form-control" value="<?php echo $due; ?>" name="dummy" disabled="" ng-model="slow" style="width: 150px; border: none;"/> -->
                                                    <input type="text" name="follow_up" value="<?php echo $follow; ?>" hidden=""/>
                                                    <!-- <input type="text"  name="due" disabled="" ng-model="date" hidden="" style="display: none;"/> -->
                                                    <input type="text"  name="due_date" value="<?php echo $due; ?>" style="display: none;"/>
                                                    <input type="text" class="form-control" value="<?php echo $due; ?>" disabled=""  style="width: 150px; border: none;"/>
                                                </div>
                                                <?php } ?>
                                                <br>
                                                <hr>
                                            </section>
                                            <br>
                                            <hr>
                                            <div class="box-body">
                                                <div class="row" style="margin-left: 10px;">
                                                    <div class="col-md-4">
                                                        <p><?php echo validation_errors(); ?></p>
                                                        <div class="form-group">
                                                            <label for="exampleInputSubject">Subject</label>
                                                            <textarea class="form-control" rows="3" id="exampleInputSubject" required="" name="subject" placeholder="Enter ..."><?php echo $value->subject; ?></textarea>
                                                        </div>                      
                                                        <div class="form-group">
                                                            <label for="exampleInputSender">Sender</label>
                                                            <input type="text" class="form-control" id="exampleInputSender" value="<?php echo $value->sender; ?>" name="sender" required="" placeholder="Ex. Shun Cale">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Sender Address/Office</label>
                                                            <textarea class="form-control" rows="3" required="" name="senderAddress" placeholder="Enter ..."><?php echo $value->address; ?></textarea>
                                                        </div>                        
                                                        <div class="form-group">
                                                            <label>Instructions</label>
                                                            <textarea class="form-control" rows="3" required="" name="instructions" placeholder="Enter ..."><?php echo $value->instructions; ?></textarea>
                                                        </div>
                                                        <?php 
                                                            foreach ($detail as $key => $ve) { 
                                                                $type_id = $ve->compliance_type_id;
                                                                break;
                                                            }
                                                        ?>
                                                        <div class="form-group">
                                                            <label for="exampleSelectDate">Document Type</label>
                                                            <select class="form-control" disabled="">
                                                                <?php foreach ($detail as $key => $ve) { 
                                                                        $type_id = $ve->compliance_type_id;
                                                                        break;
                                                                    }
                                                                    foreach ($data2 as $key => $va) {
                                                                        if($type_id==$va->compliance_type_id){
                                                                            $type = $va->compliance_type; 
                                                                            break;   
                                                                        }
                                                                    }
                                                                ?>
                                                                <option selected=""><?php echo $type; ?></option>
                                                            </select>
                                                            <input name="compliance" type="text" hidden="" value="<?php echo $type_id; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <?php if($value->status_id==1){?>
                                                            <button type="submit" value="Start Monitoring" class="btn btn-primary btn-flat" style="width: 100px;">Submit</button>
                                                            <a href="<?php echo base_url('Users/viewUpdateDocuments'); ?>" class="btn btn-default btn-flat" style="width: 100px;">Cancel</a>
                                                            <a href="<?php echo base_url('Users/updateStatus/'.$value->document_id); ?>" class="btn btn-success btn-flat" style="width: 125px;">ReleaseDocument</a>
                                                            <?php }else{ ?>
                                                            <a href="#" disabled="" class="btn btn-primary btn-flat" style="width: 100px;">Submit</a>
                                                            <a href="<?php echo base_url('Users/viewUpdateDocuments'); ?>" class="btn btn-default btn-flat" style="width: 100px;">Cancel</a>
                                                            <a href="#" class="btn bg-gray btn-flat " disabled="" style="width: 120px;">DocumentActed</a>
                                                            <?php } ?>
                                                        </div>
                                                    <?php } ?>
                                                    </div>
                                                    <div class="col-md-1">
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group" style="margin-left: 50px;">
                                                            <label>Referred to</label>
                                                                     <br/>
                                                                     <?php 
                                                                        $x = 0;
                                                                        $y = 0;
                                                                        $temp = 0;
                                                                        // $ids = 0;

                                                                        foreach ($detail as $key => $v) {
                                                                                $ids[$x] = $v->office_id;
                                                                                $x++;
                                                                        }
                                                                        $x = 0;
                                                                        if($ids!=null){
                                                                            sort($ids);    
                                                                        }

                                                                        if($value->status_id==0){
                                                                            foreach ($office as $key => $vale) {

                                                                            if($vale->office_id==$ids[$y]){
                                                                        ?>
                                                                            <input type="checkbox" checked="" />
                                                                            <!-- <input type="checkbox" checked="checked" name="office[]" style="display: none;" value="<?php echo $vale->office_id?>"/> -->
                                                                            <input type="text" name="office[]" style="display: none;" value="<?php echo $vale->office_id?>">
                                                                            <?php echo $vale->office;?>
                                                                        <?php   
                                                                                $y++; 
                                                                                if($y==count($ids)){
                                                                                    $y=0;
                                                                                }     
                                                                                
                                                                            }else{
                                                                        ?>
                                                                            <input type="checkbox" name="office[]" value="<?php echo $vale->office_id?>"/>
                                                                            <?php echo $vale->office;?>
                                                                        <?php
                                                                            }
                                                                            echo "<br/>";
                                                                        }    
                                                                        }
                                                                        else{
                                                                        foreach ($office as $key => $vale) {

                                                                            if($vale->office_id==$ids[$y]){
                                                                        ?>
                                                                            <!-- <input type="checkbox" checked="" /> -->
                                                                            <input type="checkbox" checked="checked" name="office[]" style="display: none;" value="<?php echo $vale->office_id?>"/>
                                                                            <!-- <input type="text" name="office[]" style="display: none;" value="<?php echo $vale->office_id?>"> -->
                                                                            <?php echo $vale->office;?>
                                                                        <?php   
                                                                                $y++; 
                                                                                if($y==count($ids)){
                                                                                    $y=0;
                                                                                }     
                                                                                
                                                                            }else{
                                                                        ?>
                                                                            <input type="checkbox" name="office[]" value="<?php echo $vale->office_id?>"/>
                                                                            <?php echo $vale->office;?>
                                                                        <?php
                                                                            }
                                                                            echo "<br/>";
                                                                        }
                                                                        }
                                                                        $others = "";
                                                                        foreach ($other as $key => $ot) {
                                                                            $others = $ot->other;
                                                                        }    
                                                                                        ?>
                                                                    </div>
                                                                        <div class="form-group" style="margin-left: 50px; margin-top: 25px;">
                                                                        <label for="exampleSelectDate">Action Man</label>
                                                                        <?php if($others==""){?>
                                                                        <textarea class="form-control" rows="5" id="exampleInputSubject" name="others" placeholder="Enter ..."></textarea>
                                                                             
                                                                        <?php } else{ ?>
                                                                            <textarea class="form-control" rows="5" id="exampleInputSubject" name="others" placeholder="Enter ..."><?php echo $others; ?></textarea>
                                                                            <!-- <textarea class="form-control" rows="5" style="display: none;" id="exampleInputSubject" required="" name="others" placeholder="Enter ..."> <?php echo $others; ?></textarea> -->
                                                                                                            
                                                                        <?php } ?>
                                                                        </div>
                                                                        <?php echo @$message; ?>
                                                                         </div>

                                                      </div>
                                                   </div>

                                               </div>
                                            </form>
                                        </div>
                                        
                            </div>
                        </div>
                    </div>
                </section>
            </aside>
        </div>




        <?php include 'script.php'; ?>
   