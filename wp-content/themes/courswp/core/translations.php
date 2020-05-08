<?php

function cw_register_theme_translations(){
    load_theme_textdomain('cw', get_template_directory() . '/languages');
}

add_action('after_setup_theme', 'cw_register_theme_translations');