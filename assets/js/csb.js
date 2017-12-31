$(document).ready(function(){



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

});