<?php
/**
* Template Name: Archive
* Template Post Type: page
* @package Crunchy Bunny
* @subpackage Crunchy Bunny
*/
get_header(); ?>
<div class="full-width--content">
<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article itemscope itemtype="http://schema.org/Article">
					<meta itemprop="mainEntityOfPage" itemscope itemType="https://schema.org/WebPage">
					<h1 itemprop="headline"><?php echo the_title(); ?></h1>
 <?php get_template_part( 'page-meta' ); ?>
					<div itemprop="articlebody" class="post-content">
						<?php the_content(); ?>
						<h2>Last 10 posts</h2>
						<ul>
							<?php wp_get_archives('type=postbypost&limit=10'); ?>
						</ul>
						<h2>Authors</h2>
						<ul>
							<?php wp_list_authors('optioncount=1'); ?>
						</ul>
						<h2>Archives by year</h2>
						<ul>
							<?php wp_get_archives('type=yearly'); ?>
						</ul>
						<h2>Archives by month</h2>
						<ul>
							<?php wp_get_archives('type=monthly'); ?>
						</ul>
						<h2>List of categories</h2>
						<ul>
							<?php wp_list_categories('title_li=&hierarchical=1'); ?>
						</ul>
					</div>
				</article>
<?php endwhile;
else :
endif; ?>
</div>
<?php get_footer(); ?>
