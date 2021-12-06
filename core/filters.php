<?php
namespace App\Core\Filters;

if ( ! function_exists( __NAMESPACE__ . '\contentWidth' ) ) {
  /**
   * Set the content width in pixels, based on the theme's design and stylesheet.
   *
   * Priority 0 to make it available to lower priority callbacks.
   *
   * @global int $content_width
   */
  function contentWidth() {
    $GLOBALS['content_width'] = apply_filters( 'site_content_content_width', 640 );
  }
}
