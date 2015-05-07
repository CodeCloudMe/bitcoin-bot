<?php

	
	require_once($_SERVER['DOCUMENT_ROOT'].'cloud/models/main/index.php');
	

	ini_set('display_errors',1);  error_reporting(E_ALL); 
	

	$resp = getBook();


	echo(json_encode($resp));




	//prop

	function getBook(){

			//echo($theDate);
			//echo("http://www.quandl.com/api/v1/datasets/BITCOIN/BITSTAMPUSD?auth_token=6sQU_EYPwHRMkJsReFG9");
			$info = file_get_contents("https://api.bitfinex.com/v1//book/BTCUSD");
			$tInfo = json_decode($info, true);
			

			for($i=0; $i < count($tInfo['asks']); $i++){

				try{
					$ask = $tInfo['asks'][$i]['price'];
					$bid = $tInfo['bids'][$i]['price'];

					$askAmount = $tInfo['asks'][$i]['amount'];
					$askAmount = $tInfo['bids'][$i]['amount'];

					$askPrice = $tInfo['asks'][$i]['price'];
					$bidPrice = $tInfo['bids'][$i]['price'];
				}

				catch(exception $e){


				}

				dbQuery("INSERT INTO bitfinexOrderbook2 (type, amount, price) VALUES ('sell', $askAmount, $askPrice)");
				dbQuery("INSERT INTO bitfinexOrderbook2 (type, amount, price) VALUES ('buy', $buyAmount, $abuyrice)");

			}

		
			return $tInfo;
	}


?>