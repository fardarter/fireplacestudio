<section <?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-settings.php'
		, $query->get('section-settings')
		, array('section'=>'clients-1')
	);
	?>>
	<?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-background.php'
		, $query->get('section-background')
	);
	?>
	<div class="container">
		<div class="section-content">
			<?php
			ff_load_section_printer(
				'/templates/onePage/blocks/small-heading.php'
				, $query->get('small-heading')
			);
			?>
			<div class="clients row">
				<?php
				$clients = $query->get('clients');
				$numberOfElements = $clients->getNumberOfElements();

				$colClass = ff_34_grid_translator( $numberOfElements );

				$imageDimensions = $query->get('image-dimensions');
				?>
				<?php foreach( $clients as $id => $oneClient ) { ?>
					<?php
						$imageUrlNonResized = $oneClient->getImage('image')->url;
						$imageUrl = '';

						if( $imageDimensions->get('resize-images') ) {
							$width = $imageDimensions->get('width');
							$height = $imageDimensions->get('height');
							$imageUrl = fImg::resize( $imageUrlNonResized, $width, $height, true );
						} else {
							$imageUrl = $imageUrlNonResized;
						}

					?>
					<div class="<?php echo esc_attr( $colClass ); ?>">
						<div class="client">
							<a href="<?php echo esc_url( $oneClient->get('link') ); ?>" class="tooltip" title="<?php echo esc_attr( $oneClient->get('tooltip') ); ?>">
								<img src="<?php echo esc_url( $imageUrl ); ?>" alt="client-1">
							</a>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>

