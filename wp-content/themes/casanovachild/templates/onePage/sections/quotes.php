<section <?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-settings.php'
		, $query->get('section-settings')
		, array('section'=>'quotes')
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
			<div class="quote-rotator">
				<div class="bxslider">
					<?php foreach( $query->get('quotes') as $oneQuote ) { ?>
						<blockquote class="quote text-center">
							<p class="quote-text"><?php echo ff_wp_kses( $oneQuote->get('text') ); ?></p>
							<cite>
								<?php echo ff_wp_kses( $oneQuote->get('author') ); ?>
								-
								<span><?php echo ff_wp_kses( $oneQuote->get('position') ); ?></span>
							</cite>
						</blockquote>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>

