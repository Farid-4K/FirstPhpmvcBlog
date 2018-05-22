<?php
namespace application\lib;

require_once ROOT . "/application/lib/rb.php";
use R;

class Db extends R
{
   public function __construct()
   {
      R::setup('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
      if (!R::testConnection()) {
         exit('Нет соединения с базой данных');
      }
   }
}
