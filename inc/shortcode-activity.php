<?php
function front_activity_function( $atts = array() ) {
  ob_start();
  // set up default parameters
  extract(shortcode_atts(array(
   'type' => 'post',
   'item' => 5,
   'pt' => 130,
   'pb' => 205,
   'title' => '',
   'sub_title' => ''
  ), $atts));
?>

<!-- case-area-start -->
<div class="case-area black-bg pos-rel pt-<?php echo $pt; ?> pb-<?php echo $pb; ?>">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 offset-lg-2 offset-xl-2">
                 <div class="section-title white-title text-center mr-40 ml-40 mb-75">
                     <span><i class="far fa-heart-circle"></i> <?php echo $title; ?></span>
                     <h1><?php echo $sub_title; ?></h1>
                 </div>
            </div>
        </div>
        <div class="row services-active arrow-style">
            <?php
                $args = array( 'post_type' => $type, 'posts_per_page' => $item ,'ignore_sticky_posts' => 1);
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
            ?>
            <div class="col-xl-12">
                <div class="case-wrapper white-bg">
                    <div class="case-text pb-2">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h3>
                    </div>
                    <div class="case-img">
                        <?php if(has_post_thumbnail()): ?>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumb'); ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="case-meta">
                        <div class="f-cat f-left">
                            <?php
                            if(get_post_type( get_the_ID() ) == 'activity'){
                                $activity_categories = get_the_terms( get_the_ID() , 'activity_category' );
                                if ( ! empty( $activity_categories ) ) {
                                    echo '<a href="' . esc_url( get_term_link( $activity_categories[0]->term_id ) ) . '">' . esc_html( $activity_categories[0]->name ) . '</a>';
                                }
                            }else{
                                $categories = get_the_category($post->ID);
                                if ( ! empty( $categories ) ) {
                                    echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                                }
                            }



                            ?>
                        </div>
                    </div>
                    <div class="single-skill mb-25">
                    </div>
                    <div class="case-info">
                        <p><?php echo wp_trim_words( get_the_excerpt(), 15 ); ?></p>
                        <div class="b-button">
                            <a href="<?php the_permalink(); ?>"><span>আরো পড়ুন</span> <i class="far fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
            ?>
        </div>
    </div>
</div>
<!-- case-area-end -->
<?php
wp_reset_postdata();
return ob_get_clean();
}
// add_filter( 'widget_text', 'do_shortcode' );
add_shortcode('POLASH_FRONT_ACTIVITY', 'front_activity_function');