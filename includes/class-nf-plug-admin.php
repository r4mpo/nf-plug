<?php

if (!class_exists('nf_plug_admin')) {
    class nf_plug_admin
    {

        private $options;
        private $plugin_basename;
        private $version;
        private $plugin_slug;

        public function __construct($plugin_basename, $plugin_slug, $version)
        {

            $this->options = get_option('nf_plug_dados');
            $this->plugin_basename = $plugin_basename;
            $this->plugin_slug = $plugin_slug;
            $this->version = $version;

            // Actions para ativar as funções desenvolvidas abaixo
            // Filter para criar URL de Configurações no plugin

            add_action('admin_menu', array($this, 'add_plugin_page'));
            add_action('admin_init', array($this, 'page_init'));
            add_filter("plugin_action_links_" . $this->plugin_basename, array($this, 'add_settings_link'));
        }

        function buscarCampoPersonalizadoEmPedidos($pedido, $campo)
        {
            global $wpdb;
            $tabela = 'wp_wc_order_stats';

            $resultado_da_busca = $wpdb->get_results("SELECT * FROM $tabela WHERE order_id = $pedido");
            foreach ($resultado_da_busca as $row) {
                $resposta[] = $row;
            }

            return $resposta[0]->$campo;
        }

        function atualizarCamposNotaFiscal($campo, $valor, $pedido)
        {
            global $wpdb;
            $wpdb->query($wpdb->prepare("UPDATE wp_wc_order_stats SET $campo=$valor WHERE order_id = $pedido"));
            return true;
        }


        public function add_plugin_page()
        {

            /* Definindo que o plugin terá uma opção "Configurações" em settings
            e um link anexado na própria barra do Wordpress. */

            add_options_page(
                'Settings',
                'NF-e PLUG',
                'manage_options',
                $this->plugin_slug,
                array($this, 'create_admin_page')
            );
        }

        /*
        Nesta seguinte função, informamos que o formulário será composto por 
        seções e que deve inserir os dados na tabela especificada.
        */

        public function create_admin_page()
        {
?>
            <!-- Formulário -->
            <div class="wrap">
                <h1>Configurações da NF-e</h1>
                <a href="../wp-content/plugins/nf-plug/includes/table/index.php" target="_blank" rel="noopener noreferrer">Acessar
                    painel de emissão</a>
                <form action="options.php" method="post">
                    <?php
                    settings_fields('nf_plug_dados_options');
                    do_settings_sections('nf_plug_dados_admin');
                    submit_button();
                    ?>
                </form>
            </div>
        <?php
        }

        public function page_init()
        {
            register_setting(
                'nf_plug_dados_options',
                'nf_plug_dados',
                array($this, 'sanitize')
            );

            add_settings_section(
                'setting_section_id_1',
                'Configurações',
                null,
                'nf_plug_dados_admin'
            );

            add_settings_field(
                'content_type',
                'Content-Type',
                array($this, 'content_type_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_1',
            );

            add_settings_field(
                'senha',
                'Senha',
                array($this, 'senha_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_1',
            );

            add_settings_section(
                'setting_section_id_2',
                'Corpo',
                null,
                'nf_plug_dados_admin'
            );

            add_settings_field(
                'nome',
                'Nome',
                array($this, 'nome_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_2',
            );

            add_settings_field(
                'grupo',
                'Grupo',
                array($this, 'grupo_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_2',
            );

            add_settings_field(
                'cnpj',
                'CNPJ',
                array($this, 'cnpj_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_2',
            );

            add_settings_section(
                'setting_section_id_3',
                'Emitente',
                null,
                'nf_plug_dados_admin'
            );

            add_settings_field(
                'xNome_C03',
                'Nome do emitente',
                array($this, 'xNome_C03_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_3',
            );

            add_settings_field(
                'email_adm',
                'E-mail do emitente',
                array($this, 'email_adm_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_3',
            );

            add_settings_field(
                'CNPJ_C02',
                'CNPJ do emitente',
                array($this, 'CNPJ_C02_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_3',
            );

            add_settings_field(
                'fone_C16',
                'Telefone do emitente',
                array($this, 'fone_C16_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_3',
            );

            add_settings_field(
                'CEP_C13',
                'CEP do Emitente',
                array($this, 'CEP_C13_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_3',
            );

            add_settings_field(
                'nro_C07',
                'Nº Residencial do Emitente',
                array($this, 'nro_C07_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_3',
            );

            add_settings_field(
                'IE_C17',
                'Inscrição Estadual do Emitente',
                array($this, 'IE_C17_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_3',
            );

            add_settings_field(
                'cProd_I02',
                'CFOP',
                array($this, 'cProd_I02_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_3',
            );

            add_settings_field(
                'CEST_I05c',
                'CEST',
                array($this, 'CEST_I05c_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_3',
            );

            add_settings_section(
                'setting_section_id_4',
                'Suporte técnico',
                null,
                'nf_plug_dados_admin'
            );

            add_settings_field(
                'CNPJ_ZD02',
                'CNPJ da Software House',
                array($this, 'CNPJ_ZD02_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_4',
            );

            add_settings_field(
                'xContato_ZD04',
                'Nome do responsável técnico',
                array($this, 'xContato_ZD04_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_4',
            );

            add_settings_field(
                'email_ZD05',
                'E-mail do responsável técnico',
                array($this, 'email_ZD05_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_4',
            );

            add_settings_field(
                'fone_ZD06',
                'Tel. do responsável técnico',
                array($this, 'fone_ZD06_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_4',
            );

            add_settings_section(
                'setting_section_id_5',
                'Envio de e-mails',
                null,
                'nf_plug_dados_admin'
            );

            add_settings_field(
                'assunto',
                'Assunto',
                array($this, 'assunto_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_5',
            );

            add_settings_field(
                'texto',
                'Texto',
                array($this, 'texto_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_5',
            );


            add_settings_section(
                'setting_section_id_6',
                'Padronize campos do formulário',
                null,
                'nf_plug_dados_admin'
            );

            add_settings_field(
                'serie_B07',
                'Nº Série Fiscal',
                array($this, 'serie_B07_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_6',
            );

            add_settings_field(
                'descricao_padrao',
                'Descrição',
                array($this, 'descricao_padrao_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_6',
            );

            add_settings_field(
                'id_local_de_destino',
                'ID do Local de Destino',
                array($this, 'id_local_de_destino_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_6',
            );

            add_settings_field(
                'modalidade_frete',
                'Modalidade de frete',
                array($this, 'modalidade_frete_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_6',
            );

            add_settings_field(
                'metodo_pagamento',
                'Método de pagamento',
                array($this, 'metodo_pagamento_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_6',
            );

            add_settings_field(
                'indi_ie_dest',
                'Indicador IE do Destinatário',
                array($this, 'indi_ie_dest_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_6',
            );

            add_settings_field(
                'base_calculo_icms',
                'Base de cálculo ICMS (%)',
                array($this, 'base_calculo_icms_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_6',
            );

            add_settings_field(
                'base_calculo_icms_st',
                'Base de cálculo ICMS ST (%)',
                array($this, 'base_calculo_icms_st_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_6',
            );

            add_settings_field(
                'metodo_pagamento',
                'Método de pagamento',
                array($this, 'metodo_pagamento_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_6',
            );

            add_settings_section(
                'setting_section_id_7',
                'Pré-definições',
                null,
                'nf_plug_dados_admin'
            );

            add_settings_field(
                'Formato',
                'Formato',
                array($this, 'Formato_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_7',
            );

            add_settings_field(
                'mod_bc_icms',
                'Modalidade de determinação da BC do ICMS',
                array($this, 'mod_bc_icms_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_7',
            );

            add_settings_field(
                'numlote',
                'Nº Lote',
                array($this, 'numlote_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_7',
            );

            add_settings_field(
                'versao_A02',
                'Versão NF-e',
                array($this, 'versao_A02_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_7',
            );

            add_settings_field(
                'tpImp_B21',
                'Formato do danfe',
                array($this, 'tpImp_B21_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_7',
            );

            add_settings_field(
                'tpEmis_B22',
                'Tipo de Emissão da NF-e',
                array($this, 'tpEmis_B22_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_7',
            );

            add_settings_field(
                'cDV_B23',
                'Dígito Verificador da Chave de Acesso da NF-e',
                array($this, 'cDV_B23_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_7',
            );

            add_settings_field(
                'cDV_B23',
                'Dígito Verificador da Chave de Acesso da NF-e',
                array($this, 'cDV_B23_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_7',
            );

            add_settings_field(
                'tpAmb_B24',
                'Tipo ambiente',
                array($this, 'tpAmb_B24_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_7',
            );

            add_settings_field(
                'INDFINAL_B25A',
                'Indica operação com Consumidor final',
                array($this, 'INDFINAL_B25A_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_7',
            );

            add_settings_field(
                'cDV_B23',
                'Dígito Verificador da NF-e',
                array($this, 'cDV_B23_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_7',
            );

            add_settings_field(
                'verProc_B27',
                'Aplicação',
                array($this, 'verProc_B27_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_7',
            );

            add_settings_field(
                'uTrib_I13',
                'Unidade de medida tributável',
                array($this, 'uTrib_I13_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_7',
            );

            add_settings_field(
                'indTot_I17b',
                'Indica se valor do item entra no valor total da NF-e',
                array($this, 'indTot_I17b_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_7',
            );

            add_settings_field(
                'CST_N12',
                'Tributação do ICMS',
                array($this, 'CST_N12_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_7',
            );

            add_settings_field(
                'vFCPST_W06a',
                'Valor total fundo de combate à pobreza retido por substituição tributária',
                array($this, 'vFCPST_W06a_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_7',
            );

            add_settings_field(
                'vFCPSTRet_W06b',
                'Valor total fundo de combate à pobreza retido anteriormente por Substituição Tributária',
                array($this, 'vFCPSTRet_W06b_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_7',
            );

            add_settings_field(
                'NCM_I05',
                'Código NCM com 8 digitos',
                array($this, 'NCM_I05_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_7',
            );

            add_settings_field(
                'nNF_B08',
                'Número do documento fiscal',
                array($this, 'nNF_B08_callback'),
                'nf_plug_dados_admin',
                'setting_section_id_7',
            );
        }

        public function content_type_callback()
        {
            $value = isset($this->options['content_type']) ? esc_attr($this->options['content_type']) : 'application/x-www-form-urlencoded';
        ?>
            <input type="text" id="content_type" name="nf_plug_dados[content_type]" value="<?php echo $value; ?>" />
        <?php
        }

        public function senha_callback()
        {
            $value = isset($this->options['senha']) ? esc_attr($this->options['senha']) : '';
        ?>
            <input type="text" maxlength="14" id="senha" name="nf_plug_dados[senha]" value="<?php echo $value; ?>" />
        <?php
        }

        public function nome_callback()
        {
            $value = isset($this->options['nome']) ? esc_attr($this->options['nome']) : '';
        ?>
            <input type="text" id="nome" name="nf_plug_dados[nome]" value="<?php echo $value; ?>" />
        <?php
        }

        public function grupo_callback()
        {
            $value = isset($this->options['grupo']) ? esc_attr($this->options['grupo']) : '';
        ?>
            <input type="text" maxlength="14" id="grupo" name="nf_plug_dados[grupo]" value="<?php echo $value; ?>" />
        <?php
        }

        public function cnpj_callback()
        {
            $value = isset($this->options['cnpj']) ? esc_attr($this->options['cnpj']) : '';
        ?>
            <input type="text" id="cnpj" name="nf_plug_dados[cnpj]" value="<?php echo $value; ?>" />
        <?php
        }

        public function xNome_C03_callback()
        {
            $value = isset($this->options['xNome_C03']) ? esc_attr($this->options['xNome_C03']) : '';
        ?>
            <input type="text" id="xNome_C03" name="nf_plug_dados[xNome_C03]" value="<?php echo $value; ?>" />
        <?php
        }

        public function email_adm_callback()
        {
            $value = isset($this->options['email_adm']) ? esc_attr($this->options['email_adm']) : '';
        ?>
            <input type="email" id="email_adm" name="nf_plug_dados[email_adm]" value="<?php echo $value; ?>" />
        <?php
        }


        public function fone_C16_callback()
        {
            $value = isset($this->options['fone_C16']) ? esc_attr($this->options['fone_C16']) : '';
        ?>
            <input type="number" id="fone_C16" name="nf_plug_dados[fone_C16]" value="<?php echo $value; ?>" />
        <?php
        }

        public function CNPJ_C02_callback()
        {
            $value = isset($this->options['CNPJ_C02']) ? esc_attr($this->options['CNPJ_C02']) : '';
        ?>
            <input type="numer" id="CNPJ_C02" name="nf_plug_dados[CNPJ_C02]" value="<?php echo $value; ?>" />
        <?php
        }

        public function nro_C07_callback()
        {
            $value = isset($this->options['nro_C07']) ? esc_attr($this->options['nro_C07']) : '';
        ?>
            <input type="numer" id="nro_C07" name="nf_plug_dados[nro_C07]" value="<?php echo $value; ?>" />
        <?php
        }

        public function CEP_C13_callback()
        {
            $value = isset($this->options['CEP_C13']) ? esc_attr($this->options['CEP_C13']) : '';
        ?>
            <input type="numer" id="CEP_C13" name="nf_plug_dados[CEP_C13]" value="<?php echo $value; ?>" />
        <?php
        }

        public function IE_C17_callback()
        {
            $value = isset($this->options['IE_C17']) ? esc_attr($this->options['IE_C17']) : '';
        ?>
            <input type="text" id="IE_C17" name="nf_plug_dados[IE_C17]" value="<?php echo $value; ?>" />
        <?php
        }

        public function cProd_I02_callback()
        {
            $value = isset($this->options['cProd_I02']) ? esc_attr($this->options['cProd_I02']) : '';
        ?>
            <input type="text" id="cProd_I02" name="nf_plug_dados[cProd_I02]" value="<?php echo $value; ?>" />
        <?php
        }

        public function CEST_I05c_callback()
        {
            $value = isset($this->options['CEST_I05c']) ? esc_attr($this->options['CEST_I05c']) : '';
        ?>
            <input type="text" id="CEST_I05c" name="nf_plug_dados[CEST_I05c]" value="<?php echo $value; ?>" />
        <?php
        }

        public function CNPJ_ZD02_callback()
        {
            $value = isset($this->options['CNPJ_ZD02']) ? esc_attr($this->options['CNPJ_ZD02']) : '';
        ?>
            <input type="text" id="CNPJ_ZD02" name="nf_plug_dados[CNPJ_ZD02]" value="<?php echo $value; ?>" />
        <?php
        }

        public function xContato_ZD04_callback()
        {
            $value = isset($this->options['xContato_ZD04']) ? esc_attr($this->options['xContato_ZD04']) : '';
        ?>
            <input type="text" id="xContato_ZD04" name="nf_plug_dados[xContato_ZD04]" value="<?php echo $value; ?>" />
        <?php
        }

        public function email_ZD05_callback()
        {
            $value = isset($this->options['email_ZD05']) ? esc_attr($this->options['email_ZD05']) : '';
        ?>
            <input type="email" id="email_ZD05" name="nf_plug_dados[email_ZD05]" value="<?php echo $value; ?>" />
        <?php
        }

        public function fone_ZD06_callback()
        {
            $value = isset($this->options['fone_ZD06']) ? esc_attr($this->options['fone_ZD06']) : '';
        ?>
            <input type="text" id="fone_ZD06" name="nf_plug_dados[fone_ZD06]" value="<?php echo $value; ?>" />
        <?php
        }


        public function serie_B07_callback()
        {
            $value = isset($this->options['serie_B07']) ? esc_attr($this->options['serie_B07']) : '';
        ?>
            <input type="text" id="serie_B07" name="nf_plug_dados[serie_B07]" value="<?php echo $value; ?>">
        <?php
        }

        public function assunto_callback()
        {
            $value = isset($this->options['assunto']) ? esc_attr($this->options['assunto']) : '';
        ?>
            <input type="text" id="assunto" name="nf_plug_dados[assunto]" value="<?php echo $value; ?>">
        <?php
        }

        public function texto_callback()
        {
            $value = isset($this->options['texto']) ? esc_attr($this->options['texto']) : '';
        ?>
            <input type="text" id="texto" name="nf_plug_dados[texto]" value="<?php echo $value; ?>">
        <?php
        }


        public function descricao_padrao_callback()
        {
            $value = isset($this->options['descricao_padrao']) ? esc_attr($this->options['descricao_padrao']) : '';
        ?>
            <textarea id="descricao_padrao" name="nf_plug_dados[descricao_padrao]"><?php echo $value; ?></textarea>
        <?php
        }

        public function id_local_de_destino_callback()
        {
            $value = isset($this->options['id_local_de_destino']) ? esc_attr($this->options['id_local_de_destino']) : '';
        ?>
            <select id="id_local_de_destino" name="nf_plug_dados[id_local_de_destino]">
                <option selected value="">ID do Local de Destino</option>
                <option <?php if ($value == "1") : ?> selected <?php endif; ?> value="1">Operação interna
                </option>
                <option <?php if ($value == "2") : ?> selected <?php endif; ?> value="2">Operação interestadual
                </option>
                <option <?php if ($value == "3") : ?> selected <?php endif; ?> value="3">Operação com exterior
                </option>

            </select>
        <?php
        }

        public function modalidade_frete_callback()
        {
            $value = isset($this->options['modalidade_frete']) ? esc_attr($this->options['modalidade_frete']) : '';
        ?>
            <select id="modalidade_frete" name="nf_plug_dados[modalidade_frete]">
                <option selected value="">Modalidade do frete</option>
                <option <?php if ($value == "0") : ?> selected <?php endif; ?> value="0">Contratação do Frete por conta do Remetente
                    (CIF)
                </option>
                <option <?php if ($value == "1") : ?> selected <?php endif; ?> value="1">Contratação do Frete por conta do Destinatário
                    (FOB)
                </option>
                <option <?php if ($value == "2") : ?> selected <?php endif; ?> value="2">Contratação do Frete por conta de Terceiros
                </option>
                <option <?php if ($value == "3") : ?> selected <?php endif; ?> value="3">Transporte Próprio por conta do Remetente
                </option>
                <option <?php if ($value == "4") : ?> selected <?php endif; ?> value="4">Transporte Próprio por conta do Destinatário
                </option>
                <option <?php if ($value == "9") : ?> selected <?php endif; ?> value="9">Sem Ocorrência de Transporte
                </option>

            </select>
        <?php
        }

        public function metodo_pagamento_callback()
        {
            $value = isset($this->options['metodo_pagamento']) ? esc_attr($this->options['metodo_pagamento']) : '';
        ?>
            <select id="metodo_pagamento" name="nf_plug_dados[metodo_pagamento]">
                <option selected value="">Selecione o método de pagamento</option>
                <option <?php if ($value == "03") : ?> selected <?php endif; ?> value="03">Cartão de crédito
                </option>
                <option <?php if ($value == "04") : ?> selected <?php endif; ?> value="04">Cartão de débito
                </option>
                <option <?php if ($value == "15") : ?> selected <?php endif; ?> value="15">Boleto Bancário
                </option>
                <option <?php if ($value == "16") : ?> selected <?php endif; ?> value="16">Depósito Bancário
                </option>
            </select>
        <?php
        }

        public function indi_ie_dest_callback()
        {
            $value = isset($this->options['indi_ie_dest']) ? esc_attr($this->options['indi_ie_dest']) : '';
        ?>
            <select id="indi_ie_dest" name="nf_plug_dados[indi_ie_dest]">
                <option selected value="">Selecione a indicação IE do Destinatário</option>
                <option <?php if ($value == "1") : ?> selected <?php endif; ?> value="1">Contribuinte ICMS
                </option>
                <option <?php if ($value == "2") : ?> selected <?php endif; ?> value="2">Contribuinte isento de Inscrição no cadastro
                    de Contribuintes do ICMS
                </option>
                <option <?php if ($value == "9") : ?> selected <?php endif; ?> value="9">Não Contribuinte, que pode ou não possuir
                    Inscrição Estadual no Cadastro de Contribuintes do ICMS</option>
            </select>
        <?php
        }


        public function Formato_callback()
        {
            $value = isset($this->options['Formato']) ? esc_attr($this->options['Formato']) : 'tx2';
        ?>
            <input type="text" id="Formato" name="nf_plug_dados[Formato]" value="<?php echo $value; ?>" />
        <?php
        }

        public function mod_bc_icms_callback()
        {
            $value = isset($this->options['mod_bc_icms']) ? esc_attr($this->options['mod_bc_icms']) : '0';
        ?>
            <input type="text" id="mod_bc_icms" name="nf_plug_dados[mod_bc_icms]" value="<?php echo $value; ?>" />
        <?php
        }

        public function base_calculo_icms_callback()
        {
            $value = isset($this->options['base_calculo_icms']) ? esc_attr($this->options['base_calculo_icms']) : '';
        ?>
            <input type="text" id="base_calculo_icms" name="nf_plug_dados[base_calculo_icms]" value="<?php echo $value; ?>" />
        <?php
        }

        public function base_calculo_icms_st_callback()
        {
            $value = isset($this->options['base_calculo_icms_st']) ? esc_attr($this->options['base_calculo_icms_st']) : '';
        ?>
            <input type="text" id="base_calculo_icms_st" name="nf_plug_dados[base_calculo_icms_st]" value="<?php echo $value; ?>" />
        <?php
        }

        public function numlote_callback()
        {
            $value = isset($this->options['numlote']) ? esc_attr($this->options['numlote']) : '0';
        ?>
            <input type="text" id="numlote" name="nf_plug_dados[numlote]" value="<?php echo $value; ?>" />
        <?php
        }

        public function versao_A02_callback()
        {
            $value = isset($this->options['versao_A02']) ? esc_attr($this->options['versao_A02']) : '4.00';
        ?>
            <input type="text" id="versao_A02" name="nf_plug_dados[versao_A02]" value="<?php echo $value; ?>" />
        <?php
        }

        public function tpImp_B21_callback()
        {
            $value = isset($this->options['tpImp_B21']) ? esc_attr($this->options['tpImp_B21']) : '0';
        ?>
            <input type="text" id="tpImp_B21" name="nf_plug_dados[tpImp_B21]" value="<?php echo $value; ?>" />
        <?php
        }

        public function tpEmis_B22_callback()
        {
            $value = isset($this->options['tpEmis_B22']) ? esc_attr($this->options['tpEmis_B22']) : '1';
        ?>
            <input type="text" id="tpEmis_B22" name="nf_plug_dados[tpEmis_B22]" value="<?php echo $value; ?>" />
        <?php
        }

        public function cDV_B23_callback()
        {
            $value = isset($this->options['cDV_B23']) ? esc_attr($this->options['cDV_B23']) : '0';
        ?>
            <input type="text" id="cDV_B23" name="nf_plug_dados[cDV_B23]" value="<?php echo $value; ?>" />
        <?php
        }

        public function tpAmb_B24_callback()
        {
            $value = isset($this->options['tpAmb_B24']) ? esc_attr($this->options['tpAmb_B24']) : '1';
        ?>
            <input type="text" id="tpAmb_B24" name="nf_plug_dados[tpAmb_B24]" value="<?php echo $value; ?>" />
        <?php
        }

        public function INDFINAL_B25A_callback()
        {
            $value = isset($this->options['INDFINAL_B25A']) ? esc_attr($this->options['INDFINAL_B25A']) : '1';
        ?>
            <input type="text" id="INDFINAL_B25A" name="nf_plug_dados[INDFINAL_B25A]" value="<?php echo $value; ?>" />
        <?php
        }

        public function verProc_B27_callback()
        {
            $value = isset($this->options['verProc_B27']) ? esc_attr($this->options['verProc_B27']) : 'nfplug_0.0.1';
        ?>
            <input type="text" id="verProc_B27" name="nf_plug_dados[verProc_B27]" value="<?php echo $value; ?>" />
        <?php
        }

        public function uTrib_I13_callback()
        {
            $value = isset($this->options['uTrib_I13']) ? esc_attr($this->options['uTrib_I13']) : 'UN';
        ?>
            <input type="text" id="uTrib_I13" name="nf_plug_dados[uTrib_I13]" value="<?php echo $value; ?>" />
        <?php
        }

        public function indTot_I17b_callback()
        {
            $value = isset($this->options['indTot_I17b']) ? esc_attr($this->options['indTot_I17b']) : '1';
        ?>
            <input type="text" id="indTot_I17b" name="nf_plug_dados[indTot_I17b]" value="<?php echo $value; ?>" />
        <?php
        }

        public function CST_N12_callback()
        {
            $value = isset($this->options['CST_N12']) ? esc_attr($this->options['CST_N12']) : '00';
        ?>
            <input type="text" id="CST_N12" name="nf_plug_dados[CST_N12]" value="<?php echo $value; ?>" />
        <?php
        }

        public function vFCPST_W06a_callback()
        {
            $value = isset($this->options['vFCPST_W06a']) ? esc_attr($this->options['vFCPST_W06a']) : '0.00';
        ?>
            <input type="text" id="vFCPST_W06a" name="nf_plug_dados[vFCPST_W06a]" value="<?php echo $value; ?>" />
        <?php
        }

        public function vFCPSTRet_W06b_callback()
        {
            $value = isset($this->options['vFCPSTRet_W06b']) ? esc_attr($this->options['vFCPSTRet_W06b']) : '0.00';
        ?>
            <input type="text" id="vFCPSTRet_W06b" name="nf_plug_dados[vFCPSTRet_W06b]" value="<?php echo $value; ?>" />
        <?php
        }

        public function NCM_I05_callback()
        {
            $value = isset($this->options['NCM_I05']) ? esc_attr($this->options['NCM_I05']) : '04021090';
        ?>
            <input type="text" id="NCM_I05" name="nf_plug_dados[NCM_I05]" value="<?php echo $value; ?>" />
        <?php
        }

        public function nNF_B08_callback()
        {
            $value = isset($this->options['nNF_B08']) ? esc_attr($this->options['nNF_B08']) : '0';
        ?>
            <input type="text" id="nNF_B08" name="nf_plug_dados[nNF_B08]" value="<?php echo $value; ?>" />
<?php
        }

        public function sanitize($input)
        {

            $new_input = array();

            if (isset($input['content_type']))
                $new_input['content_type'] = sanitize_text_field($input['content_type']);

            if (isset($input['senha']))
                $new_input['senha'] = sanitize_text_field($input['senha']);

            if (isset($input['nome']))
                $new_input['nome'] = sanitize_text_field($input['nome']);

            if (isset($input['grupo']))
                $new_input['grupo'] = sanitize_text_field($input['grupo']);

            if (isset($input['cnpj']))
                $new_input['cnpj'] = sanitize_text_field($input['cnpj']);

            if (isset($input['CNPJ_C02']))
                $new_input['CNPJ_C02'] = sanitize_text_field($input['CNPJ_C02']);

            if (isset($input['fone_C16']))
                $new_input['fone_C16'] = sanitize_text_field($input['fone_C16']);

            if (isset($input['xNome_C03']))
                $new_input['xNome_C03'] = sanitize_text_field($input['xNome_C03']);

            if (isset($input['email_adm']))
                $new_input['email_adm'] = sanitize_text_field($input['email_adm']);

            if (isset($input['CEP_C13']))
                $new_input['CEP_C13'] = sanitize_text_field($input['CEP_C13']);

            if (isset($input['nro_C07']))
                $new_input['nro_C07'] = sanitize_text_field($input['nro_C07']);

            if (isset($input['IE_C17']))
                $new_input['IE_C17'] = sanitize_text_field($input['IE_C17']);

            if (isset($input['cProd_I02']))
                $new_input['cProd_I02'] = sanitize_text_field($input['cProd_I02']);

            if (isset($input['CEST_I05c']))
                $new_input['CEST_I05c'] = sanitize_text_field($input['CEST_I05c']);

            if (isset($input['Formato']))
                $new_input['Formato'] = sanitize_text_field($input['Formato']);

            if (isset($input['mod_bc_icms']))
                $new_input['mod_bc_icms'] = sanitize_text_field($input['mod_bc_icms']);

            if (isset($input['numlote']))
                $new_input['numlote'] = sanitize_text_field($input['numlote']);

            if (isset($input['versao_A02']))
                $new_input['versao_A02'] = sanitize_text_field($input['versao_A02']);

            if (isset($input['tpImp_B21']))
                $new_input['tpImp_B21'] = sanitize_text_field($input['tpImp_B21']);

            if (isset($input['tpEmis_B22']))
                $new_input['tpEmis_B22'] = sanitize_text_field($input['tpEmis_B22']);

            if (isset($input['cDV_B23']))
                $new_input['cDV_B23'] = sanitize_text_field($input['cDV_B23']);

            if (isset($input['tpAmb_B24']))
                $new_input['tpAmb_B24'] = sanitize_text_field($input['tpAmb_B24']);

            if (isset($input['INDFINAL_B25A']))
                $new_input['INDFINAL_B25A'] = sanitize_text_field($input['INDFINAL_B25A']);

            if (isset($input['verProc_B27']))
                $new_input['verProc_B27'] = sanitize_text_field($input['verProc_B27']);

            if (isset($input['uTrib_I13']))
                $new_input['uTrib_I13'] = sanitize_text_field($input['uTrib_I13']);

            if (isset($input['indTot_I17b']))
                $new_input['indTot_I17b'] = sanitize_text_field($input['indTot_I17b']);

            if (isset($input['CST_N12']))
                $new_input['CST_N12'] = sanitize_text_field($input['CST_N12']);

            if (isset($input['vFCPST_W06a']))
                $new_input['vFCPST_W06a'] = sanitize_text_field($input['vFCPST_W06a']);

            if (isset($input['vFCPSTRet_W06b']))
                $new_input['vFCPSTRet_W06b'] = sanitize_text_field($input['vFCPSTRet_W06b']);

            if (isset($input['NCM_I05']))
                $new_input['NCM_I05'] = sanitize_text_field($input['NCM_I05']);

            if (isset($input['CNPJ_ZD02']))
                $new_input['CNPJ_ZD02'] = sanitize_text_field($input['CNPJ_ZD02']);

            if (isset($input['xContato_ZD04']))
                $new_input['xContato_ZD04'] = sanitize_text_field($input['xContato_ZD04']);

            if (isset($input['email_ZD05']))
                $new_input['email_ZD05'] = sanitize_text_field($input['email_ZD05']);

            if (isset($input['fone_ZD06']))
                $new_input['fone_ZD06'] = sanitize_text_field($input['fone_ZD06']);

            if (isset($input['descricao_padrao']))
                $new_input['descricao_padrao'] = sanitize_text_field($input['descricao_padrao']);

            if (isset($input['serie_B07']))
                $new_input['serie_B07'] = sanitize_text_field($input['serie_B07']);

            if (isset($input['assunto']))
                $new_input['assunto'] = sanitize_text_field($input['assunto']);

            if (isset($input['texto']))
                $new_input['texto'] = sanitize_text_field($input['texto']);

            if (isset($input['id_local_de_destino']))
                $new_input['id_local_de_destino'] = sanitize_text_field($input['id_local_de_destino']);

            if (isset($input['modalidade_frete']))
                $new_input['modalidade_frete'] = sanitize_text_field($input['modalidade_frete']);

            if (isset($input['metodo_pagamento']))
                $new_input['metodo_pagamento'] = sanitize_text_field($input['metodo_pagamento']);

            if (isset($input['indi_ie_dest']))
                $new_input['indi_ie_dest'] = sanitize_text_field($input['indi_ie_dest']);

            if (isset($input['nNF_B08']))
                $new_input['nNF_B08'] = sanitize_text_field($input['nNF_B08']);

            if (isset($input['base_calculo_icms']))
                $new_input['base_calculo_icms'] = sanitize_text_field($input['base_calculo_icms']);

            if (isset($input['base_calculo_icms_st']))
                $new_input['base_calculo_icms_st'] = sanitize_text_field($input['base_calculo_icms_st']);

            return $new_input;
        }

        public function add_settings_link($links)
        {
            $settings_links = '<a href="options-general.php?page=' . $this->plugin_slug . '">' . 'Configurações' . '</a>';
            array_unshift($links, $settings_links);
            return $links;
        }

        # adicionando novas colunas
        function possivelmente_adicionar_coluna($nome_tabela, $nome_coluna, $comando_sql)
        {
            global $wpdb;

            foreach ($wpdb->get_col("DESC $nome_tabela", 0) as $column) {
                if ($column === $nome_coluna) {
                    return true;
                }
            }

            $wpdb->query($comando_sql);

            foreach ($wpdb->get_col("DESC $nome_tabela", 0) as $column) {
                if ($column === $nome_coluna) {
                    return true;
                }
            }

            return false;
        }

        function possivelmente_dropar_coluna($nome_tabela, $nome_coluna, $comando_sql)
        {
            global $wpdb;

            foreach ($wpdb->get_col("DESC $nome_tabela", 0) as $column) {
                if ($column === $nome_coluna) {

                    $wpdb->query($comando_sql);

                    foreach ($wpdb->get_col("DESC $nome_tabela", 0) as $column) {
                        if ($column === $nome_coluna) {
                            return false;
                        }
                    }
                }
            }

            return true;
        }
    }
}
