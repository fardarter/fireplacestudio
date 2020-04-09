<!DOCTYPE html>

<html <?php language_attributes(); ?> class="no-js">

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<meta name="viewport" content="initial-scale=1, maximum-scale=1, width=device-width">

	<script>(function(){document.documentElement.className='js'})();</script>

	<?php wp_head(); ?>
	

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-72541756-1', 'auto');
  ga('send', 'pageview');

</script>
	
	<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/primediabroadcasting/za-covid19-js/covidbar-latest.min.js?theme=grey"></script>
	
</head>



<body <?php echo body_class(); ?>>

<?php

    ffContainer()->getThemeFrameworkFactory()->getLayoutsNamespaceFactory()->getLayoutPrinter()

        ->printLayoutHeader()

        ->printLayoutBeforeContent();

	?>



