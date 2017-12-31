<!-- main content start-->
            <section id="main-content">
                <section class="wrapper">            
                    <!--overview start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-laptop"></i> ADD DEVICE</h3>
                        </div>
                    </div>
                    <?php if ($details) {
                        foreach ($details as $d) {}
                        foreach ($owner as $o) {}
                        foreach ($branch as $b) {}
                            foreach ($branch2 as $b2) {}
                    } ?>
 <form action="<?php echo site_url();?>/CDevice/updateDevice" method="POST">                   
                    <div class="panel panel-default">
                        <div class="panel panel-heading">EMPLOYEE OWNER DATA</div>
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label for="owner">Device Owner: </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control empid" placeholder="Search for Employee ID" name="owner" id="owner" value="<?php echo $d->deviceOwner; ?>">
                                        <span class="input-group-btn">
                                            <a class="btn btn-primary owner" type="button"><i class="fa fa-search"></i></a>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="name" >Employee Name:</label>
                                    <input class=" form-control" type="text" name="dname" id="dname" value="<?php echo $o->empFName." ".$o->empMName." ".$o->empLName; ?>" readonly="">
                                </div>
                            </div>
                            <div class="row ownerDetails" >
                                <div class="col-lg-6 form-group">
                                    <label for="name" >Employee Position:</label>
                                    <input class=" form-control" type="text" name="dposition" id="dposition" value="<?php echo $o->empPosition;  ?>" readonly="">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="name" >Employee Branch Asignment:</label>
                                    <input type="hidden" name="bcode" id="bcode">
                                    <input class=" form-control" type="text" name="dbranch" id="dbranch" value="<?php echo $b->branchCode." - ".$b->branchName?>" readonly="">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel panel-heading">HARDWARE DATA</div>
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-lg-6 form-group  ">
                                    <label for="owner">Device Name: </label>
                                    <input type="hidden" name="devID" value="<?php echo $d->deviceID; ?>" >
                                    <input class=" form-control" type="text" name="name" id="name" required="" value="<?php echo $d->deviceName; ?>">
                                </div>
                                 <div class="col-lg-6 form-group ">
                                    <label for="owner">Device Brand / Model: </label>
                                    <input class=" form-control" type="text" name="dbrand" id="dbrand" value="<?php echo $d->deviceBrand; ?>" required="">
                                </div>
                            </div>
                            <div class="row">
                                 <div class="col-lg-6 form-group ">
                                    <label for="owner">Device Serial Number: </label>
                                    <input class=" form-control" type="text" name="serial" id="serial" value="<?php echo $d->deviceSerialNo; ?>" required="">
                                </div>
                                <div class="col-lg-6 form-group  ">
                                    <label for="owner">Device Location: </label>
                                    <select class="form-control" name="location" id="location">
                                        <option hidden="" value="<?php echo $d->deviceLocation; ?>"><?php echo $b2->branchCode." - ".$b2->branchName; ?></option>
                                        <?php if($branch1) {
                                            foreach ($branch1 as $b1) {
                                                echo "<option value='$b1->branchCode'>$b1->branchCode - $b1->branchName</option>";
                                                # code...
                                            }
                                        } ?>
                                        <!-- <option value="Desktop">Desktop</option>
                                        <option value="Laptop">Laptop</option>
                                        <option value="Tablet">Tablet</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 form-group  ">
                                    <label for="owner">Device Processor: </label>
                                    <input class=" form-control" type="text" name="processor" id="processor" value="<?php echo $d->deviceProcessor; ?>" required="">
                                </div>
                                 <div class="col-lg-6 form-group ">
                                    <label for="owner">Device Memory Size / Brand / Type: </label>
                                    <input class=" form-control" type="text" name="memory" id="memory" value="<?php echo $d->deviceMemory; ?>" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 form-group  ">
                                    <label for="owner">Device Hard Disk / Brand / Size: </label>
                                    <input class=" form-control" type="text" name="disk" id="disk" value="<?php echo $d->deviceDisk; ?>" required="">
                                </div>
                                 <div class="col-lg-6 form-group ">
                                    <label for="owner">Device Hard Disk Serial Number: </label>
                                    <input class=" form-control" type="text" name="dserial" id="dserial" value="<?php echo $d->deviceDiskSerial; ?>" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 form-group  ">
                                    <label for="owner">Device LAN IP Address: </label>
                                    <input class=" form-control" type="text" name="lanip" id="lanip" value="<?php echo $d->deviceLANIP; ?>" required="">
                                </div>
                                 <div class="col-lg-6 form-group ">
                                    <label for="owner">Device LAN MAC Address: </label>
                                    <input class=" form-control" type="text" name="macadd" id="macadd" value="<?php echo $d->deviceLANMAC; ?>" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 form-group  ">
                                    <label for="owner">Device WLAN IP Address: </label>
                                    <input class=" form-control" type="text" name="wlanip" id="wlanip" value="<?php echo $d->deviceWLANIP; ?>" required="">
                                </div>
                                 <div class="col-lg-6 form-group ">
                                    <label for="owner">Device WLAN MAC Address: </label>
                                    <input class=" form-control" type="text" name="wlanmac" id="wlanmac" value="<?php echo $d->deviceWLANMAC; ?>" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 form-group  ">
                                    <label for="owner">Device Type: </label>
                                    <select class="form-control" name="type" id="type">
                                        <option hidden="" value="<?php echo $d->deviceType; ?>"><?php echo $d->deviceType; ?></option>
                                        <option value="Desktop">Desktop</option>
                                        <option value="Laptop">Laptop</option>
                                        <option value="Tablet">Tablet</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 form-group  ">
                                    <label for="owner">Device Power Condition: </label>
                                     <select class="form-control" name="power" id="power">
                                        <option hidden="" value="<?php echo $d->devicePower; ?>"><?php echo $d->devicePower; ?></option>
                                        <option value="UPS">UPS</option>
                                        <option value="NORMAL">NORMAL</option>
                                        <option value="W/ SURGE PROTECTOR">W/ SURGE PROTECTOR</option>
                                        <option value="OUTLETS">OUTLETS</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>


                    <!-- <div class="row"> -->
                        <button class="btn btn-success" type="submit"><i class="fa fa-edit"></i> Edit Device</button>
                        <a class="btn btn-default" data-target="#cancel" data-toggle="modal"><i class="fa fa-times"></i> Cancel</a>
                    <!-- </div> -->
                    
                        
</form>

                </section>
            </section>
            <!--main content end-->
        </section> <!--DO NOT DELETE -->
 <!-- container section start  -->

<div aria-hidden="true" aria-labelledby="promptLabel" role="dialog" tabindex="-1" id="prompt" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> WARNING</h4>
            </div>
            <div class="modal-body">
                        
                    <h4>Enter Employee ID!</h4> 
            
            </div>
            <div class="modal-footer">
               <!--  <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button> -->
                <button class="btn btn-success btn-danger"   data-dismiss="modal" type="submit">OK</button>
            </div>

        </div>
    </div>
</div>

<div aria-hidden="true" aria-labelledby="prompt2Label" role="dialog" tabindex="-1" id="prompt2" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> WARNING</h4>
            </div>
            <div class="modal-body">
                        
                    <h4>Employee Does Not Exists!</h4> 
            
            </div>
            <div class="modal-footer">
               <!--  <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button> -->
                <button class="btn btn-success btn-danger" data-dismiss="modal" type="submit">OK</button>
            </div>

        </div>
    </div>
</div>


<div aria-hidden="true" aria-labelledby="cancelLabel" role="dialog" tabindex="-1" id="cancel" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> WARNING</h4>
            </div>
            <div class="modal-body">
                        
                    <h4>Are you sure you want to leave this page?</h4> 
            
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">No</button>
                <a class="btn btn-success btn-danger" href="<?php echo site_url();?>/CDevice/displayDevices" type="submit">Yes</a>
            </div>

        </div>
    </div>
</div>