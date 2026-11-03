#!/usr/bin/env bash
# Resets universitydb to its starting state, then serves this folder on port 8000.
set -e

sudo service mariadb start >/dev/null
mariadb -uroot < universitydb.sql
echo "Database reset. Open the forwarded port 8000 and add /index_forWelcome.php to the URL."
echo "(The previous homework page is still at /indexForDMLPractice.php)"
echo "Press Ctrl+C to stop."
php -S 0.0.0.0:8000
