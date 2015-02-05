/*
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
*/

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