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
    <!-- bootstrap theme -->
   <link href="<?php echo base_url('assets/css/bootstrap-theme.css');?>" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo base_url('assets/css/elegant-icons-style.css');?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/font-awesome.min.css');?>" rel="stylesheet" />
    <!-- Custom styles -->
     <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style-responsive.css');?>">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body style="background: #4E2784">

    

    <div class="container">
      <!-- <br><br><br><br><br><br><br> -->
 <!--  <span class="lite">
            <h1 align="center" style="color: #fdb930;">USSD MONITORING SYSTEM</h1>
          </span> -->

      <form method="POST" class="login-form" action="<?php echo site_url();?>/CLogin/userLogin" style="background: #4E2784">
        
        <div class="login-wrap">
          <h1 align="center" style="color: #fdb930; ">USER SUPPORT</h1>
            <p class="login-img"><img src="<?php echo base_url('assets/img/csb_logo.png');?>"></p>
            <?php if(isset($error)){
              foreach ($error as $er) {}
                // echo $er;
                echo "<div class='alert alert-block alert-danger fade in'>
                                  <button data-dismiss='alert' class='close close-sm' type='button'>
                                      <i class='fa fa-times'></i>
                                  </button>
                                  <strong>$er</strong> Check User ID and Password.
                              </div>";
            }
            ?>
        </div>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" placeholder="Employee ID" autofocus name="empID" id="empID" required="">
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="empPassword" id="empPassword" required="">
            </div>
            <button class="btn btn-lg btn-block orange" type="submit">Login</button>
      </form>
     </div>

  </body>
    <script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui-1.10.4.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.scrollTo.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.nicescroll.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-switch.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.tagsinput.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/scripts.js');?>"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
</html>
