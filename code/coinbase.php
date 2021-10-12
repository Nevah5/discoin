<?php
crypto();
function crypto(){

$curl = curl_init();

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://twelve-data1.p.rapidapi.com/price?symbol=BTC%2FCHF&format=json&outputsize=30",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: twelve-data1.p.rapidapi.com",
		"x-rapidapi-key: 468c8b4ab6msh7b9abcfbb1da933p190999jsn655f9dc7235f"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}
}