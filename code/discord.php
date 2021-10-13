<?php

function discordMessage($type)
{
    //Discord Webhook API
    global $discord_config;
    global $twelvedata_config;
    global $response;
    $message = "1 " . $twelvedata_config["cryptocurrency"] . " = " . round($response["price"], 2) . " " . $twelvedata_config["currency"];

    if($type == "edit"){
        $url = $discord_config["webhook"] . "/messages/" . $discord_config["message"]["id"];
    }else{
        $url = $discord_config["webhook"];
    }

    $hookObject = json_encode([
        "username" => $discord_config["username"],
        "avatar_url" => $discord_config["avatar_url"],

        "content" => "",
        "tts" => false,
        "embeds" => [
            [
                // Set the title for your embed
                "title" => "XXX Kurs zu XXX",

                // The type of your embed, will ALWAYS be "rich"
                "type" => "rich",

                // A description for your embed
                "description" => "Preisbeschreibung (sinkend/steigend)",

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
                    "url" => "https://pbs.twimg.com/profile_images/972154872261853184/RnOg6UyU_400x400.jpg"
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
                        "name" => "XXX Preis:",
                        "value" => $message,
                        "inline" => false
                    ],
                    [
                        "name" => "Aktualisiert am:",
                        "value" => date("d.m.Y H:i:s"),
                        "inline" => false
                    ]
                ]
            ]
        ]
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

    $ch = curl_init();

    $type == "edit" ? curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH') : 0;
    curl_setopt_array( $ch, [
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $hookObject,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json"
        ]
    ]);

    $hook_response = curl_exec( $ch );
    curl_close( $ch );
}