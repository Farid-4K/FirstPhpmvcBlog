# blog

### 1. Настройки .htaccess 
```
addDefaultCharset utf-8
RewriteEngine on
RewriteBase /
rewritecond %(REQUEST_FILENAME) !-f
rewritecond %(REQUEST_FILENAME) !-d
RewriteRule ^(.*)$ index.php
```
### 2. Требования к ПО
  1. PHP не ниже версии **7.1**.
  1. База данных MySql версии не ниже **5.7**.
  1. Почтовый сервер.
  1. Соеденение с сетью интернет.
  
### 3. Инструкции по настройке
  1. Создайте новую базу данных mySql.
  1. Перейдите в **/application/lib/db.php**. Измените настройки соеденения с бд под комментарием *Database setting*.
  1. Перейдите в **index.php** измените константу *SITENAME* под комментарием *constants*.

### 4. Ошибки
  1. Если нет соеденения с базой данных => Идём в /application/lib/Db.php и меняем конфиг.
