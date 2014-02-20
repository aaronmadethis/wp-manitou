<?php
	/* ----- Page Template ----- */
	$theme_dir_path = get_stylesheet_directory_uri();
	global $post;
?>

<div class="invisible" >our-people loading</div>

<?php if( have_rows('profile', $post->ID) ): ?>

	<div id="our-prople-wrapper" >
		<?php while( have_rows('profile', $post->ID) ): the_row(); 
			$image_id = get_sub_field('profile_picture');
			$content = get_sub_field('profile_bio');
			$image = wp_get_attachment_image_src( $image_id, 'full' );
		?>

			<div class="our-people-profile col-xs-12 no-p">
				<p class="col-xs-4 profile-img">
					<img src="<?php echo $image[0] ?>" >
				</p>
				<?php echo $content; ?>


			</div>

		<?php endwhile; ?>

	</div>

<?php endif; ?>