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
				<div class="address" itemscope itemtype="http://schema.org/Organization">
					<p>
						<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress "><?php the_field('footer_address', 'option'); ?></span>
					</p>
					<p><span itemprop="telephone"><?php the_field('footer_phone', 'option'); ?></span><br><span itemprop="email"><a href="mailto:<?php the_field('footer_email', 'option'); ?>"><?php the_field('footer_email', 'option'); ?></a></span></p>
					<p><a href="https://www.facebook.com/ManitouSchool" target="_blank">Facebook</a>&nbsp; | &nbsp;<a href="https://twitter.com/manitouschool" target="_blank">Twitter</a></p>
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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48510526-1', 'manitouschool.org');
  ga('send', 'pageview');

</script>
</div> <!-- end all-wrapper -->
</body>
</html>