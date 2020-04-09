<section <?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-settings.php'
		, $query->get('section-settings')
		, array('section'=>'teaser')
	);
	?>>
	<?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-background.php'
		, $query->get('section-background')
	);
	?>
	<div class="container">
		<div class="section-content" style="padding-bottom: 0">
			<div class="row">

				<?php if( 'left' == $query->get('image-position') ) { ?>
					<div class="col-16">
						<img src="<?php echo esc_url( $query->getImage('image')->url ); ?>" alt="">
					</div>
				<?php } ?>

				<div class="col-<?php
					if( '' == $query->get('image-position') ) {
						echo '36';
					}else{
						echo '20';
					}
				?>">
					<div class="clearfix" style="height: 10px;"></div>
					<?php
						ff_load_section_printer(
							'/templates/onePage/blocks/small-heading.php'
							, $query->get('small-heading')
						);
					?>

					<?php if( $query->get('show-features') ) { ?>

						<div class="row">
							<?php
								$features_cols = $query->get('features-cols');
								$numberOfFC = $features_cols->getNumberOfElements();
								$colClass = ff_34_grid_translator( $numberOfFC );

								foreach( $features_cols as $features_oneCol ) {
							?>
								<div class="<?php echo esc_attr( $colClass ); ?>">
									<ul class="unstyled">

										<?php
											$features = $features_oneCol->get('features-rows');
											foreach( $features as $oneFeature ) {
										?>

											<li>
												<i class="<?php echo esc_attr( $oneFeature->getIcon('icon') ); ?>"></i>
												<?php echo ff_wp_kses( $oneFeature->getIcon('title') );?>
											</li>

										<?php } ?>
									</ul>
								</div>
							<?php } ?>
						</div>

					<?php } ?>

					<?php if( $query->get('show-notes') ) { ?>

						<?php
							$notes = $query->get('notes');
							foreach( $notes as $oneNote ) {
						?>

							<p><?php echo ff_wp_kses( $oneNote->get('title') ); ?></p>

						<?php } ?>

					<?php } ?>

					<?php
						ff_load_section_printer(
							'/templates/onePage/blocks/buttons.php'
							, $query->get('buttons-more')
						);
					?>
				</div>

				<?php if( 'right' == $query->get('image-position') ) { ?>
					<div class="col-16">
						<img src="<?php echo esc_url( $query->getImage('image')->url ); ?>" alt="display">
					</div>
				<?php } ?>

			</div>
		</div>
	</div>
</section>

