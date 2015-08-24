<?php
/*
Template Name: Inspire Archive
*/
get_header();
?>

	<main role="main" class="has-subheading">

		<header class="subheading">

			<div class="container">
				
				<h1 class="h2 w-bslash"><?php the_field( 'headline' ); ?></h1>


				<div class="w-bslash"><?php the_content(); ?></div>

			</div>

		</header>

		<section class="inspire inspire--archive secondary-section">
			
			<div class="container">

				<?php
				$args = array(
					'post_type' => 'family',
					'status' => 'speaker',
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'posts_per_page' => -1
				);

				$query = new WP_Query( $args );

				if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
					$post_nom = get_field('post-noms');
					if ( isset($post_nom )  && !empty( $post_nom ) ) $post_nom = ', <span class="post-nom">'.$post_nom.'</span>';

					?>

					<a href="<?php the_permalink(); ?>" class="inspire--card">
						<div class="inspire--thumb"><?php the_post_thumbnail( 'family-thumb' ); ?></div>
						<div class="inspire--meta">
							<h3 class="inspire--name"><?php the_title(); ?><?php echo $post_nom; ?></h3>
							<p class="inspire--title"><?php the_field( 'position' ); ?></p>
							<div class="inspire--desc"><?php the_field( 'speaker_description' ); ?></div>
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