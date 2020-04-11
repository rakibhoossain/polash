<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Polash
 */

get_header();
?>
	<?php
	while ( have_posts() ) : the_post();

		polash_before_post();
		get_template_part( 'template-parts/content', 'single' );
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

<?php
get_footer();