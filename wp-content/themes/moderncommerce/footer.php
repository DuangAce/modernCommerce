<?php get_sidebar('service'); ?>
<?php get_sidebar('footer'); ?>

<script>
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

        $("[href='#tab-reviews']").click(function(){
            var description = $('div#tab-description').css('display');
            // console.log(description);
            if(description == 'block'){
                $('li.description_tab').removeClass('current_tag');
                $('li.reviews_tab').addClass('current_tag');
                $('div#tab-description').css("display",'none');
                $('div#tab-reviews').css("display",'block');
            }
        });

        $("[href='#tab-description']").click(function(){
            var reviews = $('div#tab-reviews').css('display');
            // console.log(description);
            if(reviews == 'block'){
                $('li.reviews_tab').removeClass('current_tag');
                $('li.description_tab').addClass('current_tag');
                $('div#tab-reviews').css("display",'none');
                $('div#tab-description').css("display",'block');
            }
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