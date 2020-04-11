<!-- blog-area-start -->
<div class="blog-grid-area pt-130 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 mb-30">
                <div class="blog-details-wrapper blog-standard">
                    <div class="blog-img">
                      <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="blog-content blog-02-content">
                        <div class="blog-meta">
                            <span><i class="far fa-calendar-alt"></i> <?php the_time('F j, Y'); ?> </span>
                            <span><i class="far fa-comment"></i> <a href="<?php the_permalink(); ?>"><?php echo get_comments_number();?></a></span>
                        </div>
                        <div class="blog-title">
                            <h3><?php the_title()?> <?php edit_post_link(); ?> </h3>
                        </div>
                        <div style="clear: both;overflow: hidden;">
                            <?php the_content()?>
                        </div>

                    </div>


                    <div class="row mt-20">
						<div class="col-xl-8 col-lg-7 col-md-6">
							<div class="blog-post-tag">
								<span>Tags : </span>
                                <?php echo get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'polash' ) ); ?>
							</div>
						</div>
						<div class="col-xl-4 col-lg-5 col-md-6">
							<div class="blog-share-icon text-left text-md-right">
								<span>Share: </span>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-behance"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
							</div>
						</div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="navigation-border mt-50"></div>
                            <?php the_post_navigation(); ?>
                        </div>

                        

<!--                                     <div class="col-xl-5 col-lg-5 col-md-5">
                            <div class="bakix-navigation b-next-post text-left mb-30">
                                <span><a href="#">Next Post</a></span>
                                <h4><a href="#">Tips on Minimalist</a></h4>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 ">
                            <div class="bakix-filter text-left text-md-center mb-30">
                                <a href="#"><i class="fad fa-th"></i></a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-5">
                            <div class="bakix-navigation b-next-post text-left text-md-right  mb-30">
                                <span><a href="#">Next Post</a></span>
                                <h4><a href="#">Tips on Minimalist</a></h4>
                            </div>
                        </div> -->
                    </div>


                    <div class="post-comments">
                        <div class="blog-coment-title mb-30">
                            <h2><?php echo get_comments_number();?></h2>
                        </div>
                        <div class="latest-comments">
                            <ul>
                                <li>
                                    <div class="comments-box">
                                        <div class="comments-avatar">
                                            <img src="assets/img/blog/comments1.png" alt="">
                                        </div>
                                        <div class="comments-text">
                                            <div class="avatar-name">
                                                <h5>Karon Balina</h5>
                                                <span>19th May 2018</span>
                                                <a class="reply" href="#"><i class="fas fa-reply"></i>Reply</a>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt
                                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                exercitation
                                                ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="children">
                                    <div class="comments-box">
                                        <div class="comments-avatar">
                                            <img src="assets/img/blog/comments2.png" alt="">
                                        </div>
                                        <div class="comments-text">
                                            <div class="avatar-name">
                                                <h5>Julias Roy</h5>
                                                <span>19th May 2018</span>
                                                <a class="reply" href="#"><i class="fas fa-reply"></i>Reply</a>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt
                                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                exercitation
                                                ullamco laboris nisi ut aliquip.</p>
                                        </div>
                                    </div>
                                </li>


                            </ul>
                        </div>
                    </div>
                    <div class="post-comments-form">
                        <div class="post-comments-title">
                            <h2>Post Comments</h2>
                        </div>
                        <form id="contacts-form" class="conatct-post-form" action="#">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="contact-icon contacts-message">
                                        <textarea name="comments" id="comments" cols="30" rows="10" placeholder="Your Comments...."></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="contact-icon contacts-name">
                                        <input type="text" placeholder="Your Name.... ">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="contact-icon contacts-email">
                                        <input type="email" placeholder="Your Email....">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="contact-icon contacts-website">
                                        <input type="text" placeholder="Your Website....">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <button class="btn" type="submit"> send comments <i class="far fa-long-arrow-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 mb-30">
                <div class="blog-sidebar">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog-area-end -->