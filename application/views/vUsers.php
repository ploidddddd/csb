<!--main content start-->
            <section id="main-content">
                <section class="wrapper">            
                    <!--overview start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-building "></i> Users    </h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="<?php echo site_url();?>/CLogin/index">Home</a></li>
                                <li><i class="fa fa-user "></i>Users</li>						  	
                            </ol>
                        </div>
                    </div>
                    <?php if(isset($error)){
              foreach ($error as $er) {}
                // echo $er;
                echo "<div class='alert alert-block alert-danger fade in'>
                                  <button data-dismiss='alert' class='close close-sm' >
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>$er</strong> Check User Employee ID.
                              </div>";
            }
            ?>
                    <div class="row">
                        <div class="col-lg-2">
                            <a data-target="#addEmployee" data-toggle="modal" class="btn btn-success btn-md fa fa-plus"> ADD USER</a><br><br>

                        </div>
                        <div class="col-lg-12">
                            
                            
                            <section class="panel">
                            
                                <header class="panel-heading">
                                Employees Table

                                </header> 
                                <div class="table-responsive">
                                    <!-- <a href="#" class="btn btn-success btn-md fa fa-plus"> ADD BRANCH</a> -->
                                        <table id="user-table" class="table table-striped table-advance table-hover ">

                                            <thead>
                                                <tr>
                                                    <td><i class="icon_profile"></i> User ID</td>
                                                    <td><i class="icon_calendar"></i> User Employee ID</td>
                                                    <td><i class="icon_pin_alt"></i> User Status</td>
                                                    <td><i class="icon_profile"></i> User Last Modified By</td>
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
                <form role="form" method="POST" action="<?php echo site_url();?>/CUser/addUser">
                    <div class="form-group">
                       
                        <label for="code">Employee ID No.</label>
                         <div class="input-group">
                        <input class="form-control empid" placeholder="Search for Employee ID" name="owner" id="owner" type="text" required="">
                        <span class="input-group-btn">
                            <a class="btn btn-primary owner" type="button"><i class="fa fa-search"></i></a>
                        </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Employee Name</label>
                       <input class=" form-control" type="text" name="dname" id="dname" value="" readonly="">
                        
                    </div>
                    <div class="form-group">
                        <label for="address">Employee Position</label>
                        <input class=" form-control" type="text" name="dposition" id="dposition" value="" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="name" >Employee Branch Asignment:</label>
                        <input type="hidden" name="bcode" id="bcode">
                        <input class=" form-control" type="text" name="dbranch" id="dbranch" value="" readonly="">
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

<div aria-hidden="true" aria-labelledby="prompt2Label" role="dialog" tabindex="-1" id="prompt3" class="modal fade">
    <div class="modal-dialog">
        <form role="form" method="POST" action="<?php echo site_url();?>/CUser/resetPassword">
        <div class="modal-content">
            <div class="modal-header ">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> RESET PASSWORD</h4>
            </div>
            <div class="modal-body">
                  <input type="hidden" name="userID" id="userID">  
                    <h4>Are you sure to reset password?</h4> 
            
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-success btn-danger" type="submit">Confirm</button>
            </div>

        </div>
        </form>
    </div>
</div>

<div aria-hidden="true" aria-labelledby="prompt2Label" role="dialog" tabindex="-1" id="prompt4" class="modal fade">
    <div class="modal-dialog">
        <form role="form" method="POST" action="<?php echo site_url();?>/CUser/deleteUser">
        <div class="modal-content">
            <div class="modal-header ">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i>DELETE USER</h4>
            </div>
            <div class="modal-body">
                  <input type="hidden" name="duserID" id="duserID">  
                    <h4>Are you sure to delete this user?</h4> 
            
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-success btn-danger" type="submit">Confirm</button>
            </div>

        </div>
        </form>
    </div>
</div>

<div aria-hidden="true" aria-labelledby="prompt2Label" role="dialog" tabindex="-1" id="prompt5" class="modal fade">
    <div class="modal-dialog">
        <form role="form" method="POST" action="<?php echo site_url();?>/CUser/activateUser">
        <div class="modal-content">
            <div class="modal-header ">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i>ACTIVATE USER</h4>
            </div>
            <div class="modal-body">
                  <input type="hidden" name="auserID" id="auserID">  
                    <h4>Are you sure to activate this user?</h4> 
            
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-success btn-success" type="submit">Confirm</button>
            </div>

        </div>
        </form>
    </div>
</div>



<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<!-- <script src="<?php echo base_url('assets/js/form-component.js');?>"></script> -->
