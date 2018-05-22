<?php

namespace application\core;

use Exception;

class View
{

   public $path;
   public $route;
   public $layout = 'default';

   public function __construct($route)
   {
      $this->route = $route;
      $this->path = $route['controller'] . '/' . $route['action'];
   }

   /**
    * Рендер страницы
    */
   public function render($pageTitle, $vars = [])
   {
      extract($vars);
      $path = 'application/views/' . $this->path . '.php';
      if (file_exists($path)) {
         ob_start();
         require_once $path;
         $content = ob_get_clean();
         $title = $pageTitle;
         require_once 'application/views/layouts/' . $this->layout . '.php';
      } else {
         throw new Exception("Page's file not found");
      }
   }

   /**
    * обработка HTML кодов ошибок
    */
   public static function errorCode($code)
   {
      http_response_code($code);
      $path = ROOT . '/application/views/errors/' . $code . '.php';
      if (file_exists($path)) {
         require_once $path;
      }
      die;
   }

   public function redirect($url)
   {
      header('location:/' . $url);
      exit;
   }

   public function message($status, $message)
   {
      exit(json_encode(['status' => $status, 'message' => $message]));
   }

   public function location($url)
   {
      exit(json_encode(['url' => $url]));
   }

   public function ifempty($var, $message, $status = null)
   {
      if (empty($var)) {
         echo htmlspecialchars($message);
      } else {
         if ($status = true) {
            echo htmlentities($var);
         }
      }
   }

   /**
    * Форматирование вывода
    */
   public function textParsePost($data)
   {
      $string_1 = preg_replace('~[*]{3}([\w\W]+)[*]{3}~', '<tt>$1</tt>', $data);
      $string_2 = preg_replace('~[*]{2}([\w\W]+)[*]{2}~', '<strong>$1</strong>', $string_1);
      $string_3 = preg_replace('~[*]{1}([\w\W]+)[*]{1}~', '<i>$1</i>', $string_2);
      return $string_3;
   }
}
