<?php

//database
define('DB_HOST', '127.0.0.1');
define('DB_USERNAME', 'ethgas');
define('DB_PASSWORD', 'station');
define('DB_NAME', 'tx');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}

$query = "SELECT ETHpriceUSD, ETHpriceEUR, ETHpriceCNY, ETHpriceGBP, mediantxfee from txDataLast10k ORDER BY id DESC LIMIT 1";
$result = $mysqli->query($query);
$prices = $result->fetch_assoc();

$array = array ($prices);

print json_encode($array);

?>
