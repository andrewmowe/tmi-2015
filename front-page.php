<?php
/*
Template Name: Home Page
*/
get_header();

$hero_img = get_field( 'home_hero_image' );

if( isset($hero_img) && !empty($hero_img) ) : ?>

<div class="hero cf">
	<div class="hero--img cf" style="background-image: url(<?php echo wp_get_attachment_url( $hero_img ); ?>);"></div>
	<div class="hero--overlay"></div>
	<div class="hero--card"></div>

	<?php
	$hero_text = get_field( 'home_hero_text' );
	$hero_cta = get_field( 'home_hero_cta' );

	if( isset( $hero_text ) || isset( $hero_cta ) ) : ?>

	<div class="container">
		<div class="hero--img-text">
			<?php echo ( !empty( $hero_text ) ? $hero_text : ''); ?>
		</div>
		<div class="hero--cta">
			<?php echo ( !empty( $hero_cta ) ? $hero_cta : ''); ?>
		</div>
	</div>

	<?php
	endif;
	?>
</div>

<?php
endif;
?>

<main role="main" class="has-hero">

	<div class="container">

	<?php
	$top_left_title = get_field( 'card_title_tl' );
	$top_left_text = get_field( 'card_text_tl' );
	$top_left_img = get_field( 'card_image_tl' );

	if( isset( $top_left_title ) && !empty( $top_left_title ) ) : ?>

	<div class="card small">
		<?php if( isset( $top_left_img ) && !empty( $top_left_img ) ) :
			echo wp_get_attachment_image( $top_left_img, 'full', false, array( 'class' => 'card--img' ) );
		endif; ?>
		<div class="card--info text">
			<?php if( isset( $top_left_title ) && !empty( $top_left_title ) ) : ?>
				<h4 class="card--title"><?php echo $top_left_title; ?></h4>
			<?php endif; ?>
			<?php if( isset( $top_left_text ) && !empty( $top_left_text ) ) : ?>
				<p class="text-emphasis">
					<?php echo $top_left_text; ?>
				</p>
			<?php endif; ?>
		</div>
	</div>

	<?php
	endif;
	?>

	<?php
	$top_right_title = get_field( 'card_title_tr' );
	$top_right_text = get_field( 'card_text_tr' );
	$top_right_img = get_field( 'card_image_tr' );

	if( isset( $top_right_title ) && !empty( $top_right_title ) ) : ?>

	<div class="card small">
		<?php if( isset( $top_right_img ) && !empty( $top_right_img ) ) :
			echo wp_get_attachment_image( $top_right_img, 'full', false, array( 'class' => 'card--img' ) );
		endif; ?>
		<div class="card--info text">
			<?php if( isset( $top_right_title ) && !empty( $top_right_title ) ) : ?>
				<h4 class="card--title"><?php echo $top_right_title; ?></h4>
			<?php endif; ?>
			<?php if( isset( $top_right_text ) && !empty( $top_right_text ) ) : ?>
				<p class="text-emphasis">
					<?php echo $top_right_text; ?>
				</p>
			<?php endif; ?>
		</div>
	</div>

	<?php
	endif;
	?>

	<?php
	$large_title = get_field( 'card_title_lg' );
	$large_text = get_field( 'card_text_lg' );
	$large_img = get_field( 'card_image_lg' );

	if( isset( $large_title ) && !empty( $large_title ) ) : ?>

	<div class="card large">
		<?php if( isset( $large_img ) && !empty( $large_img ) ) :
			echo '<div class="sliced-img card--img">'.wp_get_attachment_image( $large_img, 'full', false, array() ).'</div>';
		endif; ?>
		<div class="card--info text">
			<?php if( isset( $large_title ) && !empty( $large_title ) ) : ?>
				<h4 class="card--title"><?php echo $large_title; ?></h4>
			<?php endif; ?>
			<?php if( isset( $large_text ) && !empty( $large_text ) ) : ?>
				<p class="text-emphasis">
					<?php echo $large_text; ?>
				</p>
			<?php endif; ?>
		</div>
	</div>

	<?php
	endif;
	?>

	</div>

</main>

<?php
get_footer();