<?php
	/* ----- Navigation Template ----- */
	$theme_dir_path = get_stylesheet_directory_uri();
?>
<?php
	$callout = " ";
	if( get_field('home_alert', 'options') ){
		$callout = 'callout';
	}
?>
<section class="col-xs-12 rule-4 orange-1 <?php echo $callout; ?>">
	<?php if( get_field('home_alert', 'options') ) : ?>
		<div class="container">
			<a href="<?php the_field('callout_link', 'options'); ?>"><?php the_field('home_alert', 'options') ?></a>
		</div>
	<?php endif; /*get_field*/ ?>
</section>
<section id="nav-wrapper" class="col-xs-12 no-p">
	<section id="nav-container" class="container">
		<section class="row">
			<div id="logo" class="col-xs-12 col-sm-3 full-p">
				<?php
					$logo_id = get_field('logo', 'option');
					$logo = wp_get_attachment_image_src( $logo_id, 'full' );
				?>
				<a href="<?php echo home_url(); ?>">
					<img src="<?php echo $logo[0]; ?>">
				</a>
			</div>
			<div id="primary-nav-container" class="col-xs-12 col-sm-9 half-p">
				<nav class="col-xs-12 col-sm-12 col-md-11 no-p float-right desktop">
					<?php
						$args = array(
							'depth'       => 2,
							'sort_column' => 'menu_order, post_title',
							'menu_class'  => 'menu',
							'include'     => '',
							'exclude'     => '',
							'echo'        => true,
							'show_home'   => false,

							'link_before' => '<span>',
							'link_after'  => '</span>' 
						);

					 	wp_page_menu( $args );
					?>
				</nav>
			</div>
		</section>				
	</section>
</section>