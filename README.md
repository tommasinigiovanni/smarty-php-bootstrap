```
$ cat /etc/apache2/sites-available/smarty-php-bootstrap.conf 
<VirtualHost *:80>
    ServerName  www.example.com
    ServerAlias example.com

    DirectoryIndex index.html index.php index.htm
    DocumentRoot /home/igor/Work/smarty-php-bootstrap/public

    <Directory "/home/igor/Work/smarty-php-bootstrap/public">
        Options MultiViews FollowSymLinks
        AllowOverride all
        Require all granted
    </Directory>

    # Logfiles
    ErrorLog  /var/log/apache2/example.com/error.log
    CustomLog /var/log/apache2/example.com/access.log combined
</VirtualHost>
```

```
$ cat /etc/hosts
127.0.0.1 example.com
```

```
$ sudo a2enmod rewrite
```

