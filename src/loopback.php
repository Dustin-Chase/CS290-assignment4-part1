/*
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

/*
* Section 1: 
* File should accept either a GET or POST for input. That GET or POST 
* will have an unknown number of key/value pairs. 
*/

/*
* Section 2: 
* Echo JSON object. ("Type": "GET or POST", "parameters":{key:value, ....}
*/