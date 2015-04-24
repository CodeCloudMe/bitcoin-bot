<?php

	
	require_once($_SERVER['DOCUMENT_ROOT'].'cloud/models/main/index.php');
	

	ini_set('display_errors',1);  error_reporting(E_ALL); 
	

	$resp = getData();


	echo(json_encode($resp));




	//prop

	function getData(){
	

		
		
		$resp = dbMassData("SELECT * FROM okcoinPrices ORDER BY timestamp DESC");
		$allResp = array();
		$allResp[0] =  $resp;

		return $allResp;
	}


?>