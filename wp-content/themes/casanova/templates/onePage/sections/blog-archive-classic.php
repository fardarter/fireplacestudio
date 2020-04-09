<?php

if( !is_home() && !is_archive() && !is_search() ){
	have_posts();

	$args = 'post_type=post';

	global $wp_query;

	$backuped_main_query = clone $wp_query;

	$wp_query = new WP_Query( $args );

	have_posts();
}

global $post;
$generalQuery = $query->get('general');

$numberOfColumns = $generalQuery->get('number-of-columns');
$postColClass = ff_34_grid_translator( $numberOfColumns );

$mainContentClass = 'col-9';

if( $generalQuery->get('sidebar-position') == 'fullwidth' ) {
	$mainContentClass = 'col-1';
}

$postQuery = $query->get('post');

global $content_width;
$tmp_content_width = absint( $content_width );
$content_width = absint( $postQuery->get('post-header post-classic-meta featured-image width') );

$readMoreQuery = $postQuery->get('read-more');
?>
<main id="main">
	<section <?php
		ff_load_section_printer(
			'/templates/onePage/blocks/section-settings.php'
			, $query->get('section-settings')
			, array('section'=>'blog-archive-classic')
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
					<?php
					$postsPerPage = $generalQuery->get('posts-per-page');
					$postCounter = 0;

					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post();
							global $post;
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class("entry"); ?>>
							<?php
								ff_load_section_printer(
									'/templates/onePage/blocks/post-classic-meta.php'
									, $postQuery->get('post-header')
								);
							?>
							<?php
								ff_load_section_printer(
									'/templates/onePage/blocks/post-classic-featured.php'
									, $postQuery->get('post-header')
								);
							?>
							<section class="entry-summary post-content">
								<?php the_content(''); ?>

								<?php if( ff_has_read_more() && $readMoreQuery->get('show') ) { ?>
								<p class="entry-more-link">
									<a href="<?php
										echo get_the_permalink();
									?>" class="more-link button <?php
										echo $readMoreQuery->printText('color');
									?>" rel="bookmark"><?php $readMoreQuery->printText('text'); ?></a>
								</p>
								<?php } ?>
							</section>
						</article>
						<?php
							$postCounter++;
							if( $postsPerPage > 0 && $postCounter == $postsPerPage ) {

								break;
							}
						}
						if( $generalQuery->get('show-pagination') ) {
							if( is_home() || !is_archive() ){
								ff_load_section_printer(
									'/templates/onePage/blocks/pagination.php'
									, $query
								);
							}
						}
					}else{
						// false == have_post()
						ff_load_section_printer(
							'/templates/onePage/blocks/nothing-found.php'
							, $query->get('nothing-found')
						);
					}
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
<?php
$content_width = absint( $tmp_content_width );

if( !is_home() && !is_archive() ){
	$wp_query = $backuped_main_query;

	have_posts();
}