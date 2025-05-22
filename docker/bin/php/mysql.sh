#!/usr/bin/env bash

docker exec -it php_sandbox_mysql_1 mysql php_sandbox "$@"
