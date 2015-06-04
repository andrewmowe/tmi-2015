<?php
/*
Template Name: Family Archive
*/
get_header();
?>

	<main role="main" class="has-subheading">

		<header class="subheading">

			<div class="container">
				
				<h1 class="h2"><?php the_field( 'headline' ); ?></h1>

				<div class="backslash"></div>

				<span><?php the_field( 'subheadline' ); ?></span>

			</div>

		</header>

		<section class="family secondary-section">
			
			<div class="container">

				<?php
				$args = array(
					'post_type' => 'family',
					'orderby' => 'menu_order',
					'order' => 'ASC'
				);

				$query = new WP_Query( $args );

				if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
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

				wp_reset_postdata();
				?>
				

			</div>

		</section>

	</main>

<?php
get_footer();
?>