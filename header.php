<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<meta name="viewport" content="initial-scale=1.0, width=device-width">
		<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
		<link rel="dns-prefetch" href="//fonts.googleapis.com/">
		<link rel="dns-prefetch" href="//crunchyfamily.com/wp-content/uploads/">
		<link href="https://fonts.googleapis.com/css?family=Merriweather|Poppins:700,700i" rel="stylesheet">
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/images/default.png">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php if ( is_singular() && get_option( 'thread_comments') ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header role="banner" class="site--header">
			<h1 class="title"><a href="<?php bloginfo('url'); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<nav role="navigation" class="main-navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
			</nav>
                <?php if (is_home() || is_category() || is_tag() || is_search() || is_archive() || is_page()) : ?>
               <aside class="full-sidebar">
					<?php get_search_form(); ?>
				</aside>
                <?php endif; ?>
		</header><!-- header -->
		<main id="content" class="body--main" role="main">
