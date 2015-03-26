<?php

	
	require_once($_SERVER['DOCUMENT_ROOT'].'cloud/models/main/index.php');
	

	ini_set('display_errors',1);  error_reporting(E_ALL); 
	

	$resp = getData();


	echo(json_encode($resp));




	//prop

	function getData(){
	

		
		
		$resp = dbMassData("SELECT * FROM bitfinix ORDER BY timestamp DESC");
		$resp1 = dbMassData("SELECT * FROM bitstampPrices ORDER BY timestamp DESC");
		$allResp = array();
		$allResp[0] =  $resp;
		$allResp[1]= $resp1;

		return $allResp;
	}


?>