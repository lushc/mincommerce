#!/usr/bin/env bash

# set MySQL password
sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password password vagrant'
sudo debconf-set-selections <<< 'mysql-server-5.5 mysql-server/root_password_again password vagrant'

# install required packages
sudo apt-get update
sudo apt-get -y install     \
 mysql-server-5.5           \
 php5-mysql                 \
 apache2                    \
 php5                       \
 php5-dev                   \
 php-pear                   \
 build-essential            \
 curl                       \
 git                        \
 vim                        \
 python-software-properties

# install nodeJS
sudo apt-add-repository -y ppa:chris-lea/node.js
sudo apt-get update
sudo apt-get install nodejs

# install composer
if [ ! -f /usr/local/bin/composer ]; then
    sudo curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin -- --filename=composer
fi

XDEBUG_LOG_DIR=/var/log/xdebug
if [ ! -d "$XDEBUG_LOG_DIR" ]; then
# install xdebug
mkdir "$XDEBUG_LOG_DIR"
chown www-data:www-data "$XDEBUG_LOG_DIR"
sudo pecl install xdebug

# configure xdebug
cat <<EOF >> /etc/php5/apache2/php.ini

;;;;;;;;;;;;;;;;;;;;;;;;
; Xdebug configuration ;
;;;;;;;;;;;;;;;;;;;;;;;;

zend_extension="$(find / -name 'xdebug.so' 2> /dev/null)"
xdebug.default_enable=1
xdebug.max_nesting_level=250
xdebug.idekey="vagrant"
xdebug.remote_enable=1
xdebug.remote_autostart=0
xdebug.remote_connect_back=1
xdebug.remote_port=9000
xdebug.remote_handler=dbgp
xdebug.remote_log="/var/log/xdebug/xdebug.log"
EOF
fi

# set PHP timezone
if [ ! -f /etc/php5/conf.d/timezone.ini ]; then
    echo 'date.timezone = "Europe/London"' | sudo tee -a /etc/php5/conf.d/timezone.ini
fi

# create a virtualhost
if [ ! -f /etc/apache2/sites-available/mincommerce ]; then
echo -e 'Creating mincommerce virtualhost\n'
cat <<EOF >> /etc/apache2/sites-available/mincommerce
<VirtualHost *:80>
    ServerName mincommerce.dev
    ServerAlias www.mincommerce.dev

    DocumentRoot /var/www/mincommerce/web
    <Directory /var/www/mincommerce/web>
        # enable the .htaccess rewrites
        AllowOverride All
        Order allow,deny
        Allow from All
    </Directory>

    # prevent strange cache behaviour due to the VirtualBox filesystem
    EnableMMAP off
    EnableSendfile off

    ErrorLog /var/log/apache2/mincommerce_error.log
    CustomLog /var/log/apache2/mincommerce_access.log combined
</VirtualHost>
EOF
fi

# enable the virtualhost
if [ ! -h /etc/apache2/sites-enabled/mincommerce ]; then
sudo a2ensite mincommerce
fi

# enable mod_rewrite
if [ ! -h /etc/apache2/mods-enabled/rewrite.load ]; then
sudo a2enmod rewrite
fi

# can't use ACL on shared directories so we need a workaround...
# change apache user
sudo sed -i 's/APACHE_RUN_USER=www-data/APACHE_RUN_USER=vagrant/' /etc/apache2/envvars
# change apache group
sudo sed -i 's/APACHE_RUN_GROUP=www-data/APACHE_RUN_GROUP=vagrant/' /etc/apache2/envvars
# change lockfile permissions
sudo chown -R vagrant:www-data /var/lock/apache2

# restart apache with its new configuration
sudo service apache2 restart
