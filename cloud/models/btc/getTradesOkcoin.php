<?php

	
	require_once($_SERVER['DOCUMENT_ROOT'].'cloud/models/main/index.php');
	

	ini_set('display_errors',1);  error_reporting(E_ALL); 


	$resp = getBook();


	echo(json_encode($resp));

	//prop
	
	function getBook(){
		$info = file_get_contents("https://www.okcoin.com/api/v1/trades.do?symbol=btc_usd");
		$tInfo = json_decode($info, true);
		for($i=0; $i < count($tInfo); $i++){
        try{
            $price = $tInfo[$i]['price'];
            $amount = $tInfo[$i]['amount'];
            $type = $tInfo[$i]['type'];
            $tid = strval($tInfo[$i]['tid']);
        }
        
        catch(exception $e){

        }
        
        dbQuery("INSERT INTO okcoinTradeBook(amount, price, type, tid) VALUES ($amount, $price, '$type', $tid)");
        echo("INSERT INTO okcoinTradeBook(amount, price, type, tid) VALUES ($amount, $price, $type, $tid)");
		}
			
		return $tInfo;
	}


?>