<?php

echo "\n";
echo '<a href="';
$query->printText('url');
echo '"';

if( '_blank' == $query->get('target') ){
	echo ' target="_blank"';
}

if( $query->get('use-style') ){
	echo ' class="button';
	echo ' '.esc_attr( $query->get('color') );
	echo ' '.esc_attr( $query->get('size') );
	if( $query->get('use-rounded-corners') ){
		echo ' rounded';
	}
	echo '"';
}

echo '>';

if( $query->get('use-style') ){
	if( $query->get('use-icon') ){
		echo '<i class="'.esc_attr( $query->getIcon('icon') ).'"></i> ';
	}
}

$query->printText('title');

echo '</a>';
echo "\n";