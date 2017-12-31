
<!-- main content start-->
            <section id="main-content">
                <section class="wrapper">   

                    <!--overview start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-laptop"></i> ADD DEVICE</h3>
                        </div>
                    </div>
                    <?php if(isset($error)){
              foreach ($error as $er) {}
                // echo $er;
                echo "<div class='alert alert-block alert-danger fade in'>
                                  <button data-dismiss='alert' class='close close-sm' >
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>$er</strong> Check Device Serial Number.
                              </div>";
            }
            ?>   
 <form action="<?php echo site_url();?>/CDevice/addDevice" method="POST">                   
                    <div class="panel panel-default">
                        <div class="panel panel-heading">EMPLOYEE OWNER DATA</div>
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label for="owner">Device Owner: </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control empid" placeholder="Search for Employee ID" name="owner" id="owner">
                                        <span class="input-group-btn">
                                            <a class="btn btn-primary owner" type="button"><i class="fa fa-search"></i></a>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="name" >Employee Name:</label>
                                    <input class=" form-control" type="text" name="dname" id="dname" value="" readonly="">
                                </div>
                            </div>
                            <div class="row ownerDetails" >
                                <div class="col-lg-6 form-group">
                                    <label for="name" >Employee Position:</label>
                                    <input class=" form-control" type="text" name="dposition" id="dposition" value="" readonly="">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="name" >Employee Branch Asignment:</label>
                                    <input type="hidden" name="bcode" id="bcode">
                                    <input class=" form-control" type="text" name="dbranch" id="dbranch" value="" readonly="">
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
                                    <input class=" form-control" type="text" name="name" id="name" placeholder="Enter Name" required="">
                                </div>
                                 <div class="col-lg-6 form-group ">
                                    <label for="owner">Device Brand / Model: </label>
                                    <input class=" form-control" type="text" name="dbrand" id="dbrand" placeholder="Enter Brand / Model" required="">
                                </div>
                            </div>
                            <div class="row">
                                 <div class="col-lg-6 form-group ">
                                    <label for="owner">Device Serial Number: </label>
                                    <input class=" form-control" type="text" name="serial" id="serial" placeholder="Enter CPU / Laptop Serial Number" required="">
                                </div>
                                <div class="col-lg-6 form-group  ">
                                    <label for="owner">Device Location: </label>
                                    <select class="form-control" name="location" id="location">
                                        <option hidden="">Select Branch</option>
                                        <?php if($branch) {
                                            foreach ($branch as $b) {
                                                echo "<option value='$b->branchCode'>$b->branchCode - $b->branchName</option>";
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
                                    <input class=" form-control" type="text" name="processor" id="processor" placeholder="Enter CPU / Laptop Processor" required="">
                                </div>
                                 <div class="col-lg-6 form-group ">
                                    <label for="owner">Device Memory Size / Brand / Type: </label>
                                    <input class=" form-control" type="text" name="memory" id="memory" placeholder="Enter Memory Size/ Brand/Type" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 form-group  ">
                                    <label for="owner">Device Hard Disk / Brand / Size: </label>
                                    <input class=" form-control" type="text" name="disk" id="disk" placeholder="Enter Hard Disk/Brand/Size" required="">
                                </div>
                                 <div class="col-lg-6 form-group ">
                                    <label for="owner">Device Hard Disk Serial Number: </label>
                                    <input class=" form-control" type="text" name="dserial" id="dserial" placeholder="Enter Hard Disk Serial Number" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 form-group  ">
                                    <label for="owner">Device LAN IP Address: </label>
                                    <input class=" form-control" type="text" name="lanip" id="lanip" placeholder="Enter HLAN IP Address" required="">
                                </div>
                                 <div class="col-lg-6 form-group ">
                                    <label for="owner">Device LAN MAC Address: </label>
                                    <input class=" form-control" type="text" name="macadd" id="macadd" placeholder="Enter LAN MAC Address" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 form-group  ">
                                    <label for="owner">Device WLAN IP Address: </label>
                                    <input class=" form-control" type="text" name="wlanip" id="wlanip" placeholder="Enter WLAN IP Address" required="">
                                </div>
                                 <div class="col-lg-6 form-group ">
                                    <label for="owner">Device WLAN MAC Address: </label>
                                    <input class=" form-control" type="text" name="wlanmac" id="wlanmac" placeholder="Enter WLAN MAC Address" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 form-group  ">
                                    <label for="owner">Device Type: </label>
                                    <select class="form-control" name="type" id="type">
                                        <option hidden="">Select Type</option>
                                        <option value="Desktop">Desktop</option>
                                        <option value="Laptop">Laptop</option>
                                        <option value="Tablet">Tablet</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 form-group  ">
                                    <label for="owner">Device Power Condition: </label>
                                     <select class="form-control" name="power" id="power">
                                        <option hidden="">Select Power</option>
                                        <option value="UPS">UPS</option>
                                        <option value="NORMAL">NORMAL</option>
                                        <option value="W/ SURGE PROTECTOR">W/ SURGE PROTECTOR</option>
                                        <option value="OUTLETS">OUTLETS</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>


                     <div class="panel panel-default">
                        <div class="panel panel-heading">SOFTWARE DATA</div>
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-lg-3 form-group ">
                                            <?php if (isset($operating)) {
                                                echo "<label for='owner'>Opearting Systems</label>";
                                                echo "<div class='checkboxes'>";
                                                foreach ($operating as $k) {
                                                    echo " <label class='label_radio r_off'>";
                                                    echo "<input class='box' name='os' id='radio' value='$k->softwareID' type='checkbox'> $k->softwareName";
                                                    echo "</label>";
                                                    # code...
                                                }
                                            } ?>
                                          </div>
                                    </div>
                                    <div class="col-lg-3 form-group ">
                                            <?php if (isset($office)) {
                                                echo "<label for='owner'>Office Softwares</label>";
                                                echo "<div class='checkboxes'>";
                                                foreach ($office as $g) {
                                                    echo " <label class='label_check c_on'>";
                                                    echo "<input name='office[]' id='check' value='$g->softwareID' type='checkbox'> $g->softwareName";
                                                    echo "</label>";
                                                    # code...
                                                }
                                            } ?>
                                          </div>
                                    </div>
                                    <div class="col-lg-3 form-group ">
                                            <?php if (isset($special)) {
                                                echo "<label for='owner'>Specialized Softwares/ Applications</label>";
                                                echo "<div class='checkboxes'>";
                                                foreach ($special as $s) {
                                                    echo " <label class='label_check c_on'>";
                                                    echo "<input name='special[]' id='check' value='$s->softwareID' type='checkbox'> $s->softwareName";
                                                    echo "</label>";
                                                    # code...
                                                }
                                            } ?>
                                          </div>
                                    </div>
                                    <div class="col-lg-3 form-group ">
                                            <?php if (isset($anti)) {
                                                echo "<label for='owner'>Anti-Virus Softwares</label>";
                                                echo "<div class='checkboxes'>";
                                                foreach ($anti as $a) {
                                                    echo " <label class='label_check c_on'>";
                                                    echo "<input name='anti' id='check' value='$a->softwareID' type='checkbox'> $a->softwareName";
                                                    echo "</label>";
                                                    echo "</div>";
                                                    # code...
                                                }
                                            } ?>
                                             <?php if (isset($browser)) {
                                                echo "<label for='owner'>Browser Softwares</label>";
                                                echo "<div class='checkboxes'>";
                                                foreach ($browser as $b) {
                                                    echo " <label class='label_check c_on'>";
                                                    echo "<input name='browser[]' id='check' value='$b->softwareID' type='checkbox'> $b->softwareName";
                                                    echo "</label>";
                                                    # code...
                                                }
                                            } ?>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <button class="btn btn-success col-lg-6" type="submit"><i class="fa fa-plus"></i> ADD DEVICE</button>
                                    <a class="btn btn-default col-lg-6" data-target="#cancel" data-toggle="modal"><i class="fa fa-times"></i> CANCEL</a>
                                </div>
                            </div>
                        </div>

                    
                        
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