<?php get_header(); ?>
	<h1><?php single_cat_title(); ?></h1>
	<?php
            if ( category_description() ) :
                echo category_description();
            else :
        ?>
            <p>You are currently viewing the <strong><?php single_cat_title(); ?></strong> tag. This tag lacks a fancy description, probably because:</p>
            <ul>
                <li>It doesn't need one because it's self-explanatory.</li>
                <li>We haven't gotten around to it yet because it's new.</li>
            </ul>
<?php endif; ?>
	<div class="post--box">
	<?php if ( have_posts() ) :
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
