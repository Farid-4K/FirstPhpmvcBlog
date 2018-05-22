<?php

namespace application\models;

use application\core\Model;

class Members extends Model
{

   /**
    * Получение информации о пользователе
    */
   public function getUserInformation($table)
   {
      @$user = $this->db->findOne($table, 'id = ?', [$_SESSION['authorize']['id']]);
      if (empty($user)) {
         $dataJSON = json_decode($_COOKIE['auth']);
         $user = $this->db->findOne($table, 'id = ?', [$dataJSON->id]);
         return $user;
      }
      return $user;
   }

   /**
    * Выборка всех постов пользователя
    */
   public function getPostsList()
   {
      if ($this->checkAuth() == 1) {
         $list = $this->db->find('posts', 'author = ?', [$_SESSION['authorize']['id']]);
         return $list;
      } elseif ($this->checkAuth() == 2) {
         $dataJSON = json_decode($_COOKIE['auth']);
         $list = $this->db->find('posts', 'author = ?', [$dataJSON->id]);
         return $list;
      } else {
         $this->error = "ошибка";
      }
   }

   /**
    * Добавление поста
    */
   public function addPost($post)
   {
      /* Проверка данных */
      if ((!empty($post['name'])) or (!empty($post['inform']))) {
         if ((!empty($_SESSION['authorize']['id'])) or (!empty($_COOKIE['auth']))) {

            $name = htmlspecialchars($post['name']);
            $inform = htmlspecialchars($post['inform']);
            $db = $this->db->dispense('posts');

            if ((!empty($_FILES)) or (!empty($_POST['file']))) {
               $tmp_name = $_FILES["file"]["tmp_name"];
               $name_img = basename($_FILES["file"]['name']);
               $hash = date('H_i_s') . md5($name_img);
               $fileUrl = '/public/users/product/' . $hash . '.jpg';
               $filename = ROOT . $fileUrl;
               if (move_uploaded_file($tmp_name, $filename)) {
                  $db->image = $fileUrl;
                  $this->error = 'Успешно';
               }
            }

            if (!empty($_SESSION['authorize']['id'])) {
               $db->author = $_SESSION['authorize']['id'];
            } elseif (!empty($_COOKIE['auth'])) {
               $db->author = json_decode($_COOKIE['auth'])->id;
            }

            $db->name = $name;
            $db->inform = $inform;
            $db->date = date("Y:m:d:H:i:s");
            $this->db->store($db);
            $this->error = 'Успешно';
            return true;
         } else {
            $this->error = 'Авторизируйтесь заного';
            return false;
         }
      } else {
         $this->error = 'Поля название и текст должны быть заполнены';
         return false;
      }
   }

   /**
    * Редактирование поста
    */
   public function editPost($post)
   {
      if ((!empty($post['editName'])) or (!empty($post['editInform']))) {
         $db = $this->db->dispense('posts');
         $blog = $this->db->findOne('posts', 'id = ?', [$post['editID']]);
         $name = htmlspecialchars($post['editName']);
         $inform = htmlspecialchars($post['editInform']);
         if ((!empty($_FILES))) {
            $tmp_name = $_FILES["editFile"]["tmp_name"];
            $name_img = basename($_FILES["editFile"]['name']);
            $hash = date('H_i_s') . md5($name_img);
            $fileUrl = '/public/users/product/' . $hash . '.jpg';
            $filename = ROOT . $fileUrl;
            if (move_uploaded_file($tmp_name, $filename)) {
               $blog->image = $fileUrl;
               $this->error = 'Успешно';
            }
         }
         $blog->name = $name;
         $blog->inform = $inform;
         $blog->date = date("Y:m:d:H:i:s");
         $this->db->store($blog);
         $this->error = 'Успешно';
         return true;
      }
   }

   /**
    * Подтверждение почты
    */
   public function checkEmail($token)
   {
      $data = $this->db->findOne('users', 'token = ?', [$token]);
      if ($data != null) {
         $verify = $data->verify;
         $data->token = null;
         $verify = json_decode($verify);
         $verify->emailverify = '1';
         $data->verify = json_encode($verify);
         $this->db->store($data);
      } else {
         return false;
      }
      return true;
   }

   /**
    * Удаление поста пользователя
    */
   public function deletePost($id)
   {
      $db = $this->db->dispense('posts');
      $post = $this->db->findOne('posts', 'id = ?', [$id]);
      $this->db->trash($post);
      return true;
   }

   /**
    * Проверка авторизации
    */
   public function checkAuth()
   {
      if (!empty($_SESSION['authorize']['id'])) {
         return 1;
      } elseif (!empty($_COOKIE['auth'])) {
         return 2;
      } else {
         return false;
      }
   }

   /**
    * Проверка подтверждения почты
    */
   public function emailCheck()
   {
      $find = $this->db->findOne('users', ' id = ? ', [$_SESSION['authorize']['id']]);
      if ($find->token != null) {
         return true;
      } else {return false;}
   }
}
