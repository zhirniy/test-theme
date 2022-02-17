<footer class="footer" id="footer">
	<a href="#" class="logo">
		<img src="<?= get_template_directory_uri(); ?>/img/logo-primary.png" alt="">
	</a>
	<nav class="footer-nav">
        <?php
            wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'menu_class' => 'footer-menu footer-menu-item',
                'menu_id' => 'footer-menu',
                'depth' => 1
            ));
        ?>
	</nav>

	<div class="footer-bottom">
		<span class="footer-copyright">&copy; Київський освітній хаб 2019. Усі права захищені</span>
		<div class="soc-menu">
			<span class="soc-name caption">
				Ми в соцмережах
			</span>
			<ul class="soc-links">
				<li>
					<a href="#">
						<svg class="icon">
							<use xlink:href="#facebook">
						</svg>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="icon">
							<use xlink:href="#instagram">
						</svg>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="icon">
							<use xlink:href="#linkedin">
						</svg>
					</a>
				</li>
				<li>
					<a href="#">
						<svg class="icon">
							<use xlink:href="#twitter">
						</svg>
					</a>
				</li>
			</ul>
		</div>
	</div>
</footer>
<?php if (!$_COOKIE["country"]): ?>
    <?php if(!get_query_var('country')): ?>
        <?php get_template_part('template-parts/modal', 'question'); ?>
    <?php endif; ?>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>