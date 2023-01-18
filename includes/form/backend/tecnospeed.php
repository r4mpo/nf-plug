<?php
/********** PEGANDO DADOS PARA INSERIR NOS CAMPOS DA API - tx2 ************/
$txt = fopen(__DIR__ . "/../tx2/" . $_POST['numero_do_pedido_woocommerce'] . '_' . date("Y-m-d h_i_s") . '.txt', "a");
fwrite($txt, 'Formato=' . $_POST["Formato"]);
fwrite($txt, '\nnumlote=' . $_POST["numlote"]);
fwrite($txt, '\nINCLUIR');
fwrite($txt, '\nId_A03=0'); // Este campo recebe o valor 0 pois se preenche automaticamente na API;
fwrite($txt, '\nversao_A02=' . $_POST["versao_A02"]);
fwrite($txt, '\ncUF_B02=' . $_POST["cUF_B02"]);
fwrite($txt, '\ncNF_B03=' . $_POST["cNF_B03"]);
fwrite($txt, '\nnatOp_B04=' . $_POST["natOp_B04"]);
fwrite($txt, '\nmod_B06=' . $_POST["mod_B06"]);
fwrite($txt, '\nserie_B07=' . $_POST["serie_B07"]);
fwrite($txt, '\nnNF_B08=' . $_POST["nNF_B08"]);
fwrite($txt, '\nDHEMI_B09=' . (date('Y-m-d') . 'T' . date('h:i:s')));
fwrite($txt, '\ntpNF_B11=' . $_POST["tpNF_B11"]);
fwrite($txt, '\nIDDEST_B11A=' . $_POST["IDDEST_B11A"]);
fwrite($txt, '\ncMunFG_B12=' . $_POST["cMun_C10"]);
fwrite($txt, '\ntpImp_B21=' . $_POST["tpImp_B21"]);
fwrite($txt, '\ntpEmis_B22=' . $_POST["tpEmis_B22"]);
fwrite($txt, '\ncDV_B23=' . $_POST["cDV_B23"]);
fwrite($txt, '\ntpAmb_B24=' . $_POST["tpAmb_B24"]);
fwrite($txt, '\nfinNFe_B25=' . $_POST["finNFe_B25"]);
fwrite($txt, '\nINDFINAL_B25A=' . $_POST["INDFINAL_B25A"]);
fwrite($txt, '\nINDPRES_B25B=' . $_POST["INDPRES_B25B"]);
fwrite($txt, '\nprocEmi_B26=' . $_POST["procEmi_B26"]);
fwrite($txt, '\nverProc_B27=' . $_POST["verProc_B27"]);
fwrite($txt, '\nCRT_C21=' . $_POST["CRT_C21"]);
fwrite($txt, '\nCNPJ_C02=' . $_POST["CNPJ_C02"]);
fwrite($txt, '\nxNome_C03=' . $_POST["xNome_C03"]);
fwrite($txt, '\nxLgr_C06=' . $_POST["xLgr_C06"]);
fwrite($txt, '\nnro_C07=' . $_POST["nro_C07"]);
fwrite($txt, '\nxBairro_C09=' . $_POST["xBairro_C09"]);
fwrite($txt, '\ncMun_C10=' . $_POST["cMun_C10"]);
fwrite($txt, '\nxMun_C11=' . $_POST["xMun_C11"]);
fwrite($txt, '\nUF_C12=' . $_POST["UF_C12"]);
fwrite($txt, '\nCEP_C13=' . $_POST["CEP_C13"]);
fwrite($txt, '\nfone_C16=' . $_POST["fone_C16"]);
fwrite($txt, '\nIE_C17=' . $_POST["IE_C17"]);
fwrite($txt, '\nCNPJ_E02=' . $_POST["CNPJ_E02"]);
fwrite($txt, '\nCPF_E03=' . preg_replace('/\D/', '', $_POST["CPF_E03"]));
fwrite($txt, '\nIDESTRANGEIRO_E03A='); // colocar campo opcional no formulário
fwrite($txt, '\nxNome_E04=' . $_POST["xNome_E04"]);
fwrite($txt, '\nxLgr_E06=' . $_POST["xLgr_E06"]);
fwrite($txt, '\nnro_E07=' . $_POST["nro_E07"]);
fwrite($txt, '\nxBairro_E09=' . $_POST["xBairro_E09"]);
fwrite($txt, '\ncMun_E10=' . $_POST["cMun_E10"]);
fwrite($txt, '\nxMun_E11=' . $_POST["xMun_E11"]);
fwrite($txt, '\nUF_E12=' . $_POST["UF_E12"]);
fwrite($txt, '\nCEP_E13=' . $_POST["CEP_E13"]);
fwrite($txt, '\nINDIEDEST_E16A=' . $_POST["INDIEDEST_E16A"]);
$item = $_POST['item'];
for ($i = 1; $i <= count($item); $i++) {
    fwrite($txt, '\nINCLUIRITEM');
    fwrite($txt, '\nnItem_H02=' . $item[$i]["'nItem_H02'"]);
    fwrite($txt, '\ncProd_I02=' . $_POST["cProd_I02"]);
    fwrite($txt, '\ncEAN_I03=' . $item[$i]["'cEAN_I03'"]);
    fwrite($txt, '\nxProd_I04=' . $item[$i]["'xProd_I04'"]);
    fwrite($txt, '\nNCM_I05=' . $_POST["NCM_I05"]);
    fwrite($txt, '\nCEST_I05c=' . $_POST["CEST_I05c"]);
    fwrite($txt, '\nCFOP_I08=' .  $_POST["cProd_I02"]);
    fwrite($txt, '\nuCom_I09=' . $item[$i]["'uCom_I09'"]);
    fwrite($txt, '\nqCom_I10=' . $item[$i]["'qCom_I10'"]);
    fwrite($txt, '\nvUnCom_I10a=' . (preg_replace('/\D/', '', $item[$i]["'vUnCom_I10a'"])) / 100);
    fwrite($txt, '\nvProd_I11=' . ((preg_replace('/\D/', '', $item[$i]["'vUnCom_I10a'"]) * $item[$i]["'qCom_I10'"]) / 100));
    fwrite($txt, '\ncEANTrib_I12=' . $item[$i]["'cEAN_I03'"]);
    fwrite($txt, '\nuTrib_I13=' . $_POST["uTrib_I13"]);
    fwrite($txt, '\nqTrib_I14=' . $item[$i]["'qCom_I10'"]);
    fwrite($txt, '\nvUnTrib_I14a=' . (preg_replace('/\D/', '', $item[$i]["'vUnTrib_I14a'"]) / 100));
    fwrite($txt, '\nindTot_I17b=' . $_POST["indTot_I17b"]);
    fwrite($txt, '\norig_N11=' . $item[$i]["'orig_N11'"]);
    fwrite($txt, '\nCST_N12=' . $_POST["CST_N12"]);
    fwrite($txt, '\nCST_Q06=' . $item[$i]["'CST_Q06'"]);
    fwrite($txt, '\nCST_S06=' . $item[$i]["'CST_S06'"]);
    fwrite($txt, '\nSALVARITEM');
}
fwrite($txt, '\nvBC_W03=' . preg_replace('/\D/', '', $_POST["vBC_W03"]) / 100);
fwrite($txt, '\nvICMS_W04=' . preg_replace('/\D/', '', $_POST["vICMS_W04"]) / 100);
fwrite($txt, '\nvICMSDeson_W04a=' . preg_replace('/\D/', '', $_POST["vICMSDeson_W04a"]) / 100);
fwrite($txt, '\nvBCST_W05=' . preg_replace('/\D/', '', $_POST["vBCST_W05"]) / 100);
fwrite($txt, '\nvST_W06=' . preg_replace('/\D/', '', $_POST["vST_W06"]) / 100);
fwrite($txt, '\nvFCPST_W06a=' . $_POST["vFCPST_W06a"]);
fwrite($txt, '\nvFCPSTRet_W06b=' . $_POST["vFCPSTRet_W06b"]);
fwrite($txt, '\nvProd_W07=' . preg_replace('/\D/', '', $_POST["vProd_W07"]) / 100);
fwrite($txt, '\nvFrete_W08=' . preg_replace('/\D/', '', $_POST["vFrete_W08"]) / 100);
fwrite($txt, '\nvSeg_W09=' . preg_replace('/\D/', '', $_POST["vSeg_W09"]) / 100);
fwrite($txt, '\nvDesc_W10=' . preg_replace('/\D/', '', $_POST["vDesc_W10"]) / 100);
fwrite($txt, '\nvII_W11=' . preg_replace('/\D/', '', $_POST["vII_W11"]) / 100);
fwrite($txt, '\nvIPI_W12=' . preg_replace('/\D/', '', $_POST["vIPI_W12"]) / 100);
fwrite($txt, '\nvPIS_W13=' . preg_replace('/\D/', '', $_POST["vPIS_W13"]) / 100);
fwrite($txt, '\nvCOFINS_W14=' . preg_replace('/\D/', '', $_POST["vCOFINS_W14"]) / 100);
fwrite($txt, '\nvOutro_W15=' . preg_replace('/\D/', '', $_POST["vOutro_W15"]) / 100);
fwrite($txt, '\nvNF_W16=' . preg_replace('/\D/', '', $_POST["vNF_W16"]) / 100);
fwrite($txt, '\nmodFrete_X02=' . $_POST["modFrete_X02"]);
fwrite($txt, '\nINCLUIRPARTE=YA');
fwrite($txt, '\ntPag_YA02=' . preg_replace('/\D/', '', $_POST["tPag_YA02"]) / 100);
fwrite($txt, '\nvPag_YA03=' . preg_replace('/\D/', '', $_POST["vPag_YA03"]) / 100);
fwrite($txt, '\nSALVARPARTE=YA');
fwrite($txt, '\nCNPJ_ZD02=' . $_POST["CNPJ_ZD02"]);
fwrite($txt, '\nxContato_ZD04=' . $_POST["xContato_ZD04"]);
fwrite($txt, '\nemail_ZD05=' . $_POST["email_ZD05"]);
fwrite($txt, '\nfone_ZD06=' . $_POST["fone_ZD06"]);
fwrite($txt, '\ninfCpl_Z03=' . $_POST["infCpl_Z03"]);
fwrite($txt, '\nSALVAR');
$tx2 = str_replace('\n', '<br>', file_get_contents(__DIR__ . "/../tx2/" . $_POST['numero_do_pedido_woocommerce'] . '_' . date("Y-m-d h_i_s") . '.txt'));


/********** REQUISIÇÃO NA API - TECNOSPEED ************/

$curl = curl_init();
$cnpj = $_POST['cnpj'];
$grupo = $_POST['grupo'];
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://managersaas.tecnospeed.com.br:8081/ManagerAPIWeb/nfe/envia",
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_SSL_VERIFYHOST => 0,
    /******* DEIXAR O AUTORIZATION DINAMICO */
    CURLOPT_HTTPHEADER => array($_POST['content_type'], 'agilisparts 4u9p3x8ODUgu@'),
    CURLOPT_POSTFIELDS => array($grupo, $cnpj, $tx2),
    CURLOPT_TIMEOUT => 30,
    CURLOPT_RETURNTRANSFER => true
));

$response = json_decode(curl_exec($curl), true);
$err = curl_error($curl);
if ($err) 
{
    echo "cURL Error #:" . $err;
}
echo $tx2;
curl_close($curl);
?>