<?php

/*
* File Name: content1.php
* Author: Dustin Chase
* Assignment Number: 4 Part 1
* Due Date: 2/8/15
* Email: chased@onid.oregonstate.edu
*/

ini_set('display_errors', '1');
error_reporting(E_ALL);


session_start(); 
if(isset($_GET["logout"]) && $_GET["logout"] == 'yes') {
	$_SESSION = array(); 
	session_destroy();
	$filepath = explode('/', $_SERVER['PHP_SELF'], -1);
	$filepath = implode('/', $filepath);
	$redirect = "http://" . $_SERVER['HTTP_HOST'] . $filepath;
	header("Location: {$redirect}/login.php", true);
	die(); 
}


/*//check if http_referer exists. If not, redirect to login
if (!isset($_SERVER['HTTP_REFERER'])) {
	//redirect to login page
	header("Location: http://web.engr.oregonstate.edu/~chased/login.php");
	
}
if ($_SERVER['HTTP_REFERER'] != "http://web.engr.oregonstate.edu/~chased/login.php") {
	//redirect to login page
	header("Location: http://web.engr.oregonstate.edu/~chased/login.php");
}
*/
/*
* Section 1:
* login.php should have a form where a user can enter a username. 
* It should have a button that says "Login". Upon clicking the login
* button the page should POST the username to the page content1.php. 
* The username should be posted via a parameter called username. 
* If the username is an empty string or null, content1.php should 
* display the message "A username must be entered. Click here to 
* return to the login screen.". The text 'here' should be a link 
* that links back to login.php.
*/

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
* Section 2:
* If the username is any other string 
* it should display the text "Hello [username] you have visited this
* page [n] times before. Click here to logout.". n should display 0 
* on the first visit, 1 on the 2nd and so on. The text 'here' should 
* log the user out, destroying the session, and return them to the login screen.
*/

//if not logged in, re-direct to login page

//if form not filled in, display error and post link back to login page

if(!isset($_SESSION["logged_in"])) {
	if (!isset($_POST['username']) || !nonEmpty($_POST)) {
		echo 'A username must be entered. Click <a href="http://web.engr.oregonstate.edu/~chased/login.php"> here </a> to return to the login screen.';
		die();
	}
	else if(empty($_POST)) {
		header("Location: http://web.engr.oregonstate.edu/~chased/login.php");
	}
	else {
		$_SESSION["visits"] = 0; 
		$_SESSION["logged_in"] = true;
		$_SESSION["username"] = $_POST['username']; 
	}
}
else {
	if (isset($_SESSION["visits"])) {
		$_SESSION["visits"]++; 
	}
}

echo 'Hello ' . $_SESSION["username"] . ' you have visited this page ' .  $_SESSION["visits"] . ' times before.';
echo 'Click <a href="http://web.engr.oregonstate.edu/~chased/content1.php?logout=yes"> here </a> to logout.'; 
echo 'Click <a href="http://web.engr.oregonstate.edu/~chased/content2.php"> here </a> to visit content2.'; 

/*
* Section 3:
* If the user navigates away from the page and returns, the session should persist. 
* The user may not navigate back via a POST. This is OK, the count should persist. 
* The POST is only needed for the initial login. If a user tries to access either 
* content1.php or content2.php without going through the login page at some previous
* point in time the user should should simply be redirected back to login.php. 
* There are different ways to accomplish this. One might be to set a variable when
* a session is started the 'correct' way and check if that variable exists when loading the page.
* content1.php must have a link to content2.php that is displayed only after a user has logged
* in (this includes subsequent visits not from login.php). content2.php should have 
* a link back to content1.php. Both content1.php and content2.php should require that
* a user at some point logged in to access them. Otherwise they should redirect back to login.php.
*/
?>
