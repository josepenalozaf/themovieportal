<?php
namespace App\Core\Sidebars;

if ( ! function_exists( __NAMESPACE__ . '\init' ) ) {
  /**
   * Register widget area.
   *
   * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
   */
  function init() {
    register_sidebar(
      array(
        'name'          => esc_html__( 'Sidebar', 'site' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'site' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
      )
    );
  }
}
