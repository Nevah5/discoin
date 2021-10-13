<?php
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
