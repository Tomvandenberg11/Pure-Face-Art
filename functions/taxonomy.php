<?php

add_action('init', 'wpshout_register_taxonomy');
function wpshout_register_taxonomy() {
    $args = array(
        'hierarchical' => true,
        'label' => 'Project categorie',
        'taxonomy' => 'project-category',
        'field' => 'slug',
        'slug' => 'project-category',
    );
    register_taxonomy( 'project_category', array( 'projects'), $args );
}