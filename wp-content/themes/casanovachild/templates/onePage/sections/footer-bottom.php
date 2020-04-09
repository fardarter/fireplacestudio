<section <?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-settings.php'
		, $query->get('section-settings')
		, array('section'=>'footer-bottom')
	);
	?>>
	<div class="container">
		<div class="row">
			<?php
				$colClass = 'col-18';
				if( !$query->get('show-text') || !$query->get('show-navigation') ) {
					$colClass = 'col-1';
				}
			?>
			<?php if( $query->get('show-text') ) { ?>
			<div class="<?php echo esc_attr( $colClass ); ?>">
				<p class="copyright">
					<?php echo ff_wp_kses( $query->get('text') ); ?>
				</p>
			</div>
			<?php } ?>
			<?php if( $query->get('show-navigation') ) { ?>
			<div class="<?php echo esc_attr( $colClass ); ?>">
					<?php
						$menuId = $query->get('navigation-menu-id');
						$menu = wp_nav_menu( array(
							'depth'     => 1,
							'container' => false,
                            'container_class' => 'hovo',
                            'echo' => false,
							'menu'      => $menuId,
                            'menu_class' =>'footer-nav nav horizontal text-right',
						));

                        echo( $menu );
					?>
			</div>
			<?php } ?>
		</div>
	</div>
</section>