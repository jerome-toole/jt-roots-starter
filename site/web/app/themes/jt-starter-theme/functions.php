<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

function year_shortcode() {
  $year = date('Y');
  return $year;
}
add_shortcode('year', 'year_shortcode');

add_filter('widget_text', 'do_shortcode');


function addto_query() {
  global $wp_query;
     // When inside a custom taxonomy archive include attachments
     if ( is_tax( 'attachment_tag' ) ) {
         $wp_query->query_vars['post_type'] =  array( 'attachment' );
         $wp_query->query_vars['post_status'] =  array( null );

        return $wp_query;
    }
}
add_action('parse_query', 'addto_query');
