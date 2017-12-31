<!-- main content start-->
            <section id="main-content">
                <section class="wrapper">            
                    <!--overview start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-laptop"></i> DEVICE INFO</h3>
                        </div>
                    </div> 
                    <?php if (isset($owner) && isset($branch) && isset($device) && isset($branch1)) {?>    
                    <?php foreach ($owner as $o) {} ?>   
                    <?php foreach ($branch as $b) {} ?> 
                    <?php foreach ($branch1 as $b1) {} ?>         
                    <?php foreach ($device as $d) {} ?> 
                    <div class="panel panel-default">
                        <div class="panel panel-heading">EMPLOYEE OWNER DATA</div>
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label for="owner">Employee ID: </label>
                                    <input type="text" class="form-control empid" placeholder="Search for Employee ID" name="owner" id="owner" readonly="" value="<?php echo $o->empID; ?>">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="name" >Employee Name:</label>
                                    <input class=" form-control" type="text" name="dname" id="dname" readonly="" value="<?php echo $o->empFName." ".$o->empMName." ".$o->empLName; ?>" >
                                </div>
                            </div>
                            <div class="row ownerDetails" >
                                <div class="col-lg-6 form-group">
                                    <label for="name" >Employee Position:</label>
                                    <input class=" form-control" type="text" name="dposition" id="dposition" value="<?php echo $o->empPosition; ?>" readonly="">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="name" >Employee Branch Asignment:</label>
                                    <input type="hidden" name="bcode" id="bcode">
                                    <input class=" form-control" type="text" name="dbranch" id="dbranch" value="<?php echo $o->empBranchCode." - ".$b->branchName; ?>" readonly="">
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
                                    <input class=" form-control" type="text" name="name" id="name" value="<?php echo $d->deviceName; ?>" readonly>
                                </div>
                                 <div class="col-lg-6 form-group ">
                                    <label for="owner">Device Brand / Model: </label>
                                    <input class=" form-control" type="text" name="dbrand" id="dbrand" value="<?php echo $d->deviceBrand; ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 form-group  ">
                                    <label for="owner">Device Location: </label>
                                   <input class=" form-control" type="text" name="dbrand" id="dbrand" value="<?php echo $d->deviceLocation." - ".$b1->branchName; ?>" readonly>
                                </div>
                                 <div class="col-lg-6 form-group ">
                                    <label for="owner">Device Serial Number: </label>
                                    <input class=" form-control" type="text" name="serial" id="serial" value="<?php echo $d->deviceSerialNo; ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 form-group  ">
                                    <label for="owner">Device Processor: </label>
                                    <input class=" form-control" type="text" name="processor" id="processor" value="<?php echo $d->deviceProcessor; ?>" readonly>
                                </div>
                                 <div class="col-lg-6 form-group ">
                                    <label for="owner">Device Memory Size / Brand / Type: </label>
                                    <input class=" form-control" type="text" name="memory" id="memory" value="<?php echo $d->deviceMemory; ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 form-group  ">
                                    <label for="owner">Device Hard Disk / Brand / Size: </label>
                                    <input class=" form-control" type="text" name="disk" id="disk" value="<?php echo $d->deviceDisk; ?>" readonly>
                                </div>
                                 <div class="col-lg-6 form-group ">
                                    <label for="owner">Device Hard Disk Serial Number: </label>
                                    <input class=" form-control" type="text" name="dserial" id="dserial" value="<?php echo $d->deviceDiskSerial; ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 form-group  ">
                                    <label for="owner">Device LAN IP Address: </label>
                                    <input class=" form-control" type="text" name="lanip" id="lanip" value="<?php echo $d->deviceLANIP; ?>" readonly>
                                </div>
                                 <div class="col-lg-6 form-group ">
                                    <label for="owner">Device LAN MAC Address: </label>
                                    <input class=" form-control" type="text" name="macadd" id="macadd" value="<?php echo $d->deviceLANMAC; ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 form-group  ">
                                    <label for="owner">Device WLAN IP Address: </label>
                                    <input class=" form-control" type="text" name="wlanip" id="wlanip" value="<?php echo $d->deviceWLANIP; ?>" readonly>
                                </div>
                                 <div class="col-lg-6 form-group ">
                                    <label for="owner">Device WLAN MAC Address: </label>
                                    <input class=" form-control" type="text" name="wlanmac" id="wlanmac" value="<?php echo $d->deviceWLANMAC; ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 form-group  ">
                                    <label for="owner">Device Type: </label>
                                    <input class=" form-control" type="text" name="wlanmac" id="wlanmac" value="<?php echo $d->deviceType; ?>" readonly>
                                </div>
                                <div class="col-lg-6 form-group  ">
                                    <label for="owner">Device Power Condition: </label>
                                    <input class=" form-control" type="text" name="wlanmac" id="wlanmac" value="<?php echo $d->devicePower; ?>" readonly>
                                </div>
                            </div>

                        </div>
                    </div>

                    <?php } ?>
                     <div class="panel panel-default">
                        <div class="panel panel-heading">SOFTWARE DATA</div>
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <a class="btn btn-success btn-md"><i class="fa fa-plus"></i> Install Software</a><br><br>
                                    </div>
                                    <div class="col-lg-12">
                            
                            
                            <section class="panel">
                            
                                <header class="panel-heading">
                                Installed Softwares Table

                                </header> 
                                <div class="table-responsive">
                                    <!-- <a href="#" class="btn btn-success btn-md fa fa-plus"> ADD BRANCH</a> -->
                                        <table id="isoftwares-table" class="table table-striped table-advance table-hover ">

                                            <thead>
                                                <tr>
                                                    <td><i class="icon_profile"></i>Software ID</td>
                                                    <td><i class="icon_calendar"></i>Software Name</td>
                                                    <td><i class="icon_pin_alt"></i>Software Last Modified</td>
                                                    <td><i class="icon_pin_alt"></i>Software Last Modified By</td>
                                                    <td><i class="icon_pin_alt"></i>Software Status</td>
                                                    <td><i class="icon_cogs"></i> Action</td>
                                                </tr>  
                                            </thead>
                                            <tbody>                       
                                           </tbody>
                                        </table>
                                </div>

                                
                            </section>
                            </div>
                        </div>
                                </div>
                            </div>
                        </div>

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
