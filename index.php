<?php
get_header(); ?>

	<main role="main" class="has-subheading">

		
			<header class="subheading secondary-section">
				
				<div class="container">
					
					<h1 class="h2">Dialogue</h1>

					<div class="backslash"></div>

					<span>Join in the discussion.</span>

				</div>

			</header>

			<div class="container">

			<div class="entry-list">

			<?php

			if( have_posts() ) : while( have_posts() ) : the_post(); ?>

				<div <?php post_class( 'entry' ); ?>>
					
					<a class="entry--thumb" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>

					<div class="entry--content">
						
						<header>
							
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

							<span class="byline"><?php the_field( 'subheadline' ); ?></span>

						</header>

						<?php the_excerpt(); ?>

					</div>

					<footer class="entry--footer cf">
						
						<span class="h4 entry--meta"><?php the_date(); ?></span>

						<a href="<?php the_permalink(); ?>" class="h4 entry--more">Read More ></a>

					</footer>

				</div>

			<?php endwhile; endif; ?>

			<?php
			echo paginate_links();
			?>

			</div>

			<?php get_sidebar(); ?>

		</div>

	</main>

<?php
get_footer();
?>
