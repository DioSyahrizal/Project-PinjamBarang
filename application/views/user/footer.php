 <!-- jQuery -->
    <!-- <script src="<?=base_url()?>assets/vendor/jquery/jquery.js"></script> -->
    <script src="<?php echo base_url().'assets/vendor/jquery/jquery.js'?>" type="text/javascript"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/dist/js/sb-admin-2.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url()?>assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- CSS -->
    <script type="text/javascript">
        $(document).ready(function(){

            $('.add_cart').click(function(){
                var id          = $('#id').val();
                var nama_barang = $('#nama_barang').val();
                var location    = $('#location').val();
                var date        = $('#date').val();
                var requester   = $('#requester').val();
                var departement = $('#departement').val();
                var quantity    = $('#quantity').val();

                if (quantity != '' && quantity > 0) {
                    $.ajax({
                        url:"<?php echo base_url();?>index.php/Barang_cart/add",
                        method: "POST",
                        data: {
                            id:id,
                            nama_barang:nama_barang,
                            location:location,
                            quantity:quantity,
                            date:date,
                            requester:requester,
                            departement:departement
                        },
                        success:function(data){
                            $('#cart_details').html(data);
                            alert("Product add to cart");
                        }
                    });
                } else {
                    alert('Please enter quantity');
                }
            });
            $('#cart_details').load("<?php echo base_url();?>index.php/Barang_cart/load");

            $(document).on('click', '.remove_inventory', function(){
                var row_id = $(this).attr('id');
                if (confirm("Are you sure to delete this?")) {
                    $.ajax({
                            url: "<?php echo base_url();?>index.php/Barang_cart/remove",
                            method: "POST",
                            data: {row_id:row_id},
                            success:function(data){
                                alert("Product remove from cart");
                                $('#cart_details').html(data);
                            }
                    });
                }else{
                    return false;
                }
                });

            $(document).on('click', '#clear_cart', function(){
                if (confirm("Are you sure to clear this cart?")) {
                    $.ajax({
                        url: "<?php echo base_url();?>index.php/Barang_cart/clear",
                        success:function(data){
                            alert("Clear the cart");
                            $('#cart_details').html(data);
                        }
                    });
                } else {
                    return false;
                }
            });


            $('#barang').autocomplete({
                source: "<?php echo site_url('User/get_autocomplete');?>",

                select: function (event, ui) {
                    $('[name="id"]').val(ui.item.id);
					$('[name="nama_barang"]').val(ui.item.nama_barang);
                    $('[name="store_location"]').val(ui.item.store_location);
                    $('[name="clasification"]').val(ui.item.clasification);
					$('#btn').attr('data-barangid',ui.item.id);
                    $('#btn').attr('data-barangnama',ui.item.nama_barang);
                    $('#btn').attr('data-location',ui.item.store_location);

                }
            });



        });
    </script>


</body>

</html>
