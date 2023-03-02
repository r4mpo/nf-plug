<!-- Emitente -->
<div class="bloc-section">
    <div class="container text-center">
        <h5>Emitente</h5>
        <div class="row">
            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-person-bounding-box"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form" id="xNome_C03" name="xNome_C03"
                        value="<?php echo $configuracoes['tpAmb_B24'] === '2' ? 'NF-E EMITIDA EM AMBIENTE DE HOMOLOGACAO - SEM VALOR FISCAL' : $configuracoes['xNome_C03 ']; ?>">
                    <label for="xNome_C03">Nome</label>
                </div>
            </div>

            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form" id="fone_C16"
                        value="<?php echo $configuracoes['fone_C16']; ?>" name="fone_C16"
                        onkeypress="return apenasNumeros();" maxlength="20">
                    <label for="fone_C16">Telefone</label>
                </div>
            </div>

            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-globe-americas"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form" maxlength="13"
                        onkeypress="return apenasNumeros();"
                        value="<?php echo $configuracoes['CEP_C13']; ?>"
                        onkeyup="viaCep('CEP_C13', 'xBairro_C09', 'xMun_C11', 'UF_C12', 'xLgr_C06', 'cMun_C10')"
                        id="CEP_C13" name="CEP_C13">
                    <label for="CEP_C13">CEP</label>
                </div>
            </div>

            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form" id="xBairro_C09" name="xBairro_C09">
                    <label for="xBairro_C09">Bairro</label>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-geo-fill"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form" id="xMun_C11" name="xMun_C11">
                    <label for="xMun_C11">Município</label>
                </div>
            </div>

            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-pin-map"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form" id="UF_C12" name="UF_C12">
                    <label for="UF_C12">Estado</label>
                </div>
            </div>

            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-map"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form" onkeypress="return apenasNumeros();"
                        id="cMun_C10" name="cMun_C10">
                    <label for="cMun_C10">Código do Município</label>
                </div>
            </div>

            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-map-fill"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form" id="xLgr_C06" name="xLgr_C06">
                    <label for="xLgr_C06">Logradouro</label>
                </div>
            </div>

            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-map-fill"></i></span>
                <div class="form-floating">
                    <input type="text" value="<?php echo $configuracoes['nro_C07']; ?>" class="form-control validate-form" id="nro_C07" name="nro_C07">
                    <label for="nro_C07">Nº Residência</label>
                </div>
            </div>
        </div>

    </div>
</div>