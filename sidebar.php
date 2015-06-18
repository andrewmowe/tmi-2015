			<aside class="sidebar">

				<h4>Topics</h4>
				
				<ul class="link-list linked">
				<?php
				$cats = get_categories();
				foreach( $cats as $cat ) { ?>
					<li><a href="<?php echo get_category_link( $cat->term_id ); ?>"><?php echo $cat->name; ?><span class="link-list--corner"></span></a>
				<?php
				}
				?>
				</ul>

			</aside>
