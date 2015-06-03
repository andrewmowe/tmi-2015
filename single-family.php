<?php
get_header();

the_post();

$position = get_field('position');
$email = get_field('email');
$awards = get_field('awards', false, false );
$certs = get_field('certs', false, false );
$talks = get_field('talks', false, false );
?>

	<main role="main">

		<section class="family--single container">

			<div class="sliced-img family--portrait">
			
			<?php the_post_thumbnail( 'large' ); ?>

			</div>

			<div class="family--content">
				
				<header class="family--header">
					
					<h1 class="h3"><?php the_title(); ?></h1>

					<?php if( isset( $position ) && !empty( $position ) ) : ?>

						<span class="h4"><?php echo $position ; ?></span>

					<?php endif; ?>

					<?php if( isset( $email ) && !empty( $email ) ) : ?>

						<a href="mailto:<?php echo esc_html( $email ); ?>" target="_blank" class="h4"><?php echo esc_html( $email ); ?></a>

					<?php endif; ?>

				</header>

				<section class="family--the-content">

				<?php the_content(); ?>

				</section>

			</div>

			<div class="family--info text">

				<?php if( isset( $awards ) && !empty( $awards ) ) : ?>

					<?php echo $awards; ?>

				<?php endif; ?>

			</div>

		</section>

		<section class="family secondary-section">
			
			<div class="container">
				
				<h3 class="section--title">The TMI Family</h3>

				<div>
					
					<?php

					$family = get_posts( array( 'post_type' => 'family', 'numberposts' => '-1' ) );

					foreach( $family as $member ) : ?>

						<?php $pos = get_field( 'position', $member->ID ); ?>

						<a href="<?php echo get_permalink( $member->ID ); ?>" class="family--thumb">
							<?php echo get_the_post_thumbnail( $member->ID, 'family-thumb' ); ?>
							<div class="family--card"></div>
							<div class="family--meta">
								<span class="family--name"><?php echo $member->post_title; ?></span>
								<span class="family--desc"><?php echo $pos; ?></span>
							</div>
						</a>

					<?php
					endforeach;
					?>

				</div>

			</div>

		</section>

	</main>

<?php
get_footer();
?>