<?php
    // if ( has_post_thumbnail() ) {
    //     $post_img = wp_get_attachment_url( get_post_thumbnail_id() );
    // }
?>
<div class="col-xl-4 col-lg-4 col-md-6">
    <div class="blog-wrapper mb-80">
        <div class="blog-img">
            <?php if(has_post_thumbnail()): ?>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
            <?php endif; ?>
        </div>
        <div class="blog-content blog-02-content">
            <div class="blog-meta">
                <span><i class="far fa-calendar-alt"></i> <a href="<?php the_permalink(); ?>"><time><?php the_time('F j, Y'); ?></time></a></span>
                <span><i class="far fa-comment"></i> <a href="<?php the_permalink(); ?>"><?php echo get_comments_number();?><a></span>
            </div>
            <div class="blog-title">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h3>
            </div>
            <p><?php the_excerpt()?></p>
            <a class="btn green-btn" href="<?php the_permalink(); ?>">আরো পড়ুন  <i class="far fa-long-arrow-right"></i></a>
        </div>
    </div>
</div>