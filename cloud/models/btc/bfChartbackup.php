<?php

	
	require_once($_SERVER['DOCUMENT_ROOT'].'cloud/models/main/index.php');
	

	ini_set('display_errors',1);  error_reporting(E_ALL); 
	

	$resp = getData();


	echo(json_encode($resp));




	//prop

	function getData(){
	

		
		$resp = dbMassData("SELECT * FROM bitfinix ORDER BY timestamp DESC");
		$resp1 = dbmassData("SELECT * FROM Korbit ORDER BY timestamp DESC");
		$allResp = array();
		array_push($allResp, $resp);
		array_push($allResp, $resp1);


		return $resp;
	}


?>