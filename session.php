<?php
	session_start();
	date_default_timezone_set("America/Maceio");
	ini_set("display_errors", 0);

	function __autoload($classe) {
    	include("classes/{$classe}.class.php");
	}
?>