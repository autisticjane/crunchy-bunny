			<aside class="sidebar">
    <?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
        <?php dynamic_sidebar( 'right-sidebar' ); ?>
    <?php else : ?>
				<div class="sidebar-item">
					<div class="aligncenter"><img src="https://via.placeholder.com/350" class="hexagon"></div>
					<p>Crunchy Family is a lifestyle blog focused on the varied spectrum of a crunchy life and run by a crunchy family.</p>
				</div>
				<div class="sidebar-item">
					<h2>Search</h2>
					<p>search form [go]</p>
				</div>
				<div class="sidebar-item">
					<h2>Recommended</h2>
					<img src="https://via.placeholder.com/350">
				</div>
<?php endif; ?>
			</aside>
			