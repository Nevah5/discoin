<?php

function getCrypto()
{
	global $twelvedata_config;
	global $response;

	//gibt den Nutzer eine Meldung wenn dieser keinen Key angegeben hat
	echo empty($twelvedata_config["api-key"]) ? "Bitte gib den API-KEY in der Config an!" . PHP_EOL : "";
	empty($twelvedata_config["api-key"]) ? exit : 0;

	$currency = $twelvedata_config["currency"];
	$cryptocurrency = $twelvedata_config["cryptocurrency"];
	$host = $twelvedata_config["api-host"];
	$key = $twelvedata_config["api-key"];
	$url = (string) "https://twelve-data1.p.rapidapi.com/price?symbol=$cryptocurrency%2F$currency&format=json&outputsize=30";
	$curl = curl_init();

	curl_setopt_array($curl, [
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => [
			"x-rapidapi-host: $host",
			"x-rapidapi-key: $key"
		],
	]);

	$response = curl_exec($curl);
	$err = curl_error($curl);
	echo $err ? "cURL Error #:" . $err : "";
	//wandelt den Json Response in ein PHP Array um
	$response = json_decode($response, JSON_OBJECT_AS_ARRAY);
	//Gibt den Preis zurück
	// printf(
	// 	"Der Cryptocurrency Preis (%s) beträgt zurzeit %.2f %s." . PHP_EOL,
	// 	$twelvedata_config["cryptocurrency"],
	// 	(double) $response["price"],
	// 	$twelvedata_config["currency"]
	// );

	curl_close($curl);
}