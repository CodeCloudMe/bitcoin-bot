<?php

	
	require_once($_SERVER['DOCUMENT_ROOT'].'cloud/models/main/index.php');
	

	ini_set('display_errors',1);  error_reporting(E_ALL); 
	

	$resp = getPrices();


	echo(json_encode($resp));



	//prop

	function getPrices(){

			//echo($theDate);
			//echo("http://www.quandl.com/api/v1/datasets/BITCOIN/BITSTAMPUSD?auth_token=6sQU_EYPwHRMkJsReFG9");
			$info = file_get_contents("https://www.bitstamp.net/api/ticker/");
			$tInfo = json_decode($info, true);

			$price = $tInfo['last'];
			$ask = $tInfo['ask'];
			$bid = $tInfo['bid'];
			$volume = $tInfo['volume'];
		

			dbQuery("INSERT INTO BitstampPrices (price, ask, bid, volume) VALUES ($price, $ask, $bid, $volume)");
				
				echo("INSERT INTO BitstampPrices (price, ask, bid, volume) VALUES ($price, $ask, $bid, $volume)");
		
			
	
		//return true  
		return $tInfo;
	}


?>