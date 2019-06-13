<?php
/**
 * Template Name: FAQ
 * Description: The FAQ page of the site
 */

$context = Timber::context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;
Timber::render( array( 'faq.twig' ), $context );
