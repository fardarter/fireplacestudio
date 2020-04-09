<?php

$wrapWithSection = $query->get('wrap-with-section');

if( $wrapWithSection ) {
?>
	<section <?php
		ff_load_section_printer(
			'/templates/onePage/blocks/section-settings.php'
			, $query->get('section-settings')
			, array('section'=>'page')
		);
		?>>
		<?php
		ff_load_section_printer(
			'/templates/onePage/blocks/section-background.php'
			, $query->get('section-background')
		);
		?>
		<div class="container">
			<div class="row">
				<div class="col-1"><?php
}

// Special section, that enable user to insert any HTML
echo  $query->get('html');

if( $wrapWithSection ) {
				?></div>
				</div>
			</div>
		</section>
	<?php
}
