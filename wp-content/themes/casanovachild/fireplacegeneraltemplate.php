<?php
/**
 * Template Name: Fireplaces General
 */

get_header(); ?>
<section id="main-content" class="section light">
	<div class="container">
		<div class="section-content row">
			<div id="primary" class="col-1">
				<?php

				$page_post_id = get_the_ID();
				$page_link = get_permalink($page_post_id);
				$pagecategory_terms = wp_get_post_terms($page_post_id, 'category');
				foreach($pagecategory_terms as $dat) {
					$pagecategory_name = $dat->name;
				}
				
				$page_fields = get_fields($page_post_id);

				$loop_args = array(
						'post_type' => 'fireplaces',
						'tax_query' => array(
							array(
								'taxonomy' => 'fireplace_item',
								'field' => 'slug',
								'terms' => array($pagecategory_var)
								),
							),
						);
					

				$loop_query = new WP_Query( $loop_args );

				if($loop_query->have_posts()) {
						while ($loop_query->have_posts()) {
							$loop_query->the_post();
						}
				}
							
				?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>