<?php
/**
 * The template for displaying the footer.
 *
 * @package TMI-2015
 * @since 0.1.0
 */
?>
	<footer class="footer" role="contentinfo">
		<div class="container">
			<div class="footer--logo">
				<a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/src/tmi-logo.svg" alt="TMI logo" class="logo"></a>
			</div>
			<div class="footer--contact-info">
				<p>213 E Grace Street, #101,<br>Richmond, Virginia 23219, USA</p>
				<p>tmi@tmiconsultinginc.com</p>
				<p>phone: 804.225.5537<br>fax: 804.205.1243</p>
			</div>
			<div class="footer--links">
				<?php
				$args = array(
					'theme_location'	=> 'footer',
					'container'			=> '',
					'after'				=> '<span class="link-list--corner"></span>',
					'items_wrap'		=> '<ul class="footer--link-list link-list">%3$s</ul>'
					);
				wp_nav_menu( $args ); ?>

				<p>Get in our heads on the topics of diversity and inclusion in the workplace. Sign up for our quarterly-ish newsletter.</p>

			    <form class="newsletter cf" name="newsletter" action="">
			        <input id="text" type="text" placeholder="Your name...">
				    <button class="footer--btn">Sign Up</button>
			    </form>

			</div>
		</div>
		<div class="sub-footer">
			<div class="container">
				<span class="copyright">&copy; 2015 TMI Consulting Inc / site by Team Eight</span>
				<div class="icons social-list cf">
					<a href="" class="icon-linkedin"></a>
					<a href="" class="icon-facebook"></a>
					<a href="" class="icon-twitter"></a>
				</div>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
	</body>
</html>