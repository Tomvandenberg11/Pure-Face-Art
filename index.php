<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * Template Name: Project page
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

$context = Timber::get_context();

$args = array(
    'post_type' => 'projects',
    // Get all posts
    'posts_per_page' => -1,

    'orderby' => array(
        'meta_value_num' => 'ASC',
        'date' => 'ASC'
    ),
);

$project_entry = Timber::get_posts(
    array(
        'post_type' => 'projects',
        'posts_per_page' => 1,
        'orderby'   => 'rand',
    )
);

$context['categories'] = Timber::get_terms('project_category');

$context['project_entry'] = $project_entry[0];

$posts = Timber::get_posts( $args );

$context['posts'] = $posts;

Timber::render( 'index.twig', $context );
