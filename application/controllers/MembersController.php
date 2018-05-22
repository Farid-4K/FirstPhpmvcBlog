<?php
namespace application\controllers;

use application\core\Controller;

class MembersController extends Controller
{
   private $btn_menu;
   public function blogAction()
   {
      $blog = $this->model->getUserInformation("blogs");
      $email_status = $this->model->emailCheck();

      $vars = [
         'email_check'    => $email_status,
         'name'           => $blog['name'],
         'information'    => $blog['inform'],
         'category'       => $blog['category'],
         'images'         => $blog['img_url'],
         'empty_inform'   => 'Вы не указали описание',
         'empty_category' => 'Вы не указали категорию',
         'buttons'        => [
            ['Главная', '/', ''],
            ['Редактировать', '/members/edit', ''],
            ['Мой блог', '/members/blog', ''],
            ['Выход', '#', '#user_exit'],
         ],
      ];

      $this->view->layout = 'market';
      $this->view->render('You blog', $vars);
   }

   public function editAction()
   {
      $this->btn_menu = [
         ['Посты', '/members/edit/posts/', ''],
         ['Мой блог', '/members/blog', ''],
      ];

      $vars = [
         'buttons' => $this->btn_menu,
      ];

      $this->view->layout = 'members';
      $this->view->render('You blog', $vars);
   }

   public function editPostsAction()
   {
      $list = $this->model->getpostsList();

      $this->btn_menu = [
         ['Посты', '/members/edit/posts/', ''],
         ['Мой блог', '/members/blog', ''],
      ];

      $vars = [
         'empty_list' => 'У вас нет товаров',
         'list'       => $list,
         'buttons'    => $this->btn_menu,
      ];

      if (!empty($_POST['id'])) {
         if ($this->model->deletePost($_POST['id'])) {
            $this->view->message('Пост удален', 'Номер ' . $_POST['id']);
         };
      }

      if (!empty($_POST['name'])) {
         if (!$this->model->addPost($_POST)) {
            $this->view->message('Ошибка', $this->model->error);
         } else {
            $this->view->location('members/edit/posts');
         };
      }

      $this->view->layout = 'members';
      $this->view->render('You blog', $vars);
   }

   public function emailAction()
   {
      $token = $this->route['token'];
      if (!$this->model->checkEmail($token)) {
         echo "ошибка подтверждения";
      } else {
         $_SESSION['emailVerify'] = true;
         $this->view->redirect('members/blog');
      };
   }
}
