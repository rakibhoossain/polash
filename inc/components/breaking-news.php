<?php 
	$show_breaking_news			= get_theme_mod( 'magazil_show_breaking_news', true );
if ($show_breaking_news) {	


	$query 				= get_theme_mod( 'magazil_breaking_news_type', 'post' );
	$page 				= get_theme_mod( 'magazil_breaking_news_page', 0 );
	$cat 				= get_theme_mod( 'magazil_breaking_news_category', 0 );
	$tags 				= get_theme_mod( 'magazil_breaking_news_tags', '' );
	$breaking_custom 	= get_theme_mod( 'magazil_breaking_news_custom');

	$number 			= get_theme_mod( 'magazil_breaking_news_limit', 5 );

	$effect 			= get_theme_mod( 'magazil_breaking_news_effect', 'ticker' );
	$speed 				= get_theme_mod( 'magazil_breaking_news_speed', 750 );
	$timeout 			= get_theme_mod( 'magazil_breaking_news_timeout', 3500 );

?>


	
	<div class="clear"></div>
	<div id="breaking-news" class="breaking-news container">
		<span class="breaking-news-title"><i class="fa fa-bolt"></i> <span><?php _e( 'Breaking News' , 'magazil') ; ?></span></span>

		<?php
		if( $query != 'custom' ):
			if( $query == 'page' ){
				$args = array('post_type' => 'page', 'post__in' => $page, 'no_found_rows' => 1 );
			}else if( $query == 'tag' ){
				$args = array('tag__in' => $tags, 'posts_per_page'=> $number, 'no_found_rows' => 1 );
			}else if($query == 'category'){
				$args = array('category__in' => $cat, 'posts_per_page'=> $number, 'no_found_rows' => 1 );
			}else{
				$args = array('post_type' => 'post', 'posts_per_page'=> $number, 'no_found_rows' => 1 );
			}

			$breaking_query = new wp_query( $args  );
			
			if( $breaking_query->have_posts() ) : ?>
			<ul>
		<?php
		while( $breaking_query->have_posts() ) :
			$breaking_query->the_post();
		?>
			<li><a href="<?php the_permalink()?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
		<?php
			endwhile;
			wp_reset_postdata();
			wp_reset_query();
		?>
			</ul>
			<?php endif; ?>
		
		<?php else: ?>
			<?php if( !empty($breaking_custom) ){ ?>
				<?php echo wp_specialchars_decode($breaking_custom);  ?>
			<?php }	?>
		<?php endif; ?>

		<?php
			// Register the script
			wp_register_script( 'polash_breaking', get_template_directory_uri() . '/assets/dist/js/breaking-news.js' );
			 
			// Localize the script with new data
			$data_array = array(
			    'animationType' => $effect,
			    'speed' => $speed,
			    'timeout' => $timeout,
			);
			wp_localize_script( 'polash_breaking', 'polash_brk', $data_array );
			 
			// Enqueued script with localized data.
			wp_enqueue_script( 'polash_breaking' );
		?>
	</div> <!-- .breaking-news -->

<?php } ?>