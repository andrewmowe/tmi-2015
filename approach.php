<?php
/*
Template Name: Approach
*/
get_header();
?>

	<main role="main">

	<?php
	$img = get_field( 'image' );
	$title = get_field( 'custom_title' );
	$content = get_field( 'content' );
	?>
		
		<section class="container">
			
			<div class="card large">
				<div class="sliced-img card--img">
					<?php
					if( isset( $img ) && !empty( $img ) ) :
						echo wp_get_attachment_image( $img, 'large' );
					endif;
					?>
				</div>
				<div class="card--info">
					<?php
					if( isset( $title ) && !empty( $title ) ) : ?>
						<h2 class="card--title punchline tisa">
							<?php echo $title; ?>
						</h2>
					<?php
					endif;
					?>

					<?php
					if( isset( $content ) && !empty( $content ) ) : ?>
						<p class="text-emphasis">
							<?php echo $content; ?>
						</p>
					<?php
					endif;
					?>
				</div>
			</div>

			<div class="card small">

			<?php
			$l_card_title = get_field( 'left_card_title' );
			$l_card_text = get_field( 'left_card_text' );
			?>
				
				<div class="card--info">
					<?php
					if( isset( $l_card_title ) && !empty( $l_card_title ) ) : ?>
						<h4 class="card--title"><?php echo $l_card_title; ?></h4>
					<?php endif; ?>

					<?php
					if( isset( $l_card_text ) && !empty( $l_card_text ) ) : ?>
						<p class="text-emphasis">
							<?php echo $l_card_text; ?>
						</p>
					<?php endif; ?>
				</div>
			</div>

			<div class="card small">

			<?php
			$r_card_title = get_field( 'right_card_title' );
			$r_card_text = get_field( 'right_card_text' );
			?>
				
				<div class="card--info">
					<?php
					if( isset( $r_card_title ) && !empty( $r_card_title ) ) : ?>
						<h4 class="card--title"><?php echo $r_card_title; ?></h4>
					<?php endif; ?>

					<?php
					if( isset( $r_card_text ) && !empty( $r_card_text ) ) : ?>
						<p class="text-emphasis">
							<?php echo $r_card_text; ?>
						</p>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<div class="btn-separator">
			<button href="http://google.com" class="btn alt"><a href="/contact">let's get started</a><span class="corner"></span></button>
		</div>

		<section class="container approach-services">
			
			<h4>We implement a broad array of resources and interventions</h4>

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

		<?php
		//$cases = get_posts( array( 'post_type' => 'case-study' ) );
		//if( isset( $cases ) && !empty( $cases ) ) : ?>

<!-- 		<section class="section approach-cases">

			<div class="container">
				
				<h3 class="section--title">Case Studies</h3>

				<div>

				<?php
				foreach( $cases as $case ) : ?>

					<a class="case-study" href="<?php echo get_permalink( $case->ID ); ?>">
						<?php echo get_the_post_thumbnail( $case->ID, 'large', array( 'class' => 'case-study--img' ) ); ?>
						<span class="case-study--card"></span>
						<div class="case-study--text">
							<span class="case-study--title"><?php echo $case->post_title; ?></span>
							<span class="case-study--subtitle"></span>
						</div>
					</a>

				<?php
				endforeach;
				?>

				</div>

			</div>

		</section> -->

		<?php
		//endif;
		?>

	</main>

<?php
get_footer();