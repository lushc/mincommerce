#!/usr/bin/env bash

composer install
npm install
php app/console doctrine:database:create
php app/console doctrine:schema:create
php app/console doctrine:fixtures:load
php app/console cache:clear --env=prod --no-debug
