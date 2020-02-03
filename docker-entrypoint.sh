#!/bin/bash

##echo "127.0.0.1	gamehill.owasp" >> /etc/hosts
echo "Composer install"
composer install
apache2-foreground
