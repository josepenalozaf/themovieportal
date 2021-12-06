<?php
namespace App\Core\Translation;

if ( ! function_exists( __NAMESPACE__ . '\init' ) ) {
  function init() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on The Movie Portal, use a find and replace
		 * to change 'site_content' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'site_content', get_template_directory() . '/languages' );
  }
}
