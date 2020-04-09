<?php
locate_template('templates/helpers/Walker_Nav_Menu_casanova.php', true, true);
?>
<header <?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-settings.php'
		, $query->get('section-settings')
		, array(
			'section'=>'navigation',
			'class'=>'header'
		)
	);
	?>>
	<?php
	ff_load_section_printer(
		'/templates/onePage/blocks/section-background.php'
		, $query->get('section-background')
	);
	?>
	<div class="container">
		<div class="row">
			<div id="logo" class="col-29">
				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php if( $query->getImage('logo image')->url ){ ?>
						<img src="<?php
							echo esc_url( $query->getImage('logo image')->url );
							?>" alt="<?php
							echo get_bloginfo('name');
							?>">
					<?php } else{
						echo get_bloginfo('name');
					} ?>
					</a>
				</h1>
			</div>
			<div id="header-widgets" class="col-7">
				<nav id="header-social" class="text-right">
					<?php
					ff_load_section_printer(
						'/templates/onePage/blocks/social.php'
						, $query->get('social-links')
					);
					?>
				</nav>
				<?php
					wp_nav_menu( array(
						// 'theme_location' => 'main-nav',
						'menu'           => $query->get('navigation-menu-id'),
						'depth'          => 0,
						'container'      => false,
						'menu_class'     => 'nav navbar-nav navbar-left',
						'items_wrap'     => '<nav id="site-nav" class="nav horizontal text-right"><ul role="menu" id="%1$s" class="dropdown %2$s">%3$s</ul></nav>',
						'walker'         => new Walker_Nav_Menu_casanova(),
						'fallback_cb'    => 'Walker_Nav_Menu_casanova_fallback',
					) );
				?>
			</div>
		</div>
	</div>
</header>