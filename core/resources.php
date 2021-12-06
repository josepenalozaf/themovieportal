<?php
namespace App\Core\Resources;

if ( ! function_exists( __NAMESPACE__ . '\enqueue' ) ) {
  /**
   * Enqueue scripts and styles.
   */
  function enqueue() {
    wp_enqueue_style( 'site-style', get_stylesheet_directory_uri(). '/css/style.css', array(), _S_VERSION );
    wp_style_add_data( 'site-style', 'rtl', 'replace' );

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'site-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'site-scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), _S_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }
  }
}
