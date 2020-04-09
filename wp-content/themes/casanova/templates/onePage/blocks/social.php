<?php

foreach( $query as $oneSocialButton ) {
?>
	<a href="<?php
		echo esc_url( $oneSocialButton->get('url') );
	?>"<?php
		if( $oneSocialButton->get('target') ){
			echo ' target="' . esc_attr( $oneSocialButton->get('target') ) . '"';
		}
	?> class="icon<?php
		echo ' ' . esc_attr( $oneSocialButton->get('color') );
		echo ' ' . esc_attr( $oneSocialButton->get('shape') );
		if( $oneSocialButton->get('show-tooltip') ){
			echo ' ' . 'tooltip';
		}
	?>" title="<?php
		echo esc_attr( $oneSocialButton->get('title') );
	?>"><i class="<?php
		echo esc_attr( $oneSocialButton->getIcon('icon') );
	?>"></i></a>
<?php

}