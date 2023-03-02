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

// Executar ao acessar painel adm
if (is_admin())
    add_action('after_setup_theme', function () {

        require_once nf_plug_PLUGIN_DIR . 'includes/class-nf-plug-admin.php';

        $nf_plug_admin = new nf_plug_admin
        (
            nf_plug_BASE_NAME,
            nf_plug_PLUGIN_SLUG,
            nf_plug_VERSION
        );

        $nf_plug_admin->possivelmente_adicionar_coluna(
            'wp_wc_order_stats',
            'chave_nota_fiscal_plug',
            'ALTER TABLE wp_wc_order_stats ADD chave_nota_fiscal_plug varchar(255) null'
        );

        $nf_plug_admin->possivelmente_adicionar_coluna(
            'wp_wc_order_stats',
            'pdf_nota_fiscal_plug',
            'ALTER TABLE wp_wc_order_stats ADD pdf_nota_fiscal_plug varchar(255) null'
        );

        $nf_plug_admin->possivelmente_adicionar_coluna(
            'wp_wc_order_stats',
            'xml_nota_fiscal_plug',
            'ALTER TABLE wp_wc_order_stats ADD xml_nota_fiscal_plug varchar(255) null'
        );

        $nf_plug_admin->possivelmente_adicionar_coluna(
            'wp_wc_order_stats',
            'situacao_nota_fiscal_plug',
            'ALTER TABLE wp_wc_order_stats ADD situacao_nota_fiscal_plug varchar(255) NOT NULL DEFAULT "Pendente"',
        );

        # Desativando plugin
        register_deactivation_hook(__FILE__, 'desativando_nfe');

        function desativando_nfe()
        {
            delete_option('nf_plug_dados');

            require_once nf_plug_PLUGIN_DIR . 'includes/class-nf-plug-admin.php';

            $nf_plug_admin = new nf_plug_admin(nf_plug_BASE_NAME, nf_plug_PLUGIN_SLUG, nf_plug_VERSION);

            $nf_plug_admin->possivelmente_dropar_coluna(
                'wp_wc_order_stats',
                'chave_nota_fiscal_plug',
                "ALTER TABLE wp_wc_order_stats DROP COLUMN chave_nota_fiscal_plug"
            );

            $nf_plug_admin->possivelmente_dropar_coluna(
                'wp_wc_order_stats',
                'pdf_nota_fiscal_plug',
                "ALTER TABLE wp_wc_order_stats DROP COLUMN pdf_nota_fiscal_plug"
            );

            $nf_plug_admin->possivelmente_dropar_coluna(
                'wp_wc_order_stats',
                'xml_nota_fiscal_plug',
                "ALTER TABLE wp_wc_order_stats DROP COLUMN xml_nota_fiscal_plug"
            );

            $nf_plug_admin->possivelmente_dropar_coluna(
                'wp_wc_order_stats',
                'situacao_nota_fiscal_plug',
                "ALTER TABLE wp_wc_order_stats DROP COLUMN situacao_nota_fiscal_plug"
            );
        }

    }, 5);

?>