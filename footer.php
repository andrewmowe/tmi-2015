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

				<p>Stay informed on topics of diversity and inclusion in the workplace. Sign up for our quarterly-ish newsletter.</p>

				<!-- Begin MailChimp Signup Form -->
				<div id="mc_embed_signup">
				<form action="//tmiconsultinginc.us11.list-manage.com/subscribe/post?u=fc6dee560aebbee21d9c670a3&amp;id=edb83fca2a" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate newsletter cf" target="_blank" novalidate>
					<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Your email address..." required>
				    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
				    <div style="position: absolute; left: -5000px;"><input type="text" name="b_fc6dee560aebbee21d9c670a3_edb83fca2a" tabindex="-1" value=""></div>
				    <input type="submit" value="Sign Up" name="signup" id="mc-embedded-subscribe" class="footer--btn">
				</form>
				</div>

				<!--End mc_embed_signup-->

			</div>
			<div class="footer--bcorp">
				<a href="https://www.bcorporation.net/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/b-corp-logo.png" alt="B Corp logo" class="logo"></a>
			</div>
		</div>
		<div class="sub-footer">
			<div class="container">
				<span class="copyright">&copy; 2015 TMI Consulting Inc / site by <a href="http://team-eight.com">Team Eight</a></span>
				<div class="icons social-list cf">
					<a href="http://www.linkedin.com/company/tmi-consulting-inc" class="icon-linkedin"></a>
					<a href="https://www.facebook.com/tmiconsulting" class="icon-facebook"></a>
					<a href="https://twitter.com/tmi_consulting" class="icon-twitter"></a>
				</div>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
	</body>
</html>