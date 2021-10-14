<?php

function setup()
{
    system("clear");
    global $config;
    global $newmessage;
    //setup code, checks for mistakes in the file structure, etc.
    if(!file_exists('.env')){
        if(!copy('.example', '.env')){
            echo "copy .example error";
            exit;
        }
        echo "Wilkommen bei der Installation der Discoin Webhook Applikation!" . PHP_EOL;
        echo "Falls du Hilfe benötigst, schaue in das Readme.md auf GitHub" . PHP_EOL . PHP_EOL;
    }

    $config = json_decode(file_get_contents('.env'), JSON_OBJECT_AS_ARRAY);

    if($config["webhook"] == "WEBHOOK_URL_HERE"){
        $config["webhook"] = (string) readline("Bitte gib die Webhook URL ein:" . PHP_EOL);
        echo PHP_EOL . PHP_EOL;
    }

    if($config["api-key"] == "API_KEY_HERE"){
        $config["api-key"] = (string) readline("Bitte gib den Rapid-API Key ein:" . PHP_EOL);
        echo PHP_EOL . PHP_EOL;
    }

    if($config["message"]["id"] == "MESSAGE_ID_HERE"){
        $ask_newName = (string) substr(strtolower(readline("Moechtest du noch einen Speziellen Benutzernamen fuer den Webhook angeben? (y/n):" . PHP_EOL)), 0, 1);
        if($ask_newName == "y"){
            $config["username"] = (string) readline("Benutzername:" . PHP_EOL);
            echo PHP_EOL . PHP_EOL;

            //zwischenspeichern
            file_put_contents('.env', json_encode($config));
        }
        discordMessage("new");
        $config["message"]["id"] = (string) readline("Wie lautet die MessageID der gesendeten Nachricht?:" . PHP_EOL);
        echo PHP_EOL . PHP_EOL;
    }

    while($config["delay"] < 300){
        echo "Das Delay muss laenger oder gleich 300 Sekunden sein!" . PHP_EOL;
        $config["delay"] = (int) readline("Wie viel Delay (in Sekunden) möchtest du zwischen jeder Aktualisierung haben?: (min. 300)" . PHP_EOL);
    }
    file_put_contents('.env', json_encode($config));
}