<?php
namespace App\Core\Navigation;

if ( ! function_exists( __NAMESPACE__ . '\init' ) ) {
  function init() {
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'site' ),
			)
		);
  }
}
