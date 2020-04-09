<form role="search" method="get" id="searchform" class="searchform form form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input
		name="s"
		id="s"
		type="text"
		size="100"
		placeholder="<?php echo ffThemeOptions::getQuery('translation Search_widget_input_text'); ?>"
		value="<?php echo get_search_query(); ?>"
	/>
</form>
