<?php
/** @var ffOneStructure $s */
?>

<h1>
	<?php echo ff_wp_kses( $query->get('title') ); ?>
</h1>

<h4>
	<?php
	if( is_search() ){
		echo ff_wp_kses( $query->get('description-search') );
	}else{
		echo ff_wp_kses( $query->get('description-taxonomy') );
	}
	?>
</h4>

<?php get_search_form(); ?>
