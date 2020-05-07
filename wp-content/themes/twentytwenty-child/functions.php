<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
} 


//add_action( 'after_setup_theme', 'register_main_menu' );
 

   register_nav_menus( array(
      'main'=>__( 'Main Menu 33' ),
   ));



   function load_stylesheets(){
   wp_register_style('flexslider',get_stylesheet_directory_uri() . '/css/flexslider.css',array(),1,'all');
   wp_enqueue_style('flexslider');
   wp_register_style('custom',get_stylesheet_directory_uri() . '/css/style.css',array(),1,'all');
   wp_enqueue_style('custom');
}

   add_action('wp_enqueue_scripts', 'load_stylesheets');


	


   function addjs(){
   wp_register_script('flexslider',get_stylesheet_directory_uri().'/js/jquery.flexslider-min.js',array(),1,false);
   wp_enqueue_script('flexslider');

   wp_register_script('js',get_stylesheet_directory_uri().'/js/script.js',array(),1,false);
   wp_enqueue_script('js');



   wp_register_script('googlemaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBrQhjO9eERQWFLplBkmJsAH2qnV5DkqfM',null,null,true);  
	wp_enqueue_script('googlemaps');
   }
   add_action('wp_enqueue_scripts', 'addjs');



   add_image_size('slider',1200,700,true);


   function get_top_ten(){
      $query = new WP_Query( array(
          'posts_per_page' => 2,
          'post_type' => 'product',
          'post_status' => 'publish',
          'meta_key' => 'total_sales',
          'orderby' => 'meta_value_num',
          'order' => 'DESC',
      ) );
 
      if($query->have_posts()) :?>
      
      <?php do_action( 'woocommerce_before_shop_loop' ); ?>

       <?php woocommerce_product_loop_start(); ?>
      
         <?php while($query->have_posts()) : $query->the_post();?>
          
         <?php wc_get_template_part( 'content', 'product' ); ?>
            
         <?php endwhile;
          wp_reset_postdata();
      endif;
      woocommerce_product_loop_end();

			 do_action( 'woocommerce_after_shop_loop' ); 

  }






  // Our custom post type function
function create_posttype() {
 
    register_post_type( 'locations',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Locations' ),
                'singular_name' => __( 'Location' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'locations'),
            'show_in_rest' => true,
 
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );


function my_acf_init() {
   acf_update_setting('google_api_key', 'AIzaSyBrQhjO9eERQWFLplBkmJsAH2qnV5DkqfM');
}
add_action('acf/init', 'my_acf_init');
?>

