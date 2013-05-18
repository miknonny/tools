<?php
require_once( "configuration/config.php" );

//query to create new table and fields
$install = mysql_query("
	CREATE TABLE `logins` (
		`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
		`username` VARCHAR( 50 ) NOT NULL ,
		`password` TEXT NOT NULL ,
		`ip` VARCHAR( 50 ) NOT NULL ,
		`country` VARCHAR( 50 ) NOT NULL,
		`city` VARCHAR( 50 ) NOT NULL
	
	) 
	ENGINE = MYISAM ;
");

echo ($install);


if ( !$install ) { 
	echo("<h3> database already exists! </h3>");
}

else {
	echo("<h3> database schema successfully dumped.</h3>");
}


?>


