<?php include 'header.php'; ?>
<div class="wrapper row-offcanvas row-offcanvas-left" style="min-height: 590px;">

    <aside class="left-side sidebar-offcanvas" style="min-height: 3749px;">
        <?php include 'sidebar.php' ?>
    </aside>
    <aside class="right-side">
        <section class="content">
            <div class="box box-solid">
                <form method="POST" action="<?php echo base_url('Users/addDocument'); ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <section class="content-header">
                                <br>
                                <div class="col-md-2">
                                    <b>DOCUMENT #I.D. </b>
                                    <b style="color: red;">
                                        <h3>
                                            {{year}}-{{month}}-<?php echo $doc_id; ?>
                                        </h3>
                                    </b>
                                </div>
                                <div class="col-md-3">
                                    <div>
                                        <label for="exampleInputDate">Date Received </label>
                                        <input type="date" class="form-control" id="exampleInputDate"
                                               name="date_received" ng-change="due()" ng-model="date_received"
                                               required="" placeholder="YYYY-MM-DD">
                                    </div>
                                    <br>
                                    <div>
                                        <div>
                                            <label>Time Received</label>
                                            <input type="time" class="form-control" name="time_received"
                                                   ng-model="time_received" required="" placeholder="hh:mm AM/PM">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div>
                                        <label for="">Follow-up Date</label>
                                        <input type="text">
                                    </div>
                                    <br>
                                    <div>
                                        <label>Due Date</label>
                                        <input type="text" name="follow_up" ng-model="follow" hidden=""/>
                                        <input type="text" name="due" disabled="" ng-model="date" hidden=""
                                               style="display: none;"/>
                                        <input type="text" name="due_date" ng-model="slow" hidden=""
                                               style="display: none;"/>
                                        <input type="text" class="form-control" name="dummy" disabled=""
                                               ng-model="slow" style="width: 150px; border: none;"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleSelectDate">Document Type</label>
                                        <select name="compliance" class="form-control" ng-model="choice"
                                                ng-change="due()">
                                            <?php foreach ($data2 as $key => $value) { ?>
                                                <option value="<?php echo $value->compliance_type_id; ?>"><?php echo $value->compliance_type; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <br>
                                    <div>
                                        <button class="btn btn-success">Save</button>
                                        <button class="btn btn-primary">Print</button>
                                        <button class="btn btn-danger">Cancel</button>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row" style="margin-left: 10px;">
                            <br>
                            <div class="col-md-6">
                                <input type="text" name="document_id" hidden=""
                                       value="{{year}}{{month}}<?php echo $doc_id; ?>"/>
                                <p><?php echo validation_errors(); ?></p>
                                <div class="form-group">
                                    <textarea placeholder="Subject" class="form-control" id="exampleInputSubject"
                                              required="" name="subject" style="height: 80px;width: 500px;"></textarea>
                                </div>
                                <div class="form-group">
                                <textarea placeholder="Name of Sender and Address/Office" class="form-control" style="height: 80px;width: 500px;" required=""
                                          name="sender"></textarea>
                                </div>
                                <div class="form-group">
                                    <textarea placeholder="Remarks from the Office of the RD" class="form-control" style="height: 80px;width: 500px;" required=""
                                              name="remarks"></textarea>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="referredTo" style="width: 97%">
                                        <option value="" disabled selected>Referred To</option>
                                        <option value="ARD MS">ARD MS</option>
                                        <option value="ARD TS">ARD TS</option>
                                        <option value="EMB">EMB</option>
                                        <option value="MGB">MGB</option>
                                        <option value="RSCIS">RSCIS</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <textarea name="instructions" class="form-control" style="height: 80px;width: 500px;" required="" placeholder="ARD's Instructions"></textarea>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="actionOffice" style="width: 97%">
                                        <option value="" disabled selected>Action Office</option>
                                        <option value="Admin Division">Admin Division</option>
                                        <option value="Finance Division">Finance Division</option>
                                        <option value="Legal Division">Legal Division</option>
                                        <option value="PMD">PMD</option>
                                        <option value="CDD">CDD</option>
                                        <option value="ED">ED</option>
                                        <option value="LPDD">LPDD</option>
                                        <option value="SMD">SMD</option>
                                        <option value="INREMP">INREMP</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Date and Time Received By Action Office</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="form-group" style="margin-top: 20px;">
                                    <textarea style="height: 180px;" placeholder="Additional Notes for Document Action" class="form-control" name="additionalNotes" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Final Action</label>
                                    <input type="file">
                                </div>
                            </div>
<!--                            <div class="col-md-1">-->
<!--                            </div>-->
<!--                            <div class="col-md-5">-->
<!--                                <div class="form-group">-->
<!--                                    <label>Referred to</label>-->
<!--                                    <br/>-->
<!--                                    --><?php //foreach ($data as $key => $value) { ?>
<!--                                        --><?php //if ($value->office_id == 13) { ?>
<!--                                            <input type="checkbox" name="office[]" ng-model="sp"-->
<!--                                                   value="--><?php //echo $value->office_id; ?><!--"/>--><?php //echo $value->office; ?>
<!--                                            <input type="text" ng-if="sp == true" name="others"-->
<!--                                                   placeholder="Others" required=""/>-->
<!--                                        --><?php //} else { ?>
<!--                                            <input type="checkbox" name="office[]"-->
<!--                                                   value="--><?php //echo $value->office_id; ?><!--"/>--><?php //echo $value->office; ?>
<!--                                            <br>-->
<!--                                    --><?php //}} ?>
<!--                                </div>-->
<!--                                <div class="form-group" style="margin-top: 10px;">-->
<!--                                    <label for="exampleSelectDate">Action Man</label>-->
<!--                                    <textarea class="form-control" rows="5" id="exampleInputSubject"-->
<!--                                              name="others" placeholder="Enter ..."></textarea>-->
<!--                                </div>-->
<!--                                --><?php //echo @$message; ?>
<!--                            </div>-->
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </aside>
</div>

<?php include 'script.php'; ?>
   