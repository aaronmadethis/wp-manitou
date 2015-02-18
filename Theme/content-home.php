<?php
	/* ----- Home Template ----- */
	$theme_dir_path = get_stylesheet_directory_uri();
?>

<section id="home-wrapper" class='col-xs-12 no-p' itemprop="mainContentOfPage">

	<div id="home-bg">
		<img src="<?php echo $theme_dir_path; ?>/images/Stocksy_blur.jpg">
	</div>


	<section id="home-container" class="container light clear">
		<section class="row half-p">

			<?php if(get_field('home_hero', 'options')): ?>
				<?php $loop_counter = 1; ?>
				<?php while(the_repeater_field('home_hero', 'options')): ?>
					<article class='col-xs-12 col-sm-3 col-sm-3 half-p'>
						<div class="inside">
							<a href="<?php echo get_sub_field('hero_link'); ?>">
								<?php
									$logo_id = get_sub_field('home_hero_image');
									$logo = wp_get_attachment_image_src( $logo_id, 'home-hero' );
								?>
								<img src="<?php echo $logo[0]; ?>" class="<?php if($loop_counter == 3) echo 'right'; ?> hero-<?php echo $loop_counter; ?>">
								<div class="headline">
									<?php 
										echo get_sub_field('image_text');
										++$loop_counter
									?>
								</div>
							</a>
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
	<section id="home-intro-container" class="container no-p">
		<div class="row no-p">
			<div id="intro-text" class="col-xs-12"><?php the_field('home_intro_text', 'options') ?></div>

			<div id="next-steps" class="col-xs-12">
				<div class="first">Some Next Steps</div>
				<div class="second">To Help you get started</div>
				<div class="rule"></div>
			</div>

			<?php if(get_field('home_cta', 'options')): ?>

				<?php while(the_repeater_field('home_cta', 'options')): ?>

					<div class="col-xs-12 col-sm-12 col-md-4 call-to-action">
						<a itemprop="significantLink" href="<?php echo get_sub_field('cta_link'); ?>">
							<h6><?php echo get_sub_field('cta_title'); ?></h6>
							<span><?php echo get_sub_field('cta_subhead'); ?></span>
						</a>
					</div>

				<?php endwhile; ?>

			 <?php endif; ?>
			
		</div>
	</section>
</section>