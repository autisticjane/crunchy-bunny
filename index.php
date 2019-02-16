<?php get_header(); ?>
	<section class="post--box">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article class="post--listing" itemscope itemtype="http://schema.org/BlogPosting">
			<img src="https://janepedia.com/wp-content/uploads/2018/12/selfie-12-07-2018.jpg">
			<h4 itemprop="name"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent link to <?php the_title(); ?>" itemprop="url"><?php the_title(); ?></a></h4>
				<span><time datetime="<?php the_time('Y-m-d'); ?>T<?php the_time('H:iP'); ?>" itemprop="datePublished"><?php the_time('n.d.y'); ?></time></span>
				<meta itemprop="author" content="<?php the_author(); ?>">
				<meta itemprop="inLanguage" content="en">
				<meta itemprop="copyrightYear" content="<?php the_time('Y'); ?>">
				<meta itemprop="commentCount" content="<?php echo get_comments_number(); ?>">
				<meta itemprop="thumbnailUrl" content="<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'large', true); echo $image_url[0]; ?>">
				<?php image_url_meta(); ?>
		</article>
	<?php endwhile; ?>
	</section>
	<?php
        if( get_next_posts_link() || get_previous_posts_link() ) {
            echo '<nav class="pagination">';
        }

        previous_posts_link('<span class="pagination__newer">&laquo; Newer posts</span>');
        next_posts_link('<span class="pagination__older">Older posts &raquo;</span>');

        if( get_next_posts_link() || get_previous_posts_link() ) {
            echo '</nav>';
        }
    else :
		_e( 'Sorry, no posts matched your criteria.', 'textdomain' );
	endif;
	get_sidebar();
	get_footer();
	?>
