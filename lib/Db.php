<?php
namespace application\lib;

require_once ROOT . "/application/lib/rb.php";
use R;

class Db extends R
{
   public function __construct()
   {
      /* Database setting */
      $db_host = "localhost";
      $db_name = "blog";
      $db_user = "root";
      $db_password = "123";

      R::setup('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_password);
      if (!R::testConnection()) {
         exit('Нет соединения с базой данных');
      }
   }
}
