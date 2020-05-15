<?php

register_post_type('trip', [
    'label' => 'Voyages',
    'labels' => [
        'name' => 'Voyages',
        'singular_name' => 'Voyage',
        'add_new' => 'Ajouter nouveau',
        'add_new_item' => 'Ajouter un nouveau voyage',
    ],
    'description' => 'Les récits de voyages que j\'ai effectués.',
    'public' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-palmtree',
    'supports' => ['title','editor','thumbnail','excerpt'],
]);