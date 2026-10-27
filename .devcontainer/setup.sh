#!/usr/bin/env bash
# Runs once when the codespace is created: installs PHP + MariaDB inside the codespace only.
set -e

sudo apt-get update
sudo DEBIAN_FRONTEND=noninteractive apt-get install -y php-cli php-mysql mariadb-server

sudo service mariadb start

# Let PHP log in as root with an empty password (same as XAMPP's default)
sudo mariadb -e "ALTER USER root@localhost IDENTIFIED VIA unix_socket OR mysql_native_password USING PASSWORD('');"

# Build universitydb
mariadb -uroot < universitydb.sql

echo "Setup done. Run: bash run.sh"
