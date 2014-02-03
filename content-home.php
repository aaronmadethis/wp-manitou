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
	<section id="home-intro-container" class="container no-p">
		<div class="row no-p">
			<div id="intro-text" class="col-xs-12"><?php the_field('home_intro_text', 'options') ?></div>

			<div id="next-steps" class="col-xs-12">
				<div class="first">Some Next Steps</div>
				<div class="second">To Help you get started</div>
				<div class="rule"></div>
			</div>

			<div class="col-xs-4 call-to-action">
				<a href="http://manitouschool.org.s180309.gridserver.com/web/?page_id=8">
					<h6>Learn About Manitou</h6>
					<span>Meet our staff,<br>read our mission statement,<br>or ask us a question.</span>
				</a>
			</div>

			<div class="col-xs-4 call-to-action">
				<a href="http://manitouschool.org.s180309.gridserver.com/web/?page_id=33">
					<h6>Apply to Manitou</h6>
					<span>Learn about our<br>admissions process and get<br>a school application.</span>
				</a>
			</div>

			<div class="col-xs-4 call-to-action">
				<a href="http://manitouschool.org.s180309.gridserver.com/web/?page_id=52">
					<h6>Our Programs</h6>
					<span>Explore all the different<br>and distinct programs we<br>offer at Manitou.</span>
				</a>
			</div>
			
		</div>
	</section>
</section>