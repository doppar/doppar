#!/bin/sh
set -e

mkdir -p storage/app storage/app/public storage/framework/cache storage/framework/sessions storage/framework/views storage/logs
chmod -R 775 storage

mkdir -p database
touch database/database.sqlite
chmod 664 database/database.sqlite

if [ ! -f .env ]; then
    cp .env.example .env
    sed -i "s|^APP_URL=.*|APP_URL=${APP_URL:-http://localhost:8000}|" .env
    sed -i 's|^DB_CONNECTION=.*|DB_CONNECTION=sqlite|' .env
fi

if [ ! -d vendor ] || [ ! -f vendor/autoload.php ]; then
    composer install --no-interaction --prefer-dist --no-progress --no-scripts
fi

APP_KEY_VALUE=$(grep -E '^APP_KEY=' .env | cut -d '=' -f 2-)
if [ "$APP_KEY_VALUE" = "base64:7n/+NIB4i3LQ6+ZbrclxuwyEqG5Uprufs90NJGL2pls=" ] || [ -z "$APP_KEY_VALUE" ]; then
    php pool key:generate --ansi
fi

php pool boost --ansi 2>/dev/null || true

php pool migrate --ansi

exec "$@"
