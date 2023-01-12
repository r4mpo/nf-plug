<?php

if (!defined('ABSPATH') && !defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

if (!function_exists('nf_plug_uninstall')) {

    function nf_plug_uninstall()
    {
        delete_option('nf_plug_dados');
    }

}

register_uninstall_hook(__FILE__, 'nf_plug_uninstall');