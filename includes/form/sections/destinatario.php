<!-- Destinatário -->
<div class="bloc-section">
    <div class="container text-center">
        <h5>Destinatário</h5>
        <div class="row">

            <?php if ($order->get_meta('_billing_cnpj', true) != ""): ?>
                <div class="input-group mb-3 col" id="cnpj_destinatario">
                    <span class="input-group-text"><i class="bi bi-file-text"></i></span>
                    <div class="form-floating">
                        <input type="text" value="<?php echo $order->get_meta('_billing_cnpj', true); ?>"
                            class="form-control validate-form" maxlength="15" id="CNPJ_E02"
                            onkeypress="return apenasNumeros();" name="CNPJ_E02">
                        <label for="CNPJ_E02">CNPJ</label>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($order->get_meta('_billing_cpf', true) != ""): ?>
                <div class="input-group mb-3 col">
                    <span class="input-group-text"><i class="bi bi-file-text"></i></span>
                    <div class="form-floating">
                        <input type="text" value="<?php echo $order->get_meta('_billing_cpf', true); ?>"
                            class="form-control validate-form" id="CPF_E03" onkeydown="javascript: fMasc( this, mCPF );"
                            maxlength="14" name="CPF_E03">
                        <label for="CPF_E03">CPF</label>
                    </div>
                </div>
            <?php endif; ?>

            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-people-fill"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form" id="xNome_E04" name="xNome_E04"
                        value="<?php echo $configuracoes['tpAmb_B24'] === '2' ? 'NF-E EMITIDA EM AMBIENTE DE HOMOLOGACAO - SEM VALOR FISCAL' : $order->get_user()->display_name; ?>">
                    <label for="xNome_E04">Nome</label>
                </div>
            </div>
        </div>

        <div class="row">


            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-map"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form" id="CEP_E13" name="CEP_E13"
                        value="<?php echo $order->shipping_postcode; ?>" onkeypress="return apenasNumeros();"
                        onkeyup="viaCep('CEP_E13', 'xBairro_E09', 'xMun_E11', 'UF_E12', 'xLgr_E06', 'cMun_E10')"
                        maxlength="13">
                    <label for="CEP_E13">CEP</label>
                </div>
            </div>

            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-123"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form" onkeypress="return apenasNumeros();"
                        id="cMun_E10" name="cMun_E10">
                    <label for="cMun_E10">Código Município</label>
                </div>
            </div>

            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form" id="xMun_E11" name="xMun_E11">
                    <label for="xMun_E11">Município</label>
                </div>
            </div>

            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-globe-americas"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form" id="UF_E12" name="UF_E12">
                    <label for="UF_E12">Estado</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-pin-map"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form" id="xLgr_E06" name="xLgr_E06">
                    <label for="xLgr_E06">Logradouro</label>
                </div>
            </div>

            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-house"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form" id="nro_E07" name="nro_E07"
                        onkeypress="return apenasNumeros();" value="<?php echo $order->get_meta_data()[6]->value; ?>">
                    <label for="nro_E07">Nº Residência</label>
                </div>
            </div>

            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-clipboard2-plus"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control" id="xCpl_E08" name="xCpl_E08">
                    <label for="xCpl_E08">Complemento</label>
                </div>
            </div>

            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-map-fill"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form" id="xBairro_E09" name="xBairro_E09">
                    <label for="xBairro_E09">Bairro</label>
                </div>
            </div>

        </div>

    </div>
</div>