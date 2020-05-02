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
}

   add_action('wp_enqueue_scripts', 'load_stylesheets');


	


   function addjs(){
   wp_register_script('flexslider',get_stylesheet_directory_uri().'/js/jquery.flexslider-min.js',array(),1,false);
   wp_enqueue_script('flexslider');

   wp_register_script('js',get_stylesheet_directory_uri().'/js/script.js',array(),1,false);
   wp_enqueue_script('js');
   }
   add_action('wp_enqueue_scripts', 'addjs');



   add_image_size('slider',1200,700,true)
?>

