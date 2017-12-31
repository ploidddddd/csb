<!--main content start-->
            <section id="main-content">
                <section class="wrapper">            
                    <!--overview start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="<?php echo site_url();?>/CLogin/index">Home</a></li>
                                <li><i class="fa fa-laptop"></i>Dashboard</li>						  	
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2">
                            <a data-target="#addSoftware" data-toggle="modal" class="btn btn-success btn-md fa fa-plus"> ADD SOFTWARE</a><br><br>

                        </div>
                        <div class="col-lg-12">
                            
                            
                            <section class="panel">
                            
                                <header class="panel-heading">
                                Softwares Table

                                </header> 
                                <div class="table-responsive">
                                    <!-- <a href="#" class="btn btn-success btn-md fa fa-plus"> ADD BRANCH</a> -->
                                        <table id="software-table" class="table table-striped table-advance table-hover ">

                                            <thead>
                                                <tr>
                                                    <td><i class="icon_profile"></i>Software ID</td>
                                                    <td><i class="icon_calendar"></i>Software Name</td>
                                                    <td><i class="icon_pin_alt"></i>Software Description</td>
                                                    <td><i class="icon_pin_alt"></i>Software Type</td>
                                                    <td><i class="icon_pin_alt"></i>Software Status</td>
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
    <!-- ADD SOFTWARE-->
    <div aria-hidden="true" aria-labelledby="addSoftwareLabel" role="dialog" tabindex="-1" id="addSoftware" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">ADD SOFTWARE</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="<?php echo site_url();?>/cSoftware/addSoftware">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Software Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="" required="" >
                    </div>
                     <div class="form-group">
                        <label for="address">Software Description</label>
                        <input type="text" class="form-control" name="description" id="description" value="" required="" >
                    </div>
                     <div class="form-group">
                        <label for="address">Software Product Key</label>
                        <input type="text" class="form-control" name="prodkey" id="prodkey" value=""  >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Software Type</label>
                        <select class="form-control" name="type" required="">
                            <option hidden="">Select Type</option>
                            <option value="OS">Operating System</option>
                            <option value="Office">Office</option>
                            <option value="Anti-Virus">Anti-Virus</option>
                            <option value="Specialized">Specialized</option>
                            <option value="Browser">Browser</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-danger">Cancel</button>
                <button type="submit" class="btn btn-primary">Add Software</button>
            </form>
            </div>
        </div>
    </div>
</div>


<!-- VIEW SOFTWARE-->
    <div aria-hidden="true" aria-labelledby="viewSoftwareLabel" role="dialog" tabindex="-1" id="viewSoftware" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">VIEW SOFTWARE</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 form-group">
                        <input type="text" class="hidden" hidden="" name="vid" id="vid" value="">
                        <label for="code">Sofware ID</label>
                        <input type="text" class="form-control" name="vsoftid" id="vsoftid" readonly="" value="">
                    </div>
                    <div class="col-lg-6 form-group">
                        <label for="exampleInputEmail1">Software Name</label>
                        <input type="text" class="form-control" name="vname" id="vname" readonly="" value="">
                    </div>
                </div>
                <div class="row">
                     <div class="col-lg-6 form-group">
                        <label for="address">Software Description</label>
                        <input type="text" class="form-control" name="vdescription" id="vdescription" readonly="" value="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 form-group">
                       <label for="exampleInputEmail1">Software Type</label>
                        <select class="form-control" name="vtype" disabled="" id="vtype">
                            <option hidden="">Select Type</option>
                            <option value="OS">Operating System</option>
                            <option value="Office">Office</option>
                            <option value="Anti-Virus">Anti-Virus</option>
                            <option value="Specialized">Specialized</option>
                            <option value="Browser">Browser</option>
                        </select>
                    </div>
                    <div class="col-lg-6 form-group">
                        <label for="address">Software Status</label>
                        <input type="text" class="form-control" name="vstatus" id="vstatus"  readonly="" value="">
                    </div>
                </div>
                <div class="row">
                     <div class="col-lg-6 form-group">
                        <label for="address">Software Added</label>
                        <input type="text" class="form-control" name="vadded" id="vadded" readonly="" value="">
                    </div>
                    <div class="col-lg-6 form-group">
                        <label for="address">Software Added By</label>
                        <input type="text" class="form-control" name="vaddedby" id="vaddedby" readonly="" value="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 form-group">
                        <label for="address">Software Last Modified</label>
                        <input type="text" class="form-control" name="vlastmodi" id="vlastmodi" readonly="" value="">
                    </div>
                    <div class="col-lg-6 form-group">
                        <label for="address">Software Last Modified By</label>
                        <input type="text" class="form-control" name="vlastmodiby" id="vlastmodiby" readonly="" value="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- UPDATE SOFTWARE-->
    <div aria-hidden="true" aria-labelledby="editSoftwareLabel" role="dialog" tabindex="-1" id="editSoftware" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">UPDATE SOFTWARE</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="<?php echo site_url();?>/cSoftware/updateSoftware">
                    <div class="form-group">
                        <label for="code">Sofware ID</label>
                        <input type="text" class="form-control" name="usoftid" id="usoftid" readonly="" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Software Name</label>
                        <input type="text" class="form-control" name="uname" id="uname" value="" required="" >
                    </div>
                     <div class="form-group">
                        <label for="address">Software Description</label>
                        <input type="text" class="form-control" name="udescription" id="udescription" value="" required="" >
                    </div>
                     <div class="form-group">
                        <label for="address">Software Product Key</label>
                        <input type="text" class="form-control" name="uprodkey" id="uprodkey" value=""  >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Software Type</label>
                        <select class="form-control" name="utype" id="utype" required="">
                            <option hidden="">Select Type</option>
                            <option value="OS">Operating System</option>
                            <option value="Office">Office</option>
                            <option value="Anti-Virus">Anti-Virus</option>
                            <option value="Specialized">Specialized</option>
                            <option value="Browser">Browser</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-danger">Cancel</button>
                <button type="submit" class="btn btn-primary">Update Software</button>
            </form>
            </div>
        </div>
    </div>
</div>


<div aria-hidden="true" aria-labelledby="deleteSoftwareLabel" role="dialog" tabindex="-1" id="deleteSoftware" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> DELETE SOFTWARE</h4>
            </div>
            <div class="modal-body">
                <?php ?>
                <form role="form" method="POST" action="<?php echo site_url();?>/CSoftware/deleteSoftware1">
                    <input type="text" hidden="" name="confirmID" id="confirmID">
                        
                    <h4>Are you sure to delete this software?</h4> 
                       
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-success btn-danger" type="submit">Confirm</button>
            </div>
                    
                </form>
            
        </div>
    </div>
</div>