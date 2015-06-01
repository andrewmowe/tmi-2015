<?php
get_header();

the_post();
?>

	<main role="main">

		<div class="container">

			<div class="entry text">

				<header>
					
					<h2><?php the_title(); ?></h2>

					<span class="byline"><?php the_field( 'subheadline' ); ?></span>

					<span class="h4"><?php the_date(); ?> | <?php echo get_the_category_list( ', ' ); ?></span>

				</header>
			
				<?php the_post_thumbnail( 'medium' ); ?>	

				<?php the_content(); ?>

			</div>

			<?php get_sidebar(); ?>

		</div>

	</main>
		
<?php
get_footer();
?>