<section <?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-settings.php'
		, $query->get('section-settings')
		, array('section'=>'content-404')
	);
	?>>
	<?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-background.php'
		, $query->get('section-background')
	);
	?>
	<div class="container">
		<div class="section-content text-center">

			<?php if( $query->get('show-icon') ){ ?>
				<div class="icon circle <?php echo esc_attr( $query->get('icon-color') ); ?> big"><i class="<?php echo esc_attr( $query->getIcon('icon') ); ?>"></i></div>
			<?php } ?>

			<?php if( $query->get('show-title') ){ ?>
				<h1>
					<?php echo ff_wp_kses( $query->get('title') ); ?>
				</h1>
			<?php } ?>

			<?php if( $query->get('show-description') ){ ?>
				<h4>
					<?php echo ff_wp_kses( $query->get('description') ); ?>
				</h4>
			<?php } ?>

		</div>
	</div>
</section>






