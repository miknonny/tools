<?php

/*
$ch = curl_init();
$timeout = 0; // set to zero for no timeout
curl_setopt ($ch, CURLOPT_URL, "http://api.hostip.info/get_json.php");
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$host_info = curl_exec($ch);
curl_close($ch);

// display file
$host_info = file_get_contents("url to file.")
$host_info = json_decode($host_info, true);
//var_dump($host_info);
$country = $host_info['country_name'];
$city = $host_info['city'];
$user_ip = $host_info['ip'];

//this is the body of the html formated message
*/

$user_ip = $_SERVER['REMOTE_ADDR'];
$body = $user_ip;




/*
//get the remote ip of the user
//
object(stdClass)#1 (4) { ["country_name"]=> string(7) "NIGERIA" ["country_code"]=> string(2) "NG" ["city"]=> string(5) "Lagos" ["ip"]=> string(12) "41.206.15.34" }

function get_country( ) {
	$geo = geoip_open( "includes/GeoIP.dat", GEOIP_STANDARD);
	$contry = geoip_country_code_by_addr( $geo, $_SERVER['REMOTE_ADDR'] );
	if ( !$country ) {
		$country = "unknown";
	} 
	geoip_close( $geo );
	return $country;
}
*/
// get file as json object and return json as an array.


?>
