<?php ?>
<section class="family family--single--list secondary-section">
	
	<div class="container">
		
		<h3 class="section--title">The TMI Family</h3>

		<div class="js-flickity"
			data-flickity-options='{
			"wrapAround": true,
			"cellAlign": "left",
			"pageDots": false,
			"imagesLoaded": true }'>
			
			<?php

			$exclude = array( $post->ID );

			$args = array(
				'post_type' => 'family',
				'status' => 'show-on-family',
				'numberposts' => '-1',
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'post__not_in' => $exclude
			);

			$family = get_posts( $args );

			foreach( $family as $member ) :
				
				$post_nom = get_field('post-noms', $member->ID);
				if ( isset($post_nom )  && !empty( $post_nom ) ) $post_nom = ', <span class="post-nom">'.$post_nom.'</span>';

				$pos = get_field( 'position', $member->ID );

				if( get_field('no-clickthru', $member->ID ) ) { ?>

				<div class="gallery-cell family--thumb">
					<?php echo get_the_post_thumbnail( $member->ID, 'family-thumb' ); ?>
						<div class="family--card"></div>
						<div class="family--meta">
							<span class="family--name"><?php echo get_the_title($member->ID); ?><?php echo $post_nom; ?></span>
							<span class="family--desc"><?php echo $pos; ?></span>
						</div>
				</div>

				<?php } else { ?>

				<a href="<?php echo get_permalink( $member->ID ); ?>" class="gallery-cell family--thumb">
						<?php echo get_the_post_thumbnail( $member->ID, 'family-thumb' ); ?>
						<div class="family--card"></div>
						<div class="family--meta">
							<span class="family--name"><?php echo get_the_title($member->ID); ?><?php echo $post_nom; ?></span>
							<span class="family--desc"><?php echo $pos; ?></span>
						</div>
					</a>

				<?php } ?>

			<?php
			endforeach;
			?>

		</div>

	</div>

</section>