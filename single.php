<section id="single-page-wrapper" class="col-xs-12">
	<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article>
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</article>
			<?php endwhile; ?>
		<?php endif; /*have_posts*/ ?>
</section>