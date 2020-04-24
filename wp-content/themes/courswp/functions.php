<?php

function cw_get_theme_asset($asset) {
    return get_stylesheet_directory_uri() . '/' . ltrim($asset, '/');
}