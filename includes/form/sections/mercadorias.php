<!-- Mercadorias -->

<?php
$contador = 1;
foreach ($order->get_items() as $item_key => $item): ?>

    <div class="bloc-section">
        <div class="container text-center">
            <h5>Mercadorias</h5>
            <div class="row">
                <div class="input-group mb-3 col">
                    <span class="input-group-text"><i class="bi bi-upc-scan"></i></span>
                    <div class="form-floating">
                        <input type="text" class="form-control validate-form" id="item[<?php echo $contador; ?>]['cEAN_I03']"
                            value="<?php echo wc_get_product($item->get_product_id())->get_sku(); ?>"
                            name="item[<?php echo $contador; ?>]['cEAN_I03']" onkeypress="return apenasNumeros();">
                        <label for="item[<?php echo $contador; ?>]['cEAN_I03']">Código de barras</label>
                    </div>
                </div>
                <div class="input-group mb-3 col">
                    <span class="input-group-text"><i class="bi bi-coin"></i></span>
                    <div class="form-floating">
                        <input type="text" class="form-control validate-form formatar-moeda" id="item[<?php echo $contador; ?>]['vUnTrib_I14a']"
                            name="item[<?php echo $contador; ?>]['vUnTrib_I14a']" value="0" onkeyup="formatarMoeda(this);">
                        <label for="item[<?php echo $contador; ?>]['vUnTrib_I14a']">Valor tributo unitário</label>
                    </div>
                </div>
                <div class="input-group mb-3 col">
                    <span class="input-group-text"><i class="bi bi-regex"></i></span>
                    <div class="form-floating">
                        <input type="text" class="form-control validate-form" id="item[<?php echo $contador; ?>]['nItem_H02']"
                            value="<?php echo $contador; ?>" onkeypress="return apenasNumeros();"
                            name="item[<?php echo $contador; ?>]['nItem_H02']">
                        <label for="item[<?php echo $contador; ?>]['nItem_H02']">ID do Produto</label>
                    </div>
                </div>
                <div class="input-group mb-3 col">
                    <span class="input-group-text"><i class="bi bi-coin"></i></span>
                    <div class="form-floating">
                        <input type="text"
                            class="form-control validate-form formatar-moeda" id=" item[<?php echo $contador; ?>]['vUnCom_I10a']"
                            name="item[<?php echo $contador; ?>]['vUnCom_I10a']" onkeyup="formatarMoeda(this);"
                            value="<?php echo $item->get_product()->get_price(); ?>">
                        <label for="item[<?php echo $contador; ?>]['vUnCom_I10a']">Valor Un. Produto</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-floating">
                        <select class="form-select validate-form" id="item[<?php echo $contador; ?>]['orig_N11']"
                            name="item[<?php echo $contador; ?>]['orig_N11']">
                            <option selected value="0">Nacional, exceto as indicadas nos códigos 3, 4, 5 e 8
                            </option>
                            <option value="1">Estrangeira - Importação direta, exceto a indicada no código 6
                            </option>
                            <option value="2">Estrangeira - Adquirida no mercado interno, exceto a indicada no
                                código 7
                            </option>
                            <option value="3">Nacional, mercadoria ou bem com Conteúdo de Importação superior a
                                40% e
                                inferior
                                ou
                                igual a 70%</option>
                            <option value="4">Nacional, cuja produção tenha sido feita em conformidade (...)
                            </option>
                            <option value="5">Nacional, mercadoria ou bem com Conteúdo de Importação inferior ou
                                igual a 40%
                            </option>
                            <option value="6">Estrangeira - Importação direta, sem similar nacional, constante
                                em lista da
                                CAMEX
                                e
                                gás natural</option>
                            <option value="7">Estrangeira - Adquirida no mercado interno, sem similar nacional,
                                constante
                                lista
                                CAMEX e gás natural.</option>
                            <option value="8">Nacional, mercadoria ou bem com Conteúdo de Importação superior a
                                70%</option>
                        </select>
                        <label for="item[<?php echo $contador; ?>]['orig_N11']">Origem da mercadoria</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <select class="form-select validate-form" id="item[<?php echo $contador; ?>]['CST_Q06']"
                            name="item[<?php echo $contador; ?>]['CST_Q06']">
                            <option value="01">Operação Tributável (base de cálculo = valor da operação alíquota
                                normal
                                (cumulativo/não cumulativo))</option>
                            <option selected value="02">Operação Tributável (base de cálculo = valor da operação
                                (alíquota
                                diferenciada))
                            </option>
                        </select>
                        <label for="item[<?php echo $contador; ?>]['CST_Q06']">Código de Situação Tributária do
                            PIS</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <select class="form-select validate-form" id="item[<?php echo $contador; ?>]['CST_S06']"
                            name="item[<?php echo $contador; ?>]['CST_S06']">
                            <option value="01">Operação Tributável (base de cálculo = valor da operação alíquota
                                normal
                                (cumulativo/não cumulativo))</option>
                            <option selected value="02">Operação Tributável (base de cálculo = valor da operação
                                (alíquota
                                diferenciada))
                            </option>
                        </select>
                        <label for="item[<?php echo $contador; ?>]['CST_S06']">Código de Situação Tributária do
                            COFINS</label>
                    </div>
                </div>
            </div>
            <div class="row bloc-section">
                <div class="input-group mb-3 col">
                    <span class="input-group-text"><i class="bi bi-clipboard-data"></i></span>
                    <div class="form-floating">
                        <input type="text" class="form-control validate-form" id="item[<?php echo $contador; ?>]['qCom_I10']"
                            name="item[<?php echo $contador; ?>]['qCom_I10']" onkeypress="return apenasNumeros();"
                            value="<?php echo $item->get_quantity(); ?>">
                        <label for="item[<?php echo $contador; ?>]['qCom_I10']">Qtd. Produto</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <select class="form-select validate-form" id="item[<?php echo $contador; ?>]['uCom_I09']"
                            name="item[<?php echo $contador; ?>]['uCom_I09']">
                            <option selected value="UN">UNIDADE</option>
                            <option value="G">GRAMA</option>
                            <option value="JOGO">JOGO</option>
                            <option value="LT">LITRO</option>
                            <option value="M">METRO</option>
                            <option value="M2">METRO QUADRADO</option>
                        </select>
                        <label for="item[<?php echo $contador; ?>]['uCom_I09']">Tipo de unidade do produto</label>
                    </div>
                </div>
                <div class="input-group mb-3 col">
                    <span class="input-group-text"><i class="bi bi-pencil"></i></span>
                    <div class="form-floating">
                        <input type="text" class="form-control validate-form" id="item[<?php echo $contador; ?>]['xProd_I04']"
                            name="item[<?php echo $contador; ?>]['xProd_I04']" value="<?php echo $item->get_name(); ?>">
                        <label for="item[<?php echo $contador; ?>]['xProd_I04']">Breve descrição do produto</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $valueItems[] = $item->get_product()->get_price() * $item->get_quantity();
    $contador = $contador + 1;
endforeach;
?>