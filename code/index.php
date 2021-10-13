<?php

$config = json_decode(file_get_contents('.env'), JSON_OBJECT_AS_ARRAY);
$data = [];
$datastr = "";
include("discord.php");
include("twelvedata.php");

getCrypto();
dataHistory($response);
discordMessage("send");
while (1) {
    sleep(300);
    getCrypto();
    dataHistory($response);
    discordMessage("edit");
}

function dataHistory($resp)
{
    global $config;
    global $data;
    global $datastr;
    $currency = $config["currency"];
    $datastr = "";

    //delete oldest entry after 10
    if(count($data) >= 10){
        for($i = 0; $i < count($data) - 1; $i++){
            $data[$i] = $data[$i+1];
            $data[$i+1] = [
                "price" => round($resp["price"], 2),
                "timestamp" => date("d.m.Y H:i:s", strtotime("+2 hours")),
            ];
        }
    }else{
        $data[] = [
            "price" => round($resp["price"], 2),
            "timestamp" => date("d.m.Y H:i:s", strtotime("+2 hours")),
        ];
    }
    foreach($data as $key => $value){
        $num = (string) $key + 1;
        $datastr .= "> $num. " . $value["price"] . " $currency -> " . $value["timestamp"] . "\n";
    }
}
