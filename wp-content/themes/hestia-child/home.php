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
	    <li><img src="<?php echo $imageurl?>" alt=<?php echo$title;?>>    </li>
<?php endwhile; ?>
 </ul>

</div>
<?php endif; ?>




	<div class="blog-post <?php esc_attr( $class_to_add ); ?>">
		<div class="container">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'page' );
				endwhile;
				else :
					get_template_part( 'template-parts/content', 'none' );
			endif;
			
				?>
		</div>
	</div>
	<?php get_footer(); ?>
