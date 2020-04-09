<section <?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-settings.php'
		, $query->get('section-settings')
		, array('section'=>'facts')
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
			<div class="iconboxes row">
				<?php
					$facts = $query->get('facts');
					$numberOfElements = $facts->getNumberOfElements();

					$colClass = ff_34_grid_translator( $numberOfElements );
				?>
				<?php foreach( $facts as $oneFact ) { ?>
				<div class="<?php echo esc_attr( $colClass ); ?>">
					<div class="stats">
						<div class="number"><?php $oneFact->printText('number'); ?></div>
						<div class="label">
							<i class="<?php echo esc_attr( $oneFact->getIcon('icon') ); ?>"></i>
							<?php $oneFact->printText('title');?>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>

