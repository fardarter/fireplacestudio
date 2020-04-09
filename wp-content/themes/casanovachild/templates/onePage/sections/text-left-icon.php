<section <?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-settings.php'
		, $query->get('section-settings')
		, array('section'=>'text-left-icon')
	);
	?>>
	<?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-background.php'
		, $query->get('section-background')
	);
	?>
	<div class="container">
		<div class="section-content row">
			<?php
				ff_load_section_printer(
					'/templates/onePage/blocks/small-heading.php'
					, $query->get('small-heading')
				);
			?>

			<?php
				$textblocks_rows = $query->get('text-left-icon');
			?>
			<?php foreach( $textblocks_rows as $textblocks_oneRow ) { ?>
				<?php
					$textblocks = $textblocks_oneRow->get('one-row');
					$numberOfElements = $textblocks->getNumberOfElements();
					$colClass = ff_34_grid_translator( $numberOfElements );
				?>
				<?php foreach( $textblocks as $oneTextBlock ) { ?>
					<div class="<?php echo esc_attr( $colClass ); ?>">
						<aside class="iconbox text-left">
							<?php ff_load_section_printer(
								'/templates/onePage/blocks/text-with-icon.php'
								, $oneTextBlock
							); ?>
						</aside>
					</div>
				<?php } ?>
				<div class="clear"></div>
			<?php } ?>

		</div>
	</div>
</section>










