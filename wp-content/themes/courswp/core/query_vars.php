<?php

function cw_register_custom_query_vars($vars) {
    $vars[] = 'trips-pagination';

    return $vars;
}

add_filter('query_vars', 'cw_register_custom_query_vars');