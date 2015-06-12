<?php
/*
Template Name: Press
*/
get_header();
?>

	<main role="main" class="has-subheading">

		<header class="subheading">

			<div class="container">
				
				<h1 class="h2"><?php the_field( 'headline' ); ?></h1>

				<div class="backslash"></div>

				<span><?php the_field( 'subheadline' ); ?></span>

			</div>

		</header>

	<?php
	$img = get_field( 'image' );
	$title = get_field( 'custom_title' );
	$content = get_field( 'content' );
	?>
		
		<section class="memberships secondary-section">

			
			<div class="container">
				<h3><?php the_title(); ?></h3>
				<div>
					<?php if(get_field('memberships')) $rows = get_field('memberships'); foreach($rows as $row) { ?>
	            
		            <?php 

		        		$attachment_id = $row['logo'];
						$size = "thumbnail"; // (thumbnail, medium, large, full or custom size)
						$image = wp_get_attachment_image_src( $attachment_id, $size );
						$size = "full"; // (thumbnail, medium, large, full or custom size)
						$bigimage = wp_get_attachment_image_src( $attachment_id, $size );


		            	if($row['link']){

							?>
								<a href="<?php echo $row['link']; ?>" class="member--thumb">
									<img src="<?php echo $image[0]; ?>" alt="<?php echo $row['title']; ?>" >
								</a>
					    	<?php

		            	}else{

							?>
								<div class="member--thumb">
									<img src="<?php echo $image[0]; ?>" alt="<?php echo $row['title']; ?>">
								</div>					 
					    	<?php

		            	}?>
					<?php }  ?>
				</div>
			</div> 


		</section>
		<section class="memberships secondary-section">

			<div class="container">

				<?php
				$args = array(
					'name' => 'press',
					'post_type' => 'page'
				);

				$query = new WP_Query( $args );

				if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
				?>
				<h3><?php the_title(); ?></h3>
				<div>

					<?php if(get_field('press')) $rows = get_field('press'); foreach($rows as $row) { ?>
					<div class="press--thumb">
			            <?php if($row['link']) { 
			            	echo '<h4 class="press--title"><a href="'.$row['link'].'">'; 
			            	if($row['p_title']) { echo $row['p_title']; }else{ echo "full article"; } 
			            	echo "</a></h4>";
			            }else{ ?>
				            <h4 class="press--title"><?php if($row['p_title']) echo $row['p_title']; ?></h4>
			            <?php } ?>
			            <?php if($row['source']) echo '<p class="press--subtitle">'.$row['source'].'</p>'; ?>
			        	<?php if($row['date']) echo '<p class="press--date">'.$row['date'].'</p>';	?>
			        	<div class="text">
			                <?php if($row['entry']) echo $row['entry']; ?>
			            </div>
					</div>
					<?php }  ?>

				</div>

				<?php
				endwhile;

				endif;

				wp_reset_postdata();
				?>
				

			</div>

		</section>
		<section class="memberships secondary-section">

			
			<div class="container">


				<?php
				$args = array(
					'name' => 'awards',
					'post_type' => 'page'
				);

				$query = new WP_Query( $args );

				if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
				?>
				<h3><?php the_title(); ?></h3>
				<div>
					<?php if(get_field('awards')) $rows = get_field('awards'); foreach($rows as $row) { ?>
	            
		            <?php 

		        		$attachment_id = $row['image'];
						$size = "thumbnail"; // (thumbnail, medium, large, full or custom size)
						$image = wp_get_attachment_image_src( $attachment_id, $size );
						$size = "full"; // (thumbnail, medium, large, full or custom size)
						$bigimage = wp_get_attachment_image_src( $attachment_id, $size );


		            	if($row['link']){

							?>
								<a href="<?php echo $row['link']; ?>" class="member--thumb">
									<img src="<?php echo $image[0]; ?>" alt="<?php echo $row['award_title']; ?>" >
								</a>
					    	<?php

		            	}else{

							?>
								<div class="member--thumb">
									<img src="<?php echo $image[0]; ?>" alt="<?php echo $row['award_title']; ?>">
								</div>					 
					    	<?php

		            	}?>
					<?php }  ?>
				</div>
				
				<?php
				endwhile;

				endif;

				wp_reset_postdata();
				?>
			</div> 


		</section>

	</main>

<?php
get_footer();