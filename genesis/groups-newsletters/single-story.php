<?php
/**
 * single-story.php
 *
 * This is the template for Stories (story custom post type) adapted
 * for the Genesis framework.
 * 
 * To use this template:
 * - Create a groups-newsletters subfolder in your theme's root folder.
 * - Copy this file there and adjust it as desired.
 *
 * @author itthinx
 */

/**
 * Add links to the related newsletter(s) and tags after the story's content.
 * 
 * Notes on alternatives:
 * 
 * - This could also be done using the neutralized category and tag filters
 *   below.
 * - The genesis_post_meta filter could also be used instead, that
 *   filter is invoked from genesis_post_meta() which is also hooked on
 *   genesis_after_post_content.
 */
function gn_genesis_after_post_content() {

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

}

add_action( 'genesis_after_post_content', 'gn_genesis_after_post_content' );

/**
 * Void the output of the category links which do not apply to the story post
 * type.
 * 
 * The category links are rendered by default using Genesis'
 * [post_categories] shortcode via genesis_post_meta().
 * 
 * @param string $output
 * @param array $atts
 */
function gn_genesis_post_categories_shortcode( $output, $atts ) {
	return '';
}

add_filter( 'genesis_post_categories_shortcode', 'gn_genesis_post_categories_shortcode', 10, 2 );

/**
 * Void the output of the tag links which do not apply to the story post
 * type.
 * 
 * The tag links are rendered by default using Genesis' [post_tags] shortcode
 * via genesis_post_meta().
 * 
 * @param string $output
 * @param array $atts
 */
function gn_genesis_post_tags_shortcode( $output, $atts ) {
	return '';
}

add_filter( 'genesis_post_tags_shortcode', 'gn_genesis_post_tags_shortcode', 10, 2 );

genesis();
