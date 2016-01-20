<?php
/**
 * taxonomy-newsletter.php
 * 
 * This is the adjusted template for Newsletters (newsletter taxonomy) for the
 * Twenty Sixteen theme and derived child-themes.
 * 
 * To use or modify this template:
 * - Create a groups-newsletters subfolder in your theme's root folder.
 * - Copy this file there and adjust it as desired.
 *
 * @author itthinx
 */

get_header();

echo '<div id="primary" class="content-area newsletter">';
echo '<main id="main" class="site-main" role="main">';

// newsletter title & description
if ( is_tax() ) {
	global $wp_query;
	if ( $newsletter = $wp_query->get_queried_object() ) {
		if ( $newsletter && !is_wp_error( $newsletter ) ) {
			echo sprintf( '<h1 class="newsletter-title %s">%s</h1>', $newsletter->slug, wp_strip_all_tags( $newsletter->name ) );
			if ( !empty( $newsletter->description ) ) {
				echo '<div class="newsletter-description">';
				echo wp_filter_kses( $newsletter->description );
				echo '</div>';
			}
		}
	}
}

// newsletter stories
while ( have_posts() ) {
	the_post();
	get_template_part( 'template-parts/content', get_post_format() );
}

// pagination
global $wp_query;
$paginate_links = paginate_links( array(
	'base'    => str_replace( PHP_INT_MAX, '%#%', esc_url( get_pagenum_link( PHP_INT_MAX ) ) ),
	'format'  => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total'   => $wp_query->max_num_pages
) );
if ( strlen( $paginate_links ) > 0 ) {
	echo '<div class="paginate-links">';
	echo $paginate_links;
	echo '</div>';
}

echo '</main>';
echo '</div>';

get_sidebar();
get_footer();
