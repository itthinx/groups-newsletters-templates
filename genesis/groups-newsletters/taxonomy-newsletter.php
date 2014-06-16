<?php
/**
 * taxonomy-newsletter.php
 * 
 * This is the template for Newsletters (newsletter taxonomy) adapted for
 * the Genesis framework.
 * 
 * To use this template:
 * - Create a groups-newsletters subfolder in your theme's root folder.
 * - Copy this file there and adjust it as desired.
 *
 * @author itthinx
 */

/**
 * Newsletter title & description.
 */
function gn_genesis_before_content() {
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
}

add_action( 'genesis_before_content', 'gn_genesis_before_content' );

/**
 * Pagination links.
 */
function gn_genesis_after_loop() {
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
}

add_action( 'genesis_after_loop', 'gn_genesis_after_loop' );


/**
 * Void category links.
 * 
 * @param string $output
 * @param array $atts
 */
function gn_tn_genesis_post_categories_shortcode( $output, $atts ) {
	return '';
}

add_filter( 'genesis_post_categories_shortcode', 'gn_tn_genesis_post_categories_shortcode', 10, 2 );

/**
 * Void tag links.
 * 
 * @param string $output
 * @param array $atts
 */
function gn_tn_genesis_post_tags_shortcode( $output, $atts ) {
	return '';
}

add_filter( 'genesis_post_tags_shortcode', 'gn_tn_genesis_post_tags_shortcode', 10, 2 );

genesis();
