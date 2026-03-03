# R606_eval

Projet PHP réalisé dans le cadre de la R6.06 (Maintenance applicative).

## Setup

### 1 - Cloner le projet

```bash
git clone https://github.com/ethan-hgt/R606_eval
cd R606_eval
```

### 2 - Installer les dépendances

```bash
composer install
```

### 3 - Configurer l'environnement

```bash
cp .env.example .env
```

### 4 - Lancer le projet

Option A (local) :

```bash
php -S localhost:8000
```

Option B (Docker) :

```bash
docker compose up -d --build
```

## Commandes utiles

```bash
composer test
composer phpstan
```

## CI

La CI GitHub Actions lance automatiquement :
- les tests PHPUnit
- l'analyse statique PHPStan

## Modifications apportées pour améliorer la maintenabilité

- Ajout d'un système de migrations pour la base de données
- Mise en place de Docker pour standardiser l'environnement d'exécution
- Mise en place d'une CI GitHub Actions (PHPUnit + PHPStan)
- Externalisation de la configuration BDD via `.env` et `config.php`
- Séparation de `index.php` (logique) et de la vue HTML (`views/index.view.php`)
- Extraction de la logique BDD dans des classes dédiées (`ConnexionBdd`, `TableTexte`)