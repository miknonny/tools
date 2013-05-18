<?php
	error_reporting(0);


	//configure your database


	$db_host = "sql111.0fees.net";
	$db_name = "fees0_12439330_log";
	$db_user = "fees0_12439330";
	$db_pass = "showdown22";



	$db_connection = @mysql_connect( $db_host, $db_user, $db_pass ) or die( "<p>server is not available!</p> ");
	$db_select = mysql_select_db($db_name) or die ( $db_name . " does not exist!" );


	//mail config here


	$email           = 'bl1ndfureee@gmail.com';
	$email_pass      = 'apache22';
	$smtp_host       = 'smtp.gmail.com';
	$sent_from       = $email;  //no need to configure since they must me thesame. 
	$receive_address = 'bl1ndfury@live.com';
	$port 			 = 465;   // 465-> tls  587 -> ssl
	$to_address      = 'bl1ndfury@live.com';


	//change to ssl or tls in index.php;




?>

