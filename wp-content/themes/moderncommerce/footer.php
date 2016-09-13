<?php get_sidebar('service'); ?>
<?php get_sidebar('footer'); ?>

<script>
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
