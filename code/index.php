<?php
$discord_config = json_decode(file_get_contents('discord_config.json'), JSON_OBJECT_AS_ARRAY);
$twelvedata_config = json_decode(file_get_contents('twelvedata_config.json'), JSON_OBJECT_AS_ARRAY);

$response = 0;

include("discord.php");
include("twelvedata.php");

getCrypto();
discordMessage("send");

// while(1){
//     sleep(120);
//     getCrypto();
//     discordMessage("edit");
// }
