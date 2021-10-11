<p align="center">
    <img src="media/logo.png" height="100px"></img><br>
    <img src="media/logo-font.png" height="60px"></img><br>
    Ein PHP-Skript um einen Kryptowährungspreis<br>
    in Discord darzustellen.
</p>

--------------------------

## Projektidee mit Zusammenfassung

Unser Projekt ist einen Webhook auf Discord in einem Server zu erstellen, der alle paar sekunden von der [Coinbase API] den bevorzugten Cryptowährungspreis abruft und ausgibt. Der Webhook schickt bei der Ausführung einmal eine Nachricht mit einem sogennanten Discord Embed, das den aktuellen Preis mit eventuell einem Verlauf anzeigt. Der Preis sollte dann automatisch, solange die PHP Session bestehen bleibt, jede 1-2 Minuten aktualisiert werden (indem die Nachricht editiert wird).


## APIs

Wir möchten die [Discord Webhook] API für unser Projekt benutzen, die sehr gut dokumentiert und nicht all zu leicht ist. Dort können wir unsere Applikation ([Coinbase API]) mit Discord verknüpfen.

Um den zurzeitigen Preis der Währung zu bekommen benutzen wir die [Coinbase API].


## Teammitglieder

- Noah Geeler (API-1)
- Marc Willhelm (API-1)


[Coinbase API]: https://developers.coinbase.com/
[Discord Webhook]: https://discord.com/developers/docs/resources/webhook
