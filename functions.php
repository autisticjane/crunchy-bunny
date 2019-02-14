<?php
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