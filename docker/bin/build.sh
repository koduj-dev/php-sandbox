#!/usr/bin/env bash

docker-compose \
    -f docker/compose/docker-compose.yml \
    -p php_sandbox build
