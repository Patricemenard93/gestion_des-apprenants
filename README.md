# CFTP-L2C — Gestion des Apprenants

> Application web de gestion des filières, apprenants et notes du centre de formation CFTP-L2C.

---

## 1. Nom du projet

**CFTP-L2C — Système de Gestion des Apprenants**

Développé pour le centre de formation CFTP-L2C (Connecté à votre avenir), ce projet permet la gestion complète des filières de formation, des apprenants inscrits et de leurs notes, avec calcul automatique des moyennes et exports de documents.

---

## 2. Technologies utilisées

| Couche | Technologie | Version |
|
| Framework PHP | Laravel 13.8 |
| Langage | PHP | 8.5.2 |
| Base de données | MySQL | 8.x |
| ORM | Eloquent (Laravel) | — |
| Moteur de templates | Blade (Laravel) | — |
| Authentification | Laravel Breeze | — |
| CSS / UI | Bootstrap | 5.3 |
| Graphiques | Chart.js | 4.4.0 |
| Export PDF | barryvdh/laravel-dompdf
| Export Excel | maatwebsite/excel
| Build frontend | Vite
| Notifications | Laravel Database Notifications
| Typographies | Inter, Playfair Display (Google Fonts)

---

## 3. Etapes d'installation

### Prérequis

- PHP 8.x
- Composer
- Node.js + npm
- MySQL (Laragon, XAMPP, MAMP ou Homebrew)
- Git

### Etape 1 — Cloner le projet

```bash
git clone https://github.com/Patricemenard93/gestion_des-apprenants

cd gestion_des-apprenants
```

### Etape 2 — Installer les dépendances PHP

```bash
composer install --ignore-platform-req=php
```


### Etape 3 — Installer les dépendances JavaScript

```bash
npm install
```

### Etape 4 — Configurer l'environnement

```bash
cp .env.example .env
```

Ouvrez le fichier `.env` et renseignez la connexion à votre base de données :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cftp_l2c_gestion
DB_USERNAME=root
DB_PASSWORD=
```

### Etape 5 — Créer la base de données


```sql
CREATE DATABASE cftp_l2c_gestion CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### Etape 6 — Générer la clé d'application

```bash
php artisan key:generate
```

### Etape 7 — Exécuter les migrations et les seeders

```bash
php artisan migrate --seed
```


### Etape 8 — Créer le lien symbolique pour le stockage

```bash
php artisan storage:link
```

### Etape 9 — Compiler les assets frontend

```bash
npm run build
```

### Etape 10 — Lancer le serveur

```bash
php artisan serve
```


## 4. Identifiants de connexion

| Role | Email | Mot de passe |
|------|-------|--------------|
| Administrateur | `admin@gmail.com` | `password` |
| Utilisateur (lecture seule) | `user1@gmail.com` | `password` |

### Droits par rôle

| Fonctionnalité | Administrateur | Utilisateur |
|----------------|:--------------:|:-----------:|
| Voir le tableau de bord | Oui | Oui |
| Voir les filières | Oui | Oui |
| Créer / modifier / supprimer une filière | Oui | Non |
| Voir les apprenants | Oui | Oui |
| Créer / modifier / supprimer un apprenant | Oui | Non |
| Voir les notes | Oui | Oui |
| Ajouter / modifier / supprimer une note | Oui | Non |
| Exporter PDF / Excel | Oui | Oui |
| Gérer les utilisateurs | Oui | Non |
| Voir les notifications | Oui | Oui |

---

## Fonctionnalités principales

- Tableau de bord avec statistiques en temps réel et graphiques interactifs (Chart.js)
- CRUD complet : filières, apprenants (avec photo), notes
- Calcul automatique de la moyenne pondérée et décision (Admis / Ajourné)
- Recherche par nom, prénom ou matricule ; filtre par filière
- Export PDF et Excel des filières, apprenants et notes
- Notifications système en base de données (création, modification, suppression)
- Authentification sécurisée : limitation à 5 tentatives, blocage 6 minutes, messages génériques anti-énumération
- Gestion des utilisateurs et des rôles (admin uniquement)

---

## Structure de la base de données

| Table | Description |
|-------|-------------|
| `users` | Comptes utilisateurs avec rôle (`admin` / `user`) |
| `filieres` | Filières de formation |
| `apprenants` | Apprenants avec photo, genre, matricule |
| `notes` | Notes avec matière, coefficient, date |
| `notifications` | Notifications système (base de données Laravel) |

---

## Commandes utiles

```bash
# Vider le cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Réinitialiser la base de données
php artisan migrate:fresh --seed