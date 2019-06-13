<?php
/**
 * Template Name: Services
 * Description: The services page of the site
 */

$context = Timber::get_context();

$args = array(
    'post_type' => 'services',
    // Get all posts
    'posts_per_page' => -1,

    'orderby' => array(
        'meta_value_num' => 'DESC',
        'date' => 'DESC'
    ),
);

$posts = Timber::get_posts( $args );

$context['posts'] = $posts;

Timber::render( 'service.twig', $context );
