<?php
namespace application\lib;

require_once ROOT . "/application/lib/rb.php";
use R;

class Db extends R
{
   public function __construct()
   {
      R::setup('mysql:host=localhost;dbname=blog', 'root', '123');
      if (!R::testConnection()) {
         exit('Нет соединения с базой данных');
      }
   }
}
