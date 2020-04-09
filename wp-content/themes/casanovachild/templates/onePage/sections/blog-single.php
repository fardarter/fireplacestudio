<?php
	the_post();
global $wp_query;

	$generalQuery = $query->get('general');

	$numberOfColumns = $generalQuery->get('number-of-columns');
	$postColClass = ff_34_grid_translator( $numberOfColumns );

	$mainContentClass = 'col-9';

	if( $generalQuery->get('sidebar-position') == 'fullwidth' ) {
		$mainContentClass = 'col-1';
	}

	$postQuery = $query->get('post');
	$tagsQuery = $postQuery->get('tags');

	$postMetaGetter = ffContainer()->getThemeFrameworkFactory()->getPostMetaGetter();
?>
<main id="main">
	<section <?php
		ff_load_section_printer(
			'/templates/onePage/blocks/section-settings.php'
			, $query->get('section-settings')
			, array('section'=>'blog-single')
		);
		?>>
		<div class="container">
			<div class="section-content row">
				<?php
					if( $generalQuery->get('sidebar-position') == 'left') {
						echo '<div id="secondary" class="col-27">';
						get_sidebar();
						echo '</div>';
					}
				?>
				<div id="primary" class="col-9">
					<article id="post-<?php the_ID(); ?>" <?php post_class("entry"); ?>>
						<?php
							ff_load_section_printer(
								'/templates/onePage/blocks/post-classic-meta.php'
								, $postQuery
							);
						?>
						<?php
							ff_load_section_printer(
								'/templates/onePage/blocks/post-classic-featured.php'
								, $postQuery
							);
						?>
						<section class="entry-content post-content">
							<?php the_content(); ?>
							<?php wp_link_pages(); ?>
						</section>
						<?php if( $tagsQuery->get('show') && $postMetaGetter->getPostTagsHtml() != '' ) { ?>
						<footer class="entry-footer">
							<div class="entry-meta">
								<span class="entry-tags"><?php echo ff_wp_kses( $tagsQuery->get('text') ). ' ' . ff_wp_kses( $postMetaGetter->getPostTagsHtml() ); ?></span>
							</div>
						</footer>
						<?php } ?>
					</article>
					<?php
						ffTemporaryQueryHolder::setQuery( 'comments-list', $query->get('comments-list') );
						ffTemporaryQueryHolder::setQuery( 'comments-form', $query );
						comments_template();
						ffTemporaryQueryHolder::deleteQuery('comments-list');
						ffTemporaryQueryHolder::deleteQuery('comments-form');
					?>
				</div>
				<?php
					if( $generalQuery->get('sidebar-position') == 'right') {
						echo '<div id="secondary" class="col-27">';
						get_sidebar();
						echo '</div>';
					}
				?>
			</div>
		</div>
	</section>
		</main>