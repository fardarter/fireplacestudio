<section <?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-settings.php'
		, $query->get('section-settings')
		, array('section'=>'call-to-action-2')
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
			<div class="callout boxed">
				<div class="callout-text">
					<h2><?php echo ff_wp_kses( $query->get('title') );?></h2>
					<p class="lead"><?php echo ff_wp_kses( $query->get('description') );?></p>
				</div>
				<div class="callout-button">
					<?php
					ff_load_section_printer(
						'/templates/onePage/blocks/button.php'
						, $query->get('button')
					);
					?>
				</div>
			</div>
		</div>
	</div>
</section>