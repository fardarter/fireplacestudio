<section <?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-settings.php'
		, $query->get('section-settings')
		, array('section'=>'team')
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
			<div class="staff row">
				<?php
					$team = $query->get('team');
					$numberOfElements = $team->getNumberOfElements();

					$colClass = ff_34_grid_translator( $numberOfElements );
				?>
				<?php foreach( $team as $member ) { ?>
					<?php
						$imageUrlResized = '';
						if( $member->getImage('image')->url ){
							$imageUrlResized = fImg::resize( $member->getImage('image')->url, 400, 400, true);
						}

					?>
					<div class="<?php echo esc_attr( $colClass ); ?>">
						<figure class="member">
							<a href="<?php $member->printText('link');?>">
								<img src="<?php echo esc_url( $imageUrlResized ); ?>" alt="" />
								<span class="bubble icon circle primary medium">
									<i class="<?php echo esc_attr( $member->getIcon('icon') ); ?>"></i>
								</span>
							</a>
							<figcaption>
								<h4><?php $member->printText('title');?></h4>
								<span><?php $member->printText('description');?></span>
							</figcaption>
						</figure>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>

