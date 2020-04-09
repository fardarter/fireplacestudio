<?php
/**
 * Template Name: Dark Right Sidebar
 */

get_header(); ?>
<section id="main-content" class="section dark">
	<div class="container">
		<div class="section-content row">
			<div id="primary" class="col-9">
				<article id="post-<?php the_ID(); ?>" <?php post_class("page-entry"); ?>>
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
				</article>
			</div>
			<div id="secondary" class="col-27">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>