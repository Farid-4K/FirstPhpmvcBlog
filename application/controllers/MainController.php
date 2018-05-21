<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
   public function indexAction()
   {
      // Content for page
      $vars = [
         'buttons' => [
            ['Категории', '#', 'category'],
            ['Поиск', '#', 'search'],
            ['Мой блог', '/members/blog', ''],
            ['Регистрация', '/account/registration', ''],
            ['Авторизация', '/account/login', ''],
         ],
      ];

      if (!empty($_REQUEST['name'])) {
         exit(json_encode(['status' => $_REQUEST, 'message' => 'message']));
      }
      // Render page
      $this->view->render('Blog', $vars);
   }

   public function ajaxpreviewpostAction()
   {
      $this->view->layout = 'ajaxPreviewPost';

      if (!empty($_REQUEST)) {
         $find = $this->model->getPost($_REQUEST['card']);
         $vars = [
            'id'     => ($find->id),
            'name'   => ($find->name),
            'inform' => ($find->inform),
            'image'  => ($find->image),
            'date'   => ($find->date),
         ];
      }
      $this->view->render('Blog', $vars);
   }
}
