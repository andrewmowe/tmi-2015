<?php
get_header();
?>

	<main role="main" class="has-subheading">

		<header class="subheading">

			<div class="container">
				
				<h1 class="h2">Meet the family.</h1>

				<div class="backslash"></div>

				<span>These are some super great ppl</span>

			</div>

		</header>

		<section class="family secondary-section">
			
			<div class="container">

				<?php
				if( have_posts() ) : while( have_posts() ) : the_post();
				?>
				
				<a href="<?php the_permalink(); ?>" class="family--thumb">
					<?php the_post_thumbnail( 'family-thumb' ); ?>
					<div class="family--card"></div>
					<div class="family--meta">
						<span class="family--name"><?php the_title(); ?></span>
						<span class="family--desc"><?php the_field( 'position' ); ?></span>
					</div>
				</a>

				<?php
				endwhile;

				endif;
				?>
				

			</div>

		</section>

	</main>

<?php
get_footer();
?>