<?php

	
	require_once($_SERVER['DOCUMENT_ROOT'].'cloud/models/main/index.php');
	

	ini_set('display_errors',1);  error_reporting(E_ALL); 
	

	$resp = getData();


	echo(json_encode($resp));




	//prop

	function getData(){
	
		$okcoin = dbMassData("SELECT * FROM okcoinPrices WHERE timestamp > '2015-05-07' ORDER BY timestamp DESC");
		$bitfinex = dbMassData("SELECT * FROM bitfinexPrices WHERE timestamp > '2015-05-07' ORDER BY timestamp DESC");
		$allResp = array();
		$allResp[0] =  $okcoin;
		$allResp[1] =  $bitfinex;

		return $allResp;
	}


?>