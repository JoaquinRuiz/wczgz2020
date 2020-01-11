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

// WordCamp Custom Post
add_action('init', 'wordcamps_cpt');
function wordcamps_cpt()
{
  $args = array(
    'public'       => true,
    'show_in_rest' => true,
    'label'        => 'Wordcamps'
  );
  register_post_type('wordcamp', $args);
}

// ACF WordCamp Custom REST API
function  add_acf_wordcamps($request_data)
{
  $args = array(
    'post_type' => 'wordcamp',
    'posts_per_page' => -1,
    'numberposts' => -1
  );
  $posts = get_posts($args);
  foreach ($posts as $key => $post) {
    $posts[$key]->acf = get_fields($post->ID);
  }
  return  $posts;
}

function get_wordcamp_check($request)
{
  return current_user_can('edit_posts');
}

add_action('rest_api_init', function () {
  register_rest_route('acf/v1', '/wordcamp/', array(
    'methods' => 'GET',
    'callback' => 'add_acf_wordcamps',
    'permission_callback' => 'get_wordcamp_check',
  ));
});


// Add prev / next to WP REST API
add_filter('rest_prepare_post', function ($response, $post, $request) {
  global $post;
  $next = get_adjacent_post(false, '', false);
  $previous = get_adjacent_post(false, '', true);
  $response->data['next'] = (is_a($next, 'WP_Post')) ? array("id" => $next->ID, "slug" => $next->post_name) : null;
  $response->data['previous'] = (is_a($previous, 'WP_Post')) ? array("id" => $previous->ID, "slug" => $previous->post_name) : null;

  return $response;
}, 10, 3);
