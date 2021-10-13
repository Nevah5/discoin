<?php

function discordMessage($type)
{
    //Discord Webhook API
    $config = json_decode(file_get_contents('.env'), JSON_OBJECT_AS_ARRAY);
    global $response;
    global $datastr;
    global $data;
    $currency = $config["currency"];
    $cryptocurrency = $config["cryptocurrency"];


    if ($type == "edit") {
        $url = $config["webhook"] . "/messages/" . $config["message"]["id"];
    } else {
        $url = $config["webhook"];
    }

    $pricediffpercent = (string) round($response["price"] / $data[0]["price"] * 100 - 100, 2);
    $pricediffpercent = $pricediffpercent >= 0 ? "+" . $pricediffpercent : $pricediffpercent;
    $pricedescription = $response["price"] < $data[0]["price"] ? "Der Wert sinkt zurzeit! ($pricediffpercent%)" : "Der Wert steigt zurzeit! ($pricediffpercent%)";
    $hookObject = json_encode([
        "username" => $config["username"],
        "avatar_url" => $config["avatar_url"],

        "content" => "",
        "tts" => false,
        "embeds" => [
            [
                // Set the title for your embed
                "title" => "$cryptocurrency Kurs zu $currency",

                // The type of your embed, will ALWAYS be "rich"
                "type" => "rich",

                // A description for your embed
                "description" => $pricedescription,

                // The URL of where your title will be a link to
                // "url" => "https://www.google.com/",

                /* A timestamp to be displayed below the embed, IE for when an an article was posted
                 * This must be formatted as ISO8601
                 */
                "timestamp" => date("c", strtotime("now")),
                // The integer color to be used on the left side of the embed
                "color" => hexdec("0052FF"),
                // Footer object
                "footer" => [
                    "text" => "Discoin",
                    "icon_url" => "https://cdn.discordapp.com/avatars/897460944442109952/a1b7f7a4c29fb4853ee5ca45386570b7.webp?size=256",
                ],
                // Thumbnail object
                "thumbnail" => [
                    "url" => "https://cdn.discordapp.com/avatars/897460944442109952/a1b7f7a4c29fb4853ee5ca45386570b7.webp?size=512"
                ],
                // Author object
                "author" => [
                    "name" => "Discoin - GitHub",
                    "url" => "https://github.com/Nevah5/discoin"
                ],
                // Field array of objects
                "fields" => [
                    // Field 1
                    [
                        "name" => "1 $cryptocurrency Preis:",
                        "value" => round($response["price"], 2) . " " . $config["currency"],
                        "inline" => false
                    ],
                    [
                        "name" => "Aktualisiert am:",
                        "value" => date("d.m.Y H:i:s", strtotime("+2 hours")),
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
