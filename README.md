# Apache + MySQL + PHP + Smarty template
The bootstrap example app

## Tl;Dr; Starting up fast!

```
vagrant up
```

## Installation

Apache configuration for ver. > `2.4`, you need to have a `root` privileges to execute following commands o prefix them with `sudo` command.


```
$ cat /etc/apache2/sites-available/smarty-php-bootstrap.conf 
<VirtualHost *:80>
    ServerName  www.example.com
    ServerAlias example.com

    DirectoryIndex index.html index.php index.htm
    DocumentRoot /var/www/smarty-php-bootstrap/public

    <Directory "/var/www/smarty-php-bootstrap/public">
        Options MultiViews FollowSymLinks
        AllowOverride all
        Require all granted
    </Directory>

    # Logfiles
    ErrorLog  /var/log/apache2/example.com/error.log
    CustomLog /var/log/apache2/example.com/access.log combined
</VirtualHost>
```

Clone repository into `/var/www/smarty-php-bootstrap`

```
cd /var/www/
git clone git@github.com:moiseevigor/smarty-php-bootstrap.git
cd /var/www/smarty-php-bootstrap
```

Make cache folder writable by any user

```
chmod 777 /var/www/smarty-php-bootstrap/app/templates_c
```

Local resolution for `example.com`

```
cat /etc/hosts
127.0.0.1 example.com
```

Enable rewrite mode

```
a2enmod rewrite
```

Enable site

```
a2ensite smarty-php-bootstrap
```

Init database form the following `SQL`, you'd like to modify default database name/username/password and default web user data

```
-- MODIFY this file for your needs
--

CREATE DATABASE `bootstrap` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE `bootstrap`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE USER 'bootstrap'@'localhost' IDENTIFIED BY 'password';
GRANT ALL ON bootstrap.* TO 'bootstrap'@'localhost';

INSERT INTO `users` (
	`name`,
	`email`,
	`password`
) VALUES (
	'Pinco Pallino',
	'pinco.pallino@libero.it',
	'123456'
);
```

## Folder structures

### App
`/app` folder contains all dynamic php scripts that performs all business logic, generates html with Smarty and interacts with DB.

`/system` contains the `SQL` script to init database

`/public` is the public folder available throught web-server that contains all static assets and unique entry point of the App - `index.php`


now connect to www.example.com
