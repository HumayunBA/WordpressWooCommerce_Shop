<?php
/**
 * Template Name: Home
 * The template for displaying all single posts and attachments.
 *
 * @package Hestia
 * @since Hestia 1.0
 */

get_header();



do_action( 'hestia_before_single_page_wrapper' );

?>
<div class="<?php echo hestia_layout(); ?>">
	<?php

		
		
	$class_to_add = '';
	if ( class_exists( 'WooCommerce', false ) && ! is_cart() ) {
		$class_to_add = 'blog-post-wrapper';
	}
	?>




<?php if( have_rows('slides') ): ?>

<div class="flexslider">
 <ul class="slides">

<?php while( have_rows('slides') ): the_row(); ?>


<?php	
        $image = get_sub_field('image');
	$imageurl=$image['sizes']['slider'];
	$title = get_sub_field('title');
?>
	    <li>
		<img src="<?php echo $imageurl;?>" >   

		</li>
<?php endwhile; ?>
 </ul>

</div>
<?php endif; 

 //echo do_shortcode('[products limit="3" paginate="true" columns="3" orderby="popularity"  ]'); 

?>





		
	
	<?php 
	 echo do_shortcode('[products_slider slide_to_show="3" limit="6" dots="false"]');
	get_footer(); ?>
