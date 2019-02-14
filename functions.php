<?php
// Cloak emails
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
?>