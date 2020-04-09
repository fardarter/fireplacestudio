<section class="section section-revslider tp-banner-container">
<?php
ff_load_section_printer(
	'/templates/onePage/blocks/section-background.php'
	, $query->get('section-background')
);
?>
<?php

if( function_exists('putRevSlider') ){
	$revslider = $query->get('revslider');
	putRevSlider( $revslider->get('id') );
}else{
	?>
		<div class="container">
			<h4 class="title">We have a problem here</h4>
			<p>You used Revolution Slider section, but you have not installed this plugin: Function <code>putRevSlider()</code> does not work!</p>
		</div>
	<?php
}

?></section>