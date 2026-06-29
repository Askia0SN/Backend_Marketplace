# Deploiement Railway

Ce document resume la configuration de production du backend Laravel sur Railway.

## Liens

- Backend GitHub : `https://github.com/Askia0SN/Backend_Marketplace`
- API Railway : `https://backendmarketplace-production.up.railway.app/api`
- Test rapide : `https://backendmarketplace-production.up.railway.app/api/categories`

## Version PHP

Railway doit utiliser PHP 8.4 pour installer les dependances verrouillees dans `composer.lock`.

Le fichier suivant force cette version :

```text
.php-version
```

Son contenu doit rester :

```text
8.4
```

## Variables Railway

Variables principales du service backend :

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://backendmarketplace-production.up.railway.app
LOG_CHANNEL=stderr
LOG_LEVEL=info

DB_CONNECTION=mysql
DB_HOST=${{MySQL.MYSQLHOST}}
DB_PORT=${{MySQL.MYSQLPORT}}
DB_DATABASE=${{MySQL.MYSQLDATABASE}}
DB_USERNAME=${{MySQL.MYSQLUSER}}
DB_PASSWORD=${{MySQL.MYSQLPASSWORD}}

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
FILESYSTEM_DISK=local
```

`APP_KEY` doit etre generee avec :

```bash
php artisan key:generate --show
```

## Initialisation de la base

Apres la creation du service MySQL Railway, lancer dans la console du backend :

```bash
php artisan migrate --seed --force
```

Les seeders ajoutent les categories, les comptes de demonstration et le coupon `DEMO10`.

## Verification

Endpoints utiles pour verifier rapidement la production :

```text
GET /api/categories
GET /api/products
POST /api/auth/login
```

Comptes de demonstration :

```text
buyer@example.com / secret12
seller@example.com / secret12
admin@example.com / secret12
```

## Notes images

Les images produit sont servies via `/storage/...`.

Sur Railway, le stockage local est suffisant pour une demonstration, mais il reste temporaire entre certains redeploiements. Pour une production reelle, utiliser un volume Railway ou un stockage externe compatible S3.
