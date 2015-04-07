<?php

	
	require_once($_SERVER['DOCUMENT_ROOT'].'cloud/models/main/index.php');
	

	ini_set('display_errors',1);  error_reporting(E_ALL); 
	

	$resp = getPrices();


	echo(json_encode($resp));




	//prop

	function getPrices(){
<<<<<<< HEAD

=======
	
>>>>>>> 00e7a683d5d4a79678b163c4bd044ff33a20b8b3
			//echo($theDate);
			//echo("http://www.quandl.com/api/v1/datasets/BITCOIN/BITSTAMPUSD?auth_token=6sQU_EYPwHRMkJsReFG9");
			$info = file_get_contents("https://www.bitstamp.net/api/ticker/");
			$tInfo = json_decode($info, true);

			$price = $tInfo['last'];
			$ask = $tInfo['ask'];
			$bid = $tInfo['bid'];
			$volume = $tInfo['volume'];


<<<<<<< HEAD
			dbQuery("INSERT INTO bitstampPrices (price, bid, ask, volume) VALUES ($price, $bid, $ask, $volume)");
			
		echo("INSERT INTO bitstampPrices (price, bid, ask, volume) VALUES ($price, $bid, $ask, $volume)");

		//return true  
=======
		
			dbQuery("INSERT INTO bitstampPrices (price, bid, ask, volume) VALUES ($price, $bid, $ask, $volume)");
				
			echo("INSERT INTO bitstampPrices (price, bid, ask, volume) VALUES ($price, $bid, $ask, $volume)");
				
		
>>>>>>> 00e7a683d5d4a79678b163c4bd044ff33a20b8b3
		return $tInfo;
	}


?>