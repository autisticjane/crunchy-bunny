<?php get_header();
global $wp_query;
$curauth = $wp_query->get_queried_object();
?>
		<h1 rel="name"><?php echo $curauth->nickname; ?></h1>
		<div class="alignright author-photo">
			<?php
				$author_bio_avatar_size = apply_filters( 'twentysixteen_author_bio_avatar_size', 175 );
				echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
			?>
		</div>
		<h2 class="subtitle"><?php if ($curauth->ID == '2') { echo "Founder"; } elseif ($curauth->ID == '12') { echo "Editor"; } else { echo "Contributor"; } ?></h2>
		<p class="author-bio"><?php echo $curauth->description; ?></p>
			<nav class="author-social">
				<ul>
					<?php if ( $curauth->user_url ) { ?><li><a href="<?php echo $curauth->user_url; ?>" target="_blank">Website</a></li><?php } ?>
					<?php if ( $curauth->facebook ) { ?><li><a href="<?php echo get_user_meta($curauth->ID,'facebook',true);?>" target="_blank">Facebook</a></li><?php } ?>
					<?php if ( $curauth->instagram ) { ?><li><a href="<?php echo get_user_meta($curauth->ID,'instagram',true);?>" target="_blank">Instagram</a></li><?php } ?>
					<?php if ( $curauth->pinterest ) { ?><li><a href="<?php echo get_user_meta($curauth->ID,'pinterest',true);?>" target="_blank">Pinterest</a></li><?php } ?>
					<?php if ( $curauth->twitter ) { ?><li><a href="<?php echo get_user_meta($curauth->ID,'twitter',true);?>" target="_blank">Twitter</a></li><?php } ?>
				</ul>
			</nav>
	<?php if ( have_posts() ) : ?>
	<h2>Previous posts</h2>
	<div class="post--box">
	<?php
	$postCount = 0;
	while ( have_posts() ) :
	the_post();
	$image = get_first_image();
	$postCount++;
	?>
		<article class="post--listing" itemscope itemtype="http://schema.org/BlogPosting">
			<img src="<?php echo $image; ?>" alt="Featured image for <?php echo the_title(); ?>">
			<h2 itemprop="name"><a href="<?php echo get_permalink(); ?>" rel="bookmark" itemprop="url"><?php echo the_title(); ?></a></h2>
			<time aria-label="Time stamp of blog post" datetime="<?php echo get_the_date('Y-m-d'); ?>T<?php echo get_the_date('H:iP'); ?>" itemprop="datePublished"><?php
		if ( $postCount == 1 && !is_paged() ) :
				echo 'Latest post</time>';
		else :
				echo the_time('n.d.y');
?></time><?php endif; ?>
			
			<meta itemprop="author" content="<?php the_author(); ?>">
			<meta itemprop="inLanguage" content="en">
			<meta itemprop="copyrightYear" content="<?php the_time('Y'); ?>">
			<meta itemprop="commentCount" content="<?php echo get_comments_number(); ?>">
			<meta itemprop="url" content="<?php echo get_permalink(); ?>">
			<meta itemprop="wordCount" content="<?php echo wordcount(); ?>">
		</article>

<?php endwhile; ?>
	</div><!-- post--box -->
		<?php if (get_next_posts_link() || get_previous_posts_link()) :
			echo '<nav class="pagination">';
			next_posts_link('Older posts &raquo;');
			previous_posts_link('&laquo; Newer posts');
			echo '</nav>';
	endif;
    endif; ?>
		</div><!-- body__main -->
	</section>
<?php
    get_footer();
?>
