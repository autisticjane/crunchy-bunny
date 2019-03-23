<?php get_header();
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="main-content">
				<article class="single-post-article" itemscope itemtype="http://schema.org/BlogPosting">
					<meta itemprop="mainEntityOfPage" itemscope itemType="https://schema.org/WebPage">
					<h1 itemprop="name"><?php echo the_title(); ?></h1>
 <?php get_template_part( 'single-meta' ); ?>
					<div itemprop="text" class="post-content">
						<?php the_content(); ?>
						<?php edit_post_link(__('<p>[Edit]</p>'), ''); ?>
						<?php get_template_part( 'author-box' ); ?>
					</div>
				</article>
<?php comments_template(); ?>
			</div>
<?php endwhile;
else :
endif; ?>
<?php get_sidebar();
get_footer(); ?>
