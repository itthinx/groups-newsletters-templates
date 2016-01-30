<?php
/**
 * single-story.php
 *
 * This is the adjusted template for Stories (story custom post type) with
 * the College theme and derived child-themes.
 * 
 * To use or modify this template:
 * - Create a groups-newsletters subfolder in your theme's root folder.
 * - Copy this file there and adjust it as desired.
 *
 * @author itthinx
 */

get_header();

while( have_posts() ) {

	the_post();

?>
	<!-- This section contains the full item content+ sidebars -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<!-- Title -->
		<section id="single-title-container">

			<?php get_template_part( '/framework/partials/common-partials/title', get_post_format() ); ?>

		</section>
		<!-- Breadcrumb -->

		<section id="single-breadcrumb-container">
			<div class="container">
				<div class="row">
					<div class="col-md-12">

						<?php get_template_part( '/framework/partials/common-partials/breadcrumb', get_post_format() ); ?>

					</div>
				</div>
			</div>
		</section>

		<!-- Content , differs when the layout is full or boxed. -->
		<?php
			get_template_part( '/framework/partials/main-content/boxed-9-content', get_post_format() );
			
			echo '<div class="full-section-60">';
			echo '<div class="container">';
			$newsletters = get_the_term_list( get_the_ID(), 'newsletter', '', ', ', '' );
			if ( !empty( $newsletters ) ) {
				echo '<div class="newsletters">';
				echo sprintf( __( 'Posted in %s', GROUPS_NEWSLETTERS_PLUGIN_DOMAIN ) , $newsletters );
				echo '</div>';
			}
			
			$tags = get_the_term_list( get_the_ID(), 'story_tag', '', ', ', '' );
			if ( !empty( $tags ) ) {
				echo '<div class="tags">';
				echo sprintf( __( 'Tags %s', GROUPS_NEWSLETTERS_PLUGIN_DOMAIN ) , $tags );
				echo '</div>';
			}

			// if you want to link to the previous / next story ...

			//echo '<div class="previous">';
			//previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' );
			//echo '</div>';

			//echo '<div class="next">';
			//next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' );
			//echo '</div>';

			echo '</div>'; // .container
			echo '</div>'; // .full-section-60
		?>
	</article>
<?php
}
get_footer();
