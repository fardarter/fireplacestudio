<?php
$extra_style = '';
if( $query->get('fullwidth') ) {
	$extra_style="padding-top:0;";
}
?>
<section <?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-settings.php'
		, $query->get('section-settings')
		, array(
			'section'=>'google-map'
			, 'style' => $extra_style
		)
	);
	?>>
	<?php if( !$query->get('fullwidth') ) {
		echo '<div class="container"><div class="section-content">'; }
	?>
			<div class="map  <?php if( $query->get('fullwidth') ) { echo ' fullwidth '; } ?>" data-lat="<?php
			echo esc_attr( $query->get('lat') );
			?>" data-lon="<?php
			echo esc_attr( $query->get('long') );
			?>" data-zoom="<?php
			echo esc_attr( $query->get('zoom') );
			?>" data-type="ROADMAP" style="height: 400px;"></div>
	<?php if( !$query->get('fullwidth') ) {
		echo '</div></div>'; }
	?>
</section>