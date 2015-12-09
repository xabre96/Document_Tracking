
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
                                    <form method="POST" action="<?php echo base_url('Users/addDocument'); ?>">
                                        <div class="col-md-12"> 
                                            <section class="content-header">
                                                
                                                <div class="col-md-3">
                                                    <b>DOCUMENT #I.D </b> <b style="color: red;"><h3>{{year}}-{{month}}-<?php echo $doc_id; ?></h3></b>


                                                </div>
                                                <div class="col-md-3">
                                                    <label for="exampleInputDate">Date Received </label>
                                                    <input type="date" class="form-control" id="exampleInputDate" name="date_received" ng-change="due()" ng-model="date_received" required="" placeholder="YYYY-MM-DD">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Time Received</label>
                                                    <input type="text" class="form-control" name="time_received" ng-model="time_received" required="" placeholder="hh:mm AM/PM">

                                                </div>
                                                <div class="col-md-3">
                                                    <label>DUE DATE RESULT</label>
                                                    <input type="text" name="follow_up" ng-model="follow" hidden=""/>
                                                    <input type="text"  name="due" disabled="" ng-model="date" hidden="" style="display: none;"/>
                                                    <input type="text"  name="due_date" ng-model="slow" hidden="" style="display: none;"/>
                                                    <input type="text" class="form-control" name="dummy" disabled="" ng-model="slow" style="width: 150px; border: none;"/>
                                                </div>
                                                <br>
                                                <hr>
                                            </section>
                                            <br>
                                            <hr>
                                            <div class="box-body">

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="text" name="document_id" hidden="" value="{{year}}{{month}}<?php echo $doc_id; ?>" />
                                                        <p><?php echo validation_errors(); ?></p>
                                                        <div class="form-group">
                                                            <label for="exampleInputSubject">Subject</label>
                                                            <input type="text" class="form-control" id="exampleInputSubject" name="subject" required="" placeholder="Ex. Document RBTS" >
                                                        </div>                      
                                                        <div class="form-group">
                                                            <label for="exampleInputSender">Sender</label>
                                                            <input type="text" class="form-control" id="exampleInputSender" name="sender" required="" placeholder="Ex. Shun Cale">
                                                        </div>                      
                                                        <div class="form-group">
                                                            <label>Instructions</label>
                                                            <textarea class="form-control" rows="6" required="" name="instructions" placeholder="Enter ..."></textarea>
                                                        </div>                       
                                                        <div class="form-group">
                                                            <label for="exampleSelectDate">Document Type</label>
                                                            <select name="compliance" class="form-control" ng-model="choice" ng-change="due()">
                                                                <?php foreach ($data2 as $key => $value) { ?>
                                                                    <option value="<?php echo $value->compliance_type_id; ?>"><?php echo $value->compliance_type; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>                        
                                                   
             
                                                        <div class="form-group">
                                                            <br>
                                                            <button type="submit" value="Start Monitoring" class="btn btn-primary btn-flat form-control">Submit</button>
                                                            <br><br>
                                                            <a href="<?php echo base_url('Users/adminDashboard'); ?>" class="btn btn-default btn-flat form-control">Cancel</a>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-1">
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group" style="margin-left: 50px;">
                                                            <label>Referred to</label>
                                                            <br/>
                                                            <?php foreach ($data as $key => $value) { ?>
                                                                <?php if ($value->office_id == 13) { ?>
                                                                    <input type="checkbox" name="office[]" ng-model="sp" value="<?php echo $value->office_id; ?>"/><?php echo $value->office; ?>
                                                                    <!-- <a ng-click="test()" class="btn btn-default">Others</a> -->
                                                                    <input type="text" ng-if="sp == true" name="others" placeholder="Others" required="" />
                                                                <?php } else { ?>
                                                                    <input type="checkbox" name="office[]" value="<?php echo $value->office_id; ?>"/><?php echo $value->office; ?>
                                                                    <br>
                                                                    <br>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                            <br/>
                                                        </div>
                                                        <div class="form-group" style="margin-left: 50px; margin-top: 25px;">
                                                            <input type="text" class="form-control" name="others">
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
   