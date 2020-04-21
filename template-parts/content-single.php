<!--blog-area-start -->
<div class="blog-grid-area pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 mb-30">
                <div class="blog-details-wrapper blog-standard">
                    <div class="blog-img">
                      <?php // the_post_thumbnail(); ?>
                    </div>
                    <div class="blog-content blog-02-content">
                        <div class="blog-title">
                            <h3><?php the_title()?></h3>
                        </div>
                        <div class="blog-meta">
                            <span><i class="far fa-calendar-alt"></i> <?php the_time('F j, Y'); ?> </span>
                        </div>
                        <div style="clear: both;overflow: hidden;">
                            <?php the_content()?>
                        </div>

                    </div>


                    <div class="row mt-20">
						<div class="col-md-12">
                            <?php polash_entry_footer(); ?>
						</div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="navigation-border mt-50"></div>
                            <?php the_post_navigation(); ?>
                        </div>
                    </div>


                    <div class="post-comments mt-5">
                    <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 mb-30">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<!-- blog-area-end -->