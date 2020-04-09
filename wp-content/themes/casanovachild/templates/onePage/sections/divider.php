<section <?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-settings.php'
		, $query->get('section-settings')
		, array('section'=>'divider')
	);
	?>>
	<?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-background.php'
		, $query->get('section-background')
	);
	?>
	<div class="container">
		<div class="separator <?php
			echo esc_attr( $query->get('icon-position') );
		?> <?php
			echo esc_attr( $query->get('type') );
		?>"><?php
			if( $query->get('icon-position') ){
				echo '<span>';
				echo '<i class="'.esc_attr( $query->getIcon('icon') ).'"></i>';
				echo '</span>';
			}
		?></div>
	</div>
</section>