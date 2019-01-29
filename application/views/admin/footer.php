 <!-- jQuery -->
    <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url()?>assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?=base_url()?>assets/vendor/raphael/raphael.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/morrisjs/morris.min.js"></script>
    <script src="<?=base_url()?>assets/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url()?>assets/dist/js/sb-admin-2.js"></script>

    <script>
		$(document).ready(function () {
			// Initialize select2
      $('#cancel').hide();
			$("#update").click(function(e){
                $("input").prop('disabled', false);
                $('#submit').prop('disabled', false);
                $(this).hide();
                $('#cancel').show();
      });
      $('#cancel').click(function(){
                $("input").prop('disabled', true);
                $('#submit').prop('disabled', true);
                $(this).hide();
                $('#update').show();
      });
      $('ul.tabs li').click(function(){
        var tab_id = $(this).attr('data-tab');

        $('ul.tabs li').removeClass('current');
        $('.tab-content').removeClass('current');

        $(this).addClass('current');
        $("#"+tab_id).addClass('current');
      });
		});

	</script>
</body>

</html>
