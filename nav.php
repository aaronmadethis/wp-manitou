<?php
	/* ----- Navigation Template ----- */
	$theme_dir_path = get_stylesheet_directory_uri();
?>

<section class="col-xs-12 rule-4 orange-1"></section>
<section id="nav-wrapper" class="col-xs-12 no-p">
	<section id="nav-container" class="container">
		<section class="row">
			<div id="logo" class="col-xs-3 full-p">
				<?php
					$logo_id = get_field('logo', 'option');
					$logo = wp_get_attachment_image_src( $logo_id, 'full' );
				?>
				<a href="<?php echo home_url(); ?>">
					<img src="<?php echo $logo[0]; ?>">
				</a>
			</div>
			<div class="col-xs-9 half-p">
				<nav class="col-xs-12 col-sm-12 col-md-10 no-p float-right desktop">
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