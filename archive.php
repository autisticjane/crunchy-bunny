<?php
    get_header();
    if ( have_posts() ) : ?>
	<h1>Archive for <?php echo get_the_archive_title(); ?></h1>
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
			<time aria-label="Time stamp of blog post" datetime="<?php echo get_the_date('Y-m-d'); ?>T<?php echo get_the_date('H:iP'); ?>" itemprop="datePublished"><?php echo the_time('n.d.y'); ?></time>
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
