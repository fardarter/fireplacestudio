<section <?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-settings.php'
		, $query->get('section-settings')
		, array('section'=>'call-to-action')
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
			<div class="callout">
				<div class="callout-text">
					<h2><?php $query->printText('title'); ?></h2>
					<p class="lead"><?php $query->printText('description'); ?></p>
				</div>
				<div class="callout-button">
					<?php
						$buttons = $query->get('buttons');
						foreach( $buttons as $oneButton ) {
							ff_load_section_printer(
								'/templates/onePage/blocks/button.php'
								, $oneButton->get('button')
							);
						}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
