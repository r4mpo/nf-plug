<!-- Considerações -->
<div class="bloc-section">
    <div class="container text-center">
        <!-- <h5>Considerações</h5> -->
        <h5>Resumo da Nota Fiscal</h5>
        <div class="row">
            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-cash"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form formatar-moeda" id="vNF_W16" name="vNF_W16"
                        value="<?php echo 'R$ ' . number_format(array_sum($valueItems), 2, '.', ''); ?>"
                        onkeyup="formatarMoeda(this);">
                    <label for="vNF_W16">Valor Total NF-e</label>
                </div>
            </div>
            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-cash"></i></span>
                <div class="form-floating">
                    <input type="text" readonly class="form-control bg-color-cinza validate-form formatar-moeda" id="vPag_YA03" name="vPag_YA03"
                        onkeyup="formatarMoeda(this);" value="<?php echo $order->get_total(); ?>">
                    <label for="vPag_YA03">Valor a ser pago</label>
                </div>
            </div>
            <div class="input-group mb-3 col">
                <span class="input-group-text">%</span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form" id="vBC_W03" value="0" name="vBC_W03"
                    onkeyup="formatarMoeda(this);">
                    <label for="vBC_W03">Base de cálculo ICMS</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-cash"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form formatar-moeda" id="vICMS_W04" value="0" name="vICMS_W04"
                        onkeyup="formatarMoeda(this);">
                    <label for="vICMS_W04">Cálculo total do ICMS</label>
                </div>
            </div>
            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-cash"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form formatar-moeda" id="vICMSDeson_W04a" value="0"
                        name="vICMSDeson_W04a" onkeyup="formatarMoeda(this);">
                    <label for="vICMSDeson_W04a">ICMS Desonerado</label>
                </div>
            </div>
            <div class="input-group mb-3 col">
                <span class="input-group-text">%</span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form" id="vBCST_W05" name="vBCST_W05"
                        value="0" onkeyup="formatarMoeda(this);">
                    <label for="vBCST_W05">Base cálculo ICMS ST</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-cash"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form formatar-moeda" id="vST_W06" name="vST_W06" value="0"
                        onkeyup="formatarMoeda(this);">
                    <label for="vST_W06">Total ICMS ST</label>
                </div>
            </div>
            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-cash"></i></span>
                <div class="form-floating">
                    <input type="text" readonly class="form-control bg-color-cinza validate-form formatar-moeda" id="vProd_W07"
                        value="<?php echo 'R$ ' . number_format(array_sum($valueItems), 2, '.', ''); ?>"
                        name="vProd_W07" onkeyup="formatarMoeda(this);">
                    <label for="vProd_W07">Valor total dos produtos</label>
                </div>
            </div>
            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-cash"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form formatar-moeda" id="vFrete_W08" onkeyup="formatarMoeda(this);"
                        value="0" name="vFrete_W08">
                    <label for="vFrete_W08">Valor do frete</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-cash"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form formatar-moeda" id="vSeg_W09" name="vSeg_W09"
                        onkeyup="formatarMoeda(this);" value="0">
                    <label for="vSeg_W09">Valor total do seguro</label>
                </div>
            </div>
            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-cash"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form formatar-moeda" id="vDesc_W10" name="vDesc_W10"
                        onkeyup="formatarMoeda(this);"
                        value="<?php echo $order->get_total_discount(); ?>">
                    <label for="vDesc_W10">Valor total do desconto</label>
                </div>
            </div>
            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-cash"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form formatar-moeda" id="vII_W11" name="vII_W11"
                        onkeyup="formatarMoeda(this);" value="0">
                    <label for="vII_W11">Valor Total do II</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-cash"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form formatar-moeda" id="vIPI_W12" name="vIPI_W12"
                        onkeyup="formatarMoeda(this);" value="0">
                    <label for="vIPI_W12">Valor Total do IPI</label>
                </div>
            </div>
            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-cash"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form formatar-moeda" id="vPIS_W13" name="vPIS_W13"
                        onkeyup="formatarMoeda(this);" value="0">
                    <label for="vPIS_W13">Valor Total do PIS</label>
                </div>
            </div>
            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-cash"></i></span>
                <div class="form-floating">
                    <input type="text" id="vCOFINS_W14" value="0" name="vCOFINS_W14"
                        onkeyup="formatarMoeda(this);" class="form-control validate-form formatar-moeda" id="n_lote">
                    <label for="vCOFINS_W14">Valor Total do COFINS</label>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-cash"></i></span>
                <div class="form-floating">
                    <input type="text" readonly class="form-control validate-form bg-color-cinza formatar-moeda" id="vOutro_W15" value="0" name="vOutro_W15"
                        onkeyup="formatarMoeda(this);">
                    <label for="vOutro_W15">Outras despesas</label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating">
                    <select id="tPag_YA02" name="tPag_YA02" class="form-select validate-form">
                        <option selected value="">Selecione o método de pagamento</option>
                        <option <?php if ($configuracoes['metodo_pagamento']=="03" ): ?> selected 
                            <?php endif; ?> value="03">Cartão de crédito
                        </option>
                        <option <?php if ($configuracoes['metodo_pagamento']=="04" ): ?> selected 
                            <?php endif; ?> value="04">Cartão de débito
                        </option>
                        <option <?php if ($configuracoes['metodo_pagamento']=="15" ): ?> selected 
                            <?php endif; ?> value="15">Boleto Bancário
                        </option>
                        <option <?php if ($configuracoes['metodo_pagamento']=="16" ): ?> selected
                            <?php endif; ?> value="16">Depósito Bancário
                        </option>
                    </select>
                    <label for="tPag_YA02">Selecione o método de pagamento</label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating">
                    <select class="form-select validate-form" id="modFrete_X02" name="modFrete_X02">
                        <option selected value="">Modalidade do frete</option>
                        <option <?php if ($configuracoes['modalidade_frete']=="0" ): ?> selected ??php endif; ??
                            <?php endif; ?> value="0">Contratação do Frete por conta do Remetente (CIF)
                        </option>
                        <option <?php if ($configuracoes['modalidade_frete']=="1" ): ?> selected ??php endif; ??
                            <?php endif; ?> value="1">Contratação do Frete por conta do Destinatário (FOB)
                        </option>
                        <option <?php if ($configuracoes['modalidade_frete']=="2" ): ?> selected ??php endif; ??
                            <?php endif; ?> value="2">Contratação do Frete por conta de Terceiros
                        </option>
                        <option <?php if ($configuracoes['modalidade_frete']=="3" ): ?> selected ??php endif; ??
                            <?php endif; ?> value="3">Transporte Próprio por conta do Remetente
                        </option>
                        <option <?php if ($configuracoes['modalidade_frete']=="4" ): ?> selected ??php endif; ??
                            <?php endif; ?> value="4">Transporte Próprio por conta do Destinatário
                        </option>
                        <option <?php if ($configuracoes['modalidade_frete']=="9" ): ?> selected ??php endif; ??
                            <?php endif; ?> value="9">Sem Ocorrência de Transporte
                        </option>
                    </select>
                    <label for="modFrete_X02">Modalidade do frete</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-cash"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form formatar-moeda" id="vIPIDevol_W12a" value="0" name="vIPIDevol_W12a"
                        onkeyup="formatarMoeda(this);">
                    <label for="vIPIDevol_W12a">Valor Total do IPI Devolvido</label>
                </div>
            </div>
            <div class="input-group mb-3 col">
                <span class="input-group-text"><i class="bi bi-cash"></i></span>
                <div class="form-floating">
                    <input type="text" class="form-control validate-form formatar-moeda" id="vFCP_W04h" value="0" name="vFCP_W04h"
                        onkeyup="formatarMoeda(this);">
                    <label for="vFCP_W04h">Valor Total do Fundo de Combate à Pobreza</label>
                </div>
            </div>
        </div>
        <div class="input-group">
            <span class="input-group-text">Descrição</span>
            <textarea class="form-control" id="infCpl_Z03" name="infCpl_Z03" aria-label="With textarea"><?php echo $configuracoes['descricao_padrao']; ?></textarea>
        </div>
    </div>
</div>