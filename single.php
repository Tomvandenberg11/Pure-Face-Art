<?php
/**
 * The Template for displaying project posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::context();

$args = array(
    'post_type' => 'projects',
    // Get all posts
    'posts_per_page' => 4,

    'orderby'   => 'rand',
);

$services = array(
    'post_type' => 'services',
    // Get all posts
    'posts_per_page' => -1,

    'orderby' => array(
        'meta_value_num' => 'DESC',
        'date' => 'DESC'
    ),
);

$blogs = array(
    'post_type' => 'blogs',
    'posts_per_page' => 3,
);

$contact = new TimberPost(33);
$context['contact'] = $contact;

$posts = Timber::get_posts( $args );
$get_services = Timber::get_posts( $services );
$get_blogs = Timber::get_posts( $blogs );

$context['posts'] = $posts;
$context['services'] = $get_services;
$context['blogs'] = $get_blogs;

$timber_post = new Timber\Post();
$context['post'] = $timber_post;


Timber::render( array( 'single.twig' ), $context );

