Apache configuration for ver. > `2.4`

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

Local resolution for `example.com`

```
$ cat /etc/hosts
127.0.0.1 example.com
```

Enable rewrite mode

```
$ sudo a2enmod rewrite
```

