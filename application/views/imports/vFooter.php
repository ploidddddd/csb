<!-- javascripts -->
        <!-- <script src="<?php echo base_url('assets/js/csb.js');?>"></script> -->
        <script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
        <script src="<?php echo base_url('assets/js/jquery-ui-1.10.4.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js');?>"></script>
        <!-- <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui-1.9.2.custom.min.js');?>"></script> -->
        <!-- bootstrap -->
        <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
       <!-- nice scroll -->
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.scrollTo.min.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.nicescroll.js');?>"></script>
        <!-- DATATABLES -->
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
        <!-- charts scripts -->
        <!-- <script src="assets/jquery-knob/js/jquery.knob.js"></script>
        <script src="js/jquery.sparkline.js" type="text/javascript"></script>
        <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
        <script src="js/owl.carousel.js" ></script> -->
        <!-- jQuery full calendar -->
        <!-- <script src="js/fullcalendar.min.js"></script> Full Google Calendar - Calendar
        <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script> -->
        <!--script for this page only-->
        <!-- <script src="js/calendar-custom.js"></script>
        <script src="js/jquery.rateit.min.js"></script> -->
        <!-- custom select -->
        <!-- <script src="js/jquery.customSelect.min.js" ></script>
        <script src="assets/chart-master/Chart.js"></script> -->
        <!-- <script src="js/bootstrap-switch.js"></script> -->
         <script src="<?php echo base_url('assets/js/bootstrap-switch.js');?>"></script>
         <script src="<?php echo base_url('assets/js/jquery.tagsinput.js');?>"></script>
          <!-- <script src="js/jquery.tagsinput.js"></script> -->
        <!--custome script for all page-->
         <!-- <script src="js/form-component.js"></script> -->

        <script type="text/javascript" src="<?php echo base_url('assets/js/scripts.js');?>"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
        <!-- custom script for this page-->
        <!-- <script src="js/sparkline-chart.js"></script>
        <script src="js/easy-pie-chart.js"></script>
        <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="js/jquery-jvectormap-world-mill-en.js"></script>
        <script src="js/xcharts.min.js"></script>
        <script src="js/jquery.autosize.min.js"></script>
        <script src="js/jquery.placeholder.min.js"></script>
        <script src="js/gdp-data.js"></script>	
        <script src="js/morris.min.js"></script>
        <script src="js/sparklines.js"></script>	
        <script src="js/charts.js"></script>
        <script src="js/jquery.slimscroll.min.js"></script> -->
    <script type="text/javascript">
        //document.getElementById("here").innerHTML = d[0].trim();
        // $("#here").text( "JER" );
        $(document).ready(function() {
            $('#branch-table').DataTable({
                "ajax" : {
                    url: "<?php echo site_url();?>/CBranch/getBranches",
                    type : 'GET'
                },
            });

           $('#emp-table').DataTable({
                "ajax" : {
                    url: "<?php echo site_url();?>/CEmployee/getEmployees",
                    type : 'GET'
                },
            });

            $('#wdevice-table').DataTable({
                "ajax" : {
                    url: "<?php echo site_url();?>/CDevice/getWorkingDevices",
                    type : 'GET'
                },
            });

            $('#logs-table').DataTable({

                "ajax" : {
                    url: "<?php echo site_url();?>/CLogs/getLogs",
                    type : 'GET'
                },
            });

            $('#disposed-table').DataTable({

                "ajax" : {
                    url: "<?php echo site_url();?>/CDevice/getDisposedDevices",
                    type : 'GET'
                },
            });

            $('#software-table').DataTable({

                "ajax" : {
                    url: "<?php echo site_url();?>/CSoftware/getSoftwares",
                    type : 'GET'
                },
            });

            $('#isoftwares-table').DataTable({

                "ajax" : {
                    url: "<?php echo site_url();?>/CInstall/getInstalled",
                    type : 'GET'
                },
            });

            $('#peripherals-table').DataTable({

                "ajax" : {
                    url: "<?php echo site_url();?>/CPeripherals/getPeripherals",
                    type : 'GET'
                },
            });

            $('#user-table').DataTable({

                "ajax" : {
                    url: "<?php echo site_url();?>/CUser/getUsers",
                    type : 'GET'
                },
            });


            $(document).on('click','.viewButton', function(){
                var id = $(this).data("id");
                    // alert(id);
                $.ajax({
                    url: "<?php echo site_url()?>/cBranch/getBranch/"+id,
                    data: { id:id },
                    type: "POST",
                    success: function(data){
                        var d=data.split('/');
                        $("p").text(d[0].trim());
                        $("#vcode").val(d[0].trim());
                        $("#vname").val(d[1].trim());
                        $("#vregion").val(d[2].trim());
                        $("#vaddress").val(d[3].trim());
                        $("#vstatus").val(d[4].trim());
                    },
                    error: function(data){
                        alert("error");
                    }
                });
            });

            $(document).on('click','.editButton', function(){
                var id = $(this).data("id");
                    // alert(id);
                $.ajax({
                    url: "<?php echo site_url()?>/cBranch/getBranch/"+id,
                    data: { id:id },
                    type: "POST",
                    success: function(data){
                        var d=data.split('/');
                        $("#vecode").val(d[0].trim());
                        $("#ecode").val(d[0].trim());
                        $("#ename").val(d[1].trim());
                        $("#eregion").val(d[2].trim());
                        $("#eaddress").val(d[3].trim());
                        $("#estatus").val(d[4].trim());
                    },
                    error: function(data){
                        alert("error");
                    }
                });
            });

            $(document).on('click','.eviewButton', function(){
                var id = $(this).data("id");
                    // alert(id);
                $.ajax({
                    url: "<?php echo site_url()?>/CEmployee/getEmployee/"+id,
                    data: { id:id },
                    type: "POST",
                    success: function(data){
                        var d=data.split('/');
                        // alert(d);
                        $("#idno").text(d[0].trim());
                        $("#vfname").text(d[1].trim()+" "+d[2].trim()+" "+d[3].trim());
                        $("#vmname").text(d[2].trim());
                        $("#vlname").text(d[3].trim());
                        $("#vposition").text(d[4].trim());
                        $("#vstatus").text(d[6].trim());
                        $("#vbranch").text(d[5].trim()+" - "+d[9].trim());
                        $("#vlmod").text(d[8].trim());
                        $("#vlmodby").text(d[10].trim()+" "+d[11].trim()+" "+d[12].trim());

                    },
                    error: function(data){
                        alert("error");
                    }
                });
            });

            $(document).on('click','.eeditButton', function(){
                var id = $(this).data("id");
                    // alert(id);
                $.ajax({
                    url: "<?php echo site_url()?>/CEmployee/getEmployee/"+id,
                    data: { id:id },
                    type: "POST",
                    success: function(data){
                        var d=data.split('/');
                        $("#uid").val(d[0].trim());
                        $("#uuid").val(d[0].trim());
                        $("#ufname").val(d[1].trim());
                        $("#umname").val(d[2].trim());
                        $("#ulname").val(d[3].trim());
                        $("#uposition").val(d[4].trim());
                        $("#ustatus").val(d[6].trim());
                        $("#ubranch").val(d[5].trim());
                        // $("#ulmod").val(d[8].trim());
                        // $("#ulmodby").val(d[12].trim()+" - "+d[9].trim()+" "+d[10].trim()+" "+d[11].trim());

                    },
                    error: function(data){
                        alert("error");
                    }
                });
            });

            $(document).on('click','.lviewButton', function(){
                var id = $(this).data("id");
                    // alert(id);
                $.ajax({
                    url: "<?php echo site_url()?>/CLogs/getLog/"+id,
                    data: { id:id },
                    type: "POST",
                    success: function(data){
                        var d=data.split('/');
                        // alert(d);
                        $("#vidno").text(d[0].trim());
                        $("#vremarks").text(d[1].trim());
                        $("#vdescription").text(d[2].trim());
                        $("#vstamp").text(d[3].trim());
                        $("#vdevid").text(d[4].trim()+" - "+d[6].trim());
                        $("#vbranch").text(d[5].trim()+" - "+d[7].trim());
                        $("#vowner").text(d[8].trim()+" - "+d[9].trim()+" "+d[10].trim()+" "+d[11].trim());
                        $("#vmadeby").text(d[12].trim()+" - "+d[13].trim()+" "+d[14].trim()+" "+d[15].trim());
                        // $("#vlmodby").text(d[12].trim()+" - "+d[9].trim()+" "+d[10].trim()+" "+d[11].trim());

                    },
                    error: function(data){
                        alert("error");
                    }
                });
            });

            $(document).on('click','.support', function(){
                var id = $(this).data("id");
                    // alert(id);
                $.ajax({
                    url: "<?php echo site_url()?>/CLogs/getLog1/"+id,
                    data: { id:id },
                    type: "POST",
                    success: function(data){
                        var d=data.split('/');
                        $("#serial").val(d[0].trim());
                        $("#branch").val(d[1].trim());
                        $("#owner").val(d[2].trim());

                    },
                    error: function(data){
                        alert("error");
                    }
                });
            });


            $(document).on('click','.owner', function(){
                // var id = $(this).val().trim();
                var id = $(".empid").val().trim();

                if ($(".empid").val().length == 0){
                    $('#prompt').modal('show');
                } else {
                    // alert(id);
                    $.ajax({
                        url: "<?php echo site_url()?>/CEmployee/getEmployee/"+id,
                        data: { id:id },
                        type: "POST",
                        success: function(data){
                            var d=data.split('/');
                            if (data == "") {
                                $('#prompt2').modal('show');
                            } else {
                                $(".ownerDetails").removeAttr("hidden");
                                $("#dname").val(d[1].trim()+" "+d[2].trim()+" "+d[3].trim());
                                $("#dposition").val(d[4].trim());
                                $("#dbranch").val(d[5].trim()+" - "+d[9].trim());
                                $("#bcode").val(d[5].trim());
                            }
                            
                        
                        },
                        error: function(data){
                            alert("error");
                        }
                    });

                }
            });

            $(document).on('change','.empid', function(){
               $("#dname").val(" ");
                $("#dposition").val(" ");
                $("#dbranch").val(" ");
            });

             $(document).on('click','.sviewButton', function(){
                var id = $(this).data("id");
                    // alert(id);
                $.ajax({
                    url: "<?php echo site_url()?>/CSoftware/getSoftware/"+id,
                    data: { id:id },
                    type: "POST",
                    success: function(data){
                        var d=data.split('/');
                        // alert(d);
                        $("#vsoftid").val(d[0].trim());
                        $("#vname").val(d[1].trim());
                        $("#vdescription").val(d[2].trim());
                        // $("#vprodkey").val(d[3].trim());
                        $("#vstatus").val(d[3].trim());
                        $("#vadded").val(d[4].trim());
                        $("#vaddedby").val(d[8].trim()+" - "+d[5].trim()+" "+d[6].trim()+" "+d[7].trim());
                        $("#vlastmodi").val(d[9].trim());
                        $("#vlastmodiby").val(d[13].trim()+" - "+d[10].trim()+" "+d[11].trim()+" "+d[12].trim());
                        $("#vtype").val(d[15].trim());
                        

                    },
                    error: function(data){
                        alert("error");
                    }
                });
            });

             $(document).on('click','.seditButton', function(){
                var id = $(this).data("id");
                    // alert(id);
                $.ajax({
                    url: "<?php echo site_url()?>/CSoftware/getSoftware/"+id,
                    data: { id:id },
                    type: "POST",
                    success: function(data){
                        var d=data.split('/');
                        // alert(d);
                        $("#usoftid").val(d[0].trim());
                        $("#uname").val(d[1].trim());
                        $("#udescription").val(d[2].trim());
                        $("#uprodkey").val(d[3].trim());
                        $("#ustatus").val(d[4].trim());
                        $("#utype").val(d[15].trim());
                        $("#uadded").val(d[5].trim());
                        $("#uaddedby").val(d[9].trim()+" - "+d[6].trim()+" "+d[7].trim()+" "+d[8].trim());
                        $("#ulastmodi").val(d[10].trim());
                        $("#ulastmodiby").val(d[14].trim()+" - "+d[11].trim()+" "+d[12].trim()+" "+d[13].trim());
                        

                    },
                    error: function(data){
                        alert("error");
                    }
                });
            });

              $(document).on('click','.delete', function(){
                var id = $(this).data("id");
                $("#confirmID").val(id);
                // alert(id);
            });

            $(document).on('change','.box', function(){
                 $('.box').not(this).prop('checked', false);  
                // alert(id);
            });

             $(document).on('click','.install', function(){
                var id = $(this).data("id");
                $("#deviceID").val(id);
                // alert(id);
            });

             $(document).on('click','.uinstall', function(){
                var id = $(this).data("id");
                $("#udeviceID").val(id);
                // alert(id);
            });

             $(document).on('click','.peri', function(){
                var id = $(this).data("id");
                $("#pdeviceID").val(id);
                // alert(id);
            });


            $(document).on('click','.cancel', function(){
                $(':input','#form').val("");
            });

            $(document).on('click','.cpass', function(){
                var pass = $("#hiddenPass").val();
                // alert(pass);
                $(document).on('keyup','#old',function() {
                    if($("#old").val() == pass){
                        // alert('SAME');
                        $("#cur").removeClass("has-error");
                        $("#incorrect").addClass("hidden");
                        $("#cname").addClass("hidden");
                    } else{
                        $("#cur").addClass("has-error");
                        $("#incorrect").removeClass("hidden");
                        $("#cname").addClass("hidden");
                    }

                });
            });

            $(document).on('submit','#atay', function(e){
               
               if ($("#old").val() == "") {
                $("#cname").removeClass("hidden");
                $("#cur").addClass("has-error");
                e.preventDefault();
               }
               if ($("#new").val() == "") {
                $("#cname1").removeClass("hidden");
                $("#np").addClass("has-error");
                e.preventDefault();
               }
               if ($("#confirm").val() == "") {
                $("#cname2").removeClass("hidden");
                $("#cp").addClass("has-error");
                e.preventDefault();
               }
               // alert('atay');
            });

            $(document).on('keyup','#new',function() {
                $("#np").removeClass("has-error");
                $("#cname1").addClass("hidden");
            });

            $(document).on('keyup','#confirm',function() {
                if ($("#new").val() != $("#confirm").val()) {
                    $("#cp").addClass("has-error");
                    $("#match").removeClass("hidden");
                } else {
                    $("#match").addClass("hidden");
                    $("#cp").removeClass("has-error");
                $("#cname2").addClass("hidden");
                }
                
            });

            $(".modal").on("hidden.bs.modal", function(){
                $(this).find('form')[0].reset();
                $("#incorrect").addClass("hidden");
                $("#cur").removeClass("has-error");
                $("#match").addClass("hidden");
                $("#np").removeClass("has-error");
                $("#cp").removeClass("has-error");
                $("#cname").addClass("hidden");
                $("#cname1").addClass("hidden");
                $("#cname2").addClass("hidden");
            });

            $(document).on('click','#resetPassword', function(){
               var id = $(this).data("id");
               $('#userID').val(id);
            });

             $(document).on('click','#deleteUser', function(){
               var id = $(this).data("id");
               $('#duserID').val(id);
            });

             $(document).on('click','#activateUser', function(){
               var id = $(this).data("id");
               $('#auserID').val(id);
            });

            $(document).on('click','.peri', function(){
               var id = $(this).data("id");
               $('#periID').val(id);
               $("#pdeviceID").val(id);
            });

             $(document).on('click','.disposeDev', function(){
                // alert();
               var id = $(this).data("id");
               $('#disposeID').val(id);
            });

            


            






        });
     
    </script>
    </body>
</html>