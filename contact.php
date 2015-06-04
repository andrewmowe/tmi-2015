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
		<div class="hero--cta text cf">
			<p class="h3"><?php the_field('address'); ?></p>
			<a class="contact--email" href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
			<span>phone: <?php the_field('phone'); ?></span>
			<span>fax: <?php the_field('fax'); ?></span>
			<div class="icons social-list cf">
				<a href="http://www.linkedin.com/company/tmi-consulting-inc" class="icon-linkedin"></a>
				<a href="https://www.facebook.com/tmiconsulting" class="icon-facebook"></a>
				<a href="https://twitter.com/tmi_consulting" class="icon-twitter"></a>
			</div>
		</div>
	</div>

</div>

<main role="main" class="has-hero">

	<div class="container">
		
		<div class="contact--intro text">

			<?php the_content(); ?>

		</div>

		<div class="contact--main">
			
			<?php gravity_form(1, false, false); ?>

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