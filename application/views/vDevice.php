<!--main content start-->
            <section id="main-content">
                <section class="wrapper">            
                    <!--overview start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-check-square-o "></i> Working Devices </h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="<?php echo site_url();?>/CLogin/index">Home</a></li>
                                <li><i class="fa fa-table"></i>Inventory</li>
                                <li><i class="fa fa-check-square-o "></i>Working</li>						  	
                            </ol>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-lg-2">
                            <a class="btn btn-success btn-md fa fa-plus" href="<?php echo site_url();?>/CDevice/viewAddDevice"> ADD DEVICE</a><br><br>

                        </div>
                        <div class="col-lg-12">
                            
                            
                            <section class="panel">
                            
                                <header class="panel-heading">
                                Working Devices Table

                                </header> 
                                <div class="table-responsive">
                                    <!-- <a href="#" class="btn btn-success btn-md fa fa-plus"> ADD BRANCH</a> -->
                                        <table id="wdevice-table" class="table table-striped table-advance table-hover ">

                                            <thead>
                                                <tr>
                                                    <td><i class="icon_profile"></i>Device Serial No</td>
                                                    <td><i class="icon_calendar"></i>Device Name</td>
                                                    <td><i class="icon_pin_alt"></i>Device Brand</td>
                                                    <td><i class="icon_pin_alt"></i>Device Type</td>
                                                    <td><i class="icon_pin_alt"></i>Device Owner</td>
                                                    <td><i class="icon_pin_alt"></i>Device Status</td>
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

<div aria-hidden="true" aria-labelledby="deleteDeviceLabel" role="dialog" tabindex="-1" id="deleteDevice" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> DELETE DEVICE</h4>
            </div>
            <div class="modal-body">
                <?php ?>
                <form role="form" method="POST" action="<?php echo site_url();?>/CDevice/disposeDevice">
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