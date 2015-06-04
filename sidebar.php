			<aside class="sidebar">

				<h4>Topics</h4>
				
				<ul class="link-list linked">
				<?php
				$args = array(
					'title_li' => '',
					'hide_empty' => 0
				);

				$list = get_the_category_list();
				$list = str_replace('</a>', '<span class="link-list--corner"></span></a>', $list);

				echo $list;

				?>
				</ul>

			</aside>
