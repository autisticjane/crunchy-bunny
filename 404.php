<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1.0,width=device-width">
		<link rel="dns-prefetch" href="https://crunchyfamily.com/wp-content/uploads/">
		<title>Crunch! | 404 | Crunchy Family</title>
		<link href="https://fonts.googleapis.com/css?family=Poppins:400,700i" rel="stylesheet">
		<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/img/fav.ico">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/error.min.css?<?php echo date('Ymd', filemtime( get_stylesheet_directory() . '/error.min.css' )); ?>" type="text/css" media="screen">
	</head>
	<body>
		<div class="main">
			<h1>Crunch!</h1>
			<p>Some-bunny ate this page!<br />
			Use the search bar to find it or contact us if you feel this is in error.</p>
			<aside class="search-form-wrapper">
					<?php get_search_form(); ?>
			</aside>
		</div>
	</body>
</html>
