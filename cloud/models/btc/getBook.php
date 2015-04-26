<?php

	
	require_once($_SERVER['DOCUMENT_ROOT'].'cloud/models/main/index.php');
	

	ini_set('display_errors',1);  error_reporting(E_ALL); 


	$resp = getBook();


	echo(json_encode($resp));

	//prop
	
	function getBook(){
		$info = file_get_contents("https://www.okcoin.com/api/v1/depth.do?symbol=btc_usd");
		$tInfo = json_decode($info, true);
		for($i=0; $i < count($tInfo['asks']) ; $i++)){
        try{
            $ask = $tInfo['asks'][$i][0]; 	 
            $bid = $tInfo['bids'][$i][0];

            $askAmount = $tInfo['asks'][$i][1]; 	 
            $bidAmount = $tInfo['bids'][$i][1];

            $askPrice = $tInfo['asks'][$i][0]; 	 
            $bidPrice = $tInfo['bids'][$i][0];
        }
        
        catch(exception $e){

        }
        
        dbQuery("INSERT INTO okcoinBook(type, amount, price) VALUES ('sell', $askAmount, $askPrice)");
        dbQuery("INSERT INTO okcoinBook(type, amount, price) VALUES ('buy', $bidAmount, $bidPrice)");
		}
			
		return $tInfo;
	}


?>