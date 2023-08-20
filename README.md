# MatriculeMaster

## Description
C'est un projet de gestion des numéros matricules de ses étudiants de façon automatique

## Init datas
- **php artisan app:init-data**
## Install wkhtmltopdf
- **sudo apt install wkhtmltopdf** // On Ubuntu si pas encore installé puis ajouter le changer le path de wkhtmltopdf dans le *config/snapy* comme suite : 

```bash
'binary'  => env('WKHTML_PDF_BINARY', '/usr/bin/wkhtmltopdf'),
```
par
```bash
'binary'  => env('WKHTML_PDF_BINARY', 'votre path'),
```
Pour plus d'information, consulter : **https://github.com/barryvdh/laravel-snappy**