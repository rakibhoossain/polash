<?php
function front_blog_function( $atts = array() ) {
  ob_start();
  // set up default parameters
  extract(shortcode_atts(array(
   'type' => 'post',
   'item' => 3,
   'pt' => 130,
   'pb' => 100,
   'title' => '',
   'sub_title' => '',
  ), $atts));
?>

<div class="blog-area pt-<?php echo $pt; ?> pb-<?php echo $pb; ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 offset-lg-2 offset-xl-2">
                             <div class="section-title text-center mr-40 ml-40 mb-75">
                                 <span><i class="far fa-heart-circle"></i> <?php echo $title; ?></span>
                                 <h1><?php echo $sub_title; ?></h1>
                             </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                            $args = array( 'post_type' => $type, 'posts_per_page' => $item ,'ignore_sticky_posts' => 1);
                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post();
                        ?>


                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="blog-wrapper mb-30">
                                <div class="blog-title">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h3>
                                </div>
                                <div class="blog-img">
                                    <?php if(has_post_thumbnail()): ?>
                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumb'); ?></a>
                                    <?php endif; ?>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <span><i class="far fa-calendar-alt"></i> <a href="<?php the_permalink(); ?>"><time><?php the_time('F j, Y'); ?></time></a></span>
                                        <span><i class="far fa-comment"></i> <a href="<?php the_permalink(); ?>"><?php echo get_comments_number();?><a></span>
                                    </div>
                                    <p><?php echo wp_trim_words( get_the_excerpt(), 15 ); ?></p>
                                    <a class="btn green-btn" href="<?php the_permalink(); ?>">আরো পড়ুন  <i class="far fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <?php
                            endwhile;
                        ?>
                    </div>
                </div>
            </div>
<?php
wp_reset_postdata();
return ob_get_clean();
}
// add_filter( 'widget_text', 'do_shortcode' );
add_shortcode('POLASH_FRONT_POST', 'front_blog_function');