<?php

function cw_get_theme_asset($asset) {
    return get_stylesheet_directory_uri() . '/' . ltrim($asset, '/');
}

function cw_get_title($separator = '•', $displayTitleLeft = true) {
    $separator = ' ' . $separator . ' ';

    $title = trim(wp_title('', false, 'right'));

    if(!$title) {
        return get_bloginfo('name');
    }

    if($displayTitleLeft) {
        return $title . $separator . get_bloginfo('name');
    } else {
        return get_bloginfo('name') . $separator . $title;
    }
}

function cw_get_menu($location, $baseClass) {
    global $post;

    $items = [];

    // On va remplir le tableau $items
    // 1. Récupérer la structure du menu WP pour $location
    $locations = get_nav_menu_locations();
    $id = $locations[$location];
    $menu = wp_get_nav_menu_items($id);

    foreach($menu as $i => $object) {
        // 2. On va formater chaque lien récupérer en un objet qui contient :
        $item = new stdClass();
        //      - l'URL du lien
        $item->url = $object->url;
        //      - le label du lien
        $item->label = $object->title;
        //      - l'état "current" du lien
        $isTargettingHome = rtrim($object->url, '/') == rtrim(home_url(), '/');
        $item->current = (is_home() && $isTargettingHome) || ($object->object_id == $post->ID);
        //      - l'état "target" du lien
        $item->target = $object->target;
        //      - les éventuelles classes CSS
        $item->classes = array_map(function($item) use ($baseClass) {
            return $baseClass . '--' . $item;
        }, array_filter(array_merge([$item->current ? 'current' : null], $object->classes)));

        array_unshift($item->classes, $baseClass);

        $items[] = $item;
    }

    return $items;
}

register_nav_menu('main', 'Le menu de navigation principal');
register_nav_menu('social', 'Le menu des liens réseaux sociaux');

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
    'menu_icon' => 'dashicons-palmtree'
]);
