<?php

/*Template Name: Fireplaces*/


get_header(); 

$page_post_id = get_the_ID();
$page_link = get_permalink($page_post_id);
$pagecategory_terms = wp_get_post_terms($page_post_id, 'category');
foreach($pagecategory_terms as $dat) {
	$pagecategory_name = $dat->name;
}
$page_fields = get_fields($page_post_id);

if (!empty($page_fields['brand_image']['sizes']['thumbnail'])) {
	$page_thumb_url = $page_fields['brand_image']['sizes']['thumbnail'];
}

else {
	$page_thumb_url = "https://ukukhanyakwelanga.com/fireplacestudiodev/wp-content/uploads/2015/12/fpsicon1.png style='display:none;'";

}

?>

<section class="page-title section light">
                <div class="container">
                    <div class="row">
                        <div class="col-9">

                            <!-- start page title -->
                            <header class="section-header content-header">
                              <p><img src=<?php echo($page_thumb_url); ?> alt=<?php echo($pagecategory_name); ?> ></p>
                              <p class="subtitle lead"><?php echo($page_fields['page_introductory_text']); ?></p>
                            </header>
                            <!-- end page title -->

                            <!-- start breadcrumbs -->
              <nav class="breadcrumbs">
                                <span class="label">You are here:</span>
                                <a href="https://www.fireplacestudio.co.za/">Home</a>
                                <span class="sep">/</span>
                                <span class="current"><?php echo('<a href="'.$page_link.'">'.$pagecategory_name.'</a>'); ?></span>
                        </nav>
                            <!-- end breadcrumbs -->

                        </div>

                        <div class="col-27">
                            <!-- an empty space, you can add image or additional text here -->
                        </div>
                    </div>
                </div>
            </section>

<section id="main-content" class="section light fps-fireplace-post">
	<div class="container">
		<div class="section-content row">
			<div id="primary" class="col-1">
				
				<?php

					foreach ($pagecategory_terms as $dat) {
						$pagecategory_var = $dat->slug;
					}
					
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
							$loop_post_id = get_the_ID();

							$product_items = array();
							$url_items1 = array();
							$url_items2 = array();
							$product_prepend = array();
							$product_append = array();
							$field = get_field_objects($loop_post_id, false);

							$field1 = get_field_object($loop_post_id);
							$field2 = get_fields($loop_post_id);

							foreach ($field as $dat => $dis) {

								if ($dis['parent'] == 6500) { 

									if (!empty($dis['value'])) {
										$product_items[] = array(
											$dis['label'] => $dis['value'],
											);
									}

									if ((!empty($dis['value'])) && (!empty($dis['append']))){
										$product_append[] = array(
											$dis['label'] => $dis['append'],
											);
									}

									if ((!empty($dis['value'])) && (!empty($dis['prepend']))){
										$product_prepend[] = array(
											$dis['label'] => $dis['prepend'],
											);
									}
								}

								elseif ($dis['parent'] == 6514) {

									$url_items1[] = array(
										$dis['name'] => $dis['value'],										
										);
								}
							}

							foreach ($url_items1 as $dat => $dis) {
								$value1 = key($dis);
								$value2 = $dis[$value1];

								$url_items2[] = array(
									$value1 => $value2
									);
							}
							
							$doc1_type = $url_items2[0]['document_type_1'];
							$doc2_type = $url_items2[1]['document_type_2'];
							$doc3_type = $url_items2[2]['document_type_3'];
							$doc1_url = $url_items2[3]['document_1_url'];
							$doc2_url = $url_items2[4]['document_2_url'];
							$doc3_url = $url_items2[5]['document_3_url'];
														
							$product_numb = count($product_items);
							$more_than_six = "";
							if ($product_numb > 6) {
								$more_than_six = "more-six";
							} 

							echo('<div class="col-24 fireplace-objects '.$more_than_six.'">
									<article class="project">
										<figure class="project-thumb">');
										the_post_thumbnail();
										echo('</figure>
									<header class="project-header">
										<h4 class="project-title">');
										the_title();
										echo('</h4>
												<div class="project-meta">');
													echo('<div class="product-para">');
														the_content();
													echo('</div>');
												
												
												$n = 0;
												foreach ($product_items as $dat => $dis) {
													$field_name1 = key($dis);
													$field_value1 = $dis[$field_name1];
													$append_var = "";
													$prepend_var = "";

													foreach ($product_append as $dis) { 
														if ((key($dis) == $field_name1)) {
															$append_var = " ".$dis[$field_name1];
														}
													}

													foreach ($product_prepend as $dis) {
														if ((key($dis) == $field_name1)) {
															$prepend_var = $dis[$field_name1]." ";
														}
													}
													
													if ($n == 0) {
														echo('<ul class="top-list">');
													}
													
													if ($n == 6) {
														echo('<ul class="bottom-list">');
													}
													
													echo('<li>');
													echo('<span class="fp-list-label">'.$field_name1.': '.'</span>'.'</br>'.'<span class="fp-list-value">'.$prepend_var.$field_value1.$append_var.'</span>');
													echo('</li>');

													
													if ($n == 5 || $n == ($product_numb - 1)) {
														echo('</ul>');
													}

													$n++;
												}

												if ($product_numb < 6) {

													if ((!empty($doc1_type)) && (!empty($doc1_url))) {
														echo('<div class="col-24 fps-sup-doc fps-sup-doc-top"></i><a href='.$doc1_url.'><i class="fa fa-file-text"></i>'.$doc1_type.'</a></div>');

													}
												
													if ((!empty($doc2_type)) && (!empty($doc2_url))) {
														echo('<div class="col-24 fps-sup-doc fps-sup-doc-top"></i><a href='.$doc2_url.'><i class="fa fa-file-text"></i>'.$doc2_type.'</a></div>');
														
													}
												
													if ((!empty($doc3_type)) && (!empty($doc3_url))) {
														echo('<div class="col-24 fps-sup-doc fps-sup-doc-top"><a href='.$doc3_url.'><i class="fa fa-file-text"></i>'.$doc3_type.'</a></div>');
														
													}

												}

												echo('</div>
												</header>
											</article>
											<div><div class="fps-expand-button fps-more-button-down col-24"><span class="fps-top-bottom-toggle"><i class="fps-menu-button fa fa-chevron-down"></i></span></div><div>');

											if ($product_numb >= 6) {

												if ((!empty($doc1_type)) && (!empty($doc1_url))) {
													echo('<div class="col-24 fps-sup-doc fps-sup-doc-bottom"><a href='.$doc1_url.'><i class="fa fa-file-text"></i>'.$doc1_type.'</a></div>');

												}
											
												if ((!empty($doc2_type)) && (!empty($doc2_url))) {
													echo('<div class="col-24 fps-sup-doc fps-sup-doc-bottom"><a href='.$doc2_url.'><i class="fa fa-file-text"></i>'.$doc2_type.'</a></div>');
													
												}
											
												if ((!empty($doc3_type)) && (!empty($doc3_url))) {
													echo('<div class="col-24 fps-sup-doc fps-sup-doc-bottom"><a href='.$doc3_url.'><i class="fa fa-file-text"></i>'.$doc3_type.'</a></div>');
													
												}
											}

										echo('</div></div></div>');
						}
					}

					else { 
						echo ('No posts found');

					}

					wp_reset_postdata();



					/*
					the_post();
					echo '<div class="post-content">';
					the_content();
					echo '</div>';
					wp_link_pages();

					ffTemporaryQueryHolder::setQuery( 'comments-list', ffThemeOptions::getQuery('translation comments-list') );
					ffTemporaryQueryHolder::setQuery( 'comments-form', ffThemeOptions::getQuery('translation') );
					comments_template();
					ffTemporaryQueryHolder::deleteQuery('comments-list');
					ffTemporaryQueryHolder::deleteQuery('comments-form');	*/
				 ?> 
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>