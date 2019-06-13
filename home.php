<?php
/**
 * Template Name: Home
 * Description: The home page of the site
 */

$context = Timber::context();

$projects = array(
    'post_type' => 'projects',
    // Get all posts
    'posts_per_page' => -1,

    'orderby'   => 'rand',
);

$review = array(
    'post_type' => 'projects',
    // Get all posts
    'posts_per_page' => 1,

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

$posts = Timber::get_posts( $projects, $services );
$get_services = Timber::get_posts( $services );
$get_review =  Timber::get_posts( $review );

$context['projects'] = $posts;
$context['services'] = $get_services;
$context['review'] = $get_review;


$timber_post = new Timber\Post();
$context['post'] = $timber_post;
Timber::render( array( 'home.twig' ), $context );
