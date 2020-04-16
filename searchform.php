<form class="search-form" id="searchform" method="get" action="<?php echo home_url('/'); ?>">
	<input type="text" class="search-field" name="s" placeholder="Search Keywords" value="<?php the_search_query(); ?>">
    <button type="submit"><i class="fas fa-search"></i></button>
</form>