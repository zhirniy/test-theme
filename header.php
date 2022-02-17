<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?php wp_head(); ?>
</head>
<body <?php body_class();?>>
<?php get_template_part( 'template-parts/dev', 'menu' ); ?>
	<div class="d-none">
        <?php get_template_part( 'template-parts/svgmap'); ?>
	</div>
	<header class="header" id="header">
        <?php the_custom_logo(); ?>
		<button class="btn-light-tr btn-menu" id="btn-menu">
			<span class="menu-icon">
				<span class="dot"></span>
				<span class="dot"></span>
				<span class="dot"></span>
				<span class="dot"></span>
				<span class="dot"></span>
				<span class="dot"></span>
				<span class="dot"></span>
				<span class="dot"></span>
				<span class="dot"></span>
			</span>
			<span class="menu-name">Меню</span>
		</button>
		<div class="menu">
			<div class="menu-inner">
				<nav class="menu-nav">
                    <?php
                         if ($_COOKIE["country"] == 'blr' || get_query_var('country') == 'blr'):
                             wp_nav_menu(array(
                                 'theme_location' => 'main-menu-blr',
                                 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                 'menu_class' => 'main-menu main-menu-item',
                                 'menu_id' => 'header_menu_blr',
                                 'depth' => 1
                             ));
                         elseif (!$_COOKIE["country"] || get_query_var('country') != 'blr'):
                             wp_nav_menu(array(
                                 'theme_location' => 'main-menu',
                                 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                 'menu_class' => 'main-menu main-menu-item',
                                 'menu_id' => 'header_menu',
                                 'depth' => 1
                             ));
                         endif;
                    ?>
				</nav>
				<div class="menu-buttons">
					<a href="#" class="btn-light-tr btn-with-icon">
						<svg class="icon tr-reflect">
							<use xlink:href="#arrow-long">
						</svg>
						<span>Роботодавцю</span>
					</a>
					<a href="#" class="btn-light">Особистий кабінет</a>
				</div>
			</div>
		</div>
	</header>