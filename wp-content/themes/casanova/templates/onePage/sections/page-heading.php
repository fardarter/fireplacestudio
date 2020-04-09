<section <?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-settings.php'
		, $query->get('section-settings')
		, array('section'=>'page-heading', 'class' => 'page-title')
	);
	?>>
	<?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-background.php'
		, $query->get('section-background')
	);
	?>
<!-- <section class="page-title section light"> -->
	<div class="container">
		<div class="row">
			<div class="col-9">
				<?php if( $query->get('page-title show-title') or $query->get('page-title show-description') ) { ?>
					<header class="section-header content-header">
						<?php if( $query->get('page-title show-title') ) { ?>
							<h1>
								<?php
									if( $query->get('page-title is-custom-title') ) {
										$query->printText('page-title title');
									}else {
										if( ! empty( $params['force__the_title'] ) ){
											the_title();
										}else if( $query->get('translation') ){
											ff_load_section_printer(
												'/templates/onePage/blocks/page-title.php'
												, $query->get('translation')
											);
										}else{
											the_title();
										}
									}
								?>
							</h1>
						<?php } ?>
						<?php if( $query->get('page-title show-description') ) { ?>
							<p class="<?php echo esc_attr( $query->get('page-title description-style') ); ?>">
								<?php
									$description = $query->get('page-title description');
									if( is_tag() or is_category() or is_tax() ){
										if( $query->get('page-title replace-with-category-description') ){
											$tmp = term_description();
											$tmp = str_ireplace(array('<p>', '</p>'), array('',''), $tmp);
											$tmp = trim($tmp);
											if( !empty($tmp) ){
												$description = $tmp;
											}
										}
									}
									echo ff_wp_kses( $description );
								?>
							</p>
						<?php } ?>
					</header>
				<?php } ?>

				<?php
					if( $query->get('breadcrumbs show') ) {

						$breadcrumbsCollection = ffContainer()->getLibManager()->createBreadcrumbs()->generateBreadcrumbs();

						echo '<nav class="breadcrumbs">';
						echo '<span class="label">'.ff_wp_kses( $query->get('breadcrumbs before') ).' </span>';
							$breadcrumbsArray = array();
							$connector = ' <span class="sep">/</span> ';
							foreach( $breadcrumbsCollection as $oneItem ) {
								$nextItem = '';

								if( $oneItem->queryType == ffConstQuery::HOME ) {
									$oneItem->name = $query->get('breadcrumbs homepage');
								}


								if( $oneItem->isSelected ) {
									$nextItem .= '<span class="current">';
										$nextItem .= $oneItem->name;
									$nextItem .= '</span>';
								} else {
									$nextItem .= '<a href="'.$oneItem->url.'">';
										$nextItem .= $oneItem->name;
									$nextItem .= '</a>';
								}


								$breadcrumbsArray[] = $nextItem;
							}

							echo implode( $connector, $breadcrumbsArray );

						echo '</nav>';

					}
				?>

			</div>

			<div class="col-27">
			</div>
		</div>
	</div>
</section>