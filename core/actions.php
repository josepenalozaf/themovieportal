<?php
namespace App\Core\Actions;

require_once get_template_directory() . '/core/definitions.php';
require_once get_template_directory() . '/core/translation.php';
require_once get_template_directory() . '/core/supports.php';
require_once get_template_directory() . '/core/navigation.php';
require_once get_template_directory() . '/core/sidebars.php';
require_once get_template_directory() . '/core/resources.php';
require_once get_template_directory() . '/core/filters.php';

add_action( 'after_setup_theme', '\App\Core\Translation\init' );
add_action( 'after_setup_theme', '\App\Core\Supports\init' );
add_action( 'after_setup_theme', '\App\Core\Navigation\init' );
add_action( 'after_setup_theme', '\App\Core\Filters\contentWidth', 0 );
add_action( 'widgets_init', '\App\Core\Sidebars\init' );
add_action( 'wp_enqueue_scripts', '\App\Core\Resources\enqueue' );
