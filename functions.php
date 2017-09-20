<?php 

include_once get_template_directory().'/inc/function-class-walker.php';
/*
* Let WordPress manage the document title.
* By adding theme support, we declare that this theme does not use a
* hard-coded <title> tag in the document head, and expect WordPress to
* provide it for us.
*/
add_theme_support( 'title-tag' );

/* Enable support for Post Thumbnails on posts and pages. */
add_theme_support( 'post-thumbnails' );

/* This theme uses wp_nav_menu() in two locations. */
register_nav_menus( array(
  'top'    => 'Top Menu',
  'social' => 'Social Links Menu',
) );

/**
* Enqueue scripts and styles.
*/
function melexport_scripts() {
  wp_enqueue_style( 'PTSans', 'https://fonts.googleapis.com/css?family=PT+Sans:400,700', array() );
  wp_enqueue_style( 'Libre-bracode', 'http://fonts.googleapis.com/css?family=Libre+Barcode+39+Text', array() );
  wp_enqueue_style( 'uikit-style', get_theme_file_uri( '/composants/uikit/css/uikit.css' ), array(), '1.0' );
  // Theme stylesheet.
  wp_enqueue_style( 'melexport-style', get_stylesheet_uri() );
  wp_enqueue_script( 'uikit-js', get_theme_file_uri( '/composants/uikit/js/uikit.min.js' ), array( 'jquery'), '1.0' );
  wp_enqueue_script( 'uikit-icon-js', get_theme_file_uri( '/composants/uikit/js/uikit-icons.min.js' ), array( 'uikit-js'), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'melexport_scripts' );

/**
* Add Class (uk-active) for active and current menu item.
*
* @since David Calmel 1.0
*/
function uk_active_nav_class( $classes, $item ) {
  if ( in_array( 'current-menu-item', $classes ) ) {
    $classes[] = 'uk-active ';
  }

  return $classes;
}

add_filter( 'nav_menu_css_class', 'uk_active_nav_class', 10, 2 );