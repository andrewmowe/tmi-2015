<?php
/*
Template Name: Contact
*/
get_header();

the_post();

$location = get_field('map');
?>

<div class="hero contact-hero cf">
	<div class="hero--img cf">
		<?php
		if( !empty($location) ):
		?>
		<div class="acf-map">
			<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
		</div>
		<?php else : echo 'poop'; ?>
		<?php endif; ?>	
	</div>
	<div class="hero--overlay"></div>
	<div class="hero--card"></div>

	<div class="container">
		<div class="hero--cta cf">
			<p class="h3"><?php the_field('address'); ?></p>
			<a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
			<span>phone: <?php the_field('phone'); ?></span>
			<span>fax: <?php the_field('fax'); ?></span>
			<div class="icons social-list cf">
				<a href="" class="icon-linkedin"></a>
				<a href="" class="icon-facebook"></a>
				<a href="" class="icon-twitter"></a>
			</div>
		</div>
	</div>

</div>

<main role="main" class="has-hero">

	<div class="container">
		
		<div class="contact--intro">
			
			<h2><?php the_field('subheadline'); ?></h2>

			<p class="text-emphasis"><?php echo get_the_content(); ?></p>

			<a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>

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
			
			<h4 class="contact--careers--header"><?php the_field('title'); ?></h4>

			<p class="text-emphasis"><?php the_field('subtitle'); ?></p>

			<p><?php the_field('text'); ?></p>

		</div>

	</div>
	
</main>

<?php
get_footer();
?>