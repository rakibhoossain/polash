<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Polash
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function polash_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'polash_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function polash_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'polash_pingback_header' );



/**
 *  Breadcrumb
 *
 *
 */
if ( ! function_exists( 'polash_breadcrumbs' ) ) :

    /**
     * Simple breadcrumb.
     *
     * @since 1.0.0
     *
     * @link: https://gist.github.com/melissacabral/4032941
     *
     * @param  array $args Arguments
     */
    function polash_breadcrumbs( $args = array() ) {
        // Bail if Home Page.
        // if ( is_front_page() || is_home() ) {
        if ( is_front_page() ) {
            return;
        }

        if ( ! function_exists( 'breadcrumb_trail' ) ) {
            require_once trailingslashit(get_template_directory()) . '/inc/breadcrumbs.php';
        }

        $breadcrumb_args = array(
            'container'   => 'div',
            'show_browse' => false,
        );
        breadcrumb_trail( $breadcrumb_args );
       
    }

endif;





if ( ! function_exists( 'polash_before_post' ) ) :
    /**
     * Displays categories.
     */
    function polash_before_post() {
        if (has_header_image()):
    ?>
    <!-- breadcrumb-area-start -->
    <div class="breadcrumb-area pt-150 pb-155" style="background-image:url(<?php echo esc_url( get_header_image() ); ?>)">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-text text-center">
                        <h1>
                            <?php if (is_archive()) {
                                the_archive_title( '<h1>', '</h1>' );
                                the_archive_description( '<div">', '</div>' );
                            }else if(is_search()){
                                echo '<h1>';
                                printf( esc_html__( 'Search Results for: %s', 'polash' ), '<span>' . get_search_query() . '</span>' );
                                echo '</h1>';
                            }else{
                                echo '<h1>';
                                single_post_title();
                                echo '</h1>';
                            }
                            ?>
                        </h1>
                        <?php polash_breadcrumbs(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area-end -->
    <?php
    endif;
    }
endif;






/**
 * Display Fontawesome icons in social links menu.
 *
 * @param  string  $item_output The menu item output.
 * @param  WP_Post $item        Menu item object.
 * @param  int     $depth       Depth of the menu.
 * @param  array   $args        wp_nav_menu() arguments.
 * @return string  $item_output The menu item output with social icon.
 */
function magazil_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
  // Get supported social icons.
  $social_icons =  magazil_social_links_icons();

  // Change SVG icon inside social links menu if there is supported URL.
  if ( 'social' === $args->theme_location ) {
    foreach ( $social_icons as $attr => $value ) {
      if ( false !== strpos( $item_output, $attr ) ) {

        $item_output = str_replace( $args->link_after, '</span><i class="fa fa-'.esc_attr( $value ).'"></i>', $item_output );
      }
    }
  }

  return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'magazil_nav_menu_social_icons', 10, 4 );


/**
 * Returns an array of supported social links (URL and icon name).
 *
 * @return array $social_links_icons
 */
function magazil_social_links_icons() {
  // Supported social links icons.
  $social_links_icons = array(
    'behance.net'     => 'behance',
    'codepen.io'      => 'codepen',
    'deviantart.com'  => 'deviantart',
    'digg.com'        => 'digg',
    'docker.com'      => 'dockerhub',
    'dribbble.com'    => 'dribbble',
    'dropbox.com'     => 'dropbox',
    'facebook.com'    => 'facebook',
    'flickr.com'      => 'flickr',
    'foursquare.com'  => 'foursquare',
    'plus.google.com' => 'google-plus',
    'github.com'      => 'github',
    'instagram.com'   => 'instagram',
    'linkedin.com'    => 'linkedin',
    'mailto:'         => 'envelope-o',
    'medium.com'      => 'medium',
    'pinterest.com'   => 'pinterest-p',
    'pscp.tv'         => 'periscope',
    'getpocket.com'   => 'get-pocket',
    'reddit.com'      => 'reddit-alien',
    'skype.com'       => 'skype',
    'skype:'          => 'skype',
    'slideshare.net'  => 'slideshare',
    'snapchat.com'    => 'snapchat-ghost',
    'soundcloud.com'  => 'soundcloud',
    'spotify.com'     => 'spotify',
    'stumbleupon.com' => 'stumbleupon',
    'tumblr.com'      => 'tumblr',
    'twitch.tv'       => 'twitch',
    'twitter.com'     => 'twitter',
    'vimeo.com'       => 'vimeo',
    'vine.co'         => 'vine',
    'vk.com'          => 'vk',
    'wordpress.org'   => 'wordpress',
    'wordpress.com'   => 'wordpress',
    'yelp.com'        => 'yelp',
    'youtube.com'     => 'youtube',
  );

  /**
   * Filter Magazil social links icons.
   *
   * @since Magazil 1.0
   *
   * @param array $social_links_icons Array of social links icons.
   */
  return apply_filters( 'magazil_social_links_icons', $social_links_icons );
}

/**
 * Get jquery effects
 * 
 * @return array
 */
function magazil_jquery_effects() {

  $effects = array();

  $effects[ 'blind' ]       = esc_html__( 'Blind', 'magazil' ) ;
  $effects[ 'bounce' ]      = esc_html__( 'Bounce', 'magazil' ) ;
  $effects[ 'clip' ]        = esc_html__( 'Clip', 'magazil' ) ;
  $effects[ 'drop' ]        = esc_html__( 'Drop', 'magazil' ) ;
  $effects[ 'explode' ]     = esc_html__( 'Explode', 'magazil' ) ;
  $effects[ 'fade' ]        = esc_html__( 'Fade', 'magazil' ) ;
  $effects[ 'fold' ]        = esc_html__( 'Fold', 'magazil' ) ;
  $effects[ 'highlight' ]   = esc_html__( 'Highlight', 'magazil' ) ;
  $effects[ 'puff' ]        = esc_html__( 'Puff', 'magazil' ) ;
  $effects[ 'pulsate' ]     = esc_html__( 'Pulsate', 'magazil' ) ;
  $effects[ 'scale' ]       = esc_html__( 'Scale', 'magazil' ) ;
  $effects[ 'shake' ]       = esc_html__( 'Shake', 'magazil' ) ;
  $effects[ 'size' ]        = esc_html__( 'Size', 'magazil' ) ;
  $effects[ 'slide' ]       = esc_html__( 'Slide', 'magazil' ) ;
  $effects[ 'transfer' ]    = esc_html__( 'Transfer', 'magazil' ) ;
  $effects[ 'ticker' ]      = esc_html__( 'Ticker', 'magazil' ) ;

  return $effects;
}

/**
 * Get Breaking news types
 * 
 * @return array
 */
function magazil_breaking_news_type() {
  $news = array();

  $news[ 'post' ]       = esc_html__( 'Posts', 'magazil' );
  $news[ 'page' ]       = esc_html__( 'Pages', 'magazil' );
  $news[ 'category' ]   = esc_html__( 'Categories', 'magazil' );
  $news[ 'tag' ]        = esc_html__( 'Tags', 'magazil' );
  $news[ 'custom' ]        = esc_html__( 'Custom', 'magazil' );

  return $news;
}


/**
 * Get all pagess
 * 
 * @return array
 */
function magazil_page_list() {
  $pages    = array();
  foreach ( get_pages() as $page ) {
    $pages[ $page->ID ] = $page->post_title;
  }

  return $pages;
}



/**
 * Get all categories
 * 
 * @return array
 */
function magazil_cat_list() {
  $cats    = array();
  foreach ( get_categories() as $categories => $category ) {
    $cats[ $category->term_id ] = $category->name;
  }

  return $cats;
}


/**
 * Get all tags
 * 
 * @return array
 */
function magazil_tag_list() {
  $tags    = array();
  foreach ( get_tags() as $tag ) {
    $tags[ $tag->term_id ] = $tag->name;
  }

  return $tags;
}
