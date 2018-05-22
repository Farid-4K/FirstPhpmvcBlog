<?php

namespace application\models;

use application\core\Model;

class Account extends Model
{

   /**
    * Регистрация
    */
   public function registration()
   {

      $user_data = [
         "name"     => htmlspecialchars($_POST['name']),
         "email"    => htmlspecialchars($_POST['email']),
         "inform"   => htmlspecialchars($_POST['inform']),
         "password" => password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT),
      ];

      $user = $this->db->dispense('users');
      $blog = $this->db->dispense('blogs');
      $email = $user_data["email"];
      $token = hash('tiger192,4', $email);
      $user->email = $email;
      $user->email_reserv = '';
      $user->password = $user_data["password"];
      $user->token = $token;
      $user->verify = json_encode(['phone' => '', 'emailverify' => 0]);
      $user->clock = date('d.m.Y H:i:s');
      $blog->name = $user_data["name"];
      $blog->inform = $user_data["inform"];
      $img_url = [
         'img_post'       => '/public/images/standart_blog.jpg',
         'img_background' => '',
      ];
      $img_url = json_encode($img_url);
      $blog->img_url = $img_url;
      $this->db->store($user);
      $this->db->store($blog);
      mail($email, 'Подтверждение регистрации', '<a href="' . SITENAME . '/members/email/' . $token . '">Ссылка</a>');
      $_SESSION['user'] = $user;
      $_SESSION['authorize']['id'] = $user['id'];
      unset($user);
   }

   /**
    * Авторизация
    */
   public function login()
   {
      $user = $this->db->findOne('users', 'email = ?', [$_POST['email']]);
      if (empty($user)) {
         $this->error = 'Пользователь не найден';
         return false;
      } else {
         if (password_verify($_POST['password'], $user->password) == $user->password) {
            $_SESSION['user'] = $user;
            $_SESSION['authorize']['id'] = $user['id'];
            if (!empty($_POST['remember'])) {
               setcookie('auth', $user, time() + 36000, '/');
            }
            return true;
         } else {
            $this->error = 'Введенный пароль неверный';
            return false;
         }
      }
   }

   /**
    * Валидация формы авторизации
    */
   public function validateFormLog()
   {
      $find = $this->db->findOne('users', 'email = ?', [htmlspecialchars($_POST['email'])]);
      if (empty($find)) {
         $this->error = 'Пользователь не найден';
         return false;
      } else {
         return true;
      }
   }

   /**
    * Валидация формы регистрации
    */
   public function validateFormReg($post)
   {
      $find = $this->db->findOne('users', 'email = ?', [htmlspecialchars($_POST['email'])]);
      $nameLen = iconv_strlen($post['name']);
      $passLen = iconv_strlen($post['password']);
      $textLen = iconv_strlen($post['inform']);
      if ($nameLen < 3 or $nameLen > 20) {
         $this->error = 'Название должно содержать от 2 до 20 символов';
         return false;
      } elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
         $this->error = 'E-mail указан неверно';
         return false;
      } elseif (!empty($find)) {
         $this->error = 'Пользователь с такой почтой уже зарегестрирован';
         return false;
      } elseif ($passLen < 6) {
         $this->error = 'Минимальная длинна пароля 6 символов';
         return false;
      } else {
         return true;
      }
   }
}
