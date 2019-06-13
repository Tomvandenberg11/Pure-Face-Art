<?php
/**
 * Template Name: Algemene voorwaarden
 * Description: The disclaimer page of the site
 */

$context = Timber::context();

$timber_post = new Timber\Post();
$context['post'] = $timber_post;
Timber::render( array( 'algemene-voorwaarden.twig' ), $context );
