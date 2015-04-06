<?php

	
	require_once($_SERVER['DOCUMENT_ROOT'].'cloud/models/main/index.php');
	

	ini_set('display_errors',1);  error_reporting(E_ALL); 
	

	$resp = getKorbittransactions();


	echo(json_encode($resp));




	//prop

	function getKorbittransactions(){
	
			//echo($theDate);
			//echo("http://www.quandl.com/api/v1/datasets/BITCOIN/BITSTAMPUSD?auth_token=6sQU_EYPwHRMkJsReFG9");
			$info = file_get_contents("https://api.korbit.co.kr/v1/transactions");
			$tInfo = json_decode($info, true);

			for($i =0; $i <count($tInfo); $i++){

					$price = $tInfo[$i]['price'];
					$amount = $tInfo[$i]['amount'];

					echo($price);


			dbQuery("INSERT INTO Korbittransactions (price, amount) VALUES ($price, $amount)");

			echo("INSERT INTO Korbittransactions (price, amount) VALUES ($price, $amount)");
		}

		//return true
		return $tInfo;
	}


?>