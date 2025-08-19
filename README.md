# Voting-Chartbreaker-Executing-Server

Ein PHP-basierter API-Server für das Voting-Chartbreaker-System, der die Votings ausführt.

## Zweck
Dieser Server führt den Chartbreaker aus und sämtliche Daten des Chartbreakers, welche nicht zum admin-bereich, welcher sich zentral unter MP ADMIN unter /mods/promo-tools/ befindet, gehören.
Dieser Server stellt APIs zur Verfügung für das Management und die Ausführung von Voting-Chartbreaker-Funktionalitäten.

## Ordnerstruktur

```
/
├── public/          # Öffentlicher Web-Root
│   └── index.php   # API-Einstiegspunkt mit Routing
├── src/            # Quellcode
│   └── Controller/ # Controller-Klassen
├── config/         # Konfigurationsdateien
├── logs/           # Log-Dateien
├── .gitignore      # Git-Ignore-Regeln
└── README.md       # Projektdokumentation
```

## API-Endpunkte

- `GET /?action=ping` - Health-Check-Endpunkt

## Installation

1. Repository klonen
2. PHP-Server starten: `php -S localhost:8000 -t public/`
3. API unter `http://localhost:8000` erreichbar
