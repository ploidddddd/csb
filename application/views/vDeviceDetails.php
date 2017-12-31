main content start-->
            <section id="main-content">
                <section class="wrapper">            
                    <!--overview start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-mobile"></i>DEVICE INFORMATION</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="<?php echo site_url();?>/CLogin/index">Home</a></li>
                                <li><i class="fa fa-table"></i>Inventory</li>
                                <li><i class="fa fa-table"></i>Working</li>                         
                            </ol>
                        </div>
                    </div>
                     <?php if (isset($owner) && isset($branch) && isset($device) && isset($branch1)) {?>    
                    <?php foreach ($owner as $o) {} ?>   
                    <?php foreach ($branch as $b) {} ?> 
                    <?php foreach ($branch1 as $b1) {} ?>         
                    <?php foreach ($device as $d) {} ?> 
                    <div class="row">
                      <div class="col-lg-12">
                        <section class="panel panel-primary" >
                              <ul class="nav nav-tabs">
                                  <li class="active">
                                      <a data-toggle="tab" href="#home">Owner Info</a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#about">Hardware Info</a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#profile">Software Info</a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#peripherals">Peripherals</a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#contact">Logs</a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#action">Actions</a>
                                  </li>
                              </ul>
                          <div class="panel-body">
                              <div class="tab-content">
                                  <div id="home" class="tab-pane active">
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


                                  <div id="about" class="tab-pane">
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
                                <div id="profile" class="tab-pane">
                                    <div class="row">
                                       <div class="col-lg-2">
                                        <a class="btn btn-success btn-block install" data-id="<?php echo $d->deviceID; ?>" data-toggle='modal' data-target='#installSoftware'  ><i class="fa fa-plus-square-o"></i> Install Software</a>
                                      </div>
                                      <div class="col-lg-2">
                                        <a class="btn btn-danger btn-block uinstall" data-id="<?php echo $d->deviceID; ?>" data-toggle='modal' data-target='#uninstallSoftware'"><i class="fa fa-minus-square-o"></i> Uninstall Software</a>
                                      </div>
                                     <div class="row">
                                       <div class="col-lg-12">
                                         <div class="table-responsive">
                                    <!-- <a href="#" class="btn btn-success btn-md fa fa-plus"> ADD BRANCH</a> -->
                                        <table id="isoftwares-table" class="table table-striped table-advance table-hover" style="width: 90%; important">

                                            <thead>
                                                <tr>
                                                    <td><i class="icon_profile"></i>Software ID</td>
                                                    <td><i class="icon_calendar"></i>Software Name</td>
                                                    <td><i class="icon_pin_alt"></i>Software Install</td>
                                                    <td><i class="icon_pin_alt"></i>Software Install By</td>
                                                    <td><i class="icon_pin_alt"></i>Software Status</td>
                                                    <td><i class="icon_cogs"></i> Action</td>
                                                </tr>  
                                            </thead>
                                            <tbody>                       
                                           </tbody>
                                        </table>
                                        </div>
                                       </div>
                                     </div>

                                </div>
                                </div>
                                <div id="contact" class="tab-pane">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <div class="table-responsive">
                                        <table id="logs-table" class="table table-striped table-advance table-hover " style="width: 90%; important">
                                            <thead>
                                                <tr>
                                                    <td><i class="icon_key_alt"></i>Log ID</td>
                                                    <td><i class="icon_document_alt"></i>Log Remarks</td>
                                                    <td><i class="icon_clock_alt"></i>Log Stamp</td>
                                                    <td><i class="icon_profile"></i>Log Made By</td>
                                                    <td><i class="icon_cogs"></i> Action</td>
                                                </tr>  
                                            </thead>
                                            <tbody>                       
                                            </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>    
                                </div>

                                <div id="action" class="tab-pane">
                                    <div class="row">
                                      <div class="col-lg-3">
                                        <a class="btn btn-default btn-block print " href="<?php echo site_url();?>/CFPDF/index/<?php echo $d->deviceID; ?>" target="_blank><i class="fa fa-print"></i> Print</a>
                                      </div>
                                      <div class="col-lg-3">
                                        <a class="btn btn-default btn-block " href="<?php echo site_url();?>/CDevice/viewEditDevice/<?php echo $d->deviceID; ?>"><i class="fa fa-edit"></i> Edit</a>
                                      </div>
                                      <div class="col-lg-3">
                                        <a class="btn btn-default btn-block " href="#"><i class="fa fa-life-ring"></i> Support</a>
                                      </div>
                                      <div class="col-lg-3">
                                        <button class="btn btn-danger btn-block disposeDev" data-id="<?php echo $d->deviceID; ?>" data-toggle='modal' data-target='#disposeDevice'><i class="fa fa-trash-o"></i> Disposed</button>
  
                                      </div>

                                  </div>
                                </div>

                                <div id="peripherals" class="tab-pane">
                                  <div class="row">
                                       <div class="col-lg-2">
                                        <a class="btn btn-success btn-block peri" data-id="<?php echo $d->deviceID; ?>" data-toggle='modal' data-target='#addPeripheral'"><i class="fa fa-plus-square-o"></i> Add Peripheral</a>
                                      </div>
                                    </div>
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <div class="table-responsive">
                                        <table id="peripherals-table" class="table table-striped table-advance table-hover " style="width: 90%; important">
                                            <thead>
                                                <tr>
                                                    <td><i class="icon_key_alt"></i>Peripheral ID</td>
                                                    <td><i class="icon_document_alt"></i>Peripheral Type</td>
                                                    <td><i class="icon_clock_alt"></i>Peripheral Brand</td>
                                                    <td><i class="icon_profile"></i>Peripheral Serial Number</td>
                                                    <td><i class="icon_cogs"></i> Action</td>
                                                </tr>  
                                            </thead>
                                            <tbody>                       
                                            </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>    
                                </div>

                              </div>
                          </div>
                      </section>
                      </div>
                    </div>
                    <?php } ?> 
                    </div>
                </section>
            </section>
            <!--main content end-->
        </section> <!--DO NOT DELETE -->
    <!-- container section start 


      <!-- INSTALL SOFTWARE-->
    <div aria-hidden="true" aria-labelledby="installSoftwareLabel" role="dialog" tabindex="-1" id="installSoftware" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close cancel" type="button">×</button>
                <h4 class="modal-title">INSTALL SOFTWARE</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" id="form" action="<?php echo site_url();?>/cInstall/installSoftware">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Software Name</label>
                        <input type="hidden" name="deviceID" id="deviceID" value="">
                        <select class="form-control" name="software" required="">
                            <option hidden="" value="">Select Software</option>
                            <?php if (isset($softs)) {
                                foreach($softs as $s){
                                  echo "<option value='$s->softwareID'>$s->softwareName</option>";
                                }
                            } ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default cancel">Cancel</button>
                <button type="submit" class="btn btn-success">Install Software</button>
            </form>
            </div>
        </div>
    </div>
</div>


<div aria-hidden="true" aria-labelledby="uninstallSoftwareLabel" role="dialog" tabindex="-1" id="uninstallSoftware" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close cancel" type="button">×</button>
                <h4 class="modal-title">UNINSTALL SOFTWARE</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" id="form" action="<?php echo site_url();?>/cInstall/uninstallSoftware">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Software Name</label>
                        <input type="hidden" name="udeviceID" id="udeviceID" value="">
                        <select class="form-control" name="usoftware" required="">
                            <option hidden="" value="">Select Software</option>
                            <?php if (isset($softs1)) {
                                foreach($softs1 as $s1){
                                  echo "<option value='$s1->installID'>$s1->softwareName</option>";
                                }
                            } ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default cancel">Cancel</button>
                <button type="submit" class="btn btn-warning">Uninstall Software</button>
            </form>
            </div>
        </div>
    </div>
</div>


<div aria-hidden="true" aria-labelledby="addPeripheralLabel" role="dialog" tabindex="-1" id="addPeripheral" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close cancel" type="button">×</button>
                <h4 class="modal-title">ADD PERIPHERAL</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="form" method="POST" action="<?php echo site_url();?>/cPeripherals/addPeripheral">
                    <div class="form-group" id="divB">
                        <label class="control-label" for="pdeviceID">Peripheral Type:</label>
                        <input type="hidden" name="pdeviceID" id="pdeviceID" value=""> 
                        <select class="form-control" name="ptype" id="ptype" required="">
                            <option hidden="" value="">Select Type</option>
                            <option value="Mouse">Mouse</option>
                            <option value="Keyboard">Keyboard</option>
                            <option value="Monitor">Monitor</option>
                            <option value="Webcam">Webcam</option>
                            <option value="CD-Rom">CD-Rom</option>
                            <option value="Printer">Printer</option>
                            <option value="Scanner">Scanner</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Peripheral Brand:</label>
                        <input type="text" class="form-control" placeholder="Enter Brand" name="pbrand" id="pbrand" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Peripheral Serial No:</label>
                        <input type="text" class="form-control" placeholder="Enter Serial Number" name="pserial" id="pserial" required="">
                    </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default cancel">Cancel</button>
                <button type="submit" id="addPeripheral" class="btn btn-success">Add Peripheral</button>
            </form>
            </div>
        </div>
    </div>
</div>


<div aria-hidden="true" aria-labelledby="disposePeripheralLabel" role="dialog" tabindex="-1" id="disposePeripheral" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> DISPOSE PERIPEHRAL</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="<?php echo site_url();?>/CPeripherals/disposePeripheral">
                    <input type="text" hidden="" name="periID" id="periID">
                    <input type="hidden" name="pdeviceID" id="pdeviceID" value="">
                        
                    <h4>Are you sure to dispose this peripheral?</h4> 
                       
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-success btn-danger" type="submit">Confirm</button>
            </div>
                    
                </form>
            
        </div>
    </div>
</div>


<div aria-hidden="true" aria-labelledby="disposeDeviceLabel" role="dialog" tabindex="-1" id="disposeDevice" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> DISPOSE DEVICE</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="<?php echo site_url();?>/CDevice/disposeDevice">
                    <!-- <input type="text" hidden="" name="periID" id="periID"> -->
                    <input type="hidden" name="disposeID" id="disposeID" value="">
                        
                    <h4>Are you sure to dispose this device?</h4> 
                       
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-success btn-danger" type="submit">Confirm</button>
            </div>
                    
                </form>
            
        </div>
    </div>
</div>