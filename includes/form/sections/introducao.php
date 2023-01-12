<!-- Introdução -->
<div class="bloc-section">
    <div class="container text-center">
        <h5>Introdução</h5>
        <div class="row">
            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-123"></i></span>
                <div class="form-floating">
                    <input type="text" onkeypress="return apenasNumeros();" value="<?php echo $id; ?>"
                        class="form-control validate-form" id="numlot" name="numlot">
                    <label for="numlot">Nº Lote</label>
                </div>
            </div>

            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-globe-americas"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form" id="cUF_B02" name="cUF_B02"
                        value="<?php echo $order->shipping_state; ?>">
                    <label for="cUF_B02">Código UF do Destinatário</label>
                </div>
            </div>

            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-pencil"></i></span>
                <div class="form-floating">
                    <input type="text"
                        value="Realização de venda de mercadorias solicitadas por <?php echo $order->get_user()->display_name; ?>"
                        class="form-control validate-form" id="natOp_B04" name="natOp_B04">
                    <label for="natOp_B04">Descrição da operação</label>
                </div>
            </div>

            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-123"></i></span>
                <div class="form-floating">
                    <input type="text" onkeypress="return apenasNumeros();" class="form-control validate-form" id="mod_B06"
                        name="mod_B06" value="55">
                    <label for="mod_B06">Código da operação</label>
                </div>
            </div>
        </div>
    </div>

    <div class="container text-center">
        <div class="row">

            <div class="col-md">
                <div class="form-floating">
                    <select class="form-select validate-form" id="tpNF_B11" name="tpNF_B11">
                        <option value="0">Entrada</option>
                        <option selected value="1">Saída</option>
                    </select>
                    <label for="tpNF_B11">Tipo de Operação</label>
                </div>
            </div>

            <div class="col-md">
                <div class="form-floating">
                    <select class="form-select validate-form" id="finNFe_B25" name="finNFe_B25">
                        <option selected value="1">NF-e normal</option>
                        <option value="2">NF-e complementar</option>
                        <option value="3">NF-e de ajuste</option>
                        <option value="4">Devolução de mercadoria</option>
                    </select>
                    <label for="finNFe_B25">Versão da NF-e</label>
                </div>
            </div>

            <div class="col-md">
                <div class="form-floating">
                    <select class="form-select validate-form" id="INDPRES_B25B" name="INDPRES_B25B">
                        <option value="0">Não se aplica</option>
                        <option value="1">Operação presencial</option>
                        <option selected value="2">Operação não presencial, pela Internet</option>
                        <option value="3">Operação não presencial, Teleatendimento</option>
                        <option value="4">NFC-e em operação com entrega a domicílio</option>
                        <option value="5">Operação presencial, fora do estabelecimento</option>
                        <option value="9">Operação não presencial, outros</option>
                    </select>
                    <label for="INDPRES_B25B">Presença do Comprador</label>
                </div>
            </div>

            <div class="col-md">
                <div class="form-floating">
                    <select class="form-select validate-form" id="procEmi_B26" name="procEmi_B26">
                        <option value="0">Emissão de NF-e com aplicativo do contribuinte</option>
                        <option value="1">Emissão de NF-e avulsa pelo Fisco</option>
                        <option selected value="2">Emissão de NF-e avulsa, pelo contribuinte com seu certificado
                            digital,
                            através do site do Fisco</option>
                        <option value="3">Emissão NF-e pelo contribuinte com aplicativo fornecido pelo Fisco.
                        </option>
                    </select>
                    <label for="procEmi_B26">Processo de emissão de NF-e</label>
                </div>
            </div>

        </div>
    </div>
</div>