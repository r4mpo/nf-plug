<!-- Transportador -->
<div class="bloc-section">
    <div class="container text-center">
        <h5>Transportador</h5>
        <div class="row">

            <div class="col-md">
                <div class="form-floating">
                    <select class="form-select validate-form" onchange="SemOcorrenciaDeTransporte()" id="modFrete_X02" name="modFrete_X02">
                        <option selected value="">Modalidade do frete</option>
                        <option <?php if ($configuracoes['modalidade_frete'] == "0") : ?> selected <?php endif; ?> value="0">Contratação do Frete por conta do Remetente (CIF)
                        </option>
                        <option <?php if ($configuracoes['modalidade_frete'] == "1") : ?> selected <?php endif; ?> value="1">Contratação do Frete por conta do Destinatário (FOB)
                        </option>
                        <option <?php if ($configuracoes['modalidade_frete'] == "2") : ?> selected <?php endif; ?> value="2">Contratação do Frete por conta de Terceiros
                        </option>
                        <option <?php if ($configuracoes['modalidade_frete'] == "3") : ?> selected <?php endif; ?> value="3">Transporte Próprio por conta do Remetente
                        </option>
                        <option <?php if ($configuracoes['modalidade_frete'] == "4") : ?> selected <?php endif; ?> value="4">Transporte Próprio por conta do Destinatário
                        </option>
                        <option <?php if ($configuracoes['modalidade_frete'] == "9") : ?> selected <?php endif; ?> value="9">Sem Ocorrência de Transporte
                        </option>
                    </select>
                    <label for="modFrete_X02">Modalidade do frete</label>
                </div>
            </div>


            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-123"></i></span>
                <div class="form-floating">
                    <input type="text" maxlength="14" onkeyup="RgOuCpfTransportadora()" onkeypress="return apenasNumeros();" class="form-control tipo-transporte" id="CNPJ_X04" name="CNPJ_X04">
                    <label for="CNPJ_X04">CNPJ do transportador</label>
                </div>
            </div>

            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-123"></i></span>
                <div class="form-floating">
                    <input type="text" onkeyup="RgOuCpfTransportadora()" onkeypress="return apenasNumeros();" maxlength="11" class="form-control tipo-transporte" id="CPF_X05" name="CPF_X05">
                    <label for="CPF_X05">CPF do transportador</label>
                </div>
            </div>

            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-person-bounding-box"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control tipo-transporte validate-form" id="xNome_X06" name="xNome_X06">
                    <label for="xNome_X06">Nome / Razão social</label>
                </div>
            </div>

        </div>

        <div class="row">
            
            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-123"></i></span>
                <div class="form-floating">
                    <input type="text" maxlength="13" onkeypress="return apenasNumeros();" class="form-control tipo-transporte" id="IE_X07" name="IE_X07">
                    <label for="IE_X07">Inscrição estadual</label>
                </div>
            </div>

            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-globe-americas"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control tipo-transporte validate-form" maxlength="13" onkeypress="return apenasNumeros();" onkeyup="viaCepCamposReduzidos('cep_transportador', 'xMun_X09', 'UF_X10', 'xEnder_X08')" id="cep_transportador" name="cep_transportador">
                    <label for="cep_transportador">CEP</label>
                </div>
            </div>

            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-geo-fill"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control tipo-transporte validate-form" id="xMun_X09" name="xMun_X09">
                    <label for="xMun_X09">Município</label>
                </div>
            </div>

            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-pin-map"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control tipo-transporte validate-form" id="UF_X10" name="UF_X10">
                    <label for="UF_X10">Estado</label>
                </div>
            </div>

            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-map-fill"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control tipo-transporte validate-form" id="xEnder_X08" name="xEnder_X08">
                    <label for="xEnder_X08">Logradouro</label>
                </div>
            </div>

        </div>
    </div>
</div>