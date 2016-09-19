<?php get_sidebar('service'); ?>
<?php get_sidebar('footer'); ?>

<script>
    function mc_minus(){
        var number = document.getElementById('number');
        if(number.value<= 1){
            //Do Nothing
        }else{
            number.value--;
        }
    }

    function mc_add(){
        var number = document.getElementById('number');
        number.value++;
    }

    jQuery(document).ready(function($) {
        $(".product_quantity_minus").click(function(e){
            var quantityInput = $(this).closest(".quantity").children("input");
            var currentQuantity = parseInt($(quantityInput).val());
            var newQuantity = ( currentQuantity > 1 ) ?  ( currentQuantity - 1) : 1;
            $(quantityInput).val(newQuantity);
        });
     
        $(".product_quantity_plus").click(function(e){
            var max_quantity = 99999;
            var quantityInput = $(this).closest(".quantity").children("input");
            var currentQuantity = parseInt($(quantityInput).val());
            var newQuantity = ( currentQuantity >= max_quantity ) ?  max_quantity : ( currentQuantity+1 );
            $(quantityInput).val(newQuantity);
        });
    });

    function cartNotification(){
        if(document.getElementById("woocommerce-message")) {
            var notification = document.getElementById("woocommerce-message");
            if (notification.style.display != "none") {
                setTimeout(function () {
                    notification.style.display = "none";
                }, 1500);
            }
        }else{
            //Do Nothing
        }
    }
    window.onload = function(){
        cartNotification();
    }
</script>
</body>
</html>