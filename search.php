<?php get_header(); ?>
	<?php
		$posts=query_posts($query_string . '&posts_per_page=18&order=DESC&orderby=date');
		if ( have_posts() ) :
	?>
		<h1>Search results</h1>
		<p>Your search for <mark><?php echo wp_specialchars($s); ?></mark> returned the following results. Results are displayed newest first.</p>
		<div class="post--box">
	<?php
		while (have_posts()) : the_post();
		$image = get_first_image();
		$postCount++; ?>
		<article class="post--listing" itemscope itemtype="http://schema.org/BlogPosting">
			<img src="<?php echo $image; ?>" alt="Featured image for <?php echo the_title(); ?>">
			<h2 itemprop="name"><a href="<?php echo get_permalink(); ?>" rel="bookmark" itemprop="url"><?php echo the_title(); ?></a></h2>
			<span>by <?php the_author(); ?></span>
		</article>

	<?php
		endwhile;
	?>
		</div>
	<?php
		if (get_next_posts_link() || get_previous_posts_link()) :
		echo '<nav class="pagination">';
		next_posts_link('Older posts &raquo;');
		previous_posts_link('Newer posts&laquo;');
		echo '</nav>';
		endif;
		else :
	?>
		<h1>You searched for <mark><?php echo wp_specialchars($s); ?></mark>&hellip;</h1>
		<p>Apologies! <mark><?php echo wp_specialchars($s); ?></mark> did not return any search results at this time.</p>
<?php endif; ?>
<?php
get_footer(); ?>