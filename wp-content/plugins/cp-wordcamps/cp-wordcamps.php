<?php

/*
Plugin Name: Custom Post Wordcamps
Plugin URI: https://jokiruiz.com/
Description: Custom Post Wordcamps
Version: 0.0.1
Author: JokiRuiz
Author URI: https://jokiruiz.com/
License: GPLv2 or later
Text Domain: jokiruiz
*/

add_action( 'init', 'wordcamps_cpt' );
function wordcamps_cpt() {
    $args = array(
      'public'       => true,
      'show_in_rest' => true,
      'label'        => 'Wordcamps'
    );
    register_post_type( 'wordcamp', $args );
}