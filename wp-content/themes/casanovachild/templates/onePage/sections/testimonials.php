<section <?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-settings.php'
		, $query->get('section-settings')
		, array('section'=>'testimonials')
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
			<div class="testimonials row">
				<?php
					$testimonials = $query->get('testimonials');
					$numberOfElements = $testimonials->getNumberOfElements();
					$colClass = ff_34_grid_translator( $numberOfElements );
				?>
				<?php foreach( $testimonials as $oneTestimonial ) { ?>
					<div class="<?php echo esc_attr( $colClass ); ?>">
						<blockquote class="testimonial">
							<p><?php echo ff_wp_kses( $oneTestimonial->get('text') ); ?></p>
							<cite>
								<strong><?php echo ff_wp_kses( $oneTestimonial->get('author') ); ?></strong>,
								<span><?php echo ff_wp_kses( $oneTestimonial->get('position') ); ?></span>
							</cite>
						</blockquote>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>