<?php get_header();
// Set the Current Author Variable $curauth
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>
	<section>
		<h1 rel="name"><?php echo $curauth->nickname; ?></h1>
			<h2 class="subtitle"><?php echo get_user_meta($curauth->ID,'status',true);?></h2>
				<div class="alignright">
					<img src="<?php echo get_avatar( $curauth->user_email , '150 '); ?>" class="hexagon">
				</div>
				<p class="author-bio">
					<?php echo (get_the_author_meta('description')); ?>
				</p>
				<nav class="author-social">
					<ul>
						<li><a href="<?php echo $curauth->user_url; ?>" target="_blank">Website</a></li>
						<li><a href="<?php echo get_user_meta($curauth->ID,'facebook',true);?>" target="_blank">Facebook</a></li>
						<li><a href="<?php echo get_user_meta($curauth->ID,'instagram',true);?>" target="_blank">Instagram</a></li>
						<li><a href="<?php echo get_user_meta($curauth->ID,'pinterest',true);?>" target="_blank">Pinterest</a></li>
						<li><a href="<?php echo get_user_meta($curauth->ID,'twitter',true);?>" target="_blank">Twitter</a></li>
					</ul>
				</nav>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article class="post--listing" itemscope itemtype="http://schema.org/BlogPosting">
			<img src="<?php echo get_first_image(); ?>">
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
	endif;
	get_footer();
	?>
