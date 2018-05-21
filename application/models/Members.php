<?php

namespace application\models;

use application\core\Model;

class Members extends Model
{

   public function getUserInformation()
   {
      @$user = $this->db->findOne('blogs', 'id = ?', [$_SESSION['authorize']['id']]);
      if (empty($user)) {
         $dataJSON = json_decode($_COOKIE['auth']);
         $user = $this->db->findOne('blogs', 'id = ?', [$dataJSON->id]);
         return $user;
      }
      return $user;
   }

   public function getPostsList()
   {
      @$list = $this->db->find('posts', 'author = ?', [$_SESSION['authorize']['id']]);
      if (empty($list)) {
         $dataJSON = json_decode($_COOKIE['auth']);
         $list = $this->db->find('posts', 'author = ?', [$dataJSON->id]);
         return $list;
      }
      return $list;
   }

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
               } else {
                  $this->error = 'Ошибка загрузки фото';
                  return false;
               };
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

   public function deletePost($id)
   {
      $db = $this->db->dispense('posts');
      $post = $this->db->findOne('posts', 'id = ?', [$id]);
      $this->db->trash($post);
      return true;
   }
}
