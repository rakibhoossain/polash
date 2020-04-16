<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Polash
 */

?>
		</main>
	</div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="footer-top-area black-soft-bg pt-50 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-2">
                        <div class="footer-logo mb-30">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php
								if ( has_custom_logo() ) :
									the_custom_logo();
								else :
									$polash_description = get_bloginfo( 'description', 'display' );
									?>
									<h2><?php bloginfo( 'name' ); ?></h2>
					            	<?php if($polash_description): ?> <span style="font-size: 14px;color: #463f3f;"><?php echo $polash_description; ?> </span> <?php endif; ?>
								<?php endif; ?>
							</a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <div class="footer-icon mb-30">
                            <?php
                            if ( has_nav_menu( 'social' ) ) {
                                $primaryMenu = array(
                                'theme_location'    => 'social',
                                'menu_class'        => 'social-menu',
                                'container'         => false,
                                'depth'          => 0,
                                'before'        => '',
                                'after'     => '',
                                'link_before'    => '<span class="screen-reader-text">',
                                'link_after'     => '</span><i class="fa fa-chain"></i>',
                                'items_wrap' => '%3$s',
                                'before'    => '',
                                'after'    => '',
                                'echo'            => false,
                                );
                                echo strip_tags( wp_nav_menu( $primaryMenu ), '<i><a><span>' );
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-middle-area pt-80 pb-25" style="background-image:url(<?php echo esc_url(get_template_directory_uri() . '/assets/img/bg/bg-05.jpg') ; ?>)">
            <div class="container">
                <div class="row">
                <?php

                $magazil_wdgc = magazil_footer_widget_size();

                if (is_array($magazil_wdgc) && !empty($magazil_wdgc)) {
        
                    foreach ($magazil_wdgc as $key => $value) {
                        if (is_active_sidebar("footer-".($key+1))) :
                            echo '<div class="col-lg-'.$value.' col-md-6 single-footer-widget">';
                            dynamic_sidebar("footer-".($key+1));
                            echo '</div>';
                        endif;
                    }
                }

                ?>
                </div>
                <div class="footer-bottom-area pt-25 mt-45">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="copyright  text-center">
                                <?php 
                                $magazil_copyright_text = get_theme_mod( 'magazil_copyright_text' );
                                if($magazil_copyright_text):?>
                                    <?php echo wp_specialchars_decode($magazil_copyright_text); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
