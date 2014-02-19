<?php
	/* ----- Footer Template ----- */
	$theme_dir_path = get_stylesheet_directory_uri();
?>

<section id="footer-wrapper" class="col-xs-12 no-p">
	<section id="footer-container" class="container">
		<footer class="row no-p">
			<div class="col-xs-12 col-sm-12 col-md-3 contact">
				<a class="logo-footer" href="<?php echo home_url(); ?>">
					<?php
						$logo_id = get_field('logo', 'option');
						$logo = wp_get_attachment_image_src( $logo_id, 'full' );
					?>
					<img src="<?php echo $logo[0]; ?>">
				</a>
				<div class="address">
					<p><?php the_field('footer_address', 'option'); ?></p>
					<p><?php the_field('footer_phone', 'option'); ?><br><a href="mailto:<?php the_field('footer_email', 'option'); ?>"><?php the_field('footer_email', 'option'); ?></a></p>
				</div>
			</div>
			<nav id="mega-footer" class="col-xs-9 no-p">
				<?php
					$args = array(
						'depth'       => 2,
						'sort_column' => 'menu_order, post_title',
						'menu_class'  => 'menu',
						'include'     => '',
						'exclude'     => '4',
						'echo'        => true,
						'show_home'   => false,
						'link_before' => '',
						'link_after'  => '' 
					);

				 	wp_page_menu( $args );
				?>
			</nav>
		</footer>
	</section>
	<section id="copyright" class="col-xs-12 orange-1 no-p">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">Copyright &copy; 2014, All rights reserved</div>
			</div>
		</div>
	</section>
</section>

<?php wp_footer(); ?>
</body>
</html>