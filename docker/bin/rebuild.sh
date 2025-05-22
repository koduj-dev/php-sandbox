#!/usr/bin/env bash

./docker/bin/down.sh
./docker/bin/remove-images.sh

docker-compose \
    -f docker/compose/docker-compose.yml \
    -p php_sandbox build
