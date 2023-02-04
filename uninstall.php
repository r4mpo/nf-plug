<?php

if (!defined('ABSPATH') && !defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

if (!function_exists('nf_plug_uninstall')) {

    function nf_plug_uninstall()
    {
        delete_option('nf_plug_dados');

        require_once nf_plug_PLUGIN_DIR . 'includes/class-nf-plug-admin.php';

        $nf_plug_admin = new nf_plug_admin(nf_plug_BASE_NAME, nf_plug_PLUGIN_SLUG, nf_plug_VERSION);

        $nf_plug_admin->possivelmente_dropar_coluna(
            'wp_wc_order_stats',
            'chave_nota_fiscal_plug',
            'ALTER TABLE wp_wc_order_stats DROP COLUMN chave_nota_fiscal_plug'
        );

        $nf_plug_admin->possivelmente_dropar_coluna(
            'wp_wc_order_stats',
            'situacao_nota_fiscal_plug',
            'ALTER TABLE wp_wc_order_stats DROP COLUMN situacao_nota_fiscal_plug',
        );
    }

}

register_uninstall_hook(__FILE__, 'nf_plug_uninstall');