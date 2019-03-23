<?php get_header(); ?>
<div class="full-width--content">
				<article>
					<h1>Carrots!</h1>
					<div itemprop="articlebody" class="post-content">
						<p>Somebunny ate this page! If you feel this is in error, email us at <strong>bug@crunchyfamily.com</strong>.</p>
						<p>Alternatively, you can use the search form below.</p>
						<?php get_search_form(); ?>
						<h2>Last 10 posts</h2>
							<ul>
								<?php wp_get_archives('type=postbypost&limit=10'); ?>
							</ul>
						<h2>Popular topics</h2>
							<?php 
								$args = array(
									'taxonomy' => array( 'post_tag', 'category' ), 
									'smallest' => '12',
									'largest' => '26',
								); 

								wp_tag_cloud( $args );
							?>
					</div>
				</article>
</div>
<?php get_footer(); ?>
