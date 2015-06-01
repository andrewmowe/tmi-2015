<?php
/*
Template Name: Contact
*/
get_header();

the_post();

$hero_img = get_field( 'home_hero_image' );

if( isset($hero_img) && !empty($hero_img) ) : ?>

<div class="hero contact-hero cf">
	<div class="hero--img cf" style="background-image: url(<?php echo wp_get_attachment_url( $hero_img ); ?>);"></div>
	<div class="hero--card"></div>

	<?php
	$hero_text = get_field( 'home_hero_text' );
	$hero_cta = get_field( 'home_hero_cta', false, false );

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
		
		<div class="contact--intro">
			
			<h2>We would love to hear from you</h2>

			<p class="text-emphasis"></p>

			<a href="mailto:tmi@tmiconsultinginc.com">tmi@tmiconsultinginc.com</a>

		</div>

		<div class="contact--main">
			
			<form action="">
				
			    <div class="field-container">
			        <label for="text">Text Input</label>
			        <input id="text" type="text" placeholder="Your name...">
			    </div>
			    <div class="field-container">
			        <label for="emailaddress">Email Address</label>
			        <input id="emailaddress" type="email" placeholder="Your email address...">
			    </div>
			    <div class="field-container">
			        <label for="textarea">Textarea</label>
			        <textarea id="textarea" rows="8" cols="48" placeholder="Your hopes, dreams, and fears..."></textarea>
			    </div>

			    <button type="submit" class="btn alt"><span>Submit</span><span class="corner"></span></button>

			</form>

		</div>

		<div class="contact--careers">
			
			<h4 class="contact--careers--header">Career Opportunities</h4>

			<p class="text-emphasis">Interested in being part of a values-based business?</p>

			<?php the_content(); ?>

		</div>

	</div>
	
</main>

<?php
get_footer();
?>