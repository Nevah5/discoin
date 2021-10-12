<?php

function discordSendFirst()
{
    //Discord Webhook API
    global $discord_config;
    global $twelvedata_config;
    global $response;
    $message = "1 " . $twelvedata_config["cryptocurrency"] . " = " . round($response["price"], 2) . " " . $twelvedata_config["currency"];

    $url = $discord_config["webhook"];

    $hookObject = json_encode([
        "username" => $discord_config["username"],
        "avatar_url" => $discord_config["avatar_url"],

        "content" => $message,
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

    $hook_response = curl_exec( $ch );
    curl_close( $ch );
}

function discordUpdate()
{
    //Discord Webhook API
    $discord_config = json_decode(file_get_contents('discord_config.json'), JSON_OBJECT_AS_ARRAY);
    global $twelvedata_config;
    global $response;
    $message = "1 " . $twelvedata_config["cryptocurrency"] . " = " . round($response["price"], 2) . " " . $twelvedata_config["currency"];

    $url = $discord_config["webhook"] . "/messages/" . $discord_config["message"]["id"];

    $hookObject = json_encode([
        "username" => $discord_config["username"],
        "avatar_url" => $discord_config["avatar_url"],

        "content" => $message,
        "tts" => false
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
    curl_setopt_array( $ch, [
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $hookObject,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json"
        ]
    ]);

    $hookedit_response = curl_exec($ch);
    curl_close( $ch );
}
