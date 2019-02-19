<?php
	// Poop emoji to anyone who tries to view this directly
		if ( !function_exists( 'add_action' ) ) {
			echo '&#128169;';
			exit;
		}
	// Cloak emails [cloak email=you@domain.ext]
		function email_cloaking_shortcode( $atts ) {
			$atts = shortcode_atts(
				array(
					'email' => '',
				),
				$atts,
				'cloak'
			);
			return antispambot( $atts['email'] );
		}
		add_shortcode( 'cloak', 'email_cloaking_shortcode' );
	// Change default WordPress email address name to site name
		add_filter('wp_mail_from_name', 'new_mail_from_name');
			function new_mail_from_name($old) {
			return 'Crunchy Family';
		}
	// Custom login CSS
		function my_login_css() {       
			wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/styles/custom-login.css' );       
		}       
		add_action( 'login_enqueue_scripts', 'my_login_css' );      
		function my_login_logo_url() {      
			return get_bloginfo( 'url' );       
		}       
		add_filter( 'login_headerurl', 'my_login_logo_url' );       
		function my_login_logo_url_title() {        
			return 'Crunchy Family';     
		}       
		add_filter( 'login_headertitle', 'my_login_logo_url_title' );
	// Custom visual editor
		function visual_editor_style($url) {
			if ( !empty($url) )
			$url .= ',';
			$url .= trailingslashit( get_stylesheet_directory_uri() ) . '/styles/vised.css';
			return $url;
		}
		add_filter('mce_css', 'visual_editor_style');
	// Disables theme & plugin editors
		define( 'DISALLOW_FILE_EDIT', true );
	// Registers menus
		function register_my_menu() {
			register_nav_menu(
				array(
					'main-navigation' => __( 'Main navigation' ),
					'footer-navigation' => __( 'Footer navigation' )
				)
			)
		}
		add_action( 'init', 'register_my_menu' );
	// Thumbnails
	    if ( function_exists( 'add_theme_support' ) ) {
			add_theme_support( 'post-thumbnails' );
			set_post_thumbnail_size( 150, 150, false );
		}
	// Get first image; from hey.georgie.nu
		function getfirstimage() {
			global $post, $posts;
			$first_img = '';
			ob_start();
			ob_end_clean();
			$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
			$first_img = $matches [1] [0];

			if(empty($first_img)){
				$first_img =  'https://janepedia.com/img/default.jpg';
			}
			return $first_img;
		}
	// Social cards from Avocado plugin by hey.georgie.nu
		function twitter_cards(){

			if ( have_posts() ) : while ( have_posts() ) : the_post();
			endwhile;
			endif;

			$title = single_post_title( '', FALSE );
			$url = get_permalink();
			$user = gotjane;

			if (is_single() || is_page() ) {
				$description = strip_tags( get_the_excerpt($post->ID) );
				$description = substr( $description, 0, 200 );

				if ( has_post_thumbnail() ) {
					$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				} else {
					$image = getfirstimage();
				}

				echo '<meta name="twitter:card" content="summary_large_image">
					  <meta name="twitter:site" content="@' . $user . '">
					  <meta name="twitter:creator" content="@' . $user . '">
					  <meta name="twitter:url" property="og:url" content="' . $url . '">
					  <meta name="twitter:title" property="og:title" content="' . $title . '">
					  <meta name="twitter:description" property="og:description" content="' . $description. '">
					  <meta name="twitter:image" property="og:image" content="' . $image . '">
					  <meta property="og:type" content="article">';

			} else {
				$sitename = get_bloginfo('name');
				$description = get_bloginfo('description');
				$url = get_bloginfo('url');

				echo '<meta name="twitter:card" content="summary">
					  <meta name="twitter:site" content="@' . $user. '">
					  <meta name="twitter:creator" content="@' . $user . '">
					  <meta name="twitter:url" property="og:url" content="' . $url . '">
					  <meta name="twitter:title" property="og:title" content="' . $sitename. '">
					  <meta name="twitter:description" property="og:description" content="' . $description . '">
					  <meta name="twitter:image" property="og:image" content="https://janepedia.com/img/default.jpg">
					  <meta property="og:type" content="website">';
			}
		}
	//	 Word count
		function wordcount() {
			ob_start();
			the_content();
			$postcontent = ob_get_clean();
			return sizeof(explode(" ", $postcontent));
		}
?>