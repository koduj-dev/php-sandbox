#!/usr/bin/env bash

docker exec -it -u $(id -u):$(id -g) php_sandbox_php_1 php artisan "$@"
