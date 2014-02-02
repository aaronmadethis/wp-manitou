<?php
	/* ----- Home Template ----- */
	$theme_dir_path = get_stylesheet_directory_uri();
?>

<section id="home-wrapper" class='col-xs-12 no-p'>

	<div id="home-bg">
		<img src="<?php echo $theme_dir_path; ?>/images/blur-test.jpg">
	</div>


	<section id="home-container" class="container light clear">
		<section class="row half-p">

			<?php if(get_field('home_hero', 'options')): ?>

				<?php while(the_repeater_field('home_hero', 'options')): ?>
					<article class='col-xs-12 col-sm-3 col-sm-3 half-p'>
						<div class="inside">
							<?php
								$logo_id = get_sub_field('home_hero_image');
								$logo = wp_get_attachment_image_src( $logo_id, 'full' );
							?>
							<img src="<?php echo $logo[0]; ?>">
							<div class="headline"><?php echo get_sub_field('image_text'); ?></div>
						</div>          
					</article>
				<?php endwhile; ?>

			 <?php endif; ?>

		</section>
	</section>
</section>

<section class="col-xs-12 rule-4 orange-1"></section>
<section class="col-xs-12 home-shadow"></section>

<section id="home-intro-wrapper" class="col-xs-12 no-p">
	<section id="home-intro-container" class="container">
		<div class="row half-p">
			<div id="intro-text" class="col-xs-12"><?php the_field('home_intro_text', 'options') ?></div>

			<div id="next-steps" class="col-xs-12">
				<span>Some Next Steps</span>
				<span>To Help you get started</span>
			</div>

			
		</div>
	</section>
</section>