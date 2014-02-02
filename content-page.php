<?php
	/* ----- Page Template ----- */
	$theme_dir_path = get_stylesheet_directory_uri();
?>

<section id="page-wrapper">
	<section id="page-container" class="container">
		<div class="row">

			<section id="page-template-wrapper" class="col-xs-12 no-p">
				<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<div id="page-sidebar-wrapper" class="col-xs-4 no-p">
								<?php
									$parents = get_post_ancestors($post->ID);
									$parent_id = ($parents) ? $parents[count($parents)-1]: $post->ID;
									$parent_title = get_the_title($parent_id); ?> 
								<h2><?php echo $parent_title; ?></h2>
								<?php dynamic_sidebar('page'); ?>
							</div>

							<article class="col-xs-8 no-p entry-content">
								<h2 class="title"><?php the_title(); ?></h2>
								<?php the_content(); ?>
							</article>

						<?php endwhile; ?>
					<?php endif; /*have_posts*/ ?>
			</section>

		</div>
	</section>
</section><!-- end of page-wrapper -->