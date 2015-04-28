<?php

	
	require_once($_SERVER['DOCUMENT_ROOT'].'cloud/models/main/index.php');
	

	ini_set('display_errors',1);  error_reporting(E_ALL); 


	$resp = getTradeBook();


	//prop
	
	function getTradeBook(){
		$info = file_get_contents("https://www.okcoin.com/api/v1/trades.do?symbol=btc_usd");
		$tInfo = json_decode($info, true);
		for($i=0; $i < count($tInfo); $i++){
            $amount = $tInfo[$i]['amount'];
            $price = $tInfo[$i]['price'];
            $type = $tInfo[$i]['type'];
            $tid = strval($tInfo[$i]['tid']);

        
        dbQuery("INSERT INTO okcoinTradeBook(price, amount, type, transactionId) VALUES ($amount, $price, $type, $tid");
        echo(dbQuery("INSERT INTO okcoinTradeBook(amount, price, type, transactionId) VALUES ($amount, $price, $type, $tid)"));
		}
		return $tInfo;
	}


?>