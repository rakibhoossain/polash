<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Polash
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php // body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<!-- <a class="skip-link screen-reader-text" href="#content"><?php //esc_html_e( 'Skip to content', 'polash' ); ?></a> -->
        <!-- header-start -->
        <header>
            <div class="header-top-area black-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-8 col-md-5 col-8 d-flex align-items-center">
                            <div class="header-top-wrapper">
                                <div class="header-info">
                                    <span><i class="far fa-envelope-open"></i> <a href="mailto:<?php echo get_theme_mod( 'magazil_email', 'serakib@gmail.com' ); ?>" class="__cf_email__"><?php echo get_theme_mod( 'magazil_email', 'serakib@gmail.com' ); ?></a></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-4 col-md-7 col-4">
                            <div class="header-top-right">
                                <div class="header-login f-right">
                                	<?php if(is_user_logged_in()): ?>
                                    <a href="<?php echo wp_logout_url( home_url() ); ?>"><i class="far fa-user"></i> Logout</a>
                                    <?php else: ?>
                                    <a href="<?php echo wp_login_url(); ?>"><i class="far fa-user"></i> Login</a>
                                    <?php endif; ?>
                                </div>
                                <div class="header-icon nav f-right d-none d-md-block">
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
            </div>
            <div id="sticky-header" class="main-menu-area green-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-2 d-flex align-items-center">
                            <div class="logo">
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
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu text-center">
                            	<nav id="mobile-menu">
                                <?php
									wp_nav_menu(
										array(
											'theme_location'    => 'primary',
											'menu_id'        => '',
											'menu_class'        => '',
											'depth'          => 2,
											'container'         => false,
										)
									);
									?>					
								</nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="header-right">
                                <div class="header-right-info f-right d-none d-lg-block">
                                    <div class="header-right-text text-right f-left">
                                        <h5>যোগাযোগ</h5>
                                        <span><a href="tel:<?php echo get_theme_mod( 'magazil_phone', '+8801776217594' ); ?>"><?php echo get_theme_mod( 'magazil_phone', '+8801776217594' ); ?></a></span>
                                    </div>
                                    <div class="heder-right-icon f-right">
                                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icon/icon.png') ; ?>" alt="<?php bloginfo( 'name' ); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                </div>
                <?php get_template_part( 'inc/components/breaking-news' ); // Get Breaking News template ?>
            </div>
        </header>
        
	   <div id="content" class="site-content">
		<main>
