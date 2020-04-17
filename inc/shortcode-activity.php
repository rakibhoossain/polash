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
                <div class="shape d-none d-xl-block">
                    <div class="shape-item case-01 bounce-animate"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/shape/shape-1.png');?>  " alt=""></div>
                    <div class="shape-item case-02"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/shape/shape-2.png');?> " alt=""></div>
                    <div class="shape-item case-03"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/shape/shape-4.png');?> " alt=""></div>
                    <div class="shape-item case-04 bounce-animate"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/shape/shape-3.png');?> " alt=""></div>
                </div>
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
                                <div class="case-text">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h3>
<!--                                     <div class="case-name">
                                        <div class="case-say-img">
                                            <img src="assets/img/case/01.png" alt="">
                                        </div>
                                        <div class="case-say-content">
                                            <span>Donald C. Snead</span>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="case-img">
                                    <?php if(has_post_thumbnail()): ?>
                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumb'); ?></a>
                                    <?php endif; ?>
                                </div>
                                <div class="case-meta">
                                    <div class="f-cat f-left">
                                        <?php
                                        $categories = get_the_category();
                                        if ( ! empty( $categories ) ) {
                                            echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                                        }
                                        ?>
                                    </div>
<!--                                     <div class="f-meta-list f-right">
                                        <span><i class="far fa-comment"></i> (5k)</span>
                                        <span><i class="far fa-comment"></i> (1k)</span>
                                    </div> -->
                                </div>
                                <div class="single-skill mb-25">
<!--                                     <div class="bar-title">
                                        <h5>$25,000 <span class="raise">Raise of</span> <span class="used-count">$30,000</span></h5>
                                    </div> -->
<!--                                     <div class="progress">
                                        <div class="progress-bar wow slideInLeft" role="progressbar" style="width: 85%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" data-wow-duration="1s" data-wow-delay=".5s">
                                            <span>85%</span>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="case-info">
                                    <p><?php the_excerpt()?></p>
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