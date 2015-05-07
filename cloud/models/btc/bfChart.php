<?php

	
	require_once($_SERVER['DOCUMENT_ROOT'].'cloud/models/main/index.php');
	

	ini_set('display_errors',1);  error_reporting(E_ALL); 
	

	$resp = getData();


	echo(json_encode($resp));




	//prop

	function getData(){
	
		$okcoin = dbMassData("SELECT * FROM okcoinPrices ORDER BY timestamp DESC");
		$korbit = dbMassData("SELECT * FROM KorbitPrices ORDER BY timestamp DESC");
		$bitfinix = dbMassData("SELECT * FROM bitfinixPrices ORDER BY timestamp DESC");
		$allResp = array();
		$allResp[0] =  $okcoin;
		$allResp[1] =  $korbit;
		$allResp[2] =  $bitfinix;

		return $allResp;
	}


?>