<?php

if( !is_home() && !is_archive() && !is_search() ){
	have_posts();

	$args = 'post_type=post';

	global $wp_query;

	$backuped_main_query = clone $wp_query;

	$wp_query = new WP_Query( $args );

	have_posts();
}


$generalQuery = $query->get('general');

$numberOfColumns = $generalQuery->get('number-of-columns');
$postColClass = ff_34_grid_translator( $numberOfColumns );

$mainContentClass = 'col-9';

if( $generalQuery->get('sidebar-position') == 'fullwidth' ) {
	$mainContentClass = 'col-1';
}

$postQuery = $query->get('post');
$featuredImageQuery = $postQuery->get('featured-image');
$dateQuery = $postQuery->get('date');

?>

<main id="main">
	<section <?php
		ff_load_section_printer(
			'/templates/onePage/blocks/section-settings.php'
			, $query->get('section-settings')
			, array('section'=>'blog-archive-grid')
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
				<div id="primary" class="<?php echo esc_attr( $mainContentClass ); ?>">
					<div class="masonry-entries row">
					<?php
						$postsPerPage = $generalQuery->get('posts-per-page');
						$postCounter = 0;
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post();
							global $post;

							$postMetaGetter = ffContainer()->getThemeFrameworkFactory()->getPostMetaGetter();
					?>
							<div class="<?php echo esc_attr( $postColClass ); ?>">
								<article id="post-<?php the_ID(); ?>" <?php post_class("entry"); ?>>
									<?php
										$featuredImageNonResized = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
										if( $featuredImageQuery->get('show') && $featuredImageNonResized != null ) {



											$width = $featuredImageQuery->get('width');
											$height = $featuredImageQuery->get('height');

											$featuredImageSrc = '';

											if( absint( $width ) <= 0 ) {
												$width = null;
											}

											if( absint( $height ) <= 0 ) {
												$height = null;
											}

											$crop = false;

											if( $width != null || $height != null ) {
												$crop = true;
											}

											$featuredImageSrc = fImg::resize( $featuredImageNonResized, $width, $height, $crop );


									?>
											<section class="entry-featured">
												<figure>
													<a href="<?php echo get_permalink();?>"><img src="<?php echo esc_url( $featuredImageSrc ); ?>"
																	 alt=""></a>
												</figure>
											</section>
									<?php
										}
									?>
									<header class="entry-header">
										<?php if( $dateQuery->get('show') ) { ?>
										<div class="entry-date"><?php echo get_the_date( $dateQuery->get('format') ); ?></div>
										<?php } ?>
										<h2 class="entry-title">
											<a href="<?php echo get_the_permalink(); ?>">
												<?php the_title(); ?>
											</a>
										</h2>
									</header>

									<div class="entry-summary post-content content">
										<?php the_content(); ?>
									</div>
									<?php if( $postQuery->get('footer show') ) { ?>
									<footer class="entry-footer entry-meta">
										<span class="entry-author left">
											<i class="fa fa-user"></i>
											<a href="<?php echo esc_attr( $postMetaGetter->getPostAuthorUrl() );?>">
												<?php echo ff_wp_kses( $postMetaGetter->getPostAuthorName() ); ?>
											</a>
										</span>
										<span class="entry-comments right"><i class="fa fa-comment-o"></i><a
												href="<?php echo esc_url( $postMetaGetter->getPostCommentsLink() ); ?>"><?php echo ff_wp_kses( $postMetaGetter->getPostCommentsNumber() ); ?></a></span>
									</footer>
									<?php } ?>
								</article>
							</div>
					<?php
							$postCounter++;
							if( $postsPerPage > 0 && $postCounter == $postsPerPage ) {

								break;
							}
						}
					}
					?>
					</div>
					<?php
						if( $generalQuery->get('show-pagination') ) {
							if( is_home() || !is_archive() ){
								ff_load_section_printer(
									'/templates/onePage/blocks/pagination.php'
									, $query
								);
							}
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

if( is_page() ){
	$wp_query = $backuped_main_query;

	have_posts();
}