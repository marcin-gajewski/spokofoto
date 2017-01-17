<?php
/**
 * Enqueue scripts and styles.
 */
function gulp_wordpress_scripts() {
  wp_enqueue_style( 'gulp-wordpress-style', get_stylesheet_uri() );

  wp_enqueue_script( 'gulp-wordpress-javascript', get_template_directory_uri() . '/js/app.min.js', array(), '20151215', true );
}
add_action( 'wp_enqueue_scripts', 'gulp_wordpress_scripts' );


// add post thumbnails
add_theme_support( 'post-thumbnails' );
// add shortcodes to text widgets
add_filter('widget_text', 'do_shortcode');
// Register widget area
if (!function_exists('gulp_wordpress_sidebar_widgets')) :
function gulp_wordpress_sidebar_widgets() {
 register_sidebar(array(
     'id' => 'logo-carousel',
     'name' => __('Rotator logo', 'gulp_wordpress'),
     'description' => __('Drag widgets', 'gulp_wordpress'),
     'before_widget' => '<div id="%1$s" class="%2$s">',
     'after_widget' => '</div>',
     'before_title' => '<h3>',
     'after_title' => '</h3>'
 ));
}
// widgets init
add_action( 'widgets_init', 'gulp_wordpress_sidebar_widgets' );
endif;
// Register menu
register_nav_menus( array(
  'primary-menu' => __('Menu główne'),
) );
?>
