<?php
/**
 * Template Name: Contact
 * Description: The contact page of the site
 */

$context = Timber::context();
$context['option'] = get_fields('option');

$timber_post = new Timber\Post();
$context['post'] = $timber_post;
Timber::render( array( 'contact.twig', 'single.twig' ), $context );
