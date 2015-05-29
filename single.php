<?php
get_header();

the_post();
?>

	<main role="main">

		<div class="container">

			<div class="entry">

				<header>
					
					<h2><?php the_title(); ?></h2>

					<span><?php the_field( 'subheadline' ); ?></span>

					<span class="h4"><?php the_date(); ?> | <?php echo get_the_category_list( ', ' ); ?></span>

				</header>
			
				<?php the_content(); ?>

				<?php the_post_thumbnail( 'medium' ); ?>	

			</div>

			<aside class="text">

				<h4>Topics</h4>
				
				<?php wp_list_categories( array( 'title_li' => '' ) ); ?>

			</aside>

		</div>

	</main>
		
<?php
get_footer();
?>