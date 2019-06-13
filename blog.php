<?php
/**
 * Template Name: Blog
 * Description: The blog page of the site
 */

$context = Timber::get_context();

$args = array(
    'post_type' => 'blogs',
    // Get all posts
    'posts_per_page' => -1,

    'orderby' => array(
        'meta_value_num' => 'DESC',
        'date' => 'DESC'
    ),
);

$posts = Timber::get_posts( $args );

$context['posts'] = $posts;

Timber::render( 'blog.twig', $context );