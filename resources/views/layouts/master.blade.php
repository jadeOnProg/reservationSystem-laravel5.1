<!DOCTYPE html>
<html>
    <head>
        <title>Church Reservation - @yield('title')</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="thesis church reservation system">
        <meta name="author" content="AMA students">

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo url(); ?>/assets/components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo url(); ?>/assets/components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="<?php echo url(); ?>/assets/dist/css/timeline.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo url(); ?>/assets/components/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">

        <!-- DataTables CSS -->
        <link href="<?php echo url(); ?>/assets/components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="<?php echo url(); ?>/assets/components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo url(); ?>/assets/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Calendar -->
        <link href="<?php echo url(); ?>/assets/calendar/css/bootstrap-datetimepicker.min.css">

    </head>
    <body>
        <div id="wrapper">
                @yield('content')
        </div>

    <!-- jQuery -->
    <script src="<?php echo url(); ?>/assets/components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo url(); ?>/assets/components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo url(); ?>/assets/components/metisMenu/dist/metisMenu.min.js"></script>



    <!-- DataTables JavaScript -->
    <script src="<?php echo url(); ?>/assets/components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo url(); ?>/assets/components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo url(); ?>/assets/dist/js/sb-admin-2.js"></script>


    <script src="<?php echo url(); ?>/assets/calendar/js/bootstrap-datetimepicker.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });

            $('#start').datetimepicker();
            $('#end').datetimepicker();
        });

    </script>


    </body>
</html>

