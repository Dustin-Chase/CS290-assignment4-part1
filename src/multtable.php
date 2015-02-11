<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CS-290-assignment4-Part-1</title>
	</head>
		<body>
<!--
* File Name: multtable.php
* Author: Dustin Chase
* Assignment Number: 4 Part 1
* Due Date: 2/8/15
* Email: chased@onid.oregonstate.edu

* Problem/Program Description:
* This file should accept 4 parameters passed via the URL in a GET request.

* min-multiplicand
* max-multiplicand
* min-multiplier
* max-multiplier
* It should check than the min is in fact less than or equal to the max multiplicand and multiplier respectively. 
* If it is not, it should print the message "Minimum [multiplicand|multiplier] larger than maximum.". 
* It should also check that the values returned are integers for each parameter. If it is not it should print
* 1 message for each invalid input "[min-multiplicand...max-multiplier] must be an integer.". 
* It should check that all 4 parameters exist for each missing parameter it should print "Missing parameter [min-multiplicand ... max-multiplier].".
*
* If all of the above conditions are met, it should produce a multiplication table that is (max-multiplicand - min-multiplicand + 2) tall and 
*(max-multiplier - min-multiplier + 2) wide. The upper left cell should be empty. The left column should have integers running from 
* min-multiplicand through max-multiplicand inclusive. The top row should have integers running from min-multiplier to max-multiplier inclusive. 
* Every cell within the table should be the product of the corresponding multiplicand and multiplier.
*
* To accomplish the above task you will want to work with loops to dynamically create rows and within each row, loop to create the cells. 
* It should output as a valid HTML5 document.
*
-->

<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

/*Checks whether @param $var is the empty string
I used this function in place of the empty() function 
since the empty() function will return false even if the
$_POST/$_GET request has nothing but empty strings for
parameters */
function nonEmpty($var) {
	foreach ($var as $value) {
		if ($value != "")
			return true;
	}
	return false;
	}
/*
* SECTION 1:
* Accept 4 parameters via the URL in a GET request
* -Create an HTML form with a GET request 
* parameters are called:
*	min-multiplicand
*	max-multiplicand
*	min-multiplier
*	max-multiplier
*/

/*
* SECTION 2:
* -Error Checking: 
*	-min is <= max multiplicand 
*	-min is <= max multiplier
*	If not: 
*		- print a message
*	
* 	-Values are integers
* 	If not:
*		- print one message for each incorrect input
*   -all four parameters are present
*		-Print a message for any parameter that is missing
* 
*/

$noErrors = true; //sentinel. If any errors found, multiplication table
				  //will not be built

//print a message for any parameter that is missing
if (!nonEmpty($_GET)) {
	$noErrors = false; 
	foreach ($_GET as $key => $value) {
		if ($value == "")
			echo "Missing parameter " . $key . "\n";
	}
}

//print a message for any non-integer parameters
foreach ($_GET as $key => $value) {
		if (intval($value) == 0) {
			$noErrors = false; 
			echo $key . " must be an integer \n";
		}
	}

//print an error message for min > max
$minMultiplicand = intval($_GET["min-multiplicand"]);
$maxMultiplicand = intval($_GET["max-multiplicand"]);
$minMultiplier = intval($_GET["min-multiplier"]);
$maxMultiplier = intval($_GET["max-multiplier"]);

//if both are integers, then compare them
if (is_int($minMultiplicand) && is_int($maxMultiplicand)) {
	if ($minMultiplicand > $maxMultiplicand) {
		$noErrors = false;
		echo "Minimum multiplicand larger than maximum multiplicand.";
	}
}

//if both are integers, then compare them
if (is_int($minMultiplier) && is_int($maxMultiplier)) {
	if ($minMultiplier > $maxMultiplier) {
		$noErrors = false; 
		echo "Minimum multiplier larger than maximum multiplier"; 
	}
}


/*
* SECTION 3:
* Build a Table
* (max-multiplicand - min-multiplicand + 2) tall and 
*(max-multiplier - min-multiplier + 2) wide. 
* Required Steps: 
* build the odd blank cell in the upper left
* build the header row
* build the header column
* build the content cells
*/

if ($noErrors) {
	
	echo "Multiplication Table"; 
	//start table
	echo "<table border=\"1\">";
		//create blank cell at upper left
		echo "<tr>";
			echo "<td style=\"width:10px\">";
			echo "      "; 
			echo "</td>";
		
	//create header
	for ($i = $minMultiplier; $i <= $maxMultiplier; $i++) {
		echo "<td>";
		echo $i;
		echo "</td>";
		
	}
	echo "</tr>";
	//create multiplication table
	for ($i = $minMultiplicand; $i <=$maxMultiplicand; $i++) {
		echo "<tr>";
		echo "<td>";
		echo $i;
		echo "</td>";
		for($j = $minMultiplier; $j <= $maxMultiplier; $j++) {
			echo "<td>";
				echo $i * $j;
			echo "</td>";
		}
		echo "</tr>";
	}
	
	echo "</table>";
	
}
?>
	</body>
</html>