<?php 
   /**
    * Creates a sidebar
    * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
    */
    $rp_colorblocks = array(
        'name'          => 'Recommend Products',
        'id'            => 'recommend-products',
        'description'   => 'Area to display Recommended Products',
        'class'         => 'recommend-products',
        // 'before_widget' => '<li id="%1" class="widget %2">',
        // 'after_widget'  => '</li>',
        'before_title'  => '<h2 class="recommend-products-title">',
        'after_title'   => '</h2>'
    );

    register_sidebar( $rp_colorblocks );

    /**
    * Creates a sidebar
    * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
    */
    $product_blocks = array(
        'name'          => __( 'Product Blocks - Big', 'theme_text_domain' ),
        'id'            => 'product-blocks',
        'description'   => 'Area to display products in big blocks',
        'class'         => 'product-blocks',
        // 'before_widget' => '<li id="%1" class="widget %2">',
        // 'after_widget'  => '</li>',
        // 'before_title'  => '<h2 class="widgettitle">',
        // 'after_title'   => '</h2>'
    );
    
    register_sidebar( $product_blocks );
    

    