<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1, width=device-width">
	<script>(function(){document.documentElement.className='js'})();</script>
	<?php wp_head(); ?>
</head>

<body <?php echo body_class(); ?>>
<?php
    ffContainer()->getThemeFrameworkFactory()->getLayoutsNamespaceFactory()->getLayoutPrinter()
        ->printLayoutHeader()
        ->printLayoutBeforeContent();
	?>

