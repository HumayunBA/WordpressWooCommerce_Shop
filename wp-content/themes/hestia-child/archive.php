<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package Hestia
 * @since Hestia 1.0
 * @modified 1.1.30
 */

get_header();

$default         = hestia_get_blog_layout_default();
$sidebar_layout  = apply_filters( 'hestia_sidebar_layout', get_theme_mod( 'hestia_blog_sidebar_layout', $default ) );
$wrapper_classes = apply_filters( 'hestia_filter_archive_content_classes', 'col-md-8 archive-post-wrap' );

do_action( 'hestia_before_archive_content' );

?>

<div class="<?php echo hestia_layout(); ?>">
	<div class="hestia-blogs" data-layout="<?php echo esc_attr( $sidebar_layout ); ?>">
		<div class="container">
			<div class="row">
				<?php
				if ( $sidebar_layout === 'sidebar-left' ) {
					get_sidebar();
				}
				?>
				<div class="<?php echo esc_attr( $wrapper_classes ); ?>">
                    <?php
                    $loop = new WP_Query( array(
                        'post_type' => 'Locations',
                        'posts_per_page' => -1
                      )
                    );

					if ( $loop->have_posts()) :
						while ( $loop->have_posts() ) :
							$loop->the_post();
                            //get_template_part( 'template-parts/content' );
                            
                            
                            $location = get_field('google_map');
                            $title = get_field('title');
                            $adress = get_field('adress');

                        echo "<h2>".$title."</h2>";
                        echo "<h4> Adress:".$adress."</h4>";
                          
                            
                            if( !empty($location) ):
                            ?>
                            <div class="acf-map">
                             <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                            </div>
                            <?php endif;



						endwhile;
						wp_reset_query();
						
					endif;
						?>
				</div>
				<?php

				if ( $sidebar_layout === 'sidebar-right' ) {
					get_sidebar();
				}
				?>
			</div>
		</div>
	</div>
	<?php
	get_footer(); ?>
