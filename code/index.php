<?php
include("discord.php");
include("twelvedata.php");
include("cli.php");

setup();

$data = [];
$datastr = "";

while (1) {
    getCrypto();
    dataHistory($response);
    discordMessage("edit");
    sleep($config["delay"]);
}

function dataHistory($resp)
{
    global $config;
    global $data;
    global $datastr;
    $currency = $config["currency"];
    $datastr = "";

    //delete oldest entry after 10 and moves each one up
    if(count($data) >= 10){
        for($i = 0; $i < count($data) - 1; $i++){
            $data[$i] = $data[$i+1];
            $data[$i+1] = [
                "price" => round($resp["price"], 2),
                "timestamp" => date("d.m.Y H:i:s", time()),
            ];
        }
    }else{
        $data[] = [
            "price" => round($resp["price"], 2),
            "timestamp" => date("d.m.Y H:i:s", time()),
        ];
    }

    //puts all the last data values into a string
    foreach($data as $key => $value){
        $num = (string) $key + 1;
        $datastr .= "> $num) " . $value["price"] . " $currency -> " . $value["timestamp"] . "\n";
    }
}
