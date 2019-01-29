 <!-- jQuery -->
    <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- dateDropper lib -->
    <script src="<?=base_url()?>assets/vendor/datedropper/datedropper.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url()?>assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?=base_url()?>assets/vendor/raphael/raphael.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/morrisjs/morris.min.js"></script>
    <script src="<?=base_url()?>assets/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url()?>assets/dist/js/sb-admin-2.js"></script>
    <script src='<?=base_url()?>assets/dist/js/select2.min.js' type='text/javascript'></script>
    <!-- CSS -->
    <link href='<?=base_url()?>assets/dist/css/select2.min.css' rel='stylesheet' type='text/css'>
    <script>
        $(document).ready(function(){
            $('#tgl').dateDropper();
            // Initialize select2
            $("#selBarang").select2();
        });
    </script>


</body>

</html>
