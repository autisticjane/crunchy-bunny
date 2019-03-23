					<meta itemprop="author" content="<?php the_author(); ?>">
					<meta itemprop="datePublished" content="<?php echo get_the_date('Y-m-d') . 'T' . get_the_date('H:iP'); ?>">
					<meta itemprop="dateModified" content="<?php echo get_the_modified_date('Y-m-d') . 'T' . get_the_modified_date('H:iP'); ?>">
					<?php image_url_meta(); ?>
					<meta itemprop="inLanguage" content="en">
					<meta itemprop="copyrightYear" content="<?php the_time('Y'); ?>">
					<meta itemprop="url" content="<?php echo get_permalink(); ?>">
					<meta itemprop="wordCount" content="<?php echo wordcount(); ?>">
