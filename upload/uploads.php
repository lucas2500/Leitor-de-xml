<meta http-equiv="refresh" content=0;url="../index.php">
<?php


include 'conexao.php';


if(isset($_FILES['arquivo'])){
	
	$extensao = ($_FILES["arquivo"]["name"]);
	$novo_nome = $extensao;
	$diretorio = "../upload/";

	move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

}


// Recebe o arquivo do formulário de upload
$target_file =  basename($_FILES["arquivo"]["name"]);

// Carrega o arquivo que veio do formulário
$xmldoc = new DOMDocument();
$xmldoc ->load($target_file);

$xmldata = $xmldoc->getElementsByTagName('ide');
$xmldata2 = $xmldoc->getElementsByTagName('emit');
$xmldata3 = $xmldoc->getElementsByTagName('dest');
$xmldata4 = $xmldoc->getElementsByTagName('entrega');
$xmldata5 = $xmldoc->getElementsByTagName('prod');
$xmldata6 = $xmldoc->getElementsByTagName('imposto');
$xmldata7 = $xmldoc->getElementsByTagName('IPI');
$xmldata8 = $xmldoc->getElementsByTagName('PIS');
$xmldata9 = $xmldoc->getElementsByTagName('COFINS');
$xmldata10 = $xmldoc->getElementsByTagName('total');
$xmldata11 = $xmldoc->getElementsByTagName('transp');
$xmldata12 = $xmldoc->getElementsByTagName('veicTransp');
$xmldata13 = $xmldoc->getElementsByTagName('vol');
$xmldata14 = $xmldoc->getElementsByTagName('cobr');
$xmldata15 = $xmldoc->getElementsByTagName('dup');
$xmldata16 = $xmldoc->getElementsByTagName('infAdic');


// Carrega as tags do xml
$xmlcount = $xmldata->length;

for ($i=0; $i <$xmlcount; $i++) {

	$cUF = $xmldata->item($i)->getElementsByTagName('cUF')->item(0)->childNodes->item(0)->nodeValue;
	$cNF = $xmldata->item($i)->getElementsByTagName('cNF')->item(0)->childNodes->item(0)->nodeValue;
	$natOp = $xmldata->item($i)->getElementsByTagName('natOp')->item(0)->childNodes->item(0)->nodeValue;
	$indPag = $xmldata->item($i)->getElementsByTagName('indPag')->item(0)->childNodes->item(0)->nodeValue;
	$mod = $xmldata->item($i)->getElementsByTagName('mod')->item(0)->childNodes->item(0)->nodeValue;
	$serie = $xmldata->item($i)->getElementsByTagName('serie')->item(0)->childNodes->item(0)->nodeValue;
	$nNF = $xmldata->item($i)->getElementsByTagName('nNF')->item(0)->childNodes->item(0)->nodeValue;
	$dEmi = $xmldata->item($i)->getElementsByTagName('dhEmi')->item(0)->childNodes->item(0)->nodeValue;
	$dSaiEnt = $xmldata->item($i)->getElementsByTagName('dhSaiEnt')->item(0)->childNodes->item(0)->nodeValue;
	$tpNF = $xmldata->item($i)->getElementsByTagName('tpNF')->item(0)->childNodes->item(0)->nodeValue;
	$idDest = $xmldata->item($i)->getElementsByTagName('idDest')->item(0)->childNodes->item(0)->nodeValue;
	$cMunFG = $xmldata->item($i)->getElementsByTagName('cMunFG')->item(0)->childNodes->item(0)->nodeValue;
	$tpImp = $xmldata->item($i)->getElementsByTagName('tpImp')->item(0)->childNodes->item(0)->nodeValue;
	$tpEmis = $xmldata->item($i)->getElementsByTagName('tpEmis')->item(0)->childNodes->item(0)->nodeValue;
	$cDV = $xmldata->item($i)->getElementsByTagName('cDV')->item(0)->childNodes->item(0)->nodeValue;
	$tpAmb = $xmldata->item($i)->getElementsByTagName('tpAmb')->item(0)->childNodes->item(0)->nodeValue;
	$finNFe = $xmldata->item($i)->getElementsByTagName('finNFe')->item(0)->childNodes->item(0)->nodeValue;
	$indFinal = $xmldata->item($i)->getElementsByTagName('indFinal')->item(0)->childNodes->item(0)->nodeValue;
	$indPres = $xmldata->item($i)->getElementsByTagName('indPres')->item(0)->childNodes->item(0)->nodeValue;
	$procEmi = $xmldata->item($i)->getElementsByTagName('procEmi')->item(0)->childNodes->item(0)->nodeValue;
	$verProc = $xmldata->item($i)->getElementsByTagName('verProc')->item(0)->childNodes->item(0)->nodeValue;
	$ID = "";
	
	//Percorre a Tag ide da nota fiscal
	
	$stmt = $db->prepare("insert into ide values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

	
	$stmt->bindParam(1,$cUF);
	$stmt->bindParam(2,$cNF);
	$stmt->bindParam(3,$natOp);
	$stmt->bindParam(4,$indPag);
	$stmt->bindParam(5,$mod);
	$stmt->bindParam(6,$serie);
	$stmt->bindParam(7,$nNF);
	$stmt->bindParam(8,$dEmi);
	$stmt->bindParam(9,$dSaiEnt);
	$stmt->bindParam(10,$tpNF);
	$stmt->bindParam(11,$idDest);
	$stmt->bindParam(12,$cMunFG);
	$stmt->bindParam(13,$tpImp);
	$stmt->bindParam(14,$tpEmis);
	$stmt->bindParam(15,$cDV);
	$stmt->bindParam(16,$tpAmb);
	$stmt->bindParam(17,$finNFe);
	$stmt->bindParam(18,$indFinal);
	$stmt->bindParam(19,$indPres);
	$stmt->bindParam(20,$procEmi);
	$stmt->bindParam(21,$verProc);
	$stmt->bindParam(22,$ID);



	//Salva no banco de dados os atributos da nota fiscal

	$stmt->execute();

	
}



$xmlcount2 = $xmldata2->length;

for ($i=0; $i <$xmlcount2; $i++) {
	//Percorre a Tag "emit" da nota fiscal

	$CNPJ_emit = $xmldata2->item($i)->getElementsByTagName('CNPJ')->item(0)->childNodes->item(0)->nodeValue;
	$xNome_emit = $xmldata2->item($i)->getElementsByTagName('xNome')->item(0)->childNodes->item(0)->nodeValue;
	$xFant_emit = $xmldata2->item($i)->getElementsByTagName('xFant')->item(0)->childNodes->item(0)->nodeValue;
	$xLgr_emit = $xmldata2->item($i)->getElementsByTagName('xLgr')->item(0)->childNodes->item(0)->nodeValue;
	$nro_emit = $xmldata2->item($i)->getElementsByTagName('nro')->item(0)->childNodes->item(0)->nodeValue;
	$xBairo_emit = $xmldata2->item($i)->getElementsByTagName('xBairro')->item(0)->childNodes->item(0)->nodeValue;
	$cMun_emit = $xmldata2->item($i)->getElementsByTagName('cMun')->item(0)->childNodes->item(0)->nodeValue;
	$xMun_emit = $xmldata2->item($i)->getElementsByTagName('xMun')->item(0)->childNodes->item(0)->nodeValue;
	$UF_emit = $xmldata2->item($i)->getElementsByTagName('UF')->item(0)->childNodes->item(0)->nodeValue;
	$CEP_emit = $xmldata2->item($i)->getElementsByTagName('CEP')->item(0)->childNodes->item(0)->nodeValue;
	$cPais_emit = $xmldata2->item($i)->getElementsByTagName('cPais')->item(0)->childNodes->item(0)->nodeValue;
	$xPais_emit = $xmldata2->item($i)->getElementsByTagName('xPais')->item(0)->childNodes->item(0)->nodeValue;
	$fone_emit = $xmldata2->item($i)->getElementsByTagName('fone')->item(0)->childNodes->item(0)->nodeValue;
	$IE_emit = $xmldata2->item($i)->getElementsByTagName('IE')->item(0)->childNodes->item(0)->nodeValue;
	$CRT = $xmldata2->item($i)->getElementsByTagName('CRT')->item(0)->childNodes->item(0)->nodeValue;
	$ID_emit = "";


	$stmt2 = $db->prepare("insert into emit values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");



	$stmt2->bindParam(1,$CNPJ_emit);
	$stmt2->bindParam(2,$xNome_emit);
	$stmt2->bindParam(3,$xFant_emit);
	$stmt2->bindParam(4,$xLgr_emit);
	$stmt2->bindParam(5,$nro_emit);
	$stmt2->bindParam(6,$xBairro_emit);
	$stmt2->bindParam(7,$cMun_emit);
	$stmt2->bindParam(8,$xMun_emit);
	$stmt2->bindParam(9,$UF_emi);
	$stmt2->bindParam(10,$CEP_emit);
	$stmt2->bindParam(11,$cPais_emit);
	$stmt2->bindParam(12,$xPais_emit);
	$stmt2->bindParam(13,$fone_emit);
	$stmt2->bindParam(14,$IE_emit );
	$stmt2->bindParam(15,$CRT);
	$stmt2->bindParam(16,$ID_emit );


	$stmt2->execute();

}


	//Percorre a Tag "dest" da nota fiscal
$xmlcount3 = $xmldata3->length;

for ($i=0; $i <$xmlcount3; $i++) {


	$CNPJ_dest = $xmldata3->item($i)->getElementsByTagName('CNPJ')->item(0)->childNodes->item(0)->nodeValue;
	$xNome_dest = $xmldata3->item($i)->getElementsByTagName('xNome')->item(0)->childNodes->item(0)->nodeValue;
	$xLgr_dest  = $xmldata3->item($i)->getElementsByTagName('xLgr')->item(0)->childNodes->item(0)->nodeValue;
	$nro_dest  = $xmldata3->item($i)->getElementsByTagName('nro')->item(0)->childNodes->item(0)->nodeValue;
	$xBairro_dest   = $xmldata3->item($i)->getElementsByTagName('xBairro')->item(0)->childNodes->item(0)->nodeValue;
	$cMun_dest   = $xmldata3->item($i)->getElementsByTagName('cMun')->item(0)->childNodes->item(0)->nodeValue;
	$xMun_dest   = $xmldata3->item($i)->getElementsByTagName('xMun')->item(0)->childNodes->item(0)->nodeValue;
	$UF_dest    = $xmldata3->item($i)->getElementsByTagName('UF')->item(0)->childNodes->item(0)->nodeValue;
	$CEP_dest    = $xmldata3->item($i)->getElementsByTagName('CEP')->item(0)->childNodes->item(0)->nodeValue;
	$cPais_dest    = $xmldata3->item($i)->getElementsByTagName('cPais')->item(0)->childNodes->item(0)->nodeValue;
	$xPais_dest    = $xmldata3->item($i)->getElementsByTagName('xPais')->item(0)->childNodes->item(0)->nodeValue;
	$fone_dest    = $xmldata3->item($i)->getElementsByTagName('fone')->item(0)->childNodes->item(0)->nodeValue;
	$indIEDest    = $xmldata3->item($i)->getElementsByTagName('indIEDest')->item(0)->childNodes->item(0)->nodeValue;
	$IE_dest    = $xmldata3->item($i)->getElementsByTagName('IE')->item(0)->childNodes->item(0)->nodeValue;
	$ID_dest = "";



	$stmt3 = $db->prepare("insert into dest values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");



	$stmt3->bindParam(1,$CNPJ_dest);
	$stmt3->bindParam(2,$xNome_dest);
	$stmt3->bindParam(3,$xLgr_dest);
	$stmt3->bindParam(4,$nro_dest );
	$stmt3->bindParam(5,$xBairro_dest);
	$stmt3->bindParam(6,$cMun_dest);
	$stmt3->bindParam(7,$xMun_dest );
	$stmt3->bindParam(8,$UF_dest);
	$stmt3->bindParam(9,$CEP_dest);
	$stmt3->bindParam(10,$cPais_dest);
	$stmt3->bindParam(11,$xPais_dest);
	$stmt3->bindParam(12,$fone_dest);
	$stmt3->bindParam(13,$indIEDest);
	$stmt3->bindParam(14,$IE_dest  );
	$stmt3->bindParam(15,$ID_dest );


	$stmt3->execute();

}



	//Percorre a Tag "entrega" da nota fiscal
$xmlcount4 = $xmldata4->length;

for ($i=0; $i <$xmlcount4; $i++) {

	$CNPJ_entrega = $xmldata4->item($i)->getElementsByTagName('CNPJ')->item(0)->childNodes->item(0)->nodeValue;
	$xLgr_entrega  = $xmldata4->item($i)->getElementsByTagName('xLgr')->item(0)->childNodes->item(0)->nodeValue;
	$nro_entrega  = $xmldata4->item($i)->getElementsByTagName('nro')->item(0)->childNodes->item(0)->nodeValue;
	$xBairro_entrega  = $xmldata4->item($i)->getElementsByTagName('xBairro')->item(0)->childNodes->item(0)->nodeValue;
	$cMun_entrega  = $xmldata4->item($i)->getElementsByTagName('cMun')->item(0)->childNodes->item(0)->nodeValue;
	$xMun_entrega  = $xmldata4->item($i)->getElementsByTagName('xMun')->item(0)->childNodes->item(0)->nodeValue;
	$UF_entrega  = $xmldata4->item($i)->getElementsByTagName('UF')->item(0)->childNodes->item(0)->nodeValue;
	$ID_entrega = "";



	$stmt4 = $db->prepare("insert into entrega values(?,?,?,?,?,?,?,?)");

	$stmt4->bindParam(1,$CNPJ_entrega);
	$stmt4->bindParam(2,$xLgr_entrega);
	$stmt4->bindParam(3,$nro_entrega );
	$stmt4->bindParam(4,$xBairro_entrega );
	$stmt4->bindParam(5,$cMun_entrega);
	$stmt4->bindParam(6,$xMun_entrega);
	$stmt4->bindParam(7,$UF_entrega );
	$stmt4->bindParam(8,$ID_entrega);


	$stmt4->execute();


}


		//Percorre a Tag "produto" da nota fiscal
$xmlcount5 = $xmldata5->length;

for ($i=0; $i <$xmlcount5; $i++) {

	$cProd = $xmldata5->item($i)->getElementsByTagName('cProd')->item(0)->childNodes->item(0)->nodeValue;
	$cEAN = $xmldata5->item($i)->getElementsByTagName('cEAN')->item(0)->childNodes->item(0)->nodeValue;
	$xProd = $xmldata5->item($i)->getElementsByTagName('xProd')->item(0)->childNodes->item(0)->nodeValue;
	$NCM = $xmldata5->item($i)->getElementsByTagName('NCM')->item(0)->childNodes->item(0)->nodeValue;
	$CFOP = $xmldata5->item($i)->getElementsByTagName('CFOP')->item(0)->childNodes->item(0)->nodeValue;
	$uCom = $xmldata5->item($i)->getElementsByTagName('uCom')->item(0)->childNodes->item(0)->nodeValue;
	$qCom = $xmldata5->item($i)->getElementsByTagName('qCom')->item(0)->childNodes->item(0)->nodeValue;
	$vUnCom = $xmldata5->item($i)->getElementsByTagName('vUnCom')->item(0)->childNodes->item(0)->nodeValue;
	$vProd = $xmldata5->item($i)->getElementsByTagName('vProd')->item(0)->childNodes->item(0)->nodeValue;
	$cEANTrib = $xmldata5->item($i)->getElementsByTagName('cEANTrib')->item(0)->childNodes->item(0)->nodeValue;
	$uTrib = $xmldata5->item($i)->getElementsByTagName('vProd')->item(0)->childNodes->item(0)->nodeValue;
	$qTrib = $xmldata5->item($i)->getElementsByTagName('qTrib')->item(0)->childNodes->item(0)->nodeValue;
	$vUnTrib = $xmldata5->item($i)->getElementsByTagName('vUnTrib')->item(0)->childNodes->item(0)->nodeValue;
	$indTot = $xmldata5->item($i)->getElementsByTagName('indTot')->item(0)->childNodes->item(0)->nodeValue;
	$ID_produto = "";




	$stmt5 = $db->prepare("insert into produto values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");


	$stmt5->bindParam(1,$cProd);
	$stmt5->bindParam(2,$cEAN);
	$stmt5->bindParam(3,$xProd);
	$stmt5->bindParam(4,$NCM);
	$stmt5->bindParam(5,$CFOP );
	$stmt5->bindParam(6,$uCom );
	$stmt5->bindParam(7,$qCom );
	$stmt5->bindParam(8,$vUnCom);
	$stmt5->bindParam(9,$vProd);
	$stmt5->bindParam(10,$cEANTrib);
	$stmt5->bindParam(11,$uTrib );
	$stmt5->bindParam(12,$qTrib);
	$stmt5->bindParam(13,$vUnTrib);
	$stmt5->bindParam(14,$indTot);
	$stmt5->bindParam(15,$ID_produto);


	$stmt5->execute();


}


		//Percorre a Tag "imposto" da nota fiscal
$xmlcount6 = $xmldata6->length;

for ($i=0; $i <$xmlcount6; $i++) {

	$orig = $xmldata6->item($i)->getElementsByTagName('orig')->item(0)->childNodes->item(0)->nodeValue;
	$CST = $xmldata6->item($i)->getElementsByTagName('CST')->item(0)->childNodes->item(0)->nodeValue;
	// $modBC = $xmldata6->item($i)->getElementsByTagName('modBC')->item(0)->childNodes->item(0)->nodeValue;
	// $vBC = $xmldata6->item($i)->getElementsByTagName('vBC')->item(0)->childNodes->item(0)->nodeValue;
	// $pICMS = $xmldata6->item($i)->getElementsByTagName('pICMS')->item(0)->childNodes->item(0)->nodeValue;
	// $vICMS = $xmldata6->item($i)->getElementsByTagName('vICMS')->item(0)->childNodes->item(0)->nodeValue;
	$ID_imposto = "";



	$stmt6 = $db->prepare("insert into imposto values(?,?,?)");

	$stmt6->bindParam(1,$orig);
	$stmt6->bindParam(2,$CST);
	$stmt6->bindParam(3,$ID_imposto);


	$stmt6->execute();

}

		//Percorre a Tag "IPI" da nota fiscal
$xmlcount7 = $xmldata7->length;

for ($i=0; $i <$xmlcount7; $i++) {

	$cEnq = $xmldata7->item($i)->getElementsByTagName('cEnq')->item(0)->childNodes->item(0)->nodeValue;
	$CST = $xmldata7->item($i)->getElementsByTagName('CST')->item(0)->childNodes->item(0)->nodeValue;
	$vBC = $xmldata7->item($i)->getElementsByTagName('vBC')->item(0)->childNodes->item(0)->nodeValue;
	$pIPI = $xmldata7->item($i)->getElementsByTagName('pIPI')->item(0)->childNodes->item(0)->nodeValue;
	$vIPI = $xmldata7->item($i)->getElementsByTagName('vIPI')->item(0)->childNodes->item(0)->nodeValue;
	$ID_PIS = "";



	$stmt7 = $db->prepare("insert into IPI values(?,?,?,?,?,?)");

	$stmt7->bindParam(1,$cEnq);
	$stmt7->bindParam(2,$CST);
	$stmt7->bindParam(3,$vBC);
	$stmt7->bindParam(4,$pIPI);
	$stmt7->bindParam(5,$vIPI);
	$stmt7->bindParam(6,$ID_PIS);

	$stmt7->execute();
	
}


		//Percorre a Tag "PIS" da nota fiscal
// $xmlcount8 = $xmldata8->length;

// for ($i=0; $i <$xmlcount8; $i++) {

	
// 	$CST = $xmldata8->item($i)->getElementsByTagName('CST')->item(0)->childNodes->item(0)->nodeValue;
// 	// $vBC = $xmldata8->item($i)->getElementsByTagName('vBC')->item(0)->childNodes->item(0)->nodeValue;
// 	$pPIS = $xmldata8->item($i)->getElementsByTagName('pPIS')->item(0)->childNodes->item(0)->nodeValue;
// 	$vPIS = $xmldata8->item($i)->getElementsByTagName('vPIS')->item(0)->childNodes->item(0)->nodeValue;
// 	$ID_PIS = "";



// 	$stmt8 = $db->prepare("insert into PIS values(?,?,?,?)");

	
// 	$stmt8->bindParam(1,$CST);
// 	// $stmt8->bindParam(2,$vBC);
// 	$stmt8->bindParam(2,$pPIS);
// 	$stmt8->bindParam(3,$vPIS);
// 	$stmt8->bindParam(4,$ID_PIS);

// 	$stmt8->execute();
	
// }


		//Percorre a Tag "COFINS" da nota fiscal
// $xmlcount9 = $xmldata9->length;

// for ($i=0; $i <$xmlcount9; $i++) {

// 	$CST = $xmldata9->item($i)->getElementsByTagName('CST')->item(0)->childNodes->item(0)->nodeValue;
// 	$vBC = $xmldata9->item($i)->getElementsByTagName('vBC')->item(0)->childNodes->item(0)->nodeValue;
// 	$pCOFINS = $xmldata9->item($i)->getElementsByTagName('pCOFINS')->item(0)->childNodes->item(0)->nodeValue;
// 	$vCOFINS = $xmldata9->item($i)->getElementsByTagName('vCOFINS')->item(0)->childNodes->item(0)->nodeValue;
// 	$ID_CONFINS = "";



// 	$stmt9 = $db->prepare("insert into COFINS values(?,?,?,?,?)");

// 	$stmt9->bindParam(1,$CST);
// 	$stmt9->bindParam(2,$vBC);
// 	$stmt9->bindParam(3,$pCOFINS);
// 	$stmt9->bindParam(4,$vCOFINS);
// 	$stmt9->bindParam(5,$ID_CONFINS);

// 	$stmt9->execute();


// }

		//Percorre a Tag "total" da nota fiscal
$xmlcount10 = $xmldata10->length;

for ($i=0; $i <$xmlcount10; $i++) {

	$vBC = $xmldata10->item($i)->getElementsByTagName('vBC')->item(0)->childNodes->item(0)->nodeValue;
	$vICMS = $xmldata10->item($i)->getElementsByTagName('vICMS')->item(0)->childNodes->item(0)->nodeValue;
	$vICMSDeson = $xmldata10->item($i)->getElementsByTagName('vICMSDeson')->item(0)->childNodes->item(0)->nodeValue;
	$vBCST = $xmldata10->item($i)->getElementsByTagName('vBCST')->item(0)->childNodes->item(0)->nodeValue;
	$vST = $xmldata10->item($i)->getElementsByTagName('vST')->item(0)->childNodes->item(0)->nodeValue;
	$vProd = $xmldata10->item($i)->getElementsByTagName('vProd')->item(0)->childNodes->item(0)->nodeValue;
	$vFrete = $xmldata10->item($i)->getElementsByTagName('vFrete')->item(0)->childNodes->item(0)->nodeValue;
	$vSeg = $xmldata10->item($i)->getElementsByTagName('vSeg')->item(0)->childNodes->item(0)->nodeValue;
	$vDesc = $xmldata10->item($i)->getElementsByTagName('vDesc')->item(0)->childNodes->item(0)->nodeValue;
	$vII = $xmldata10->item($i)->getElementsByTagName('vII')->item(0)->childNodes->item(0)->nodeValue;
	$vIPI  = $xmldata10->item($i)->getElementsByTagName('vIPI')->item(0)->childNodes->item(0)->nodeValue;
	$vPIS = $xmldata10->item($i)->getElementsByTagName('vPIS')->item(0)->childNodes->item(0)->nodeValue;
	$vCOFINS  = $xmldata10->item($i)->getElementsByTagName('vCOFINS')->item(0)->childNodes->item(0)->nodeValue;
	$vOutro = $xmldata10->item($i)->getElementsByTagName('vOutro')->item(0)->childNodes->item(0)->nodeValue;
	$vNF = $xmldata10->item($i)->getElementsByTagName('vNF')->item(0)->childNodes->item(0)->nodeValue;
	$vTotTrib = $xmldata10->item($i)->getElementsByTagName('vTotTrib')->item(0)->childNodes->item(0)->nodeValue;
	$ID_TOTAL = "";



	$stmt10 = $db->prepare("insert into total values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

	$stmt10->bindParam(1,$vBC);
	$stmt10->bindParam(2,$vICMS);
	$stmt10->bindParam(3,$vICMSDeson);
	$stmt10->bindParam(4,$vBCST);
	$stmt10->bindParam(5,$vST);
	$stmt10->bindParam(6,$vProd);
	$stmt10->bindParam(7,$vFrete);
	$stmt10->bindParam(8,$vSeg);
	$stmt10->bindParam(9,$vDesc);
	$stmt10->bindParam(10,$vII);
	$stmt10->bindParam(11,$vIPI);
	$stmt10->bindParam(12,$vPIS);
	$stmt10->bindParam(13,$vCOFINS);
	$stmt10->bindParam(14,$vOutro );
	$stmt10->bindParam(15,$vNF);
	$stmt10->bindParam(16,$vTotTrib);
	$stmt10->bindParam(17,$ID_TOTAL);

	$stmt10->execute();

}

		//Percorre a Tag "transptda" da nota fiscal
$xmlcount11 = $xmldata11->length;

for ($i=0; $i <$xmlcount11; $i++) {

	
	$CNPJ_transptda = $xmldata11->item($i)->getElementsByTagName('CPF')->item(0)->childNodes->item(0)->nodeValue;
	$xNome_transptda = $xmldata11->item($i)->getElementsByTagName('xNome')->item(0)->childNodes->item(0)->nodeValue;
	$xEnder_transptda = $xmldata11->item($i)->getElementsByTagName('xEnder')->item(0)->childNodes->item(0)->nodeValue;
	$xMun_transptda = $xmldata11->item($i)->getElementsByTagName('xMun')->item(0)->childNodes->item(0)->nodeValue;
	$UF_transptda = $xmldata11->item($i)->getElementsByTagName('UF')->item(0)->childNodes->item(0)->nodeValue;
	$ID_transport = "";


	$stmt11 = $db->prepare("insert into transptda values(?,?,?,?,?,?)");

	
	$stmt11->bindParam(1,$CNPJ_transptda);
	$stmt11->bindParam(2,$xNome_transptda);
	$stmt11->bindParam(3,$xEnder_transptda);
	$stmt11->bindParam(4,$xMun_transptda);
	$stmt11->bindParam(5,$UF_transptda);
	$stmt11->bindParam(6,$ID_transp);

	$stmt11->execute();

}

		//Percorre a Tag "veic_transportadora" da nota fiscal
$xmlcount12 = $xmldata12->length;

for ($i=0; $i <$xmlcount12; $i++) {

	$placa_veicTransptda = $xmldata12->item($i)->getElementsByTagName('placa')->item(0)->childNodes->item(0)->nodeValue;
	$UF_veicTransptda = $xmldata12->item($i)->getElementsByTagName('UF')->item(0)->childNodes->item(0)->nodeValue;
	$ID_veicTransptda = "";


	$stmt12 = $db->prepare("insert into veic_transptda values(?,?,?)");

	$stmt12->bindParam(1,$placa_veicTransptda);
	$stmt12->bindParam(2,$UF_veicTransptda);
	$stmt12->bindParam(3,$ID_veicTransptda );

	$stmt12->execute();


}




		//Percorre a Tag "vol" da nota fiscal
$xmlcount13 = $xmldata13->length;

for ($i=0; $i <$xmlcount13; $i++) {

	$qVol  = $xmldata13->item($i)->getElementsByTagName('qVol')->item(0)->childNodes->item(0)->nodeValue;
	$nVol  = $xmldata13->item($i)->getElementsByTagName('nVol')->item(0)->childNodes->item(0)->nodeValue;
	$pesoL  = $xmldata13->item($i)->getElementsByTagName('pesoL')->item(0)->childNodes->item(0)->nodeValue;
	$pesoB  = $xmldata13->item($i)->getElementsByTagName('pesoB')->item(0)->childNodes->item(0)->nodeValue;
	$ID_vol = "";


	$stmt13 = $db->prepare("insert into vol values(?,?,?,?,?)");

	$stmt13->bindParam(1,$qVol);
	$stmt13->bindParam(2,$nVol );
	$stmt13->bindParam(3,$pesoL );
	$stmt13->bindParam(4,$pesoB );
	$stmt13->bindParam(5,$ID_vol );

	$stmt13->execute();

}

		//Percorre a Tag "cobr" da nota fiscal
$xmlcount14 = $xmldata14->length;

for ($i=0; $i <$xmlcount14; $i++) {

	$nFat  = $xmldata14->item($i)->getElementsByTagName('nFat')->item(0)->childNodes->item(0)->nodeValue;
	$nVol  = $xmldata14->item($i)->getElementsByTagName('vOrig')->item(0)->childNodes->item(0)->nodeValue;
	$vLiq  = $xmldata14->item($i)->getElementsByTagName('vLiq')->item(0)->childNodes->item(0)->nodeValue;
	$ID_cobr = "";


	$stmt14 = $db->prepare("insert into cobr values(?,?,?,?)");

	$stmt14->bindParam(1,$nFat);
	$stmt14->bindParam(2,$nVol );
	$stmt14->bindParam(3,$vLiq );
	$stmt14->bindParam(4,$ID_cobr );

	$stmt14->execute();

}

		//Percorre a Tag "dup" da nota fiscal
$xmlcount15 = $xmldata15->length;

for ($i=0; $i <$xmlcount15; $i++) {

	$nDup  = $xmldata15->item($i)->getElementsByTagName('nDup')->item(0)->childNodes->item(0)->nodeValue;
	$dVenc  = $xmldata15->item($i)->getElementsByTagName('dVenc')->item(0)->childNodes->item(0)->nodeValue;
	$vDup  = $xmldata15->item($i)->getElementsByTagName('vDup')->item(0)->childNodes->item(0)->nodeValue;
	$ID_dup = "";


	$stmt15 = $db->prepare("insert into dup values(?,?,?,?)");

	$stmt15->bindParam(1,$nDup);
	$stmt15->bindParam(2,$dVenc);
	$stmt15->bindParam(3,$vDup);
	$stmt15->bindParam(4,$ID_dup );

	$stmt15->execute();

}

//Percorre a Tag "infAdic" da nota fiscal
$xmlcount16 = $xmldata16->length;

for ($i=0; $i <$xmlcount16; $i++) {

	$infCpl  = $xmldata16->item($i)->getElementsByTagName('infCpl')->item(0)->childNodes->item(0)->nodeValue;
	$ID_infCpl = "";


	$stmt16 = $db->prepare("insert into infAdic values(?,?)");

	$stmt16->bindParam(1,$infCpl );
	$stmt16->bindParam(2,$ID_infCpl );

	$stmt16->execute();

}
?>




