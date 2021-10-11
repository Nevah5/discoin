<p align="center">
    <img src="media/logo.png" height="100px"></img><br>
    <img src="media/logo-font.png" height="60px"></img><br>
    Ein PHP-Skript um einen Kryptowährungspreis<br>
    in Discord darzustellen.
</p>

--------------------------
<br>

# Installation
> Dieser Bereich steht noch unter Bearbeitung

<br>
<br>

# Informationen zum Projekt
## Projektidee mit Zusammenfassung

Unser Projekt ist einen Webhook auf Discord in einem Server zu erstellen, der alle paar sekunden von der [Coinbase API] den bevorzugten Cryptowährungspreis (zum Beispiel [Bitcoin]) abruft und ausgibt. Der Webhook schickt bei der Ausführung einmal eine Nachricht mit einem sogennanten Discord Embed, das den aktuellen Preis mit eventuell einem Verlauf anzeigt. Der Preis sollte dann automatisch, solange die PHP Session bestehen bleibt, jede 1-2 Minuten aktualisiert werden (indem die Nachricht editiert wird).<br/><br/>


## APIs

Wir möchten die [Discord Webhook] API für unser Projekt benutzen, die sehr gut dokumentiert und nicht all zu leicht ist. Dort können wir unsere Applikation ([Coinbase API]) mit Discord verknüpfen.

Um den zurzeitigen Preis der Währung zu bekommen benutzen wir die [Coinbase API].<br/><br/>



## Teammitglieder und User Stories

- Noah Geeler (API-1)
    - Als Entwickler dieses Projektes möchte ich ein funktionsfähiges Programm mit integrierten APIs erstellen.
- Marc Willhelm (API-1)
    - Als User möchte ich mühelos Updates über den Cryptomarkt haben, damit ich immer auf dem neusten Stand bleibe.
<br/><br/>

## Team Kodex
    1. Ehrlichkeit hat hier oberste Priorität.
    2. Man steht zu seinen Fehlern.
    3. Sauber und sorgfältig arbeiten.
    4. Spass haben.
    5. Oft COMMITTEN.

[Coinbase API]: https://developers.coinbase.com/
[Discord Webhook]: https://discord.com/developers/docs/resources/webhook
[Bitcoin]: https://www.google.com/search?q=bitcoin&rlz=1C1YTUH_enCH962CH963&oq=bitcoin+&aqs=chrome.0.69i59l4j0i131i433i512l2j69i61l2.2181j1j7&sourceid=chrome&ie=UTF-8
