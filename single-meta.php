					<footer class="post__meta">
						<ul>
							<li><time aria-label="Time stamp of blog post" datetime="<?php echo get_the_date('Y-m-d'); ?>T<?php echo get_the_date('H:iP'); ?>" itemprop="datePublished"><?php echo the_time('F j, Y'); ?></time></li>
							<li itemprop="keywords"><?php the_category(', '); ?></li>
							<li>~<?php echo reading_time(); ?></li>
						</ul>
			<meta itemprop="author" content="<?php the_author(); ?>">
			<meta itemprop="inLanguage" content="en">
			<?php image_url_meta(); ?>
			<meta itemprop="copyrightYear" content="<?php the_time('Y'); ?>">
			<meta itemprop="commentCount" content="<?php echo get_comments_number(); ?>">
			<meta itemprop="url" content="<?php echo get_permalink(); ?>">
			<meta itemprop="wordCount" content="<?php echo wordcount(); ?>">
					</footer>
