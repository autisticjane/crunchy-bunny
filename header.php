<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="<?php meta_desc(); ?>">
        <meta name="viewport" content="initial-scale=1.0, width=device-width">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="dns-prefetch" href="https://crunchyfamily.com/wp-content/uploads/">
        <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
		<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/img/fav.ico">
		<!-- Stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Merriweather|Poppins:700,700i" rel="stylesheet">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.min.css?<?php echo date('Ymd', filemtime( get_stylesheet_directory() . '/style.min.css' )); ?>" type="text/css" media="screen">
		<!-- Feeds -->
        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>">
        <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>">
		<!-- WordPress -->
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
        <?php wp_head(); ?>
		<!-- Meta verification -->
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta name="google-site-verification" content="">
		<meta name="alexaVerifyID" content="">
		<meta name='p:domain_verify' content="">
		<meta property="twitter:account_id" content="4503599628083684">
		<meta name="myLPA-verification" content="" />
		<meta name="ir-site-verification-token" value="" />
    </head>
    <body <?php body_class(); ?>>
        <header role="banner" class="site--header">
            <h1 class="title"><a href="<?php echo site_url(); ?>" class="main-navigation__link"><?php bloginfo('name'); ?></a></h1>
            <nav role="navigation" class="main-navigation">
				<?php wp_nav_menu(
					array $args = array(
						'menu'              => "Main navigation", // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
						'container'         => "nav", // (string) Whether to wrap the ul, and what to wrap it with. Default 'div'.
						'container_class'   => "menu-header", // (string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
						'fallback_cb'       => "", // (callable|bool) If the menu doesn't exists, a callback function will fire. Default is 'wp_page_menu'. Set to false for no fallback.
						'theme_location'    => "main-navigation", // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
						'items_wrap'        => "", // (string) How the list items should be wrapped. Default is a ul with an id and class. Uses printf() format with numbered placeholders.
						'item_spacing'      => "", // (string) Whether to preserve whitespace within the menu's HTML. Accepts 'preserve' or 'discard'. Default 'preserve'.
					)
				);
				?>
            </nav>
			<aside class="search-form-wrapper">
					<?php get_search_form(); ?>
			</aside>
        </header>
        <div class="body__main">
            <main class="main-shit">