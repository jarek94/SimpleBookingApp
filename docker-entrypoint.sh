#!/bin/bash
echo "Composer install"
composer install
chmod -R 777 var/
apache2-foreground
