<?php if ($this->session->userdata('empSession')) { ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    
    <!-- FAVICON -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico');?>">

    <title>CITYSAVINGS BANK</title>

    <!-- Bootstrap CSS --> 
    <!-- <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet"> -->
    <!-- bootstrap theme -->
     <!-- <link href="<?php echo base_url('assets/css/bootstrap-theme.css');?>" rel="stylesheet"> -->

    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo base_url('assets/css/elegant-icons-style.css');?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/font-awesome.min.css');?>" rel="stylesheet" />

    <!-- Custom styles -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fullcalendar.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/widgets.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style-responsive.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/xcharts.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui-1.10.4.min.css');?>">
    
    <!-- DATATABLES -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.dataTables.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-v3.min.css');?>">
    <!-- <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> -->
    <link href="<?php echo base_url('assets/css/dataTables.bootstrap.min.css');?>" rel="stylesheet">
        <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/> -->

  </head>

    <body>
    <!-- container section start -->
        <section id="container" class="">
            <header class="header purple-bg">
                <div class="toggle-nav">
                    <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
                </div>

                <!--logo start-->
                <a href="index.html" class="logo"><img src="<?php echo base_url('assets/img/csb_logo.png');?>"> 
                    <span class="lite">USSD Monitoring System</span>
                </a>
                <!--logo end-->

                <div class="top-nav notification-row">                
                    <!-- notificatoin dropdown start-->
                    <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="profile-ava">
                                    <img alt="" src="<?php echo base_url('assets/img/man.png');?>">
                                </span>
                                <span class="username"><?php echo $this->session->userdata['empSession']['empName']; ?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                                <li class="eborder-top">
                                    <a href="#"><i class="icon_profile"></i> My Profile</a>
                                </li>
                                <li>
                                    <a class="cpass" data-target="#password_modal" data-toggle="modal" id="cpass"><i class="icon_lock_alt"></i> Change Password</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url();?>/CLogin/userLogout"><i class="icon_key_alt"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>
                    <!-- user login dropdown end -->
                    </ul>
                    <!-- notificatoin dropdown end-->
                </div>
            </header>      
            <!--header end-->

            <!--sidebar start-->
            <aside>
                <div id="sidebar"  class="nav-collapse ">
                    <!-- sidebar menu start-->
                    <ul class="sidebar-menu">                
                        <li class="trial">
                            <a class="" href="<?php echo site_url();?>/CLogin/index">
                                <i class="icon_house_alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon_table"></i>
                                <span>Inventory</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="trial" href="<?php echo site_url();?>/CDevice/displayDevices">Working</a></li>  
                                <li><a class="trial" href="<?php echo site_url();?>/CDevice/displayRepair">For Repair</a></li>
                                <li><a class="trial" href="<?php echo site_url();?>/CDevice/displayDisposed">Disposed</a></li>
                            </ul>
                        </li>
                        <li class="trial">
                            <a class="" href="<?php echo site_url();?>/CSoftware/displaySoftwares">
                                <i class="icon_drawer "></i>
                                <span>Softwares</span>
                            </a>
                        </li>    
                        <li class="trial">
                            <a class="" href="<?php echo site_url();?>/CBranch/displayBranches">
                                <i class="icon_building"></i>
                                <span>Branches</span>
                            </a>
                        </li>
                         <li class="trial">
                            <a class="" href="<?php echo site_url();?>/CEmployee/displayEmployees">
                                <i class="icon_group"></i>
                                <span>Employees</span>
                            </a>
                        </li>
                        <li class="trial">
                            <a class="" href="<?php echo site_url();?>/CUser/index">
                                <i class="icon_profile"></i>
                                <span>Users</span>
                            </a>
                        </li>
                    </ul>
                    <!-- sidebar menu end-->
                </div>
            </aside>
            <!--sidebar end-->


<div aria-hidden="true" aria-labelledby="deleteBranchLabel" role="dialog" tabindex="-1" id="password_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><i class="fa fa-pencil"></i> CHANGE PASSWORD</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" id="atay" action="<?php echo site_url();?>/CUser/changePassword">
                   <!--  <div class="form-group has-error">
                                      <label class="control-label col-lg-2" for="inputError">Input with error</label>
                                      <div class="col-lg-10">
                                          <input class="form-control" id="inputError" type="password" placeholder="HEY" >
                                      </div>
                                  </div> -->

                    <div class="form-group" id="cur">
                        <label for="old" class="control-label">Current Password
                            <span class="required">*</span>
                        </label>
                        <input class="form-control" name="old" id="old" type="password" placeholder="Enter Current Password" >
                        <label for="cname" class="error control-label hidden" id="cname">This field is required.</label>
                        <label for="cname" class="error control-label hidden" id="incorrect">Incorrect Password!</label>
                        <!-- <input class="form-control" name="old" id="old" placeholder="Enter Current Password" type="password" required=""> -->
                    </div>
                    <div class="form-group" id="np">
                        <label for="code">New Password</label>
                        <input type="password" class="form-control" name="new" id="new" placeholder="Enter New Password"  >
                        <label for="cname" class="error control-label hidden" id="cname1">This field is required.</label>
                        <input type="hidden" name="hiddenPass" id="hiddenPass" value="<?php echo $this->session->userdata['empSession']['userPassword']; ?>">
                    </div>
                    <div class="form-group" id="cp">
                        <label for="code">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm" id="confirm" placeholder="Enter Confirm Password"  >
                        <label for="cname" class="error control-label hidden" id="cname2">This field is required.</label>
                        <label for="cname" class="error control-label hidden" id="match">Password didn't match!</label>
                    </div>
                    
                       
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-success btn-danger" type="submit">Confirm</button>
            </div>
                    
                </form>
            
        </div>
    </div>
</div>
    
            
<?php } else {
        redirect('Welcome');
    }
?>
