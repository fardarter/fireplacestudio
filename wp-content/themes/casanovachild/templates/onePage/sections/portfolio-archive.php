<section <?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-settings.php'
		, $query->get('section-settings')
		, array('section'=>'portfolio-archive')
	);
	?>>
	<?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-background.php'
		, $query->get('section-background')
	);
	?>
	<div class="container">
		<div class="section-content row">
			<?php
				ff_load_section_printer(
					'/templates/onePage/blocks/small-heading.php'
					, $query->get('small-heading')
				);
			?>

			<div id="primary" class="col-1">
				<?php if( $query->get('show-tags') ){ ?>
					<nav class="project-filter nav horizontal">
						<ul>
							<li class="active"><a href="#" data-filter="*"><?php echo esc_attr( $query->get('tags-all') ); ?></a></li>
							<?php
								$portfolioTagsArray = array();
								$portfolioTagsString = '';
								$postCounter = 0;
								$postsPerPage = $query->get('posts-per-page');

								if ( have_posts() ) {
									while ( have_posts() ) {
										the_post();
										global $post;
										$t = wp_get_post_terms( $post->ID, 'ff-portfolio-tag' );
										if( !empty($t) ) foreach ($t as $onePortfolioTag) {

											if( !isset($portfolioTagsArray[ $onePortfolioTag->slug ]) ) {
												$portfolioTagsString .= '<li><a href="#" class="filter" data-filter=".tag-'.esc_attr($onePortfolioTag->term_id).'">'.( $onePortfolioTag->name ).'</a></li>';
											}

											$portfolioTagsArray[ $onePortfolioTag->slug ] = $onePortfolioTag;
										}
										$postCounter++;

										if( ($postsPerPage > 0) && ( $postCounter >= $postsPerPage ) ) {
											break;
										}
									}
								}

								// Escaped HTML with tags
								echo  $portfolioTagsString;

							?>
						</ul>
					</nav>
				<?php } ?>
				<div class="projects row">
					<?php
						$fwc = ffContainer::getInstance();

						rewind_posts();

						$postsPerPage = $query->get('posts-per-page');
						$postMetaOptions = $fwc->getDataStorageFactory()->createDataStorageWPPostMetas();
						$postCounter = 0;
						if ( have_posts() ) {
							while ( have_posts() ) {
								the_post();
								global $post;
								$currentPostId = $post->ID;

								$data = $postMetaOptions->getOption( $currentPostId, 'portfolio_category_options');
								$postQuery = $fwc->getOptionsFactory()->createQuery( $data,'ffComponent_Theme_MetaboxPortfolio_CategoryView');

								$titleData = $postMetaOptions->getOption( $currentPostId, 'portfolio_title_options');
								$postTitleQuery = $fwc->getOptionsFactory()->createQuery( $titleData,'ffComponent_Theme_MetaboxPortfolio_TitleView');

								if( $postQuery->get('general image use-different-image') ) {
									$imageUrlNonresized =$postQuery->getImage('general image image')->url;

								} else {
									$imageUrlNonresized = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
								}

								$imageUrlResized = fImg::resize( $imageUrlNonresized, 510,392, true);


								$tags = array();
								$t = wp_get_post_terms( $currentPostId, 'ff-portfolio-tag' );
								if( !empty($t) ) foreach ($t as $onePortfolioTag) {
									$tags[] = 'tag-'.esc_attr( $onePortfolioTag->term_id );
								}
								$tags = implode(' ', $tags);

								$linkQuery = $postQuery->get('general link');

								if( $linkQuery->get('use-different-link') ) {
									$postLink = $linkQuery->get('url');
								} else {
									$postLink = get_the_permalink();
								}

								// 18 24 27
								$numberOfColumns = $query->get('number-of-columns');
								$colClass = '';
								if( $numberOfColumns == 2 ) {
									$colClass = 'col-18';
								} else if( $numberOfColumns == 3 ) {
									$colClass = 'col-24';
								} else if( $numberOfColumns == 4 ) {
									$colClass = 'col-27';
								}
							?>
								<div class="<?php echo esc_attr( $colClass); ?> <?php echo esc_attr( $tags ); ?>">
									<article class="project">
										<figure class="project-thumb">
											<img src="<?php echo esc_attr( $imageUrlResized ); ?>" alt="project-1">
											
											<!-- Modified to disable overlay-->
											<!-- <figcaption class="middle">
												<div>
													<a href="<?php echo esc_url( $imageUrlNonresized ); ?>" class="icon circle medium lightbox" title="<?php echo get_the_title(); ?>"><i class="fa fa-search"></i></a>
													<a href="<?php echo esc_url( $postLink ); ?>" class="icon circle medium"><i class="fa fa-link"></i></a>
												</div>
											</figcaption> -->
										</figure>

										<header class="project-header">
											<h4 class="project-title"><a href="<?php echo esc_url( $postLink ); ?>"><?php
												if( $postTitleQuery->get('general page-title is-custom-title') ){
													echo ff_wp_kses( $postTitleQuery->get('general page-title title') );
												}else{
													the_title();
												}
											?></a></h4>
											<div class="project-meta"><?php
												echo ff_wp_kses( $postTitleQuery->get('general page-title description') );
											?></div>
										</header>
									</article>
								</div>

							<?php

								$postCounter++;

								if( $postsPerPage > 0 && $postCounter >= $postsPerPage ) {
									break;
								}
							}
						}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
