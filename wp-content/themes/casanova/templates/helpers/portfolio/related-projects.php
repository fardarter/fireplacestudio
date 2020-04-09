<?php

global $post;

$parentTerms = get_the_terms( false, 'ff-portfolio-category' );
if( empty( $parentTerms ) ) {
	return;
}


$firstTerm = reset( $parentTerms );
$taxonomyId = $firstTerm->term_taxonomy_id;

$postGetter = ffContainer()->getPostLayer()->getPostGetter();

$postGetter->setNumberOfPosts(3)->filterByTaxonomy( $taxonomyId, 'ff-portfolio-category');

$posts = $postGetter->getPostsByType('portfolio');



$postMetaOptions = ffContainer()->getDataStorageFactory()->createDataStorageWPPostMetas();
$relatedProjectsArray = array();

foreach( $posts as $onePost ) {

	if( $onePost->getID() == $post->ID ) {
		continue;
	}
	$featuredImageNonresized  = wp_get_attachment_url( get_post_thumbnail_id( $onePost->getID() ) );
	if( $featuredImageNonresized == false ) {
		continue;
	}
	ob_start();
	$featuredImageResized = fImg::resize( $featuredImageNonresized, 780, 600, true);

	$data = $postMetaOptions->getOption( $onePost->getID(), 'portfolio_title_options');
	$postQuery = ffContainer()->getOptionsFactory()->createQuery( $data,'ffComponent_Theme_MetaboxPortfolio_TitleView');

	?>
		<article class="project">
			<figure class="project-thumb">
				<img src="<?php echo esc_url( $featuredImageResized ); ?>" alt="project-1">
				<figcaption class="middle">
					<div>
						<a href="<?php echo esc_url( $featuredImageNonresized ); ?>" class="icon circle medium lightbox" title=""><i class="fa fa-search"></i></a>
						<a href="<?php echo get_the_permalink( $onePost->getID() ); ?>" class="icon circle medium"><i class="fa fa-link"></i></a>
					</div>
				</figcaption>
			</figure>

			<header class="project-header">
				<h4 class="project-title"><a href="<?php echo get_the_permalink( $onePost->getID() ); ?>"><?php
					if( $postQuery->get('general page-title is-custom-title') ){
						echo ff_wp_kses( $postQuery->get('general page-title title') );
					}else{
						echo get_the_title( $onePost->getID() );
					}
				?></a></h4>
				<div class="project-meta"><?php echo ff_wp_kses( $postQuery->get('general page-title description') ); ?></div>
			</header>
		</article>

<?php
	$oneProject = ob_get_contents();
	ob_end_clean();
	$relatedProjectsArray[] = $oneProject;
}

$numberOfRelatedPosts = count( $relatedProjectsArray );

if( $numberOfRelatedPosts == 0 ) {
	return;
}
?>
<div id="related-projects">
	<header class="content-header v3">
		<h4><?php echo ffThemeOptions::getQuery('translation portfolio similar-projects'); ?></h4>
	</header>
	<div class="projects row">
		<?php

			$colClass = ff_34_grid_translator( 3 );

			echo '<div class="'.$colClass.'">';
				echo implode( '</div><div class="'.$colClass.'">', $relatedProjectsArray );
			echo '</div>';
		?>

	</div>
</div>

