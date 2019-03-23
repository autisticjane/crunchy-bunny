<?php get_header();
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="full-width--content">
				<article itemscope itemtype="http://schema.org/Article">
					<meta itemprop="mainEntityOfPage" itemscope itemType="https://schema.org/WebPage">
					<h1 itemprop="headline"><?php echo the_title(); ?></h1>
 <?php get_template_part( 'page-meta' ); ?>
					<div itemprop="articlebody" class="post-content">
						<?php the_content(); ?>
						<?php edit_post_link(__('<p>[Edit]</p>'), ''); ?>
					</div>
				</article>
<?php endwhile;
else :
endif; ?>
</div>
<?php get_footer(); ?>
