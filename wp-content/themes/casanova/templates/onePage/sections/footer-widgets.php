<?php

$numberOfSidebars = 4;

$show_it = false;

for( $i = 1; $i <= $numberOfSidebars; $i++ ) {
	if ( is_active_sidebar( 'sidebar-footer-'.$i ) ){
		$show_it = true;
	}
}

if( ! $show_it ){
	return;
}

?>

<section <?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-settings.php'
		, $query->get('section-settings')
		, array('section'=>'footer-widgets')
	);
	?>>	<div class="container">
		<div class="section-content row">
			<?php
				$colClass = ff_34_grid_translator(4);

				for( $i = 1; $i <= $numberOfSidebars; $i++ ) {
					if ( is_active_sidebar( 'sidebar-footer-'.$i ) ){
						echo '<div class="'.esc_attr( $colClass ).'">';
							dynamic_sidebar( 'sidebar-footer-'.$i );
						echo '</div>';
					}
				}
			?>
		</div>
	</div>
</section>