<?php
	$rightQuery = $query->get('right-description');
	$contactFormColClass = 'col-12';

	if( !$rightQuery->get('show') ) {
		$contactFormColClass = 'col-1';
	}


?>

<section <?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-settings.php'
		, $query->get('section-settings')
		, array('section'=>'map')
	);
	?>
	data-overlay="<?php
	if( 'light' == $query->get('section-settings color-type') ) {
		echo '#FFFFFF';
	}else{
		echo '#000000';
	}
	?>"
	data-overlay-opacity="0.82">

	<?php if( $query->get('map show') ) { ?>

	<div class="map" data-lat="<?php echo esc_attr( $query->get('map lat') );
		?>" data-lon="<?php echo esc_attr( $query->get('map long') );
		?>" data-zoom="<?php echo esc_attr( $query->get('map zoom') );
		?>" data-type="ROADMAP"></div>

	<a href="#" class="map-switcher show-map button primary"><?php ff_wp_kses( $query->printText('map trans-show-map') );?></a>
	<a href="#" class="map-switcher hide-map button primary"><?php ff_wp_kses( $query->printText('map trans-hide-map') );?></a>

	<?php } ?>

	<div class="container">

		<div class="section-content row">
			<div class="<?php echo esc_attr( $contactFormColClass ); ?>">
				<?php
					ff_load_section_printer(
						'/templates/onePage/blocks/small-heading.php'
						, $query->get('small-heading')
					);
				?>
				<form method="post">
					<?php $transQuery = $query->get('form-trans'); ?>
					<div class="row">
						<p class="col-24">
							<label for="name"><?php $transQuery->printText('field-name title'); ?> <span class="required">*</span></label><br>
							<input class="ff-input-name" id="name" <?php if( $transQuery->get('field-name placeholder') != '') echo 'placeholder="'.esc_attr( $transQuery->get('field-name placeholder') ).'"'; ?> type="text" size="100" name="name">
						</p>
						<p class="col-24">
							<label for="email"><?php $transQuery->printText('field-email title'); ?> <span class="required">*</span></label><br>
							<input class="ff-input-email" id="email" <?php if( $transQuery->get('field-email placeholder') != '') echo 'placeholder="'.esc_attr( $transQuery->get('field-email placeholder') ).'"'; ?>  type="email" size="100" name="email">
						</p>
						<p class="col-24">
							<label for="url"><?php $transQuery->printText('field-website title'); ?></label><br>
							<input id="url" <?php if( $transQuery->get('field-website placeholder') != '') echo 'placeholder="'.esc_attr( $transQuery->get('field-website placeholder') ).'"'; ?>  type="url" size="150" name="url">
						</p>
						<p class="col-1">
							<label for="subject"><?php $transQuery->printText('field-subject title'); ?></label><br>
							<input id="subject" <?php if( $transQuery->get('field-subject placeholder') != '') echo 'placeholder="'.esc_attr( $transQuery->get('field-subject placeholder') ).'"'; ?>  type="text" size="150" name="subject">
						</p>
						<p class="col-1">
							<label for="msg"><?php $transQuery->printText('field-message title'); ?> <span class="required">*</span></label><br>

							<textarea class="ff-input-message" id="msg" <?php if( $transQuery->get('field-message placeholder') != '') echo 'placeholder="'.esc_attr( $transQuery->get('field-message placeholder') ).'"'; ?>  cols="100" rows="<?php echo esc_attr( $transQuery->get('field-message rows') ); ?>" name="message"></textarea>

						</p>
						<p class="col-1" style="margin-bottom: 0">
							<input class="button primary" type="submit" name="submit" value="<?php $transQuery->printText('field-submit title'); ?>">
						</p>
					</div>
                    <?php
                        $data = array();
                        $data['email'] = $query->get('msg email');
                        $data['subject'] = $query->get('msg subject');


                        $data = json_encode( $data );

                        echo '<div class="ff-contact-info" style="display:none;">'.ffContainer()->getCiphers()->freshfaceCipher_encode( $data ).'</div>';

                        echo '<br>';
                        echo '<div style="display:none;" class="ff-contact-info-message-good notification success"><p>'.( $query->get('msg good') ).'</p></div>';
                        echo '<div style="display:none;" class="ff-contact-info-message-bad notification danger"><p>'.( $query->get('msg bad') ).'</p></div>';

                    ?>
				</form>


			</div>
			<?php
				if( $rightQuery->get('show') ) {
					?>
					<div class="col-24">
						<?php


						foreach ($rightQuery->get('boxes') as $oneBox) {
							echo '<h4>' . ff_wp_kses( $oneBox->get('title') ) . '</h4>';

							echo '<address>';
							$linesArray = array();
							foreach ($oneBox->get('lines') as $oneLine) {
								$linesArray[] = '<span>' . ff_wp_kses( $oneLine->get('text') ) . '<span>';
							}
							$linesString = implode('<br>', $linesArray);
							echo ff_wp_kses( $linesString );
							echo '</address>';
						}

						if( $query->get('show-social-links') ){
							ff_load_section_printer(
								'/templates/onePage/blocks/social.php'
								, $query->get('social-links')
							);
						}

						?>

					</div>
				<?php
				}
			?>

		</div>

	</div>

</section>