<?php 
   /**
    * Creates a Color Blocks with Products sidebar
    * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
    */
    $after_slider = array(
        'name'          => 'After Slider - Color Blocks',
        'id'            => 'after-slider',
        'description'   => 'Area to display Recommended Products in color blocks',
        'class'         => 'after-slider'
        // 'before_widget' => '<li id="%1" class="widget %2">',
        // 'after_widget'  => '</li>',
        // 'before_title'  => '<h2 class="recommend-products-title">',
        // 'after_title'   => '</h2>'
    );

    register_sidebar( $after_slider );

    /**
    * Creates a Product Big Blocks sidebar
    * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
    */
    $main_product = array(
        'name'          => 'Main product display',
        'id'            => 'product-blocks',
        'description'   => 'Area to display products in big blocks',
        'class'         => 'product-blocks'
    );
    
    register_sidebar( $main_product );
    

    /**
    * Creates a Footer Services sidebar
    * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
    */
    $footer_services = array(
        'name'          => 'Footer Services ',
        'id'            => 'footer-services',
        'description'   => 'Area to display Footer serives content',
        'class'         => 'footer-services'
    );
        
    register_sidebar( $footer_services );


    /**
    * Creates a Footer Column sidebar
    * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
    */
    $footer_column_1 = array(
        'name'          => 'Footer Column One',
        'id'            => 'footer-column-1',
        'description'   => 'Area To display Footer Columns',
        'class'         => 'footer-column-1',
    );
    
    register_sidebar( $footer_column_1 );

    /**
    * Creates a Footer Column sidebar
    * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
    */
    $footer_column_2 = array(
        'name'          => 'Footer Column Two',
        'id'            => 'footer-column-2',
        'description'   => 'Area To display Footer Columns',
        'class'         => 'footer-column-2',
    );
    
    register_sidebar( $footer_column_2 );

    /**
    * Creates a Footer Column sidebar
    * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
    */
    $footer_column_3 = array(
        'name'          => 'Footer Column Three',
        'id'            => 'footer-column-3',
        'description'   => 'Area To display Footer Columns',
        'class'         => 'footer-column-3',
    );
    
    register_sidebar( $footer_column_3 );
    /**
    * Creates a Footer Column sidebar
    * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
    */
    $footer_column_4 = array(
        'name'          => 'Footer Column Four',
        'id'            => 'footer-column-4',
        'description'   => 'Area To display Footer Columns',
        'class'         => 'footer-column-4',
    );
    
    register_sidebar( $footer_column_4 );

    /**
    * Creates a Footer Column sidebar
    * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
    */
    $footer_column_5 = array(
        'name'          => 'Footer Column Five',
        'id'            => 'footer-column-5',
        'description'   => 'Area To display Footer Columns',
        'class'         => 'footer-column-5',
    );
    
    register_sidebar( $footer_column_5 );

      /**
    * Creates a Footer Copyright
    * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
    */
    $footer_copyright = array(
        'name'          => 'Footer Copyright',
        'id'            => 'footer-copyright',
        'description'   => 'Area To display Footer Columns',
        'class'         => 'footer-copyright',
    );
    
    register_sidebar( $footer_copyright );

    /**
    * Creates a sidebar
    * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
    */
    $product_filter = array(
        'name'          => __( 'Product Filter' ),
        'id'            => 'mc_product_filter',
        'description'   => 'Area to display product filter in Shop Page',
        'class'         => 'mc_product_filter'
    );
    
    register_sidebar( $product_filter );
    
    
    