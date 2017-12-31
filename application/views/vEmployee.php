<!--main content start-->
            <section id="main-content">
                <section class="wrapper">            
                    <!--overview start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-building "></i> Employees    </h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="<?php echo site_url();?>/CLogin/index">Home</a></li>
                                <li><i class="fa fa-building-o "></i>Employees</li>						  	
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2">
                            <a data-target="#addEmployee" data-toggle="modal" class="btn btn-success btn-md fa fa-plus"> ADD EMPLOYEE</a><br><br>

                        </div>
                        <div class="col-lg-12">
                            
                            
                            <section class="panel">
                            
                                <header class="panel-heading">
                                Employees Table

                                </header> 
                                <div class="table-responsive">
                                    <!-- <a href="#" class="btn btn-success btn-md fa fa-plus"> ADD BRANCH</a> -->
                                        <table id="emp-table" class="table table-striped table-advance table-hover ">

                                            <thead>
                                                <tr>
                                                    <td><i class="icon_profile"></i> Employee ID</td>
                                                    <td><i class="icon_calendar"></i> Employee Name</td>
                                                    <td><i class="icon_pin_alt"></i> Employee Position</td>
                                                    <td><i class="icon_pin_alt"></i> Employee Branch</td>
                                                    <td><i class="icon_pin_alt"></i> Employee Status</td>
                                                    <td><i class="icon_cogs"></i> Action</td>
                                                </tr>  
                                            </thead>
                                            <tbody>                       
                                           </tbody>
                                        </table>
                                </div>

                                </div>
                            </section>
                        </div>
                    </div>
                </section>
            </section>
            <!--main content end-->
        </section> <!--DO NOT DELETE -->
    <!-- container section start -->
<!-- ADD EMPLOYEE -->
<div aria-hidden="true" aria-labelledby="addBranchLabel" role="dialog" tabindex="-1" id="addEmployee" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><i class="fa fa-plus"></i> ADD EMPLOYEE</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="<?php echo site_url();?>/CEmployee/addEmployee">
                    <div class="form-group">
                        <label for="code">Employee ID No.</label>
                        <input type="text" class="form-control" name="id" id="id" placeholder="Enter ID" required="">
                    </div>
                    <div class="form-group">
                        <label for="name">Employee First Name</label>
                        <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter First Name" required="">
                    </div>
                    <div class="form-group">
                        <label for="name">Employee Middle Name</label>
                        <input type="text" class="form-control" name="mname" id="fname" placeholder="Enter Middle Name">
                    </div>
                    <div class="form-group">
                        <label for="name">Employee Last Name</label>
                        <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Last Name" required="">
                    </div>
                    <div class="form-group">
                        <label for="address">Employee Position</label>
                        <input type="text" class="form-control" name="position" id="position" placeholder="Enter Address" required="">
                    </div>
                    <div class="form-group">
                        <label for="region">Branch Region</label>
                        <select class="form-control m-bot15" id="branch" name="branch">
                            <option hidden="" >Select Region</option>
                            <?php if (isset($branches)){ ?>
                                <?php foreach ($branches as $b){ ?>
                                    <option value="<?php echo $b->branchCode; ?>" ><?php echo $b->branchCode.'-'.$b->branchName;?></option>
                                <?php } ?>
                            <?php }?>
                        </select>
                    </div>
            </div>
             <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-success">Add User</button>
                </form>
            </div>
        </div>
       
    </div>
</div>

<!-- VIEW EMPLOYEE -->
<div aria-hidden="true" aria-labelledby="viewEmployeeLabel" role="dialog" tabindex="-1" id="viewEmployee" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><i class="fa fa-user"></i> EMPLOYEE DETAILS</h4>
            </div>
            <div class="modal-body">
                <!-- <form class="form-horizontal">  -->
                    <div class="form-group ">
                        <label class="control-label">Employee ID No.:</label>
                        <b><p class="form-control-static" id="idno"></p></b>
                    </div>
                    <div class="form-group ">
                        <label for="name" class="control-label">Employee Name:</label>
                        <b><p class="form-control-static" id="vfname"></p></b>
                    </div>
                    <div class="form-group ">
                        <label for="address" class="control-label">Employee Position:</label>
                        <b><p class="form-control-static" id="vposition"></p></b>
                    </div>
                    <div class="form-group ">
                        <label for="region" class="control-label">Employee Branch:</label>
                        <b><p class="form-control-static" id="vbranch"></p></b>
                    </div>
                    <div class="form-group ">
                        <label for="address" class="control-label">Employee Status:</label>
                        <b><p class="form-control-static" id="vstatus"></p></b>
                    </div>
                    <div class="form-group ">
                        <label for="address" class="control-label">Employee Last Modified:</label>
                        <b><p class="form-control-static" id="vlmod"></p></b>
                    </div>
                    <div class="form-group">
                        <label for="address" class="control-label">Employee Last Modified By:</label>
                        <b><p class="form-control-static" id="vlmodby"></p></b>
                    </div>
            </div>
             <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<!-- UPDATE EMPLOYEE -->
<div aria-hidden="true" aria-labelledby="updateEmployeeLabel" role="dialog" tabindex="-1" id="updateEmployee" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> UPDATE EMPLOYEE</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="<?php echo site_url();?>/CEmployee/updateEmployee">
                    <div class="form-group">
                        <label for="code">Employee ID No.</label>
                        <input type="text" name="uuid" id="uuid" hidden="">
                        <input disabled="" type="text" class="form-control" name="uid" id="uid" placeholder="Enter ID" required="" value="">
                    </div>
                    <div class="form-group">
                        <label for="name">Employee First Name</label>
                        <input type="text" class="form-control" name="ufname" id="ufname" placeholder="Enter First Name" required="">
                    </div>
                    <div class="form-group">
                        <label for="name">Employee Middle Name</label>
                        <input type="text" class="form-control" name="umname" id="umname" placeholder="Enter Middle Name">
                    </div>
                    <div class="form-group">
                        <label for="name">Employee Last Name</label>
                        <input type="text" class="form-control" name="ulname" id="ulname" placeholder="Enter Last Name" required="">
                    </div>
                    <div class="form-group">
                        <label for="address">Employee Position</label>
                        <input type="text" class="form-control" name="uposition" id="uposition" placeholder="Enter Position" required="">
                    </div>
                    <div class="form-group">
                        <label for="region">Employee Branch</label>
                        <select class="form-control m-bot15" id="ubranch" name="ubranch">
                            <option hidden="" >Select Region</option>
                            <?php if (isset($branches)){ ?>
                                <?php foreach ($branches as $b){ ?>
                                    <option value="<?php echo $b->branchCode; ?>" ><?php echo $b->branchCode.'-'.$b->branchName;?></option>
                                <?php } ?>
                            <?php }?>
                        </select>
                    </div>
                    
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-success">Update Employee</button>
                
                </form>
            </div>
        </div>
    </div>
</div>


<div aria-hidden="true" aria-labelledby="deleteEmployeeLabel" role="dialog" tabindex="-1" id="deleteEmployee" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> DELETE EMPLOYEE</h4>
            </div>
            <div class="modal-body">
                <?php ?>
                <form role="form" method="POST" action="<?php echo site_url();?>/CEmployee/deleteEmployee">
                    <input type="hidden" name="confirmID" id="confirmID">
                        
                    <h4>Are you sure to delete this device?</h4> 
                       
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-success btn-danger" type="submit">Confirm</button>
            </div>
                    
                </form>
            
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<!-- <script src="<?php echo base_url('assets/js/form-component.js');?>"></script> -->
