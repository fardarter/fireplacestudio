<?php get_header(); ?>
<?php

	the_post();

	// SINGLE WRITEPANEL

	$postMeta = ffContainer()->getDataStorageFactory()->createDataStorageWPPostMetas();
	$data = $postMeta->getOption( $post->ID, 'portfolio_single_options');
	$postQuery = ffContainer()->getOptionsFactory()->createQuery( $data,'ffComponent_Theme_MetaboxPortfolio_SingleView');

	$imageQuery = $postQuery->get('general image');
	$sidebarQuery = $postQuery->get('general sidebar');
	$relatedProjectsQuery = $postQuery->get('general related-projects');

	// TITLE WRITEPANEL

	$postTitleMeta = ffContainer()->getDataStorageFactory()->createDataStorageWPPostMetas();
	$titleData = $postTitleMeta->getOption( $post->ID, 'portfolio_title_options');
	$titleQuery = ffContainer()->getOptionsFactory()->createQuery( $titleData,'ffComponent_Theme_MetaboxPortfolio_TitleView');

	// COLUMNS

	$contentColClass = 'col-9';
	if( !$sidebarQuery->get('show') ) {
		$contentColClass = 'col-1';
	}

	// FEATURED IMAGE

	$featured_img_nonresized = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );

?>
<main id="main">

	<?php
		ff_load_section_printer(
			'/templates/onePage/sections/page-heading.php'
			, $titleQuery->get('general')
			, array( 'force__the_title' => 1 )
		);
	?>

	<section <?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-settings.php'
		, $titleQuery->get('general section-settings')
		, array('section'=>'--single-portfolio')
	);
	?>>
		<div class="container">
			<div class="section-content row">
				<div id="primary" class="col-1">
					<article class="single-project">
						<div class="row">
							<?php
								if( !empty($featured_img_nonresized) and $imageQuery->get('fullwidth') ) {
									$featuredImgResized = fImg::resize( $featured_img_nonresized, 1050);
									?>
										<div class="col-1">
											<div class="project-images fullwidth">
												<a href="<?php echo esc_url( $featured_img_nonresized ); ?>" class="lightbox"><img src="<?php echo esc_url( $featuredImgResized ); ?>" alt="project"></a>
											</div>
										</div>
									<?php
								}
							?>
							<div class="<?php echo esc_attr( $contentColClass ); ?>">
								<?php
									if( !empty($featured_img_nonresized) and !$imageQuery->get('fullwidth') ) {
										$featuredImgResized = fImg::resize( $featured_img_nonresized, 1050);
										?>
												<div class="project-images fullwidth">
													<a href="<?php echo esc_url( $featured_img_nonresized ); ?>" class="lightbox"><img src="<?php echo esc_url( $featuredImgResized ); ?>" alt="project"></a>
												</div>
										<?php
									}
								?>
								<div class="project-content">
									<div class="post-content">
									<?php the_content(); ?>
									</div>
								</div>
								<?php
									ff_load_section_printer(
										'/templates/helpers/portfolio/related-projects.php'
										, $relatedProjectsQuery
									);
								?>
							</div>
							<?php if( $sidebarQuery->get('show') ) { ?>
								<div class="col-27">
									<?php foreach( $sidebarQuery->get('items') as $oneItem ) { ?>
										<?php if( $oneItem->getVariationType() == 'about' ) { ?>
										<div class="project-summary">
											<header class="content-header v3">
												<h4><?php $oneItem->printText('title');?></h4>
											</header>
											<?php $oneItem->printText('text');?>
										</div>
										<?php } ?>
										<?php if( $oneItem->getVariationType() == 'tools' ) { ?>
										<div class="project-tools">
											<header class="content-header v3">
												<h4><?php $oneItem->printText('title');?></h4>
											</header>
											<?php foreach( $oneItem->get('skills') as $oneSkill) { ?>
											<div class="progress-bar stripped">
												<div class="label clearfix">
													<span class="left"><?php $oneSkill->printText('title');?></span>
													<span class="right"></span>
												</div>
												<div class="bar" data-width="<?php echo esc_attr( $oneSkill->get('percentage') ); ?>">
													<div></div>
												</div>
											</div>
											<?php } ?>
										</div>
										<?php } ?>
										<?php if( $oneItem->getVariationType() == 'details' ) { ?>
										<div class="project-details">
											<header class="content-header v3">
												<h4><?php $oneItem->printText('title');?></h4>
											</header>
											<ul class="unstyled">
												<?php foreach( $oneItem->get('details') as $oneDetail) { ?>
												<li>
													<i class="fa <?php echo esc_attr( $oneDetail->getIcon('icon') );?>"></i>
													<strong><?php echo ff_wp_kses( $oneDetail->get('type') ); ?></strong>:
													<?php echo ff_wp_kses( $oneDetail->get('value') ); ?>
												</li>
												<?php } ?>
											</ul>
											<?php
												ff_load_section_printer(
													'/templates/onePage/blocks/buttons.php'
													, $oneItem->get('buttons-more')
												);
											?>
										</div>
										<?php } ?>
									<?php
										}
									?>
								</div>
							<?php
								}
							?>
						</div>
					</article>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>