<div class="post__author author-description">
	<h2>Author: <?php the_author(); ?> <span>(<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">all posts</a>)</span></h2>
		<div class="alignright author-photo">
			<?php
				$author_bio_avatar_size = apply_filters( 'twentysixteen_author_bio_avatar_size', 100 );
				echo get_avatar( get_the_author_meta( 'ID' ), $author_bio_avatar_size );
			?>
		</div>
	<p class="author-bio">
		<?php echo get_the_author_meta('description'); ?>
	</p>
</div>