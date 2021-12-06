<?php
namespace App\Core\Templates;

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
  require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
  require get_template_directory() . '/inc/woocommerce.php';
}

if ( ! function_exists( __NAMESPACE__ . '\getAll' ) ) {
  /**
   * Get all the possible templates for the current page
   *
   * @return void
   */
  function getAll() {
    $templates = [];
    $id = get_queried_object_id();
    $slug = get_queried_object() ? get_queried_object()->slug : '';

    if ( is_front_page() ) $templates[] = 'front-page';

    if ( class_exists( 'WooCommerce' ) ) {
      if ( is_woocommerce() ) {
        if ( is_shop() ) $templates[] = 'woocommerce-shop';
        elseif ( is_product() ) $templates[] = 'woocommerce-product';
        elseif ( is_product_category() ) $templates = array_merge( $templates, ["woocommerce-product-category-$slug", 'woocommerce-product-category'] );
        elseif ( is_product_tag() ) $templates = array_merge( $templates, ["woocommerce-product-tag-$slug", 'woocommerce-product-tag'] );
        elseif ( is_wc_endpoint_url() ) $templates[] = 'woocommerce-endpoint';
        $templates[] = 'woocommerce';
      }
      elseif ( is_cart() ) $templates = array_merge( $templates, ['woocommerce-cart', 'woocommerce'] );
      elseif ( is_checkout() ) $templates = array_merge( $templates, ['woocommerce-checkout', 'woocommerce'] );
      elseif ( is_account_page() ) $templates = array_merge( $templates, ['woocommerce-account-page', 'woocommerce'] );
    }
    elseif ( is_archive() ) {
      if ( is_author() ) $templates = array_merge( $templates, ['author-'.get_the_author_meta( 'user_nicename', $id ), "author-$id", 'author'] );
      elseif ( is_category() ) $templates = array_merge( $templates, ['category-'.get_category( $id )->slug, "category-$id", 'category'] );
      elseif ( is_tag() ) $templates = array_merge( $templates, ['tag-'.get_tag( $id )->slug, "tag-$id", 'tag'] );
      elseif ( is_date() ) {
        global $posts;
        extract( array_combine( ['year', 'month', 'day'], explode( ',', date( 'Y,m,d', strtotime( $posts[0]->post_date ) ), 3 ) ) );

        if ( is_year() ) $templates = array_merge( $templates, ["date-$year", 'date-year'] );
        if ( is_month() ) $templates = array_merge( $templates, ["date-$year-$month", 'date-month'] );
        if ( is_day() ) $templates = array_merge( $templates, ["date-$year-$month-$day", "date-$month-$day", 'date-day'] );
        if ( is_time() ) $templates[] = 'date-time';

        $templates[] = 'date';
      }
      elseif ( is_post_type_archive() ) {
        global $post_type;
        $templates = array_merge( $templates, ["archive-$post_type", 'custom-post-type'] );
      }
      elseif ( is_tax() ) {
        $term = get_term( $id );
        $templates = array_merge( $templates, ['taxonomy-'.$term->taxonomy.'-'.$term->slug, 'taxonomy-'.$term->taxonomy, 'taxonomy'] );
      }

      $templates[] = 'archive';
      if ( is_paged() ) $templates[] = 'paged';
    }
    elseif ( is_singular() ) {
      if ( is_single() ) {
        if ( is_attachment() ) {
          $mime_type = explode( '/', get_post_mime_type( $id ) );
          $templates = array_merge( $templates, ['attachment-'.$mime_type[0].'-'.$mime_type[1], 'attachment-'.$mime_type[0], 'attachment'] );
        }
        elseif ( is_singular( 'post' ) ) $templates[] = 'single-post';
        else {
          global $post_type;
          $templates[] = "single-$post_type";
        }

        $templates[] = 'single';
      }
      elseif ( is_page() ) {
        global $post;
        $templates = array_merge( $templates, ['page-'.$post->post_name, 'page-'.$post->ID, 'page'] );
      }

      $templates[] = 'singular';
    }
    elseif ( is_home() ) $templates = array_merge( $templates, ['home', 'archive'] );
    elseif ( is_search() ) $templates[] = 'search';
    elseif ( is_404() ) $templates[] = 'error-404';

    $templates[] = 'general';
    return $templates;
  }
}

if ( ! function_exists( __NAMESPACE__ . '\render' ) ) {
  /**
   * Render the proper template for the current page
   *
   * @return void
   */
  function render() {
    foreach ( namespace\getAll() as $template ) {
      if ( '' !== locate_template( "views/{$template}.php", true ) ) return ;
    }
  }
}

if ( ! function_exists( __NAMESPACE__ . '\show' ) ) {
  /**
   * Display a desired template
   *
   * @param string $template
   * @param string $name
   * @param string $context
   * @return void
   */
  function show( string $template, string $name = '', string $context = 'views' ) {
    if ( '' !== $name && '' !== locate_template( "{$context}/{$template}-{$name}.php", true ) ) return ;
    locate_template("{$context}/{$template}.php", true);
  }
}

if ( ! function_exists( __NAMESPACE__ . '\showHead' ) ) {
  /**
   * Display the head
   *
   * @param string $name
   * @return void
   */
  function showHead( string $name = '' ) {
    namespace\show( 'head', $name, 'layout' );
  }
}

if ( ! function_exists( __NAMESPACE__ . '\showHeader' ) ) {
  /**
   * Display the header
   *
   * @param string $name
   * @return void
   */
  function showHeader( string $name = '' ) {
    namespace\show( 'header', $name, 'layout' );
  }
}

if ( ! function_exists( __NAMESPACE__ . '\showFooter' ) ) {
  /**
   * Display the footer
   *
   * @param string $name
   * @return void
   */
  function showFooter( string $name = '' ) {
    namespace\show( 'footer', $name, 'layout' );
  }
}

if ( ! function_exists( __NAMESPACE__ . '\showFoot' ) ) {
  /**
   * Display the foot
   *
   * @param string $name
   * @return void
   */
  function showFoot( string $name = '' ) {
    namespace\show( 'foot', $name, 'layout' );
  }
}

if ( ! function_exists( __NAMESPACE__ . '\showSidebar' ) ) {
  /**
   * Display the sidebar
   *
   * @param string $name
   * @return void
   */
  function showSidebar( string $name = '' ) {
    namespace\show( 'sidebar', $name );
  }
}

if ( ! function_exists( __NAMESPACE__ . '\showComments' ) ) {
  /**
   * Display the comments
   *
   * @return void
   */
  function showComments() {
    comments_template('views/comments.php');
  }
}
