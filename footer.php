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
        <div class="footer-middle-area pt-2 pb-2" style="background-image:url(<?php echo esc_url(get_template_directory_uri() . '/assets/img/bg/bg-05.jpg') ; ?>)">
            <div class="container">
                <div class="footer-bottom">
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
