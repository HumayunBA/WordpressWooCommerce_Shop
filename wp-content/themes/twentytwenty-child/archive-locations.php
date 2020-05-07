<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content" role="main">

<?php
$loop = new WP_Query( array(
    'post_type' => 'Locations',
    'posts_per_page' => -1
  )
);
?>
<div class='singular'>
<?php while ( $loop->have_posts() ) : $loop->the_post();
$location=get_field('google_map');
$title=get_field('title');
$adress=get_field('adress');


 echo "<div style='width: 700px;'>";


echo "<h3>".$title."</h3>";
echo "<h5>".$adress."</h5>";

if( $location ): ?>
    <div class="acf-map" data-zoom="16">
        <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
    </div>
<?php endif; ?>
</div>
<?php endwhile; wp_reset_query(); ?>
</div>
</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>