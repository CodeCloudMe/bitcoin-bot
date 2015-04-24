<?php

	
	require_once($_SERVER['DOCUMENT_ROOT'].'cloud/models/main/index.php');
	

	ini_set('display_errors',1);  error_reporting(E_ALL); 


	$resp = getPrices();


	echo(json_encode($resp));

	//prop
	
	function getPrices(){
			$info = file_get_contents("https://www.okcoin.com/api/v1/ticker.do?symbol=btc_usd");
			$tInfo = json_decode($info, true)['ticker'];

			$price = $tInfo['last'];
			$ask = $tInfo['sell'];
			$bid = $tInfo['buy'];
			$volume = $tInfo['vol'];

			dbQuery("INSERT INTO okcoinPrices (price, ask, bid, volume) VALUES ($price, $ask, $bid, $volume)");
			echo("INSERT INTO okcoinPrices (price, ask, bid, volume) VALUES ($price, $ask, $bid, $volume)");
		//return true  
		return $tInfo;
	}


?>