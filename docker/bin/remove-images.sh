#!/usr/bin/env bash

for image in $(docker images --format "{{.Repository}}" | grep "^php_sandbox_"); do
    docker rmi "$image"
done
