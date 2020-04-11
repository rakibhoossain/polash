<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package magazil
 */

get_header();
?>
<div class="blog-grid-area pt-130 pb-130">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 offset-lg-2 offset-xl-2">
                 <div class="section-title text-center mb-80">
                     <span><i class="far fa-heart-circle"></i>করোনা আপডেট</span>
                     <h1>বাংলাদেশের বর্তমান করোনা পরিস্থিতি</h1>
                 </div>
            </div>
            <div class="col-md-12" id="corona-table"></div> <!-- Corona update -->
			<?php $args = array( 'post_type' => 'corona', 'posts_per_page' => 3 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'post' ); ?>
            <?php endwhile;?>
        </div>
    </div>
</div>

<?php
get_footer();