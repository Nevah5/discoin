<?php

function discordSendFirst()
{
    //Discord Webhook API
    global $discord_config;

    $url = $discord_config["webhook"];

    $hookObject = json_encode([
        "content" => $discord_config["message"]["content"],
        "username" => $discord_config["username"],
        "avatar_url" => $discord_config["avatar_url"],
        "tts" => false
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

    $ch = curl_init();

    curl_setopt_array( $ch, [
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $hookObject,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json"
        ]
    ]);

    // $response = curl_exec( $ch );
    curl_close( $ch );
}