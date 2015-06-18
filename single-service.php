<?php

get_header(); ?>

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ): the_post(); ?>
			<main role="main">
				<section class="services--single container">
					<div class="services--content">
						<h2><?php the_title(); ?></h2>
						<?php the_content(); ?>
					</div>
					<div class="services--back">
					<?php 
						$approach_link = get_permalink( get_page_by_path( 'approach' ) );
						echo do_shortcode( '[button link="'.$approach_link.'" class="alt round-yellow back"]' . "Back to Approach" . '[/button]' );?>

					</div>
				</section>
				<section class="container approach-services">
			
			<h4>We implement a broad array of diversity resources and interventions</h4>

			<ul class="link-list">
				
				<?php
				$args = array(
					'post_type' => 'service',
					'order'	=> 'ASC',
					'orberby' => 'menu_order',
					'numberposts' => '-1'
				);
				$services = get_posts($args);
				foreach ($services as $service) : ?>

				<?php
				if ( !empty( $service->post_content ) ) { ?>

					<li class="linked">
						<a href="<?php echo get_permalink($service->ID); ?>">
						<?php echo $service->post_title; ?>
						</a>

						<span class="link-list--corner"></span>
					</li>

				<?php
				} else { ?>

					<li>
						<span class="link-list--item--no-link"><?php echo $service->post_title; ?></span>
					</li>
					
				<?php
				}

				endforeach;
				?>
			</ul>
		</section>
			</main>
		<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer();
