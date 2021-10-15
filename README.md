<p align="center">
    <img src="media/logo.png" height="100px"></img><br>
    <img src="media/logo-font.png" height="60px"></img><br>
    Ein PHP-Skript um einen Kryptowährungspreis<br>
    in Discord darzustellen.
</p>
<br>

# Inhaltsverzeichnis

- [Installation Windows](https://github.com/Nevah5/discoin#installation-windows)
    - [Voraussetzungen](https://github.com/Nevah5/discoin#voraussetzungen)
    - [Docker Container](https://github.com/Nevah5/discoin#docker-container)
- [Installation Linux](https://github.com/Nevah5/discoin#installation-linux)
    - [Voraussetzungen](https://github.com/Nevah5/discoin#voraussetzungen-1)
    - [Ausführung](https://github.com/Nevah5/discoin#ausf%C3%BChrung)
- [Allgemeines Setup](https://github.com/Nevah5/discoin#allgemeines-setup)
    - [Rapid API Key](https://github.com/Nevah5/discoin#rapid-api-key)
    - [Setup Discoin Applikation](https://github.com/Nevah5/discoin#allgemeines-setup)
    - [Währungen](https://github.com/Nevah5/discoin#allgemeines-setup)
- [Informationen zum Projekt](https://github.com/Nevah5/discoin#informationen-zum-projekt)
    - [Projektidee mit Zusammenfassung](https://github.com/Nevah5/discoin#projektidee-mit-zusammenfassung)
    - [APIs](https://github.com/Nevah5/discoin#informationen-zum-projekt)
    - [Docker Container](https://github.com/Nevah5/discoin#informationen-zum-projekt)
    - [Teammitglieder mit User Stories](https://github.com/Nevah5/discoin#informationen-zum-projekt)
    - [Team Kodex](https://github.com/Nevah5/discoin#team-kodex)

<br>

---------------------------
<br>

# Installation Windows
## Voraussetzungen
- [Docker] vollständig installiert
- [Discord] und einen [Webhook]
- Konsole/Terminal nach Wahl (PowerShell, CMD, etc.)
- [Rapid API Key](https://github.com/Nevah5/discoin#rapid-api-key)
<br/>

## Docker Container
Nach dem Download und entzippen muss man den Docker-Container ausführen installieren und starten.  Dazu öffnest du eine Konsole/Terminal deine Wahl.

Navigiere dann in den Projektordner und gib folgenden Befehl ein:

    docker-compose -f "docker-compose.yml" up -d --build
Die Installation sollte automatisch beginnen.

Wenn die Installation erfolgreich abgeschlossen wurde, kannst du im Terminal diesen Befehl eingeben:

    docker exec -it phpdev /bin/bash

Du solltest dich dann in der Linux Bash im Ordner `/opt/code` landen. Zuletzt musst du nur noch

    php index.php

eingeben. Dann wird die Applikation samt Setup ausgeführt. Wie du durch das Setup navigierst, findest du [hier](https://github.com/Nevah5/discoin#setup-discoin-applikation).
<br><br>

# Installation Linux
## Voraussetzungen
- [PHP](https://linuxize.com/post/how-to-install-php-on-ubuntu-18-04/) vollständig installiert
- [Discord] und einen [Webhook]
- Linux Shell
- [Rapid API Key](https://github.com/Nevah5/discoin#rapid-api-key)
## Ausführung
Um die Applikation in Linux zu starten, musst du erstmals in das Projektverzeichnis in der Shell navigieren. Dort gehst du in den Ordner `code/` mit
```
cd code/
```
Folgend startest du nur noch die `index.php` Datei mit:
```
php index.php
```
Das war es bereits! Führe nun [hier](https://github.com/Nevah5/discoin#setup-discoin-applikation) fort.
<br><br>

# Allgemeines Setup
## Rapid API Key
Für die Rapid API, die mit der Twelvedata API verknüpft ist, braucht man den RapidAPI Key. Dazu [erstellst du dir einen Account](https://rapidapi.com/auth/sign-up?referral=/hub). Nachdem navigierst du zu [Pricing](https://rapidapi.com/twelvedata/api/twelve-data1/pricing) und musst dort erstmals den Account für den Plan auswählen. Dann abonnierst du den Basic Plan (dieser ist gratis). Nun sollte für dich der API-Key funktionieren, den du unter "[Endpoints](https://rapidapi.com/twelvedata/api/twelve-data1/)" findest. (Dieser ist mit `X-RapidAPI-Key` unter der Kategorie `Exchanges` beschriftet.)
<br><br>

## Setup Discoin Applikation
Wenn das `index.php` gestartet wurde und die Datei `.env` noch nicht existiert, wird nach folgenden Fragen gefragt.

> Bitte gib die Webhook URL ein:
`https://discord.com/api/webhooks/XXXXXXXXXXXXX/XXXXXXXXXXXXXXXXX`

Hier bitten wir dich die URL des Discord [Webhook]s einzugeben.

Hoffentlich hast du bereits im Voraus deinen [Rapid API] Key generieren lassen und diesen bereits kopiert. Er sollte bei der nächsten Frage eingegeben werden, um Abfragen des Bitcoin Wertes zu machen.

> Bitte gib den Rapid-API Key ein:
`XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX`

Wenn du den Webhook noch nie konfiguriert für einen Channel konfiguriert hast, musst du (falls vorhanden) die generierte `.env` Datei löschen und das Skript erneut ausführen. So werden alle Fragen erneut gefragt. Wichtig ist dabei diese Frage:
<p align="center">
<img src="media/examples/NewMessage.png" width="65%">
</p>

> Wie lautet die MessageID der gesendeten Nachricht?:
`XXXXXXXXXXXXXXXXXX`

Um die ID herauszufinden musst du den [Developer Mode] auf Discord aktiviert haben. Dann klickst du rechts, neben der Nachricht auf die Punkte und wählst `Copy ID` aus. Die ID wird dir dann direkt in das Clipboard gespeichert und du kannst mit Rechtsklick diese in die Konsole einfügen.
<br><br>

## Währungen
Um die normale Währung zu ändern musst du nach dem Setup den Webhook mit <kbd>CTRL</kbd> + <kbd>C</kbd> stoppen und in `.env` die Werte dazu anpassen (JSON Wert "currency" und "cryptocurrency"). Dort gelten die [ISO-4217] Währungskürzel. Für die Cryptowährungen gelten die bekanntesten. Leider gibt es hierfür keine Liste.

Was man ausserdem auch machen kann ist zwei normale Wärhungen miteinander vergleichen, wie zum Beispiel Euro (EUR) mit Schweizer Franken (CHF).

<br>

Nun sollte der Webhook im Hintergrund die Nachricht mit den Währungskursen solange aktualisieren, wie das Terminal/Konsole offen bleibt.

**Viel Spass**
<br><br><br>

# Informationen zum Projekt
## Projektidee mit Zusammenfassung

Dies ist das Projekt der Kalenderwoche 41 im ZLI in Zürich. Der Auftrag ist es etwas mit einer API zu machen und im Team zu arbeiten.

Unsere Projektidee ist einen Webhook auf Discord in einem Server zu erstellen, der alle paar Sekunden von der [Coinbase API] den bevorzugten Cryptowährungspreis (zum Beispiel [Bitcoin]) abruft und ausgibt. Der Webhook schickt bei der Ausführung einmal eine Nachricht mit einem sogennanten Discord Embed, das den aktuellen Preis mit eventuell einem Verlauf anzeigt. Der Preis sollte dann automatisch, solange die PHP Session bestehen (Konsole geöffnet) bleibt, jede 1-2 Minuten aktualisiert werden (indem die Nachricht editiert wird).<br><br>


## APIs

Wir wollten für unser Projekt die [Discord Webhook] API für unser Projekt benutzen, die sehr gut dokumentiert und nicht all zu leicht ist. Der Wert des Bitcoins wollten wir zuerst mit der [Coinbase API] bekommen, jedoch war dies nicht möglich, da man sich registrieren und dazu 18 sein und ein Bild der ID hochlasden musste.
Marc suchte dann kurz nach einer neuen. Diese war die [Rapid API] (funktioniert mit [Twelvedata]) und hat eine maximale Requestrate von 800/Tag, was ausreicht bei Einer Abfrage pro Zwei Minuten. Nachdem wir diese getestet hatten und diese perfekt funktionierte, blieben wir dann auch bei dieser.

Ein anderes Ziel, dass wir mitten im Projekt hinzufügt hatten war es noch ein Diagramm und eine Data-History der letzten 10 Werten hinzufügen. Dazu informierten wir uns über die [Quickchart.io] API. Der Rest war alles möglich mit PHP.
<br><br>


## Docker Container

Um PHP einfacher benutzen zu können benutzen wir den [Container] von [foxfabi]. So ist nachher, wenn man das Projekt herunterlädt, gleich alles funktionstüchtig und auf der neusten Version.<br/><br/>

## SMART Ziele
- Funktionierende Discord Webhook Applikation mit PHP das Nachrichten in einem Channel sendet und diese mit verschiedenen Intervals editiert bis Ende Woche erarbeiten.
- Die Coinbase API mit der Discord Webhook Applikation verknüpfen.
- Verstehen der Discord Webhook API.
- Das Scrum Model anwenden.
- Einen guten Teamgeist und Teamarbeit haben.
<br><br>

## Teammitglieder und User Stories

- <strong>Noah Geeler (API-1)</strong>
    - Als Entwickler dieses Projektes möchte ich ein funktionsfähiges Programm mit integrierten APIs erstellen.
    - Als Benutzer der Applikation möchte ich eine möglichst einfache Installation haben.
    - Als Betrachter des Projektes will ich eine gute Übersicht und Navigation besitzen.
- <strong>Marc Willhelm (API-1)</strong>
    - Als Entwickler möchte ich ein möglichst "cleanes", vertsändliches Produkt abliefern, damit es jeder verstehen kann.
    - Als Benutzer möchte ich mühelos Updates über den Cryptomarkt haben, damit ich immer auf dem neusten Stand bleibe.
<br><br>

## Team Kodex
1. Ehrlichkeit hat hier oberste Priorität.
2. Man steht zu seinen Fehlern.
3. Sauber und sorgfältig arbeiten.
4. Spass haben.
5. Oft COMMITTEN.

[Coinbase API]: https://developers.coinbase.com/
[Discord Webhook]: https://discord.com/developers/docs/resources/webhook
[Bitcoin]: https://www.google.com/search?q=bitcoin&rlz=1C1YTUH_enCH962CH963&oq=bitcoin+&aqs=chrome.0.69i59l4j0i131i433i512l2j69i61l2.2181j1j7&sourceid=chrome&ie=UTF-8
[foxfabi]: https://github.com/foxfabi
[Container]: https://github.com/foxfabi/phpDEV
[Rapid API]: https://rapidapi.com/twelvedata/api/twelve-data1/pricing
[Twelvedata]: https://twelvedata.com/
[Docker]: https://docs.docker.com/desktop/windows/install/
[Discord]: https://discord.com/
[Webhook]: https://support.discord.com/hc/de/articles/228383668-Einleitung-in-Webhooks
[Developer Mode]: https://www.howtogeek.com/714348/how-to-enable-or-disable-developer-mode-on-discord/
[ISO-4217]: https://de.wikipedia.org/wiki/ISO_4217
[Quickchart.io]: https://quickchart.io/
