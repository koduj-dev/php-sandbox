#!/usr/bin/env bash

docker exec -it --workdir /php_sandbox/project -u $(id -u):$(id -g) php_sandbox_php_1 php artisan "$@"
