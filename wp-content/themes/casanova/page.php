<?php
/**
 * Template Name: Light Fullwidth
 */

get_header(); ?>
<section id="main-content" class="section light">
	<div class="container">
		<div class="section-content row">
			<div id="primary" class="col-1">
				<?php
					the_post();
					echo '<div class="post-content">';
					the_content();
					echo '</div>';
					wp_link_pages();

					ffTemporaryQueryHolder::setQuery( 'comments-list', ffThemeOptions::getQuery('translation comments-list') );
					ffTemporaryQueryHolder::setQuery( 'comments-form', ffThemeOptions::getQuery('translation') );
					comments_template();
					ffTemporaryQueryHolder::deleteQuery('comments-list');
					ffTemporaryQueryHolder::deleteQuery('comments-form');
				?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>