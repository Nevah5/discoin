<?php

$discord_config = json_decode(file_get_contents('discord_config.json'), JSON_OBJECT_AS_ARRAY);

include("discord.php");
discordSendFirst();