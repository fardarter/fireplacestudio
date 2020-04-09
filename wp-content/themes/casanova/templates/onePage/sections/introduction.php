<?php

// preparing image

$imageHTML = '';
$textGridWidth = 1;
$imagePosition = $query->get('image position');

if( $imagePosition ){

	// position left or right

	if( $query->getImage('image image')->url ){

		// there is something in image

		$imageURL = $query->getImage('image image')->url;

		if( $query->get('image resize') ){
			$height = absint( $query->get('image height') );
			$width = absint( $query->get('image width') );
			if( !empty( $height ) and !empty( $width ) ){

				// there is 2 integer variables

				$imageURL = fImg::resize( $imageURL, $width, $height, true /* CROP */ );

				if( empty( $imageURL) ){

					// Something wrong

					$imageURL = $query->getImage('image image')->url;
				}
			}
		}

		// A bit unusual grid system

		$textGridWidth = $query->get('image grid-size');
		$imageGridWidth = 36 - $textGridWidth;

		$imageHTML = '<div class="col-'.esc_attr( $imageGridWidth ).'"><p><img src="'.esc_url( $imageURL ).'" alt=""></p></div>';

	}
}

?>
<section <?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-settings.php'
		, $query->get('section-settings')
		, array('section'=>'introduction')
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
			<div class="row">
				<?php if( 'left' == $imagePosition ) { echo ff_wp_kses( $imageHTML ); } ?>
				<div class="col-<?php echo absint($textGridWidth); ?> <?php echo esc_attr( $query->get('heading text-align') ); ?>">
					<?php if( $query->get('heading show-title') or $query->get('heading show-description') ){ ?>
						<?php if( $query->get('heading show-title') ){ ?>
							<header class="content-header v3">
								<h2><?php echo ff_wp_kses( $query->get('heading title') ); ?></h2>
							</header>
						<?php } ?>
						<?php if( $query->get('heading show-description') ){ ?>
							<p>
								<?php echo ff_wp_kses( $query->get('heading description') ); ?>
							</p>
						<?php } ?>
					<?php } ?>
					<div class="iconboxes">
						<?php foreach( $query->get('text-left-icon') as $oneTextBlock ) { ?>
							<aside class="iconbox text-left">
								<?php ff_load_section_printer(
									'/templates/onePage/blocks/text-with-icon.php'
									, $oneTextBlock
								); ?>
							</aside>
						<?php } ?>
					</div>
				</div>
				<?php if( 'right' == $imagePosition ) { echo ff_wp_kses( $imageHTML ); } ?>
			</div>
		</div>
	</div>
</section>