<?php
if( ! post_password_required() ) {
	if ( comments_open() or ( get_comments_number() > 0 ) ) {
		require locate_template('templates/onePage/blocks/comments-list.php');

		$prev = get_previous_comments_link();
		$next = get_next_comments_link();

		if( !empty( $prev ) and !empty( $next ) ){
			echo '<span class="pull-left">';
			previous_comments_link();
			echo '</span>';

			echo '<span class="pull-right">';
			next_comments_link();
			echo '</span>';

			echo '<div class="clearfix"></div>';
			echo '<div class="separator"></div>';
		}

		require locate_template('templates/onePage/blocks/comments-form.php');
	}
}
?>