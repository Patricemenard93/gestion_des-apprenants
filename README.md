# CFTP-L2C Gestion des Apprenants

Application web Laravel pour la gestion des filieres, apprenants, notes, statistiques et exports du centre de formation CFTP-L2C.

## Fonctionnalites

- Authentification avec inscription, connexion et deconnexion
- Gestion des roles `admin` et `user`
- CRUD complet des filieres
- CRUD complet des apprenants avec upload photo
- Gestion des notes avec calcul de moyenne, total de coefficients et decision
- Recherche par nom, prenom ou matricule
- Filtrage par filiere et par apprenant
- Tableau de bord avec graphiques statistiques
- Notifications systeme en base de donnees
- Export PDF et Excel des filieres, apprenants et notes

## Stack technique

- Laravel 13
- PHP 8.3
- MySQL comme base de donnees cible
- Eloquent ORM
- Blade
- Bootstrap 5
- Maatwebsite Excel
- DomPDF

## Installation

```bash
composer install
npm install
copy .env.example .env
create database gestion_apprenants
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
npm run build
php artisan serve
```

Si `php` n'est pas reconnu dans PowerShell sous Windows, utilisez l'executable PHP fourni par votre stack, par exemple avec Laragon :

```powershell
& "C:\laragon\bin\php\php-8.3.28-Win32-vs16-x64\php.exe" artisan migrate --seed
```

## Comptes de demonstration

- Administrateur : `admin@cftp-l2c.test`
- Utilisateur lecture : `user@cftp-l2c.test`
- Mot de passe : `password`

## Base de donnees

Le projet est livre pour fonctionner avec MySQL.

Configuration par defaut de `.env.example` :

- `DB_CONNECTION=mysql`
- `DB_HOST=127.0.0.1`
- `DB_PORT=3306`
- `DB_DATABASE=gestion_apprenants`
- `DB_USERNAME=root`
- `DB_PASSWORD=`

Valeurs conseillees selon votre serveur local :

- Laragon : `DB_HOST=127.0.0.1`, `DB_PORT=3306`, `DB_USERNAME=root`, `DB_PASSWORD=`
- XAMPP : `DB_HOST=127.0.0.1`, `DB_PORT=3306`, `DB_USERNAME=root`, `DB_PASSWORD=`
- MAMP : `DB_HOST=127.0.0.1`, `DB_PORT=8889`, `DB_USERNAME=root`, `DB_PASSWORD=root`

Une fois la base creee dans phpMyAdmin ou via MySQL, lancez :

```bash
php artisan migrate --seed
```

Les migrations couvrent :

- utilisateurs, sessions, cache et jobs Laravel
- filieres
- apprenants
- notes
- notifications en base de donnees

## Technologies obligatoires

Les technologies demandees sont bien presentes et utilisees dans le projet :

- Laravel : structure complete de l'application, routes, controllers, migrations et artisan
- Blade : vues `resources/views/*.blade.php`
- Bootstrap : importe dans `resources/css/app.css` et `resources/js/app.js`, puis utilise dans les vues
- MySQL : configuration par defaut des fichiers `.env` et validation de migration sur MySQL
- Eloquent ORM : modeles `App\Models\Apprenant`, `Filiere`, `Note`, `User` et leurs relations

## Verification

- `php artisan migrate:fresh --seed`
- `php artisan test`
- `npm run build`
