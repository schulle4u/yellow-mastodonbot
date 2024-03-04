<p align="right"><a href="README-de.md">Deutsch</a> &nbsp; <a href="README.md">English</a></p>

# Mastodonbot 0.8.1

Neue Seiten automatisch auf Mastodon veröffentlichen.


## Wie man eine Erweiterung installiert

[ZIP-Datei herunterladen](https://github.com/schulle4u/yellow-mastodonbot/archive/refs/heads/main.zip) und in dein `system/extensions`-Verzeichnis kopieren. [Weitere Informationen zu Erweiterungen](https://github.com/annaesvensson/yellow-update/tree/main/README-de.md).

## Wie man neue Seiten auf Mastodon veröffentlicht

Erstelle zuerst eine neue App im Entwicklerbereich deiner Mastodon-Instanz, anschließend hinterlege den generierten Zugriffs-Token sowie deinen Instanz-Hostnamen in der Datei `system/extensions/yellow-system.ini`. Jede neue Seite wird bei der Erstellung auf Mastodon veröffentlicht. Setze `Mastodon: exclude` in den [Seiteneinstellungen](https://github.com/annaesvensson/yellow-core#settings-page), um dies für bestimmte Seiten zu verhindern. 

## Beispiele

Inhaltsdatei ohne Mastodon-Veröffentlichung: 

```
---
Title: Diese Seite wird nicht auf Mastodon veröffentlicht
Mastodon: exclude
---
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. [--more--]

Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
```

## Einstellungen

Die folgenden Einstellungen können in der Datei `system/extensions/yellow-system.ini` vorgenommen werden:

`MastodonbotApiKey` = Der Zugriffs-Token für deine Mastodon-Instanz  
`MastodonbotInstance` = Hostname deiner Mastodon-Instanz  
`MastodonbotVisibility` = Sichtbarkeit der veröffentlichten Seiten (public, unlisted oder private)  
`MastodonbotMaxChars` = Maximale Zeichenanzahl für die Seitenzusammenfassung  
`MastodonbotTemplate` = Vorlage für Mastodonbeiträge  

Die folgenden Platzhalter können in der Beitragsvorlage verwendet werden:

`@title` = Seitentitel  
`@content` = Seitenauszug  
`@url` = Seiten-URL  

## Danksagung

Diese Erweiterung verwendet [MastodonBotPHP](https://github.com/eleirbag89/mastodonbotphp) von Gabriele Grillo. Vielen Dank für die Bibliothek! 

## Entwickler

Steffen Schultz. [Hilfe finden](https://datenstrom.se/de/yellow/help/).
