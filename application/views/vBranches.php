<!--main content start-->
            <section id="main-content">
                <section class="wrapper">            
                    <!--overview start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-building "></i> Branches</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                                <li><i class="fa fa-building-o "></i>Branches</li>						  	
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2">
                            <a data-target="#addBranch"  data-id="1" data-toggle="modal" class="btn btn-success btn-md fa fa-plus"> ADD BRANCH</a><br><br>

                        </div>
                        <div class="col-lg-12">
                            
                            
                            <section class="panel">
                            
                                <header class="panel-heading">
                                Branches Table

                                </header> 
                                <div class="table-responsive">
                                    <!-- <a href="#" class="btn btn-success btn-md fa fa-plus"> ADD BRANCH</a> -->
                                        <table id="branch-table" class="table table-striped table-advance table-hover ">

                                            <thead>
                                                <tr>
                                                    <td><i class="icon_profile"></i> Branch Code</td>
                                                    <td><i class="icon_calendar"></i> Branch Name</td>
                                                    <td><i class="icon_pin_alt"></i> Branch Region</td>
                                                    <td><i class="icon_pin_alt"></i> Branch Status</td>
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
<!-- ADD BRANCH -->
<div aria-hidden="true" aria-labelledby="addBranchLabel" role="dialog" tabindex="-1" id="addBranch" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><i class="fa fa-plus"></i> ADD BRANCH</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="<?php echo site_url();?>/cBranch/addBranch">
                    <div class="form-group">
                        <label for="code">Branch Code</label>
                        <input type="text" class="form-control" name="code" id="code" placeholder="Enter Code" required="">
                    </div>
                    <div class="form-group">
                        <label for="name">Branch Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required="">
                    </div>
                    <div class="form-group">
                        <label for="region">Branch Region</label>
                        <select class="form-control" id="region" name="region">
                            <option hidden="" >Select Region</option>
                            <option value="NCR">NCR</option>
                            <option value="Region I">Region I</option>
                            <option value="CAR">CAR</option>
                            <option value="Region II">Region II</option>
                            <option value="Region III">Region III</option>
                            <option value="Region IV-A">Region IV-A</option>
                            <option value="Region IV-A">Region IV-B</option>
                            <option value="MIMAROPA">MIMAROPA</option>
                            <option value="Region V">Region V</option>
                            <option value="NIR">NIR</option>
                            <option value="Region VII">Region VII</option>
                            <option value="Region VIII">Region VIII</option>
                            <option value="Region IX">Region IX</option>
                            <option value="Region X">Region X</option>
                            <option value="Region XI">Region XI</option>
                            <option value="Region XII">Region XII</option>
                            <option value="Region XIII">Region XIII</option>
                            <option value="ARMM">ARMM</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Branch Address</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" required="">
                    </div>
                
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-success">Add Branch</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- VIEW BRANCH -->
<div aria-hidden="true" aria-labelledby="viewBranchLabel" role="dialog" tabindex="-1" id="viewBranch" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">VIEW BRANCH</h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="hidden" hidden="" name="vid" id="vid" value="">
                        <label for="code">Branch Code</label>
                        <input type="text" class="form-control" name="vcode" id="vcode" readonly="" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Branch Name</label>
                        <input type="text" class="form-control" name="vname" id="vname" disabled="" value="">
                    </div>
                    <div class="form-group">
                        <label for="region">Branch Region</label>
                        <select class="form-control m-bot15" id="vregion" name="vregion" disabled="" value="">
                            <option hidden="" >Select Region</option>
                            <option value="NCR">NCR</option>
                            <option value="Region I">Region I</option>
                            <option value="CAR">CAR</option>
                            <option value="Region II">Region II</option>
                            <option value="Region III">Region III</option>
                            <option value="Region IV-A">Region IV-A</option>
                            <option value="Region IV-A">Region IV-B</option>
                            <option value="MIMAROPA">MIMAROPA</option>
                            <option value="Region V">Region V</option>
                            <option value="NIR">NIR</option>
                            <option value="Region VII">Region VII</option>
                            <option value="Region VIII">Region VIII</option>
                            <option value="Region IX">Region IX</option>
                            <option value="Region X">Region X</option>
                            <option value="Region XI">Region XI</option>
                            <option value="Region XII">Region XII</option>
                            <option value="Region XIII">Region XIII</option>
                            <option value="ARMM">ARMM</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Branch Address</label>
                        <input type="text" class="form-control" name="vaddress" id="vaddress" disabled="" value="">
                    </div>
                    <div class="form-group">
                        <label for="address">Branch Status</label>
                        <input type="text" class="form-control" name="vstatus" id="vstatus"  disabled="" value="">
                    </div>
            </div>
        </div>
    </div>
</div>

<div aria-hidden="true" aria-labelledby="editBranchLabel" role="dialog" tabindex="-1" id="editBranch" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> UPDATE BRANCH</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="<?php echo site_url();?>/cBranch/updateBranch">
                    <!-- <input hidden="" type="text" name="vecode" id="ecode" placeholder="Enter Code"> -->
                    <div class="form-group">
                        <label for="code">Branch Code</label>
                        
                        <input type="text" class="form-control" name="ecode" id="ecode" placeholder="Enter Code" value="">
                    </div>
                    <div class="form-group">
                        <label for="name">Branch Name</label>
                        <input type="text" class="form-control" name="ename" id="ename" placeholder="Enter Name" value="">
                    </div>
                    <div class="form-group">
                        <label for="region">Branch Region</label>
                        <select class="form-control m-bot15" id="eregion" name="eregion">
                            <option hidden="" >Select Region</option>
                            <option value="NCR">NCR</option>
                            <option value="Region I">Region I</option>
                            <option value="CAR">CAR</option>
                            <option value="Region II">Region II</option>
                            <option value="Region III">Region III</option>
                            <option value="Region IV-A">Region IV-A</option>
                            <option value="Region IV-A">Region IV-B</option>
                            <option value="MIMAROPA">MIMAROPA</option>
                            <option value="Region V">Region V</option>
                            <option value="NIR">NIR</option>
                            <option value="Region VII">Region VII</option>
                            <option value="Region VIII">Region VIII</option>
                            <option value="Region IX">Region IX</option>
                            <option value="Region X">Region X</option>
                            <option value="Region XI">Region XI</option>
                            <option value="Region XII">Region XII</option>
                            <option value="Region XIII">Region XIII</option>
                            <option value="ARMM">ARMM</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Branch Address</label>
                        <input type="text" class="form-control" name="eaddress" id="eaddress" placeholder="Enter Address" value="">
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-success">Save Changes</button>
            </div>
        </div>
    </div>
</div>


<div aria-hidden="true" aria-labelledby="deleteBranchLabel" role="dialog" tabindex="-1" id="deleteBranch" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> DELETE BRANCH</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="<?php echo site_url();?>/CBranch/deleteBranch1">
                    <input type="text" hidden="" name="confirmID" id="confirmID">
                        
                    <h4>Are you sure to delete this branch?</h4> 
                       
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
