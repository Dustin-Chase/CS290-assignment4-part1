<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CS-290-assignment4-Part-1</title>
	</head>

<!--
* File Name: loopback.php
* Author: Dustin Chase
* Assignment Number: 4 Part 1
* Due Date: 2/8/15
* Email: chased@onid.oregonstate.edu

* Problem/Program Description:
* This file should accept either a GET or POST for input. That GET or POST
* will have an unknown number of key/value pairs.
* 
* The page should return a JSON object (remember, this is almost identical to
* an object literal in JavaScript) of the form {"Type":"[GET|POST]","parameters":{"key1":"value1", ... ,"keyn":"valuen"}}.
* Behavior if a key is passed in and no value is specified is undefined.
* If no key value pairs are passed it it should return {"Type":"[GET|POST]", "parameters":null}. 
* You are welcome to use built in JSON function in PHP to produce this output.
*
*/
-->

<?php 
	
	/*
	* Section 1: 
	* File should accept either a GET or POST for input. That GET or POST 
	* will have an unknown number of key/value pairs. 
	*/
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);
	$dataSent;
	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (empty($_POST)) {
			$dataSent = 'null'; 
		}
		else {
			$dataSent = $_POST;
		}		
	}
	else {
		if(empty($_GET)) {
			$dataSent = 'null'; 
		}
		else {
			$dataSent = $_GET;
		}
	}
	$temp = ["Type" => $_SERVER['REQUEST_METHOD'], "parameters" => $dataSent];
	$dataToPrint = json_encode($temp);
	/*
	* Section 2: 
	* Echo JSON object. ("Type": "GET or POST", "parameters":{key:value, ....}
	*/
	print_r($dataToPrint);
?>



</html>