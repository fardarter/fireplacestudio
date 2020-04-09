
<section id="social-media">
	<a href="https://www.facebook.com/fireplacestudiocapetown/" class="soc-media-icon"><svg version="1.1" id="Icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
		 viewBox="-14 -14 48 48" enable-background="new -14 -14 48 48" xml:space="preserve">
	<linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="90.0527" y1="-99.7603" x2="90.0527" y2="-106.3809" gradientTransform="matrix(7.2338 0 0 -7.2338 -641.4998 -735.5619)">
		<stop  offset="0" style="stop-color:#4B71B8"/>
		<stop  offset="1" style="stop-color:#293F7E"/>
	</linearGradient>
	<path fill="url(#SVGID_1_)" d="M33.931,27.993c0,3.304-2.689,5.983-6.002,5.983H-8.082c-3.315,0-6.001-2.683-6.001-5.983V-7.928
		c0-3.308,2.687-5.988,6.001-5.988h36.011c3.312,0,6.002,2.681,6.002,5.988V27.993z"/>
	<path fill="#FFFFFF" d="M25.613-4.557c0,0-3.707,0-6.166,0c-3.662,0-7.732,1.535-7.732,6.835c0.019,1.845,0,3.613,0,5.603H7.481
		v6.728h4.366v19.37h8.021V14.48h5.295l0.479-6.618h-5.913c0,0,0.016-2.946,0-3.8c0-2.093,2.184-1.974,2.312-1.974
		c1.042,0,3.059,0.003,3.578,0v-6.646H25.613z"/>
	</svg></a>
</section>

<section id="#footer-widgets" class="section  section-footer-widgets dark" data-section="footer-widgets">
	<div class="container">
		<div class="section-content row">
			<div class="col-27">
				<aside id="text-3" class="widget widget_text">
					<?php
						$footer_page1 = get_page_by_title('Footer');
						$footer_page_ID = $footer_page1->ID;
						$post_thumbnail_id = get_post_thumbnail_id($footer_page_ID);
						$footer_image = wp_get_attachment_image_src($post_thumbnail_id, 'full');
						$footer_image_url = $footer_image[0];
					?> 
					<div class="textwidget"><img src=<?php echo($footer_image_url) ?>>
					</div>
						<br>
						<?php
							$footer_page = get_page_by_title('Footer');
							$footer_page_content = apply_filters('the_content', $footer_page->post_content);
							echo ($footer_page_content);
						?>	
				</aside>
				</div>
			<div class="col-23">
				<aside id="text-4" class="widget widget_text">
					<div class="textwidget">
					</div>
				</aside>
			</div>
			<div class="col-23">
				<div class="content-header widget-header v3">
					<h4 class="fps-brand-list-header">Brands</h4>
				</div>
				<?php

					$loop_args1 = array(
							'post_type' => 'page',
							'meta-key' => '_wp_page_template',
							'meta_value' => 'fireplacespagetemplate.php',
							);
						

						$loop_query_footer = new WP_Query($loop_args1);

						if ($loop_query_footer->have_posts()) {

							echo('<div class="fps-cat-list"><ul class="fps-cat-list-ul">');
							while ($loop_query_footer->have_posts()) {
								$loop_query_footer->the_post();
								echo('<li class="fps-cat-list-li"><strong><a href='.get_permalink().'>');	
								the_title_attribute();
								echo('</li></strong></a>');
							}
							echo('</ul></div>');
						}

						else { 
							echo ('No posts found');

						}

						wp_reset_postdata();
				?>

			</div>
		</div>
	</div>
</section>

<section class="section  section-footer-bottom dark" data-section="footer-bottom">
	<div class="container">
		<div class="row">
			<div class="col-18">
				<p class="copyright">© Casanova</p>
			</div>
			<div class="col-18">

				<?php
					$fps_menu_item = wp_get_nav_menu_items('nav-menu');

					if (!empty($fps_menu_item)){
						 echo('<ul class="footer-nav nav horizontal text-right">');
					}

					if (!empty($fps_menu_item)) {
						foreach ($fps_menu_item as $dat) {
							$fps_menu_var1 = $dat->title;
							$fps_menu_var2 = $dat->url;
							echo('<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4435"><a href='.$fps_menu_var2.'>'.$fps_menu_var1.'</a></li>');
						}
					}

					if (!empty($fps_menu_item)){
						 echo('</ul>');
					}
				?>

			</div>
		</div>
	</div>
</section>

<?php wp_footer(); ?>
</body>
</html>