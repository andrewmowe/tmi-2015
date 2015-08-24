<?php
get_header();

the_post();

$post_nom = get_field('post-noms');
if ( isset($post_nom )  && !empty( $post_nom ) ) $post_nom = ', <span class="post-nom">'.$post_nom.'</span>';
$img = get_field('wide_img');
$position = get_field('position');
$first_name = get_field('first_name');
$f_name = get_the_title();
if ( isset($first_name )  && !empty( $first_name ) ) $f_name = $first_name;
$email = get_field('email');
$awards = get_field('awards', false, false );
$certs = get_field('certs', false, false );
$talks = get_field('talks', false, false );

$is_speaker = $is_family = 0;
if( has_term( 'speaker', 'status' ) ) $is_speaker = 1;
if( has_term( 'show-on-family', 'status' ) ) $is_family = 1;

?>

	<main role="main">

		<section class="family--single container">
			
			<?php 

			if($img){

				echo '<div class="sliced-img family--portrait">';

				echo wp_get_attachment_image( $img, 'full' ); 

				echo '</div>';

			} else {
				echo '<div class="sliced-img family--portrait tall">';
				the_post_thumbnail( 'family-thumb' );
				echo '</div>';
			}
			?>

			</div>

			<div class="family--content">
				
				<header class="family--header text">
					
					<h1 class="h3"><?php the_title(); ?><?php echo $post_nom; ?></h1>

					<?php if( isset( $position ) && !empty( $position ) ) : ?>

						<h4><?php echo $position ; ?></h4>

					<?php endif; ?>

					<?php if( isset( $email ) && !empty( $email ) ) : ?>

						<a href="mailto:<?php echo esc_html( $email ); ?>" target="_blank" class="email"><?php echo esc_html( $email ); ?></a>

					<?php endif; ?>

				</header>

				<div class="family--the-content">

				<?php the_content(); ?>

				</div>

				<?php if( has_term( 'speaker', 'status' ) ) {
					$booktext = "Book ". $f_name . " as a speaker";

					echo '<div class="speaker-content">';
				    echo do_shortcode( '[button link="/contact/" class="basic"]' . $booktext . '[/button]' );
				    echo '</div>';
				} ?>

			</div>

			<div class="family--info text">

				<?php if( isset( $awards ) && !empty( $awards ) ) : ?>

					<?php echo $awards; ?>

				<?php endif; ?>

			</div>

		</section>

		<?php 
			if($is_speaker && !$is_family){ 
				get_template_part( 'partials/speakers', 'list' ); 
			} else {
				get_template_part( 'partials/family', 'list' ); 
			}
		?>

	</main>

<?php
get_footer();
?>