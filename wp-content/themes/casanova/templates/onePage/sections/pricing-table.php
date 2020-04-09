<section <?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-settings.php'
		, $query->get('section-settings')
		, array('section'=>'pricing-table')
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
			<div class="pricing row collapsed">
				<?php
				$pricingTables = $query->get('pricing-tables');
				$numberOfElements = $pricingTables->getNumberOfElements();
				$colClass = ff_34_grid_translator( $numberOfElements );
				?>
				<?php foreach( $pricingTables as $oneTable ) { ?>
					<?php
						$recommendedClass = '';
						if( $oneTable->get('recommended') ) {
							$recommendedClass = 'recommended';
						}
					?>
					<div class="<?php echo esc_attr( $colClass ); ?>">
						<div class="plan text-center <?php echo esc_attr( $recommendedClass ); ?>">
							<header class="plan-header">
								<h3 class="plan-title"><?php $oneTable->printText('title'); ?></h3>
								<div class="plan-price"><?php $oneTable->printText('price'); ?></div>
							</header>
							<div class="plan-content">
								<span class="plan-icon icon medium"><i class="fa fa-home"></i></span>
								<ul>
									<?php foreach( $oneTable->get('lines') as $oneLine ) { ?>
										<li><?php $oneLine->printText('text');?></li>
									<?php } ?>
								</ul>
							</div>
							<footer class="plan-footer">
								<?php
								ff_load_section_printer(
									'/templates/onePage/blocks/button.php'
									, $oneTable->get('button')
								);
								?>
							</footer>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>