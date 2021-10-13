<p align="center">
    <img src="media/logo.png" height="100px"></img><br>
    <img src="media/logo-font.png" height="60px"></img><br>
    Ein PHP-Skript um einen Kryptowährungspreis<br>
    in Discord darzustellen.
</p>

--------------------------
<br>

# Installation
> How to Instal

<br>
<br>

# Informationen zum Projekt
## Projektidee mit Zusammenfassung

Dies ist das Projekt der Kalenderwoche 41 im ZLI in Zürich. Der Auftrag ist es etwas mit einer API zu machen und im Team zu arbeiten.

Unsere Projektidee ist einen Webhook auf Discord in einem Server zu erstellen, der alle paar Sekunden von der [Coinbase API] den bevorzugten Cryptowährungspreis (zum Beispiel [Bitcoin]) abruft und ausgibt. Der Webhook schickt bei der Ausführung einmal eine Nachricht mit einem sogennanten Discord Embed, das den aktuellen Preis mit eventuell einem Verlauf anzeigt. Der Preis sollte dann automatisch, solange die PHP Session bestehen bleibt, jede 1-2 Minuten aktualisiert werden (indem die Nachricht editiert wird).<br/><br/>


## APIs

Wir möchten die [Discord Webhook] API für unser Projekt benutzen, die sehr gut dokumentiert und nicht all zu leicht ist. Dort können wir unsere Applikation ([Coinbase API]) mit Discord verknüpfen.

Um den zurzeitigen Preis der Währung zu bekommen wollten wir zuerst die [Coinbase API] benutzen, jedoch brauchte man dafür einen Token, der man nur mit einer gültigen ID bekommt, wenn man über 18 Jahre alt ist. Marc suchte dann kurz nach einer neuen. Die neue heisst [Rapid API] (funktioniert mit [Twelvedata]) und hat eine maximale Requestrate von 800/Tag, was ausreicht.

Um den Bitcoin Verlauf darzustellen können wir eine API von Google benutzen, nämlich die [Chart API].
<br/><br/>


## Docker Container

Um PHP einfacher benutzen zu können benutzen wir den [Container] von [foxfabi]. So ist nachher, wenn man das Projekt herunterlädt, gleich alles funktionstüchtig und auf der neusten Version ist.<br/><br/>

## SMART Ziele
- Funktionierende Discord Webhook Applikation mit PHP das Nachrichten in einem Channel sendet und diese mit verschiedenen Intervals editiert bis Ende Woche erarbeiten.
- Die Coinbase API mit der Discord Webhook Applikation verknüpfen.
- Verstehen der Discord Webhook API.
- Das Scrum Model anwenden.
- Einen guten Teamgeist und Teamarbeit haben.
<br/><br/>

## Teammitglieder und User Stories

- <strong>Noah Geeler (API-1)</strong>
    - Als Entwickler dieses Projektes möchte ich ein funktionsfähiges Programm mit integrierten APIs erstellen.
    - Als Benutzer der Applikation möchte ich eine möglichst einfache Installation haben.
    - Als Betrachter des Projektes will ich eine gute Übersicht und Navigation besitzen.
- <strong>Marc Willhelm (API-1)</strong>
    - Als Entwickler möchte ich ein möglichst "cleanes", vertsändliches Produkt abliefern, damit es jeder verstehen kann.
    - Als Benutzer möchte ich mühelos Updates über den Cryptomarkt haben, damit ich immer auf dem neusten Stand bleibe.
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
[foxfabi]: https://github.com/foxfabi
[Container]: https://github.com/foxfabi/phpDEV
[Rapid API]: https://rapidapi.com/twelvedata/api/twelve-data1/pricing
[Twelvedata]: https://twelvedata.com/
[Chart API]: https://developers-dot-devsite-v2-prod.appspot.com/chart

