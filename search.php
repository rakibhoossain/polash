<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Polash
 */

get_header();
?>
<?php if ( have_posts() ) : ?>
    <?php polash_before_post(); ?>

    <!-- blog-area-start -->
    <div class="blog-grid-area pt-130 pb-130">
        <div class="container">
            <div class="row">
            	<?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'template-parts/content', 'post' ); ?>
            	<?php endwhile; ?>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="basic-pagination mt-10 text-center">
                        <?php
                        the_posts_pagination( array(
                            'prev_text' => '<i class="fa fa-arrow-left"></i><span class="screen-reader-text">' . __( 'Previous Page', 'magazil' ) . '</span>',
                            'next_text' => '<span class="screen-reader-text">' . __( 'Next Page', 'magazil' ) . '</span><i class="fa fa-arrow-right"></i>' ,
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'magazil' ) . ' </span>',
                        ) );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog-area-end -->
    <?php
	else :
		get_template_part( 'template-parts/content', 'none' );
	endif;
	?>

<?php
get_footer();
