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
  1. PHP не ниже версии **7.0**.
  1. База данных MySql версии не ниже **5.7**.
  1. Почтовый сервер.
  1. Соеденение с сетью интернет.

### 3. Инструкции по настройке
  1. Создайте новую базу данных mySql.
  2. Для конфигурации сайта перейдите в *application/config/root.php*.
  3. Убедитесь что в корневой директории присутствует файл *.htaccess*

### 4. Ошибки
  1. Если нет соеденения с базой данных => Идём в /application/lib/Db.php и меняем конфиг.

### 5. Если вы используете nginx.
```
server {
server_name Название_сайта;
root Директория_с_сайтом;
index index.html index.php;

  location / {
    try_files $uri $uri/ /index.php?$args;
  }

  location ~ \.php$ {
    try_files $uri =404;
    fastcgi_index index.php;
    # php порт
    fastcgi_pass 127.0.0.1:9000;
    # Либо сокет, который указан в php-fpm
    # fastcgi_pass unix:/var/run/
    include fastcgi_params;
    fastcgi_param SCRIPT_FILENAME $request_filename;
  }
}
```
