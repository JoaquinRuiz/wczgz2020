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


// Custom Post "Wordcamps"
class CustomPostWordPress
{
  public function __construct()
  {
    add_action('init', array($this, 'wordcamps_cpt'));
  }

  public function wordcamps_cpt()
  {
    $args = array(
      'public'       => true,
      'show_in_rest' => true,
      'label'        => 'Wordcamps'
    );
    register_post_type('wordcamp', $args);
  }
}

$customPost = new CustomPostWordPress();


// Custom API Rest to get Custom Post "Wordcamps" with ACF
class CustomAPIRest
{
  public function __construct()
  {
    add_action('rest_api_init', array($this, 'register_custom_routes'));
  }

  public function register_custom_routes() 
  {
    register_rest_route('acf/v3', '/wordcamp', array(
      'methods' => 'GET',
      'callback' => array($this, 'add_acf_wordcamps'),
      'permission_callback' => array($this, 'get_wordcamp_check'),
    ));
    register_rest_route('pages/v3', '/wordcamp', array(
      'methods' => 'GET',
      'callback' => array($this, 'add_slug_pages'),
    ));  
  }

  public function add_acf_wordcamps($request_data)
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
    return $posts;
  }

  public function get_wordcamp_check($request)
  {
    return current_user_can('edit_posts');
  }

  public function add_slug_pages($request_data)
  {
    $return = array();
    $pages = get_pages();
    $posts = get_posts();
    $categories = get_categories();
    foreach ($pages as $page) {
      $return['pages'][] = $page->post_name;
    }
    foreach ($posts as $post) {
      $return['posts'][] = $post->post_name;
    }
    foreach ($categories as $category) {
      $return['categories'][] = $category->slug;
    }
    return $return;
  }
  
}

$customRestAPI = new CustomAPIRest();

class ExtendAPIRest {
  public function __construct()
  {
    add_filter('rest_prepare_post', array($this, 'add_prev_next'), 10, 3);
  }

  public function add_prev_next($response, $post, $request) {
    global $post;
    $next = get_adjacent_post(false, '', false);
    $previous = get_adjacent_post(false, '', true);
    $response->data['next'] = (is_a($next, 'WP_Post')) ? 
      array("id" => $next->ID, "slug" => $next->post_name, "title" => $next->post_title) : 
      null;
    $response->data['previous'] = (is_a($previous, 'WP_Post')) ? 
      array("id" => $previous->ID, "slug" => $previous->post_name, "title" => $previous->post_title) : 
      null;
  
    return $response;
  }
}

$extendRestAPI = new ExtendAPIRest();