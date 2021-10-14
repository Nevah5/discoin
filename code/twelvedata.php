<?php

function getCrypto()
{
    $config = json_decode(file_get_contents('.env'), JSON_OBJECT_AS_ARRAY);
    global $response;

    //gibt den Nutzer eine Meldung wenn dieser keinen Key angegeben hat
    echo empty($config["api-key"]) ? "Bitte gib den API-KEY in der Config an!" . PHP_EOL : "";
    empty($config["api-key"]) ? exit : 0;

    $currency = $config["currency"];
    $cryptocurrency = $config["cryptocurrency"];
    $host = $config["api-host"];
    $key = $config["api-key"];
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
    $response = json_decode($response, JSON_OBJECT_AS_ARRAY);

    curl_close($curl);
}

function lastDayValue()
{
    global $config;
    global $lastDayValue;
    $cryptocurrency = $config["cryptocurrency"];
    $currency = $config["currency"];
    //gets the value of the cryptocurrency from last day
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://twelve-data1.p.rapidapi.com/time_series?symbol=$cryptocurrency%2F$currency&interval=1day&outputsize=2&format=json",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "x-rapidapi-host: twelve-data1.p.rapidapi.com",
            "x-rapidapi-key: ea242eef3cmshe478af85d23fb18p13bd4ejsnb1b674a68643"
        ],
    ]);

    $query = curl_exec($curl);
    $lastDayValue = json_decode($query, JSON_OBJECT_AS_ARRAY)["values"][1]["open"];
    $err = curl_error($curl);

    $response = curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    }
}
