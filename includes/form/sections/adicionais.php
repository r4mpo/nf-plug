<!-- Adicionais -->
<div class="bloc-section">
<div class="container text-center">
    <h5>Adicionais</h5>
    <div class="row">

        <div class="col-md">
            <div class="form-floating">
                <select class="form-select validate-form" id="CRT_C21" name="CRT_C21">
                    <option value="1">Simples Nacional</option>
                    <option value="2">Simples Nacional, excesso sublimite de receita bruta</option>
                    <option selected value="3">Regime Normal.</option>
                </select>
                <label for="CRT_C21">Código Regime Tributário</label>
            </div>
        </div>

        <div class="col-md">
            <div class="form-floating">
                <select class="form-select validate-form" onchange="habilitandoInscricaoEstadual(this, 'IE_E17')" id="INDIEDEST_E16A" name="INDIEDEST_E16A">
                    <option value="1">Contribuinte ICMS</option>
                    <option value="2">Contribuinte isento de Inscrição no cadastro de Contribuintes do ICMS</option>
                    <option value="9">Não Contribuinte, que pode ou não possuir Inscrição Estadual no Cadastro de Contribuintes do ICMS</option>
                </select>
                <label for="INDIEDEST_E16A">Indicador da IE do Destinatário</label>
            </div>
        </div>

        <div class="input-group mb-3 col">
            <span class="input-group-text"><i class="bi bi-123"></i></span>
            <div class="form-floating">
                <input type="text" class="form-control validate-form" id="IE_E17" name="IE_E17"
                    onkeypress="return apenasNumeros();">
                <label for="IE_E17">IE Destinatário</label>
            </div>
        </div>

        <div class="col-md">
            <div class="form-floating">
                <select class="form-select validate-form" name="IDDEST_B11A" id="IDDEST_B11A">
                    <option selected value="">ID do Local de Destino</option>
                    <option <?php if ($configuracoes['id_local_de_destino']=="1" ): ?> selected
                        <?php endif; ?> value="1">Operação interna
                    </option>
                    <option <?php if ($configuracoes['id_local_de_destino']=="2" ): ?> selected
                        <?php endif; ?> value="2">Operação interestadual
                    </option>
                    <option <?php if ($configuracoes['id_local_de_destino']=="3" ): ?> selected
                        <?php endif; ?> value="3">Operação com exterior
                    </option>
                </select>
                <label for="IDDEST_B11A">ID do Local de Destino</label>
            </div>
        </div>

    </div>
</div>
</div>
