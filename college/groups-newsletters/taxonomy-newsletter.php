<?php
/**
 * taxonomy-newsletter.php
 * 
 * This is the adjusted template for Newsletters (newsletter taxonomy) for the
 * College theme and derived child-themes.
 * 
 * To use or modify this template:
 * - Create a groups-newsletters subfolder in your theme's root folder.
 * - Copy this file there and adjust it as desired.
 *
 * @author itthinx
 */

get_header();

?>
<article id="full-container-<?php echo get_the_title(get_queried_object_id()); ?>">
<?php
// newsletter title & description
if ( is_tax() ) {
	global $wp_query;
	if ( $newsletter = $wp_query->get_queried_object() ) {
		if ( $newsletter && !is_wp_error( $newsletter ) ) {
			echo '<section id="single-title-container">';
			echo get_template_part('/framework/partials/common-partials/title', get_post_format() );
			echo '</section>';
			if ( !empty( $newsletter->description ) ) {
				echo '<div class="newsletter-description">';
				echo wp_filter_kses( $newsletter->description );
				echo '</div>';
			}
		}
	}
}
?>
<section id="single-breadcrumb-container">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<?php get_template_part( '/framework/partials/common-partials/breadcrumb', get_post_format() ); ?>

			</div>
		</div>
	</div>
</section>
<?php

// newsletter stories
get_template_part( '/framework/partials/main-content/boxed-9-content', get_post_format() );

// pagination
global $wp_query;
$paginate_links = paginate_links( array(
	'base'	=> str_replace( PHP_INT_MAX, '%#%', esc_url( get_pagenum_link( PHP_INT_MAX ) ) ),
	'format'  => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total'   => $wp_query->max_num_pages
) );
if ( strlen( $paginate_links ) > 0 ) {
	echo '<div class="paginate-links">';
	echo $paginate_links;
	echo '</div>';
}
?>
</article>
<!-- Full section ends here -->
<?php
get_footer();
