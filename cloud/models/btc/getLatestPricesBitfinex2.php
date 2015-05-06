<?php

	
	require_once($_SERVER['DOCUMENT_ROOT'].'cloud/models/main/index.php');
	

	ini_set('display_errors',1);  error_reporting(E_ALL); 
	

	$resp = getPrices();


	echo(json_encode($resp));




	//prop

	function getPrices(){

			//echo($theDate);
			//echo("http://www.quandl.com/api/v1/datasets/BITCOIN/BITSTAMPUSD?auth_token=6sQU_EYPwHRMkJsReFG9");
			$info = file_get_contents("https://api.bitfinex.com/v1/pubticker/btcusd");
			$tInfo = json_decode($info, true);

			$price = $tInfo['last_price'];
			$ask = $tInfo['ask'];
			$bid = $tInfo['bid'];
			$volume = $tInfo['volume'];


			dbQuery("INSERT INTO bitfinexPrices2 (price, bid, ask, volume) VALUES ($price, $bid, $ask, $volume)");
			
		echo("INSERT INTO bitfinexPrices2 (price, bid, ask, volume) VALUES ($price, $bid, $ask, $volume)");

		//return true  
		return $tInfo;
	}


?>