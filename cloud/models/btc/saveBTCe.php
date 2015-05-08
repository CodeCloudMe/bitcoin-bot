<?php

	
	require_once($_SERVER['DOCUMENT_ROOT'].'cloud/models/main/index.php');
	

	ini_set('display_errors',1);  error_reporting(E_ALL); 
	

	extract($_REQUEST);



	$resp = getData($volume, $amount, $time);


	echo(json_encode($resp));




	//prop

	function getData($volume, $amount, $time){
	

		dbQuery("INSERT INTO btce (volume, price, time) VALUES ($volume, $price, '$time')");

		return array("status"=>"success");
		
		
	}


?>