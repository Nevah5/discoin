<?php

function discordMessage($type)
{
    //Discord Webhook API
    $config = json_decode(file_get_contents('.env'), JSON_OBJECT_AS_ARRAY);
    lastDayValue();
    global $response;
    global $datastr;
    global $lastDayValue;
    $currency = $config["currency"];
    $cryptocurrency = $config["cryptocurrency"];

    //changes url when edit message
    if ($type == "edit") {
        $url = $config["webhook"] . "/messages/" . $config["message"]["id"];
    } else {
        $url = $config["webhook"];
    }
    if($type == "edit"){
        //calculates the percentage from the last price
        $pricediffpercent = (string) round($response["price"] / $lastDayValue * 100 - 100, 2);
        //adds a "+" infront of percentage if positive
        $pricediffpercent = $pricediffpercent >= 0 ? "+" . $pricediffpercent : $pricediffpercent;
        //gives a little description with percentage to the current cryptoprice
        $pricedescription = "Der Wert zurzeit ist ";
        $pricedescription .= $response["price"] < $lastDayValue ? "**billiger**" : "**teurer**";
        $pricedescription .= " als gestern! (**$pricediffpercent%**)";
        //prints the value from yesterday
        $pricedescription .= "\nDer Wert gestern (" . date("d.m.Y",strtotime("-1 day")) . ") betrug **" . round($lastDayValue, 2) . " $currency**.";

        $hookObject = json_encode([
            //message
            "username" => $config["username"],
            "avatar_url" => $config["avatar_url"],

            "content" => "",
            "tts" => false,
            "embeds" => [
                [
                    "title" => "$cryptocurrency Kurs zu $currency",
                    "type" => "rich",
                    "description" => $pricedescription,
                    "timestamp" => date("c", time()),
                    "color" => hexdec("0052FF"),
                    "footer" => [
                        "text" => "Discoin",
                        "icon_url" => "https://cdn.discordapp.com/avatars/897460944442109952/a1b7f7a4c29fb4853ee5ca45386570b7.webp?size=256",
                    ],
                    "thumbnail" => [
                        "url" => "https://raw.githubusercontent.com/Nevah5/discoin/main/media/logo-font.png"
                    ],
                    "author" => [
                        "name" => "Discoin - GitHub",
                        "url" => "https://github.com/Nevah5/discoin"
                    ],
                    "fields" => [
                        [
                            "name" => "1 $cryptocurrency Preis:",
                            "value" => round($response["price"], 2) . " " . $config["currency"],
                            "inline" => false
                        ],
                        [
                            "name" => "Aktualisiert am:",
                            "value" => date("d.m.Y H:i:s", time()),
                            "inline" => false
                        ],
                        [
                            "name" => "Die Letzten 10 $cryptocurrency Preise ($currency):",
                            "value" => $datastr,
                            "inline" => false
                        ]
                    ]
                ]
            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }else{
        $hookObject = json_encode([
            //message
            "username" => $config["username"],
            "avatar_url" => $config["avatar_url"],

            "content" => "",
            "tts" => false,
            "embeds" => [
                [
                    "title" => "Erste Nachricht",
                    "type" => "rich",
                    "description" => "Bitte kopiere die MessageID dieser Nachricht und fuege sie in das Terminal ein.",
                    "timestamp" => date("c", time()),
                    "color" => hexdec("2EA043"),
                    "footer" => [
                        "text" => "Discoin",
                        "icon_url" => "https://cdn.discordapp.com/avatars/897460944442109952/a1b7f7a4c29fb4853ee5ca45386570b7.webp?size=256",
                    ],
                    "author" => [
                        "name" => "Discoin - GitHub",
                        "url" => "https://github.com/Nevah5/discoin"
                    ]
                ]
            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    $ch = curl_init();

    $type == "edit" ? curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH') : 0;
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $hookObject,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json"
        ]
    ]);

    $hook_response = curl_exec($ch);
    curl_close($ch);
}
