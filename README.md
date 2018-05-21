# blog
1. Если нет соеденения с базой данных => 
  Идём в /application/lib/Db.php
  Меняем конфиг.

2. Настройки .htaccess 
```
 addDefaultCharset utf-8
 RewriteEngine on
 RewriteBase /
 rewritecond %(REQUEST_FILENAME) !-f
 rewritecond %(REQUEST_FILENAME) !-d
 RewriteCond %{REQUEST_FILENAME} !-l
 RewriteRule ^(.*)$ index.php
 ```
