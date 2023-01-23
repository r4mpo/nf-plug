<?php

/**
* Plugin Name: NF-e PLUG
* Plugin URI: 
* Description: Extensão de WooCommerce para geração de NF-e nos pedidos dos clientes.
* Version: 0.0.1
* Author: Erick Agostinho (@r4mpo)
* Author URI: https://github.com/r4mpo
**/

if (!defined('WPINC')) {
    wp_die();
}

if (!defined('nf_plug_VERSION')) {
    define('nf_plug_VERSION', '0.0.1');
}

if (!defined('nf_plug_NAME')) {
    define('nf_plug_NAME', 'NF-e PLUG');
}

if (!defined('nf_plug_PLUGIN_SLUG')) {
    define('nf_plug_PLUGIN_SLUG', 'nf-plug');
}

if (!defined('nf_plug_BASE_NAME')) {
    define('nf_plug_BASE_NAME', plugin_basename(__FILE__));
}

if (!defined('nf_plug_PLUGIN_DIR')) {
    define('nf_plug_PLUGIN_DIR', plugin_dir_path(__FILE__));
}

/****** DESATIVAÇÃO DO PLUGIN  *********/
register_deactivation_hook( __FILE__, 'desativando_nfe_plug' );

function desativando_nfe_plug() {
    delete_option('nf_plug_dados');
}

// Executar ao acessar painel adm
if (is_admin())
    add_action( 'after_setup_theme', function()
    {

        require_once nf_plug_PLUGIN_DIR . 'includes/class-nf-plug-admin.php';

        $nf_plug_admin = new nf_plug_admin
        (
        nf_plug_BASE_NAME,
        nf_plug_PLUGIN_SLUG,
        nf_plug_VERSION
        );
    }, 5 );
?>