<?php

	
	require_once($_SERVER['DOCUMENT_ROOT'].'cloud/models/main/index.php');
	

	ini_set('display_errors',1);  error_reporting(E_ALL); 


	
extract($_REQUEST);
	$resp = getPrices($sum, $value, $price, $amount);


	echo(json_encode($resp));



	//prop

	function getPrices($sum, $value, $price, $amount){

			//echo($theDate);
			//echo("http://www.quandl.com/api/v1/datasets/BITCOIN/BITSTAMPUSD?auth_token=6sQU_EYPwHRMkJsReFG9");

		

			dbQuery("INSERT INTO Bitstampscrape (sum, value, price, amount) VALUES ($sum, $value, $price, $amount)");
				
				echo("INSERT INTO Bitstampscrape (sum, value, price, amount) VALUES ($sum, $value, $price, $amount)");
		
			
	
		//return true  
		return true;
	}


?>