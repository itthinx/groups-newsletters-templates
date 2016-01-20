<?php
/**
 * single-story.php
 *
 * This is the adjusted template for Stories (story custom post type) with
 * the Twenty Sixteen theme and derived child-themes.
 * 
 * To use or modify this template:
 * - Create a groups-newsletters subfolder in your theme's root folder.
 * - Copy this file there and adjust it as desired.
 *
 * @author itthinx
 */

get_header();

echo '<div id="primary" class="content-area story">';
echo '<main id="main" class="site-main" role="main">';

while( have_posts() ) {

	the_post();

	get_template_part( 'template-parts/content', get_post_format() );

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

	comments_template( '', true );
}

echo '</main>'; //.site-main
get_sidebar( 'content-bottom' );
echo '</div>'; // .content-area

get_sidebar();
get_footer();
