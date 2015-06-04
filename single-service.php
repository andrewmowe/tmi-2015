<?php

get_header(); ?>

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ): the_post(); ?>
			<main role="main">
				<div class="container">
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</div>
			</main>
		<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer();
