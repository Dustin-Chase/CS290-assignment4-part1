<?php
//check if logged in. If not redirect to login. 
session_start(); 
if (!isset($_SESSION["logged_in"])) {
	header("Location: http://web.engr.oregonstate.edu/~chased/login.php");
}

echo 'Click <a href="http://web.engr.oregonstate.edu/~chased/content1.php"> here </a> to visit content1.'; 
?>