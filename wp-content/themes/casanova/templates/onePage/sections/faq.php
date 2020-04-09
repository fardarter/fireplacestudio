<section <?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-settings.php'
		, $query->get('section-settings')
		, array('section'=>'faq')
	);
	?>>
	<?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-background.php'
		, $query->get('section-background')
	);
	?>
	<div class="container">
		<div class="content">
			<dl class="accordion">
				<?php foreach ($query->get('accordeon') as $oneItem) { ?>
					<dt class="accordion-trigger">
						<?php if( $oneItem->get('use-icon') ){ ?>
							<i class="<?php echo esc_attr( $oneItem->getIcon('icon') ); ?>"></i>
							&nbsp;
						<?php } ?>
						<?php echo ff_wp_kses( $oneItem->get('title') );?>
					</dt>
					<dd class="accordion-content">
						<p>
							<?php echo ff_wp_kses( $oneItem->get('description') ); ?>
						</p>
					</dd>
				<?php } ?>
			</dl>
		</div>
	</div>
</section>